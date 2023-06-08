<?php

namespace app\models\admin;

use app\models\AppModel;
use base\App;
use RedBeanPHP\R;

class Additive extends AppModel
{
    public array $rules = [
        'required' => ['e_key'],
    ];
    public array $labels = [
        'e_key' => 'additive_add_edit_e_key',
    ];
    public array $functions_all = [];
    public array $safety_all = [];
    public function __construct()
    {
        parent::__construct();
        require_once APP . '/models/admin/form_data.php';
        $this->functions_all = FUNCTIONS_ALL;
        $this->safety_all = SAFETY_ALL;
    }
    public function getFunctionsAll(): array
    {
        $language = App::$app->getProperty('language');
        return array_map(fn($item) => $item[$language], $this->functions_all);
    }
    public function create_additive($data): void
    {
        $data['slug'] = $this->getSlug($data);
        $data['language'] = App::$app->getProperty('language');
        $data['cat_id'] = $this->getCatId($data);
        $data['functions'] = !empty($data['functions']) ? serialize($data['functions']) : '';
        $data['safety'] = $data['safety'] ?? '';
        $additive = R::dispense('additive');

        foreach ($data as $k => $v) {
            $additive->$k = $v;
        }

        R::store($additive);
    }
    public function update_additive($id, $data): void
    {
        $data['publish'] = $data['publish'] ?? '';
        $data['functions'] = !empty($data['functions']) ? serialize($data['functions']) : '';

        $additive = R::load('additive', $id);

        foreach ($data as $k => $v) {
            $additive->$k = $v;
        }
        R::store($additive);
    }
    private function getSlug($data): string
    {
        return !empty($data['e_key']) ? strtolower(cir2translit($data['e_key'])) : '';
    }
    private function getCatId($data): string|false
    {
        $int = (int) filter_var($data['slug'], FILTER_SANITIZE_NUMBER_INT);
        $categories = $this->get_categories($data['language']);

        foreach ($categories as $item) {
            $cat_title = $item['cat_title'];
            $arr = explode('-', $cat_title);
            $int0 = (int) filter_var($arr['0'], FILTER_SANITIZE_NUMBER_INT);
            $int1 = (int) filter_var($arr['1'], FILTER_SANITIZE_NUMBER_INT);

            if($int0 <= $int && $int <= $int1) return $item['cat_id'];
        }
        return false;
    }
    public function get_inserted_id(): int
    {
        return R::getInsertID();
    }
    public function get_additive_by_id($id, $language): array
    {
        $sql = "
            SELECT *
            FROM additive
            JOIN category
            ON additive.cat_id = category.id
            JOIN category_description
            ON category.id = category_description.cat_id
            WHERE additive.id = ? AND additive.language = ?
        ";

        $additive = R::getRow($sql, [$id, $language]);
        $additive['title'] = $this->getTitle($additive);
        $additive['seo_title'] = $this->getSeoTitle($additive);
        $additive['desc'] = $this->getDescription($additive);
        $additive['functions'] = !empty($additive['functions']) ? unserialize($additive['functions']) : [];
        $additive['info_title'] = $this->getInfoTitle($additive);
        $additive['health_title'] = $this->getHealthTitle($additive);
        $additive['using_title'] = $this->getUsingTitle($additive);
        return $additive;
    }
}
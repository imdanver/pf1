<?php

namespace app\models;

use base\Model;
use RedBeanPHP\R;

class AppModel extends Model
{
    public static function isAuth(): bool
    {
        return isset ($_SESSION['user']);
    }
    protected function upperCaseFirst($str): string
    {
        $first_letter = mb_substr($str, 0, 1, 'UTF-8');
        $first_letter = mb_strtoupper($first_letter, 'UTF-8');
        $other_letters = mb_substr($str, 1, null, 'UTF-8');
        return $first_letter . $other_letters;
    }
    protected function getTitle($data): string
    {
        return !empty($data['e_key']) && !empty($data['name']) ?
            "$data[e_key] – $data[name]" :
            '';
    }
    protected function getSeoTitle($data): string
    {
        extract($data);
        $arr = [$e_key, $main_key, $key_1, $key_2, $key_3, $key_4];
        $arr = array_filter($arr, fn($item) => !empty ($item));
        $keys = implode(', ', $arr);
        return !empty($keys) && !empty($seo_title_part) ?
            "$keys – $seo_title_part" :
            '';
    }
    protected function getDescription($data): string
    {
        extract($data);
        $arr = [$e_key, $key_1, $key_2, $key_3, $key_4];
        $arr = array_filter($arr, fn($item) => !empty ($item));
        $keys = implode(', ', $arr);
        if (!empty($functions) && !empty($main_key) && !empty($keys)) {
            $functions = unserialize($functions);
            $functions = implode(', ', $functions);
            return translate('fn_the_article_describes_a_food_additive') . " ($functions) $main_key ($keys), " . translate('fn_its_use_effects_on_the_body_harm_and_benefits_composition_consumer_reviews');
        }
        return '';
    }
    protected function getInfoTitle($data): string
    {
        return !empty($data['e_key']) && !empty($data['main_key']) ?
            translate('fn_what_is_food_additive') . " $data[e_key] – $data[main_key]?" :
            '';
    }
    protected function getHealthTitle($data): string
    {
        return !empty($data['e_key']) && !empty($data['main_key']) ?
            "{$this->upperCaseFirst($data['main_key'])}, $data[e_key] – " . translate('fn_effect_on_the_body_harm_or_benefit') . "?" :
            '';
    }
    protected function getUsingTitle($data): string
    {
        return !empty($data['main_key']) ?
            translate('fn_food_additive') . " {$data['main_key']} – " . translate('fn_application_in_food') :
            '';
    }
    public function get_categories($language): \RedBeanPHP\Cursor|array|int|null
    {
        $sql = "
        SELECT * 
        FROM category
        JOIN category_description
        ON category.id = category_description.cat_id
        WHERE category_description.language = ?
        AND category.parent_id <> ?
        ";
        return R::getAll($sql, [$language, 0]);
    }
    public function sortAdditives($additives)
    {
        function cb($a, $b): int
        {
            $int_a = (int) filter_var($a['e_key'], FILTER_SANITIZE_NUMBER_INT);
            $int_b = (int) filter_var($b['e_key'], FILTER_SANITIZE_NUMBER_INT);
            $res = $int_a <=> $int_b;
            if ($res !== 0) return $res;
            $str_a = str_replace($int_a, '', $a['e_key']);
            $str_b = str_replace($int_b, '', $b['e_key']);

            if ($str_a && !$str_b) return 1;
            else if (!$str_a && $str_b) return -1;
            else if ($str_a > $str_b) return 1;
            else if ($str_a < $str_b) return -1;
            return 0;
        }

        usort($additives, 'app\models\cb');
        return $additives;
    }
}

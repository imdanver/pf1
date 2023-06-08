<?php

namespace app\models;

use RedBeanPHP\R;

class Additive extends AppModel
{
    public function get_additive_by_slug($language, $slug): array
    {
        $sql = "
            SELECT *
            FROM additive
            JOIN category
            ON additive.cat_id = category.id
            JOIN category_description
            ON category.id = category_description.cat_id
            WHERE additive.slug = ? AND additive.language = ?
        ";

        $additive = R::getRow($sql, [$slug, $language]);
        if (empty ($additive)) return $additive;
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
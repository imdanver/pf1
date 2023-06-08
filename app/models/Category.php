<?php

namespace app\models;

use RedBeanPHP\R;

class Category extends AppModel
{
    public function get_additives_from_category($language, $cat_slug): \RedBeanPHP\Cursor|array|int|null
    {
        $sql = "
        SELECT *
        FROM additive
        JOIN category
        ON additive.cat_id = category.id
        JOIN category_description
        ON category.id = category_description.cat_id
        WHERE additive.language = ?
        AND category_description.language = ?
        AND cat_slug = ?
        ";
        $additives = R::getAll($sql, [$language, $language, $cat_slug]);
        return $this->sortAdditives($additives);
    }
    public function get_category($language, $cat_slug): \RedBeanPHP\Cursor|array|int|null
    {
        $sql = "
        SELECT *
        FROM category
        JOIN category_description
        ON category.id = category_description.cat_id
        WHERE category_description.language = ?
        AND category_description.cat_slug = ?
        ";
        return R::getRow($sql, [$language, $cat_slug]);
    }
}

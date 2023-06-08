<?php

namespace app\models;

class Breadcrumbs extends AppModel
{
    public static function getBreadcrumbs($route, $data = []): string
    {
        $controller = $route['controller'];
        $str = '<li><a href="/' . lang() . '"><i class="fa fa-home"></i></a></li>';

        if($controller === 'Main') $str = '<li>' . translate('main_index_breadcrumbs') . '</li>';
        else if($controller === 'Category') $str .= '<li>' . translate('category_index_breadcrumbs') . ' ' . $data['cat_title'] . '</li>';
        else if($controller === 'Additive' && $data) {
            $str .= '<li><a href="/' . lang() . 'category/' . $data['cat_slug'] . '/">' . $data['cat_title'] . '</a></li>';
            $str .= '<li>' . $data['name'] . '</li>';
        }
        else if($controller === 'Categories') $str .= '<li>' . translate('categories_index_breadcrumbs') . '</li>';
        return "<ul>" . $str . "</ul>";
    }
}
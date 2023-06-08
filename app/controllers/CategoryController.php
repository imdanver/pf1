<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use base\App;

class CategoryController extends AppController
{
    public function indexAction(): void
    {
        $language = App::$app->getProperty('language');
        $cat_slug = $this->route['slug'];
        $additives = $this->model->get_additives_from_category($language, $cat_slug);
        $category = $this->model->get_category($language, $cat_slug);
        $cat_title = $category['cat_title'];
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($this->route, $category);

        $this->setMeta(
            translate('category_index_meta_title') . ' ' . $cat_title,
            translate('category_index_meta_description') . ' ' . $cat_title
        );
        $this->set(compact('additives', 'cat_title', 'breadcrumbs'));
    }
}
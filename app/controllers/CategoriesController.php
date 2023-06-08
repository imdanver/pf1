<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Categories;
use base\App;

/** @property Categories $model */
class CategoriesController extends AppController
{
    public function indexAction(): void
    {
        $language = App::$app->getProperty('language');
        $categories = $this->model->get_categories($language);
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($this->route);

        $this->setMeta(
            translate('categories_index_meta_title'),
            translate('categories_index_meta_description')
        );
        $this->set(compact('categories', 'breadcrumbs'));
    }
}
<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\Main;
use base\App;

/** @property Main $model */
class MainController extends AppController
{
    public function indexAction(): void
    {
        $language = App::$app->getProperty('language');
        $additives = $this->model->get_additives($language);
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($this->route);

        $this->setMeta(
            translate('main_index_meta_title') . ' – ' .App::$app->getProperty('site_name'),
            translate('main_index_meta_description')
        );
        $this->set(compact('additives', 'breadcrumbs'));
    }
}

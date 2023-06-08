<?php

namespace app\controllers;

use app\models\Additive;
use app\models\Breadcrumbs;
use base\App;

/** @property Additive $model */
class AdditiveController extends AppController
{
    public function indexAction(): void
    {
        $language = App::$app->getProperty('language');
        $slug = $this->route['slug'];
        $additive = $this->model->get_additive_by_slug($language, $slug);

        if (!$additive) {
            $this->error404();
            return;
        }

        $breadcrumbs = Breadcrumbs::getBreadcrumbs($this->route, $additive);

        $this->setMeta($additive['seo_title'], $additive['desc']);
        $this->set(compact('additive', 'breadcrumbs'));
    }


}
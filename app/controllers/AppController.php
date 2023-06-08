<?php

namespace app\controllers;

use app\languages\Language;
use app\models\AppModel;
use base\App;
use base\Controller;
use base\Translate;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        new Language($this->route['lang']);
        $language = App::$app->getProperty('language');
        Translate::load($language, $route);
    }
}
<?php

namespace app\controllers\admin;

use app\controllers\AppController;
use base\App;

class MainController extends AppController
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->layout = 'admin';
    }
    public function indexAction(): void
    {
        if (!$this->model::isAuth()) redirect(LOGIN);

        $language = App::$app->getProperty('language');
        $additives = $this->model->get_additives($language);

        $this->setNoIndexNoFollow(true);
        $this->setMeta('Список статей о пищевых добавках', 'Список статей о пищевых добавках');
        $this->set(compact('additives'));
    }
}
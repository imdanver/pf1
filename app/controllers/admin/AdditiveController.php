<?php

namespace app\controllers\admin;

use app\controllers\AppController;
use app\models\admin\Additive;
use base\App;

/** @property Additive $model */
class AdditiveController extends AppController
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->layout = 'admin';
    }
    public function addAction(): void
    {
        if (!$this->model::isAuth()) redirect(LOGIN);

        if (!empty ($_POST)) {
            if (!$this->model->validate($_POST)) {
                $this->model->getErrors();
                $_SESSION['form'] = $_POST;
            } else {
                $this->model->create_additive($_POST);
                $id = $this->model->get_inserted_id();
                $url = PATH . '/' . lang() . 'admin/additive/edit?id=' . $id;
                redirect($url);
            }
        }

        $functions_all = $this->model->getFunctionsAll();
        $safety_all = $this->model->safety_all;

        $this->setNoIndexNoFollow(true);
        $this->setMeta('Страница добавления статьи о пищевой добавке', 'Страница добавления статьи о пищевой добавке');
        $this->set(compact('functions_all', 'safety_all'));
    }
    public function editAction(): void
    {
        if (!$this->model::isAuth()) redirect(LOGIN);

        if (empty ($_GET['id'])) redirect(PATH . '/' . lang() . 'admin/');

        $id = $_GET['id'];
        $language = App::$app->getProperty('language');

        if (!empty ($_POST)) {
            if (!$this->model->validate($_POST)) {
                $this->model->getErrors();
            } else {
                $this->model->update_additive($id, $_POST);
            }
        }

        $additive = $this->model->get_additive_by_id($id, $language);

        $functions_all = $this->model->getFunctionsAll();
        $safety_all = $this->model->safety_all;

        $this->setNoIndexNoFollow(true);
        $this->setMeta('Страница редактирования статьи о пищевой добавке', 'Страница редактирования статьи о пищевой добавке');
        $this->set(compact('functions_all', 'safety_all', 'additive'));
    }
}

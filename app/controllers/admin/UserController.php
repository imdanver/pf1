<?php

namespace app\controllers\admin;

use app\controllers\AppController;
use app\models\admin\User;

/** @property User $model */
class UserController extends AppController
{
    public function loginAction(): void
    {
        $this->layout = 'login';

        if ($this->model::isAuth()) redirect(ADMIN);

        if (!empty ($_POST)) {
            $this->model->load($_POST);
            if (!$this->model->validate($this->model->attributes)) {
                $this->model->getErrors();
                $_SESSION['form'] = $this->model->attributes;
            } else {
                if ($this->model->login()) redirect(ADMIN);
                else {
                    $_SESSION['errors'] = '<ul><li>' . translate('user_login_error_login') . '</li></ul>';
                    redirect();
                }
            }
        }

        $this->setNoIndexNoFollow(true);
        $this->setMeta('Страница аутентификации на сайте', 'Страница аутентификации на сайте');
    }
}

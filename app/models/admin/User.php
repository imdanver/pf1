<?php

namespace app\models\admin;

use app\models\AppModel;
use RedBeanPHP\R;

class User extends AppModel
{
    public array $attributes = [
        'email' => '',
        'password' => '',
    ];
    public array $rules = [
        'required' => ['email', 'password'],
    ];
    public array $labels = [
        'email' => 'user_login_email_input',
        'password' => 'user_login_password_input',
    ];
    public function login(): bool
    {
        extract($this->attributes);
        if ($email && $password) {
            $user = R::findOne('users', "email = ?", [$email]);

            if ($user && password_verify($password, $user->password)) {
                $_SESSION['user']['email'] = $email;
                return true;
            }
        }
        return false;
    }

}
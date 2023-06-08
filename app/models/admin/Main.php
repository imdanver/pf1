<?php

namespace app\models\admin;

use app\models\AppModel;
use RedBeanPHP\R;

class Main extends AppModel
{
    public function get_additives($language): array
    {
        $additives = R::findAll('additive', 'language = ?', [$language]);
        return $this->sortAdditives($additives);
    }
}
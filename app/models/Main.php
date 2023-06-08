<?php

namespace app\models;

use RedBeanPHP\R;

class Main extends AppModel
{
    public function get_additives($language): array
    {
        $additives = R::findAll('additive', 'language = ?', [$language]);
        return $this->sortAdditives($additives);
    }
}
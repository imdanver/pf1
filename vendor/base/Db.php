<?php

namespace base;

use RedBeanPHP\R;

class Db
{
    use TSingleton;
    private function __construct()
    {
        $db = require_once CONFIG . '/db.php';
        R::setup( $db['dsn'], $db['user'], $db['password'] );
        if (!R::testConnection()) throw new \Exception('Нет соединения с базой данных', 500);
        R::freeze(true);
        if (DEBUG) R::debug(true, 3);
    }
}
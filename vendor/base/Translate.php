<?php

namespace base;

class Translate
{
    public static array $translate = [];
    public static array $layout_translate = [];
    public static array $view_translate = [];
    public static function load($language, $route): void
    {
        $layout_translate = APP . "/translate/{$language}.php";
        $prefix = !empty($route['prefix']) ? "{$route['prefix']}/" : '';
        $view_translate = APP . "/translate/{$language}/{$prefix}{$route['controller']}/{$route['action']}.php";
        if (file_exists($layout_translate)) self::$layout_translate = require_once $layout_translate;
        if (file_exists($view_translate)) self::$view_translate = require_once $view_translate;
        self::$translate = array_merge(self::$layout_translate, self::$view_translate);
    }
    public static function get($key)
    {
        return self::$translate[$key] ?? $key;
    }

}
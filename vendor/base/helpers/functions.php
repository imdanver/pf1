<?php

function debug($data, $die = false)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
    if ($die) die;
}

function h($str)
{
    return htmlspecialchars($str);
}

function redirect($http = false)
{
    if ($http) $redirect = $http;
    else $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;

    header("Location: $redirect");
    die;
}

function lang()
{
    $base_language = \base\App::$app->getProperty('base_language');
    $language = \base\App::$app->getProperty('language');
    return $language === $base_language ? '' : "{$language}/";
}

function translate($key)
{
    return \base\Translate::get($key);
}

function cir2translit($string) {
    $converter = [
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'ts',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'shh',
        'ь' => '',  'ы' => 'yi',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

        'ґ' => 'g',   'є' => 'ye',  'і' => 'i',
        'ї' => 'yi',

        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'TS',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Shh',
        'Ь' => '',  'Ы' => 'Yi',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',

        'Ґ' => 'G',  'Є' => 'Ye', 'І' => 'I',
        'Ї' => 'Yi',
    ];
    return strtr($string, $converter);
}

function get_field_value($name)
{
    return isset($_SESSION['form'][$name]) ? h($_SESSION['form'][$name]) : '';
}

//function str2url($str) {
//    // переводим в транслит
//    $str = cir2translit($str);
//    // в нижний регистр
//    $str = strtolower($str);
//    // заменям все ненужное нам на "-"
//    $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
//    // заменяем двойные -- на -
//    $str = str_replace('--', '-', $str);
//    // удаляем начальные и конечные '-'
//    $str = trim($str, "-");
//    return $str;
//}

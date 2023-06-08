<?php

namespace app\languages;

use base\App;
use RedBeanPHP\R;

class Language
{
    private array $languages;
    private string $base_language;
    private string $language;
    public function __construct($lang)
    {
        $this->languages = $this->getLanguages();
        $this->base_language = $this->getBaseLanguage();
        $this->language = $this->getLanguage($lang);
        App::$app->setProperty('base_language', $this->base_language);
        App::$app->setProperty('language', $this->language);
        App::$app->setProperty('languages', $this->languages);
    }
    private function getLanguages(): array
    {
        return R::getAssoc("SELECT code, title FROM languages");
    }
    private function getBaseLanguage(): string
    {
        $base_language = R::getAssoc("SELECT code, title FROM languages WHERE base=1");
        return key($base_language);
    }
    private function getLanguage($lang)
    {
        if (empty ($lang)) $key = $this->base_language;
        elseif (array_key_exists($lang, $this->languages)) $key = $lang;
        else throw new Exception('Страница не найдена', 404);
        return $key;
    }
}
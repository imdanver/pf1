<?php

namespace base;

use Valitron\Validator;

abstract class Model
{
    public array $attributes = [];
    public array $errors = [];
    public array $rules = [];
    public array $labels = [];
    public function __construct()
    {
        DB::getInstance();
    }
    public function load($data): void
    {
        foreach ($this->attributes as $name => $value) {
            if (isset($data[$name])) $this->attributes[$name] = $data[$name];
        }
    }
    public function validate($data): bool
    {
        Validator::langDir(APP . '/translate/validator/lang');
        Validator::lang('ru');
        $validator = new Validator($data);
        $validator->rules($this->rules);
        $validator->labels($this->getLabels());
        if ($validator->validate()) return true;
        else {
            $this->errors = $validator->errors();
            return false;
        }
    }
    public function getErrors(): void
    {
        $errors = '';
        foreach ($this->errors as $error) {
            foreach ($error as $item) {
                $errors .= "<li>{$item}</li>";
            }
        }
        $_SESSION['errors'] = "<ul>{$errors}</ul>";
    }
    public function getLabels(): array
    {
        $labels = [];
        foreach ($this->labels as $k => $v) {
            $labels[$k] = translate($v);
        }
        return $labels;
    }

}
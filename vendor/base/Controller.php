<?php

namespace base;

use app\models\Breadcrumbs;

abstract class Controller
{
    public array $data = [];
    public array $meta = ['title' => '', 'description' => ''];
    public string $layout = LAYOUT;
    public string $view = '';
    public object $model;
    public bool $noindex_nofollow = false;

    public function __construct(public $route = [])
    {

    }
    public function getModel(): void
    {
        $prefix = isset ($this->route['prefix']) ? "{$this->route['prefix']}\\" : '';
        $model = 'app\models\\' . $prefix . $this->route['controller'];
        if (class_exists($model)) $this->model = new $model();
    }
    public function getView(): void
    {
        $this->view = $this->view ?: $this->route['action'];
        //$this->view = $this->route['action'];
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta, $this->noindex_nofollow);
        $viewObject->render($this->data);
    }
    public function set($data): void
    {
        $this->data = $data;
    }
    public function setMeta($title = '', $description = ''): void
    {
        $this->meta = [
            'title' => $title,
            'description' => $description
        ];
    }
    public function setNoIndexNoFollow(bool $noindex_nofollow = false): void
    {
        $this->noindex_nofollow = $noindex_nofollow;
    }
    public function error404(): void
    {
        http_response_code(404);
        $this->setMeta(translate('tp_404_meta_title'));
        $this->route['controller'] = 'Error';
        $this->view = '404';
    }

}
<?php

namespace base;

class View
{
    public string $content = '';
    public function __construct(
        public array $route,
        public string $layout,
        public string $view,
        public array $meta,
        private bool $noindex_nofollow,
    )
    {
    }
    public function render($data): void
    {
        if (is_array($data)) extract($data);
        $prefix = isset ($this->route['prefix']) ? "{$this->route['prefix']}/" : '';
        $view_file = APP . "/views/{$prefix}{$this->route['controller']}/{$this->view}.php";
        if (is_file($view_file)) {
            ob_start();
            require_once $view_file;
            $this->content = ob_get_clean();
        } else {
            throw new \Exception("Не найден вид {$view_file}", 500);
        }

        if ($this->layout) {
            $layout_file = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($layout_file)) require_once $layout_file;
            else throw new \Exception("Не найден шаблон {$layout_file}", 500);
        }
    }
    public function getMeta(): string
    {
        $out = '<title>' . h($this->meta['title']) . '</title>' . PHP_EOL;
        $out .= '<meta name="description" content="' . h($this->meta['description']) . '">' . PHP_EOL;
        return $out;
    }
    public function getNoIndexNoFollow(): string
    {
        return $this->noindex_nofollow ?
            "<meta name=\"robots\" content=\"noindex, nofollow\">" . PHP_EOL :
            '';
    }
}
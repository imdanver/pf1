<?php

namespace base;

class Router
{
    protected static array $routes = [];
    protected static array $route = [];
    public static function add($regexp, $route = []): void
    {
        self::$routes[$regexp] = $route;
    }
    public static function getRoutes(): array
    {
        return self::$routes;
    }
    public static function getRoute(): array
    {
        return self::$route;
    }
    protected static function removeQueryString($query): string
    {
        if ($query) {
            $params = explode('&', $query, 2);
            if (!str_contains($params[0], '=')) return rtrim($params[0], '/');
        }
        return '';
    }
    public static function dispatch(string $query): void
    {
        $url = self::removeQueryString($query);
        if (self::matchRoute($url)) {
            self::$route['lang'] = self::$route['lang'] ?? '';
//            debug(self::$route);
            $prefix = isset (self::$route['prefix']) ? self::$route['prefix'] . '\\' : '';
            $controller = 'app\controllers\\' . $prefix . self::$route['controller'] . 'Controller';
            if (class_exists($controller)) {
                /** @var Controller $controllerObject */
                $controllerObject = new $controller(self::$route);
                $controllerObject->getModel();
                $action = self::lowerCamelCase(self::$route['action'] . 'Action');
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                    $controllerObject->getView();
                }
                else throw new \Exception("Метод {$controller}::{$action} не найден", 404);
            }
            else throw new \Exception("Контроллер {$controller} не найден", 404);
        }
        else throw new \Exception('Страница не найдена', 404);
    }
    public static function matchRoute($url): bool
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#", $url, $matches)) {
//                debug($matches);
                foreach ($matches as $k => $v) {
                    if (is_string($k)) $route[$k] = $v;
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }
    protected static function upperCamelCase($name): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }
    protected static function lowerCamelCase($name): string
    {
        return lcfirst(self::upperCamelCase($name));
    }

}
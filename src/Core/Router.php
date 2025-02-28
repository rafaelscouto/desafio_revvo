<?php

namespace Rafaelscouto\DesafioRevvo\Core;

class Router
{
    private array $routes = [];

    public function get(string $route, string $controllerAction): void
    {
        $this->routes['GET'][$this->normalizeRoute($route)] = $controllerAction;
    }

    public function post(string $route, string $controllerAction): void
    {
        $this->routes['POST'][$this->normalizeRoute($route)] = $controllerAction;
    }

    public function run(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $baseUri = trim(str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']), '/');
        $route = trim(str_replace($baseUri, '', $uri), '/');

        foreach($this->routes[$method] ?? [] as $pattern => $controllerAction) {
            $patternRegex = preg_replace('/\{([^\/]+)\}/', '([^/]+)', $pattern);

            if(preg_match("#^$patternRegex$#", $route, $matches)) {
                array_shift($matches); // Remove a URI completa do match

                $this->callController($controllerAction, $matches);
                return;
            }
        }

        $this->showPage404();
    }

    private function callController(string $controllerAction, array $params = []): void
    {
        [$controller, $action] = explode('@', $controllerAction);
        $controllerClass = "Rafaelscouto\\DesafioRevvo\\Controllers\\$controller";

        if(!class_exists($controllerClass) || !method_exists($controllerClass, $action)) {
            $this->showPage404();
            return;
        }

        $instance = new $controllerClass();
        call_user_func_array([$instance, $action], $params);
    }

    private function normalizeRoute(string $route): string
    {
        return trim($route, '/');
    }

    private function showPage404(): void
    {
        header('Location: ' . BASE_URL . '404');
        exit;
    }
}

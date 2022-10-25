<?php

namespace App;

class Router
{
    private array $routes;

    /**
     *  $routes =[
     *  new route:
     *  'get'=>[
     *      '/'=> 'method',
     *      'invoices'=>'method,
     *      'invoices/create' => 'method
     *  ],
     *  'post'=>[
     *      'invoices/create' => 'method
     *  ]
     *  original:
     * '/' => 'method',
     * 'invoice' => 'method'
     *  ]
     */

    public function register(string $requestMethod, string $route, callable|array $action)
    {
        $this->routes[$requestMethod][$route] = $action;

        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('post', $route, $action);
    }

    public function routes(): array
    {
        return $this->routes;
    }

    public function resolve(string $requestUri, string $requestMethod)
    {
        $route = explode('?', $requestUri)[0];

        $action = $this->routes[$requestMethod][$route] ?? null;

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;

            if (class_exists($class)) {
                $class = new $class();

                if (method_exists($class, $method)) {
                    return $class->$method();
                }
            }
        }

        throw new \App\Exception\ViewNotFoundException();
    }
}
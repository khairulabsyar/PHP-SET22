<?php

declare(strict_types=1);

namespace App;

// class Router
// {
//     private array $routes;

//     /**
//      *  $routes =[
//      *  new route:
//      *  'get'=>[
//      *      '/'=> 'method',
//      *      'invoices'=>'method,
//      *      'invoices/create' => 'method
//      *  ],
//      *  'post'=>[
//      *      'invoices/create' => 'method
//      *  ]
//      *  original:
//      * '/' => 'method',
//      * 'invoice' => 'method'
//      *  ]
//      */

//     // to add function in a function use callable
//     public function register(string $requestMethod, string $route, callable|array $action)
//     {
//         // //original
//         // // delete string $requestMethod in parameter
//         // $this->routes[$route] = $action;
//         $this->routes[$requestMethod][$route] = $action;

//         return $this;
//     }

//     // ----- new route get & post
//     public function get(string $route, callable|array $action): self
//     {
//         return $this->register('get', $route, $action);
//     }

//     public function post(string $route, callable|array $action): self
//     {
//         return $this->register('post', $route, $action);
//     }

//     public function routes(): array
//     {
//         return $this->routes;
//     }

//     public function resolve(string $requestUri, string $requestMethod)
//     {
//         $route = explode('?', $requestUri)[0];
//         // original
//         // $action = $this->routes[$route] ?? null;

//         // ----- new route
//         // echo '<pre>';
//         // var_dump($this->routes[$requestMethod][$route]);
//         // echo '</pre>';
//         $action = $this->routes[$requestMethod][$route] ?? null;

//         [$class, $method] = $action;
//         echo '<pre>';
//         // var_dump($route);
//         // var_dump($action);
//         var_dump(is_callable($action));
//         var_dump(is_array($action));
//         var_dump(class_exists($class));
//         var_dump(method_exists($class, $method));
//         var_dump(is_null($action));
//         echo '</pre>';

//         if (is_callable($action)) {
//             return call_user_func($action);
//         }

//         if (is_array($action)) {
//             [$class, $method] = $action;

//             if (class_exists($class)) {
//                 $class = new $class();

//                 if (method_exists($class, $method)) {
//                     return $class->method();
//                 }
//             }
//         }
//         // if all if's statement failed go here
//         // throw new \App\Exception\RouteNotFoundException();
//         if (is_null($action)) {
//             throw new \App\Exception\RouteNotFoundException();
//         }
//     }
// }

// redo 8/9

use App\Exception\RouteNotFoundException;

class Router
{
    private array $routes;

    // // register method takes in a given route and the given action
    // public function register(string $route, callable $action): self
    // {

    //     $this->routes[$route] = $action;

    //     return $this;
    // }

    // public function resolve(string $requestUri)
    // {
    //     $route = explode('?', $requestUri)[0];
    //     $action = $this->routes[$route] ?? null;

    //     if (!$action) {
    //         throw new RouteNotFoundException();
    //     }

    //     //        $action();
    //     return call_user_func($action);
    // }

    // // improving from above
    // public function register(string $route, callable|array $action): self
    // {
    //     $this->routes[$route] = $action;

    //     return $this;
    // }

    // public function resolve(string $requestUri)
    // {
    //     $route = explode('?', $requestUri)[0];
    //     $action = $this->routes[$route] ?? null;

    //     if (!$action) {
    //         throw new RouteNotFoundException();
    //     }

    //     if (is_callable($action)) {
    //         return call_user_func($action);
    //     }

    //     // if an array is passed
    //     if (is_array($action)) {
    //         // destructure to get the class and the method
    //         [$class, $method] = $action;

    //         // if the class exists then instantiate the class
    //         if (class_exists($class)) {
    //             $class = new $class();

    //             // if method exists then call the method
    //             if (method_exists($class, $method)) {
    //                 return call_user_func_array([$class, $method], []);
    //             }
    //         }
    //     }

    //     throw new RouteNotFoundException();
    // }

    // Refactoring routes for $_GET and $_POST Requests
    // change register to take in the request method
    public function register(string $requestMethod, string $route, callable|array $action): self
    {

        $this->routes[$requestMethod][$route] = $action;

        return $this;
    }

    // registers a route, action and specifies the http method
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

    // we have to add a second param for requestMethod
    public function resolve(string $requestUri, string $requestMethod)
    {
        $route = explode('?', $requestUri)[0];

        // using the request method as the first key
        $action = $this->routes[$requestMethod][$route] ?? null;

        if (!$action) {
            throw new RouteNotFoundException();
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;

            if (class_exists($class)) {
                $class = new $class();

                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }

        throw new RouteNotFoundException();
    }
}
<?php

namespace app\core;

use app\support\Uri;
use app\routes\Routes;
use app\support\RequestType;

class ControllerParams
{
    public function get(string $router)
    {
        $uri = Uri::get();
        $routes = Routes::get();
        $requestMethod = RequestType::get();


        $router = array_search($router, $routes[$requestMethod]);


        $explodeUri = explode('/', $uri);
        $explodeRouter = explode('/', $router);
        $params = [];
        foreach ($explodeRouter as $index => $routerSegment) {
            if($routerSegment !==  $explodeUri[$index]){
                $params[$index] = $explodeUri[$index];
            }
        }

        return array_values($params);

        //dd(array_search($router, Routes::get()['get']));
    }
}

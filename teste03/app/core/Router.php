<?php 

namespace app\core;


class Router
{
    public static function run()
    {
        $routerRegistered = new RoutersFilter;   
        $router = $routerRegistered->get();
        //output string controller@method

        $controller = new Controller;
        $controller->execute($router);


        return $router;


    }

}
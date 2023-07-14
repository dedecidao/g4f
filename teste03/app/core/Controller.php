<?php 

namespace app\core;

use Exception;

class Controller
{
    public function execute(string $router)
    {
        if(substr_count($router, '@') <= 0){
            throw new Exception('a Rota nao esta adequada');
        }

        list($controller, $method) = explode('@', $router);
        //dd($controller, $method);
        $namespace = 'app\controllers\\';

        $controllerNamespace = $namespace . $controller;

        if(!class_exists($controllerNamespace)) {
            throw new Exception('O controller ' .$controller .' nao existe');
        }
        //instancia controller
        $controller = new $controllerNamespace;
        //verifica metodo
        if(!method_exists($controller, $method)){
            throw new Exception('O metodo ' .$method .' nao existe');
        }

        $params = new ControllerParams;
        $params = $params->get($router);

        $controller->$method($params);

    }
}
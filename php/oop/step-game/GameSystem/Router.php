<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 26.02.18
 * Time: 18:08
 */

namespace GameSystem;


class Router {

    public $path;
    public $route;
    public $class;
    public $method = 'index';

    public function getRoute(Request $request) {
        if (isset($request->get['route'])) {
            $route = explode('/', $request->get['route']);
            $this->path = $route[0];
            $this->route = $route[1];

            $file = APP_DIR . 'controller/' . $this->path . '/' . $this->route . '.php';
            if (is_file($file)) {
                include($file);

                $this->class = 'Controller' . capitalizeString($this->path) . capitalizeString($this->route);     //ControllerAccountLogin

//                echo 'This is File ' . $this->class;

                $controller = new $this->class();

                if (is_callable(array($controller, $this->method))) {
                    return call_user_func(array($controller, $this->method), '');
                }

            } else {
                echo 'This is not a File';
            }

        }
    }

}
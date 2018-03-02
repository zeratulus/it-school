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

    private function makeAction($route) {
        $route = explode('/', $route);
        $this->path = $route[0];
        $this->route = $route[1];

        $file = APP_DIR . 'controller/' . $this->path . '/' . $this->route . '.php';
        if (is_file($file)) {
            include($file);

            $this->class = 'Controller' . capitalizeString($this->path) . capitalizeString($this->route);     //ControllerAccountLogin

            $controller = new $this->class();

            $action = array($controller, $this->method);

            if (is_callable($action)) {
                return call_user_func($action, '');
            }

        } else {
            include(APP_DIR . 'controller/error/404.php');
            $this->class = 'ControllerError404';
            $controller = new $this->class();
            $action = array($controller, $this->method);
            return call_user_func($action, '');
        }
    }

    public function getRoute(Request $request) {
        if (isset($request->get['route'])) {
            $this->makeAction($request->get['route']);
        } else {
            $this->makeAction('home/home');
        }
    }

}
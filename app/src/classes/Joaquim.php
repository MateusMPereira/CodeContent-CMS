<?php

require_once SRC_PATH . '/functions/String.php';
require_once SRC_PATH . '/classes/Julia.php';

class Joaquim
{
    public static function get(string $rota, array $props, string $viewName)
    {
        if (REQ_METHOD === 'GET' && matchRoute(ROTA, $rota)) {
            $className = $props[0];
            $method    = $props[1];

            require_once SRC_PATH . '//controller//' . $className . '.php';
            $class = new $className;
            $class->$method();

            $view = file_get_contents(SRC_PATH . '//view//' . $viewName . '.php');

            exit(Julia::mergeDataView($view, $class->viewData));
        }
    }
}
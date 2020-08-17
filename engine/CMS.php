<?php

namespace Engine;

use Engine\Helper\Common;
use Engine\Core\Router\DispatchedRouters;

class CMS
{
    private $di;

    public $router;

    /**
     * CMS constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
        $this->router = $this->di->get('routes');
    }

    /**
     * Запуск CMS
     */
    public function run(){
        try {

            require_once (ROOT_DIR.'/Routes.php');

            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());
            if ($routerDispatch == NULL) {
                $routerDispatch = new DispatchedRouters('ErrorController:page404');
            }
            list($class, $action) = explode(':', $routerDispatch->getController(), 2);
            $controller = '\\'.ENV.'\\Controller\\' . $class;
            $parameters = $routerDispatch->getParameters();
            call_user_func_array(array(new $controller($this->di), $action), $parameters);
        }catch (\ErrorException $e){
            echo $e->getMessage();
            exit;
        }


    }
}
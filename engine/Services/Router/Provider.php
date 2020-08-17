<?php


namespace Engine\Services\Router;

use Engine\Services\AbstractProvider;
use Engine\Core\Router\Router;


class Provider extends AbstractProvider
{
    public $serviceName = 'routes';
    function init(){
        $route = new Router('localhost');

        $this->di->set($this->serviceName, $route);
    }
}
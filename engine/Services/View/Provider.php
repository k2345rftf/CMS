<?php


namespace Engine\Services\View;

use Engine\Services\AbstractProvider;
use Engine\Core\Template\View;


class Provider extends AbstractProvider
{
    public $serviceName = 'view';
    function init(){
        $view = new View();

        $this->di->set($this->serviceName, $view);
    }
}
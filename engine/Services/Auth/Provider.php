<?php


namespace Engine\Services\Auth;
use Engine\Services\AbstractProvider;
use Engine\Core\Auth\Auth;


class Provider extends AbstractProvider
{
    public $serviceName = 'name';
    function init(){
        $name = new Auth();

        $this->di->set($this->serviceName, $name);
    }
}
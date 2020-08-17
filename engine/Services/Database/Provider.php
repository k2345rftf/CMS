<?php


namespace Engine\Services\Database;
use Engine\Services\AbstractProvider;
use Engine\Core\Database\Database;


class Provider extends AbstractProvider
{
    public $serviceName = 'db';
    function init(){
        $db = new Database();

        $this->di->set($this->serviceName, $db);
    }
}
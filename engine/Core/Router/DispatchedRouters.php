<?php


namespace Engine\Core\Router;


class DispatchedRouters
{
    private $controller;
    private $parameters;

    public function __construct($controller, $parameters=array())
    {
        $this->controller = $controller;
        $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}
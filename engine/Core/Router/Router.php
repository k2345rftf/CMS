<?php


namespace Engine\Core\Router;
use Engine\Core\Router\UrlDispatcher;

class Router
{
    private $routes;
    private $host;
    private $dispatcher;

    public function __construct($host)
    {
        $this->host = $host;

    }

    public function add($key, $pattern, $controller, $method = 'GET')
    {
        $this->routes[$key] = array(
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method
        );
    }

    public function dispatch($method, $uri)
    {
        return $this->getDispatcher($method, $uri);
    }

    public function getDispatcher($method, $uri)
    {
        if ($this->dispatcher==NULL){
            $this->dispatcher = new UrlDispatcher();

            foreach ($this->routes as $route){
                $this->dispatcher->register($route['method'],$route['pattern'],$route['controller']);
            }
        }
        return $this->dispatcher->dispatch($method, $uri);
    }


}
<?php


namespace Engine\Core\Router;

use Engine\Core\Router\DispatchedRouters;

class UrlDispatcher
{
    private $method = array('GET','POST');
    private $routes = array(
      'GET'=>array(),
      'POST'=>array()
    );
    private $patterns = array(
        'int'=>'[0-9]+',
        'str'=>'[a-zA-Z\.\-_%]+',
        'any'=>'[a-zA-Z0-9\.\-_%]+'
    );
    public function addPattern($key, $pattern)
    {
        $this->patterns[$key]=$pattern;
    }

    public function  register($method, $pattern, $controller)
    {
        $convert_pattern =$this->convertPattern($pattern);
        $this->routes[strtoupper($method)][$convert_pattern] = $controller;
    }

    private function convertPattern($pattern){
        if (strpos($pattern,'{')){

            return preg_replace_callback('#{(\w+):(\w+)}#', [$this, 'patternReplace'], $pattern);
        }

        return $pattern;
    }

    private function patternReplace($matches)
    {
        return '(?<'.$matches[1].'>'.strtr($matches[2],$this->patterns).')';
    }



    public function route($method)
    {
        return isset($this->routes[$method])?$this->routes[$method]:NULL;
    }

    /**
     * @param $method
     * @param $uri
     * @return void
     */
    public function dispatch($method, $uri)
    {
        $routes = $this->route(strtoupper($method));

        if(array_key_exists($uri, $routes)){
            return new DispatchedRouters($routes[$uri]);
        }
        return $this->doDispatch($method, $uri);
    }

    private function doDispatch($method, $uri)
    {
        foreach ($this->route($method) as $route=>$controller){
            $pattern = '#^'.$route.'$#s';
            if (preg_match($pattern, $uri, $parameters)){
                $params = $this->processParam($parameters);
                return new DispatchedRouters($controller, $params);
            }
        }
    }

    private function processParam($parameters)
    {
        foreach ($parameters as $key=>$value){
            if(is_int($key)){
                unset($parameters[$key]);
            }
        }

        return $parameters;
    }
}
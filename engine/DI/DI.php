<?php

namespace Engine\DI;

class DI
{
    /**
     * @var array
     */
    private $container = [];

    /**
     * @param $key
     * @param $dependency
     * @return $this
     */
    public function set($key, $dependency){
        $this->container[$key] = $dependency;
        return $this;
    }

    public function get($key){
        return $this->has($key);

    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key){
        return isset($this->container[$key])?$this->container[$key]:NULL;
    }
}
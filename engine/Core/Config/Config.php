<?php


namespace Engine\Core\Config;


class Config
{

    public static function file($name){
        $path = ROOT_DIR.'/Config/'.$name.'.php';
        if (is_file($path)){
            $items = require_once $path;
            if (is_array($items)){
                return $items;
            }else{
                throw new \Exception(sprintf('Configuration file %s is not valid array',$path));
            }
        }else{
            throw new \Exception(sprintf('Configuration file %s is not exist',$path));
        }

    }
}
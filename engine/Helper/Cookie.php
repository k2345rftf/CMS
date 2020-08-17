<?php


namespace Engine\Helper;


class Cookie
{
    public static function set($name, $value, $time = 60){
        setcookie($name, $value, $time);
    }

    public static function get($name){
        return (isset($_COOKIE[$name]))??$_COOKIE[$name];
    }

    public static function delete($name){
        if(isset($_COOKIE[$name])){
            self::set($name, '', -3600);
        }
    }
}
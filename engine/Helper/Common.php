<?php


namespace Engine\Helper;


class Common
{
    static function isPost()
    {
        return ($_SERVER['REQUEST_METHOD'] == 'POST')?true:false;

    }

    static function getMethod()
    {
       return  $_SERVER['REQUEST_METHOD'];
    }

    static function getPathUrl(){
        $url =  $_SERVER['REQUEST_URI'];
        // Если метод передачи GET, тогда удаляем из url все, что идет после знака вопроса
        if ($pos = strpos($url, '?')){
            $url = substr($url, 0, $pos);
        }
        return $url;
    }
}
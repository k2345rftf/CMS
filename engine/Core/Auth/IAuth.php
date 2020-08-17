<?php


namespace Engine\Core\Auth;


interface IAuth
{
    public function isAuthorized();
    public function user();
    public function authorize($user);
    public function unAuthorized();
    public static function salt();
    public static function encryptPass($password, $salt);
}
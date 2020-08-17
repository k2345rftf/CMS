<?php


namespace Engine\Core\Auth;
use \Engine\Core\Auth\IAuth;
use \Engine\Helper\Cookie;

class Auth implements IAuth
{
    protected $auth = false;
    protected $user;

    public function isAuthorized():bool{
        return $this->auth;
    }

    public function user(){
        return $this->user;
    }

    public function authorize($user){
        Cookie::set('auth.auth', true);
        Cookie::set('auth.user', $user);
        $this->auth = true;
        $this->user = $user;
    }

    public function unAuthorized(){
        Cookie::delete('auth.auth');
        Cookie::delete('auth.user');
        $this->auth = false;
        $this->user = null;
    }

    public static function salt(){
        return rand(10000000, 99999999);
    }

    public static function encryptPass($password, $salt){
        return hash('sha256', $password . $salt);
    }
}
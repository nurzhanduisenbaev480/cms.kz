<?php

namespace Engine\Core\Auth;
use Engine\Helper\Cookie;

class Auth implements AuthInterface
{
    /**
     * @var bool
     */
    protected $authorized = false;

    /**
     * @return bool
     */
    public function authorized(){
        return $this->authorized;
    }
    /**
     *
     */
    public function setAuthorize(){
        $this->authorized = true;
    }

    /**
     * @return mixed
     */
    public function hashUser(){
        return Cookie::get('auth_user');
    }
    /**
     * User Authorization
     * @param $user
     */
    public function authorize($user){
        Cookie::set('auth_authorized', true);
        Cookie::set('auth_user', $user);
    }

    /**
     * User unAuthorization
     */
    public function unAuthorize(){
        Cookie::delete('auth_authorized');
        Cookie::delete('auth_user');
    }

    /**
     * @return string
     */
    public static function salt(){
        return (string) rand(10000000, 99999999);
    }

    /**
     * @param $password
     * @param string $salt
     * @return string
     */
    public static function encryptPassword($password, $salt = ''){
        return hash('sha256', $password . $salt);
    }
}
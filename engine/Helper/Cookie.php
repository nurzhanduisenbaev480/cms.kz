<?php

namespace Engine\Helper;

class Cookie
{
    /**
     * @param $key
     * @param $value
     * @param int $time
     * @param string $path
     */
    public static function set($key, $value, $time = 31536000, $path = '/'){
        setcookie($key, $value,time() + $time, $path);
    }

    /**
     * Get cookies by key
     * @param $key
     * @return mixed|null
     */
    public static function get($key){
        if (isset($_COOKIE[$key])){
            return $_COOKIE[$key];
        }
        return null;
    }

    /**
     * Delete cookies by key
     * @param $key
     */
    public static function delete($key){
        if (isset($_COOKIE[$key])){
            self::set($key, '', -3600, '/');
            unset($_COOKIE[$key]);
        }
    }
}
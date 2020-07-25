<?php

namespace Engine\Core\Router;

class UrlDispatcher
{
    /**
     * @var array
     */
    private $methods = [
        'GET',
        'POST'
    ];
    /**
     * @var array
     */
    private $routes = [
        'GET'  => [],
        'POST' => []
    ];
    /**
     * @var array
     */
    private $pattern = [
        'int' => '[0-9]+',
        'str' => '[a-zA-Z\.\-_%]+',
        'any' => '[a-zA-Z0-9\.\-_%]+'
    ];
    /**
     * @param $key
     * @param $pattern
     */
    public function addPattern($key, $pattern){
        $this->pattern[$key] = $pattern;
    }

    /**
     * @param $method
     * @return array|mixed
     */
    public function routes($method){
        return isset($this->routes[$method]) ? $this->routes[$method] : [];
    }

    /**
     * @param $method
     * @param $pattern
     * @param $controller
     */
    public function register($method, $pattern, $controller){
        $convert = $this->convertPattern($pattern);
        $this->routes[strtoupper($method)][$convert] = $controller;
    }

    /**
     * @param $pattern
     * @return string|string[]|null
     */
    public function convertPattern($pattern){
        if (strpos($pattern, '(') === false){
            return $pattern;
        }
        return preg_replace_callback('#\((\w+):(\w+)\)#',[$this, 'replacePattern'], $pattern);
    }

    /**
     * @param $matches
     * @return string
     */
    private function replacePattern($matches){
        //print_r($matches);
        return '(?<'.$matches[1].'>'.strtr($matches[2], $this->pattern).')';
    }

    /**
     * @param $parameters
     * @return mixed
     */
    private function processParameters($parameters){
        foreach ($parameters as $key => $value){
            if (is_int($key)){
                unset($parameters[$key]);
            }
        }
        return $parameters;
    }
    /**
     * @param $method
     * @param $uri
     * @return DispatchedRoute
     */
    public function dispatch($method, $uri){
        $routes = $this->routes(strtoupper($method));
        if (array_key_exists($uri, $routes)){
            return new DispatchedRoute($routes[$uri]);
        }
        return $this->doDispatch($method, $uri);
    }

    /**
     * @param $method
     * @param $uri
     * @return DispatchedRoute
     */
    public function doDispatch($method, $uri){
        foreach ($this->routes($method) as $route => $controller){
            $pattern = '#^'.$route.'$#s';

            if (preg_match($pattern, $uri, $parameters)){
                return new DispatchedRoute($controller, $this->processParameters($parameters));
            }
        }
    }
}
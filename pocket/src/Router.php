<?php
namespace Yaserzare\PocketCore;
class Router
{
    private $routesMap = [];

    public function get(string $url, $callback)
    {
        $this->routesMap["get"][$url] = $callback;

    }

    public function resolve()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $url = $_SERVER['REQUEST_URI'];

        $position = strpos($url, '?');

        if($position !== false)
        {
            $url = substr($url, 0, $position);
        }

        $callback = $this->routesMap[$method][$url];
        return call_user_func($callback);
    }
}
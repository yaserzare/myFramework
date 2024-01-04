<?php
namespace Yaserzare\PocketCore;
class Router
{
    private $routesMap = [];

    public function get(string $url, $callback)
    {
        $this->routesMap["get"][$url] = $callback;
        var_dump($this->routesMap);
    }
}
<?php
namespace Yaserzare\PocketCore;
class Router
{
    private $routesMap = [];

    public function get(string $url, $callback)
    {
        $this->routesMap["get"][$url] = $callback;

    }

    private function getCallbackFromDynamicRoute()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $url = $_SERVER['REQUEST_URI'];

        $position = strpos($url, '?');

        if($position !== false)
        {
            $url = substr($url, 0, $position);
        }

        $routes = $this->routesMap[$method];

        foreach ($routes as $route => $callback)
        {
            $routeNames = [];

            if(! $route)
               continue;

            if(preg_match_all('/\{(\w+)(:[^}]+)?}/', $route, $matches))
            {
                $routeNames = $matches[1];
            }



           $routeRegex = "@^" . preg_replace_callback(
               '/\{\w+(:([^}]+))?}/',
               fn($matches) => isset($matches[2]) ? "({$matches[2]})" : "([-\w]+)",
               $route
               ) . "$@";

            if(preg_match_all($routeRegex, $url, $matches))
            {
                $values = [];
                unset($matches[0]);
                foreach ($matches as $match)
                {
                    $values[] = $match[0];
                }

                $routeParams = array_combine($routeNames, $values);

                return[0 => $callback, 1 => $routeParams];
            }
        }

        return false;
        
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

        $callback = $this->routesMap[$method][$url] ?? false;
        $params = [];
        if(! $callback)
        {
            $routeCallback = $this->getCallbackFromDynamicRoute();
            if(! $routeCallback)
            {
                throw new \Exception('Not found');
            }

            $callback = $routeCallback[0];
            $params = $routeCallback[1];
        }

        return call_user_func($callback, ...array_values($params));
    }
}
<?php
namespace Yaserzare\PocketCore;
class Router
{
    private array $routesMap = [

        'get' => [],
        'post' => []

    ];

    protected Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function get(string $url, $callback)
    {

        $this->routesMap['get'][$url] = $callback;

    }

    public function post(string $url, $callback)
    {

        $this->routesMap['post'][$url] = $callback;
    }

    private function getCallbackFromDynamicRoute(): bool|array
    {
        $method = $this->request->getMethod();
        $url = $this->request->getUrl();

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



           $routeRegex = $this->convertRouteToRegex($route);

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
        $method = $this->request->getMethod();
        $url = $this->request->getUrl();

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

    /**
     * @param string $route
     * @return string
     */

    public function convertRouteToRegex(string $route): string
    {
        return "@^" . preg_replace_callback(
                '/\{\w+(:([^}]+))?}/',
                fn($matches) => isset($matches[2]) ? "({$matches[2]})" : "([-\w]+)",
                $route
            ) . "$@";
    }
}
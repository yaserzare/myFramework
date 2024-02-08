<?php

use Yaserzare\PocketCore\Application;
use Yaserzare\PocketCore\Request;
use Yaserzare\PocketCore\Response;

if(!function_exists('dd'))
{
    function dd(mixed $value): void
    {
        var_dump($value);die;
    }
}

if(!function_exists('app'))
{
    function app(): Application
    {
        return Application::$app;
    }
}

if(!function_exists('request'))
{
    function request($key = null): Request|string
    {
        if(is_null($key))
        {
            return app()->request;
        }
        return app()->request->input($key);
    }
}

if(!function_exists('response'))
{
    function response(): Response
    {
        return app()->response;
    }
}

if(!function_exists('redirect'))
{
    function redirect(string $url): Response
    {
        return response()->redirect($url);
    }
}

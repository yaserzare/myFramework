<?php

namespace Yaserzare\PocketCore;

class Request
{
    public function getMethod() : string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getUrl()
    {

        $url = $_SERVER['REQUEST_URI'];

        $position = strpos($url, '?');

        if($position !== false)
        {
            $url = substr($url, 0, $position);
        }

        return $url;
    }

}
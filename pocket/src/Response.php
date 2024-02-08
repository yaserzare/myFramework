<?php

namespace Yaserzare\PocketCore;

class Response
{
    public function redirect(string $url): self
    {
        header("location:$url");
        return $this;
    }
}
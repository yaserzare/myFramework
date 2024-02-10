<?php

namespace Yaserzare\PocketCore;

use Rakit\Validation\ErrorBag;

class Response
{
    public function redirect(string $url): self
    {
        header("location:$url");
        return $this;
    }

    public function withErrors(ErrorBag $errors): self
    {
        session()->flash('errors', $errors);
        return $this;
    }
}
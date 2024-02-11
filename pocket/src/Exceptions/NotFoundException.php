<?php

namespace Yaserzare\PocketCore\Exceptions;

class NotFoundException extends \Exception
{
    protected $message = "The route not found";
    protected $code = 404;

}
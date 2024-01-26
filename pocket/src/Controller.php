<?php
namespace Yaserzare\PocketCore;

use Rakit\Validation\Validation;
use Rakit\Validation\Validator;
use Yaserzare\PocketCore\View;

class Controller
{
    protected function validate(array $data, array $rules, array $messages = []): Validation
    {
        $validator = new Validator($messages);

        $validation = $validator->make($data, $rules);

        $validation->validate();

        return $validation;
    }

    protected function render(string $view, array $data = [])
    {
        return (new View)->render($view, $data);
    }
}
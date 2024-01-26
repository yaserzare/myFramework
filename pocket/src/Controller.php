<?php
namespace Yaserzare\PocketCore;

use Rakit\Validation\Validation;
use Rakit\Validation\Validator;

class Controller
{
    protected function validate(array $data, array $rules, array $messages = []): Validation
    {
        $validator = new Validator($messages);

        $validation = $validator->make($data, $rules);

        $validation->validate();

        return $validation;
    }

    protected function render(string $view, array $data = []): bool|string
    {
        foreach ($data as $key => $value)
        {
            $$key = $value;
        }

        ob_start(); //buffer
        include_once Application::$ROOT_DIR."/resources/views/$view.php";
        return ob_get_clean(); //clean buffer
    }
}
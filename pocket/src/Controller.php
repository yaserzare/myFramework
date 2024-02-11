<?php
namespace Yaserzare\PocketCore;

use Rakit\Validation\Validation;
use Rakit\Validation\Validator;
use Yaserzare\PocketCore\Validation\Rules\ExistsRule;
use Yaserzare\PocketCore\Validation\Rules\UniqueRule;
use Yaserzare\PocketCore\View;

class Controller
{
    protected function validate(array $data, array $rules, array $messages = []): Validation
    {
        $validator = new Validator($messages);
        $validator->addValidator('unique', new UniqueRule());
        $validator->addValidator('exists', new ExistsRule());
        $validation = $validator->make($data, $rules);

        $validation->validate();

        if($validation->fails())
        {
            response()
                ->withErrors($validation->errors())
                ->withInputs();
        }

        return $validation;
    }

    protected function render(string $view, array $data = [])
    {
        return app()->view->render($view, $data);
    }
}
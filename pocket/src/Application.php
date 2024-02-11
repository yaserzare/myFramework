<?php
namespace Yaserzare\PocketCore;

use Yaserzare\PocketCore\Database\Database;

class Application
{
    public Router $router;
    public static $ROOT_DIR;
    public Database $db;
    public static $app;
    public Request $request;
    public Response $response;
    public Session $session;
    public View $view;
    public function __construct(string $root_dir)
    {
        self::$ROOT_DIR = $root_dir;
        self::$app = $this;
        $this->router = new Router;
        $this->db = new Database;
        $this->request = new Request;
        $this->response = new Response;
        $this->session = new Session;
        $this->view = new View;
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        }
        catch (\Exception $e)
        {
            if($e->getCode())
            {

                echo $this->view->render("errors.{$e->getCode()}", [
                    'error' => $e
                ]);
                return;
            }

            echo $this->view->render("errors.500", [
                'error' => $e
            ]);
        }
    }

}
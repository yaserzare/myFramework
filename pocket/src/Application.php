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

    public function __construct(string $root_dir)
    {
        self::$ROOT_DIR = $root_dir;
        self::$app = $this;
        $this->router = new Router;
        $this->db = new Database;
        $this->request = new Request;
        $this->response = new Response;
    }

    public function run()
    {
       echo $this->router->resolve();
    }

}
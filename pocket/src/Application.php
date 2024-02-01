<?php
namespace Yaserzare\PocketCore;

use Yaserzare\PocketCore\Database\Database;

class Application
{
    public Router $router;
    public static $ROOT_DIR;
    public Database $db;
    public static $app;

    public function __construct(string $root_dir)
    {
        self::$ROOT_DIR = $root_dir;
        self::$app = $this;
        $this->router = new Router();
        $this->db = new Database();
    }

    public function run()
    {
       echo $this->router->resolve();
    }

}
<?php

namespace Yaserzare\PocketCore\Database;

use PDO;
use Yaserzare\PocketCore\Database\Migration;

class Database
{
    public PDO $pdo;
    public Migration $migrations;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=mvcproject", "root", "Z880994004z");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->migrations = new Migration($this);
    }

}
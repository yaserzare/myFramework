<?php


use Yaserzare\PocketCore\Application;

return new class {

    public function up(): void
    {
        $sql = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name varchar(255) NOT NULL,
            email varchar(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        app()->db->pdo->exec($sql);
    }

    public function down(): void
    {
        $sql = "DROP TABLE users";
        app()->db->pdo->exec($sql);
    }
};
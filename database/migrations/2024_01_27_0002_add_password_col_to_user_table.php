<?php


use Yaserzare\PocketCore\Application;

return new class {

    public function up(): void
    {
        $sql = "ALTER TABLE users ADD COLUMN password varchar(255) not null";
        app()->db->pdo->exec($sql);
    }

    public function down(): void
    {
        $sql = "ALTER TABLE users drop column password";
        app()->db->pdo->exec($sql);
    }
};
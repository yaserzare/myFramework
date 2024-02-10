<?php


use Yaserzare\PocketCore\Application;

return new class {

    public function up(): void
    {
        $sql = "ALTER TABLE users ADD UNIQUE(email)";
        app()->db->pdo->exec($sql);
    }

    public function down(): void
    {
        $sql = "ALTER TABLE users drop Index email";
        app()->db->pdo->exec($sql);
    }
};
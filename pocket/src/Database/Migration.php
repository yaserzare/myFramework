<?php

namespace Yaserzare\PocketCore\Database;

use Yaserzare\PocketCore\Application;
use Yaserzare\PocketCore\Database\Database;
use PDO;

class Migration
{
    public function __construct(public Database $db)
    {

    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();

        $appliedMigrations = $this->getAppliedMigrations();
        $appliedMigrations = array_map(fn($migration) => $migration->migration, $appliedMigrations);
        $files = scandir(Application::$ROOT_DIR.'/database/migrations');

        $newMigrations = [];

        $migrations = array_diff($files, $appliedMigrations);

        foreach ($migrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }

         $migrateInstance = require_once  Application::$ROOT_DIR."/database/migrations/$migration";
            $this->log("applying migrations $migration");
            $migrateInstance->up();
            $this->log("applied migration $migration");

            $newMigrations[] = $migration;

        }

        if(! empty($newMigrations))
        {
            $this->saveMigrations($newMigrations);
        }
        else
        {
            $this->log("There are no migrations to apply ");
        }
    }

    public function rollbackMigrations()
    {
        $this->log("there are not migrations to rollback");
        $appliedMigrations = $this->getAppliedMigrations();
        $lastBatch = $this->getLastBatchOfMigrations();

        $mustRollbackMigration = array_filter($appliedMigrations, fn($migration) => $migration->batch === $lastBatch);

        foreach ($mustRollbackMigration as $migration)
        {
            $migrateInstance = require_once Application::$ROOT_DIR."/database/migrations/$migration->migration";
            $this->log("rolling back migration $migration->migration");
            $migrateInstance->down();
            $this->log("rolled back migration $migration->migration");
        }

        if(!empty($mustRollbackMigration)) {
            $this->deleteMigrations(array_map(fn($migration) => $migration->id, $mustRollbackMigration));

        } else {
            $this->log("there are no migrations to rollback");
        }
    }

    public function createMigrationsTable()
    {
        $this->db->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        migration varchar(255),
        batch INT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;");
    }

    public function log($message): void
    {
        $time = date("Y-m-d H:i:s");
        echo "[$time] - $message".PHP_EOL;
    }

    protected function saveMigrations(array $newMigrations): void
    {
        $batchNumber = $this->getLastBatchOfMigrations()+1;

        $rows = implode(",", array_map(fn($migration) => "('$migration', $batchNumber)", $newMigrations));
        $this->db->pdo->exec("INSERT INTO migrations(migration, batch) values $rows ");
    }

    protected function getLastBatchOfMigrations(): int
    {
        $statement = $this->db->pdo->prepare("SELECT MAX(batch) FROM migrations");
        $statement->execute();

        return $statement->fetch(PDO::FETCH_COLUMN) ?? 0;

    }

    protected function getAppliedMigrations()
    {
        $statement = $this->db->pdo->prepare("SELECT id, migration, batch FROM migrations");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);

    }

    protected function deleteMigrations(array $migrationId): void
    {
        $ids = implode(",", $migrationId);
        $this->db->pdo->exec("DELETE FROM migrations where id in($ids)");
    }

}
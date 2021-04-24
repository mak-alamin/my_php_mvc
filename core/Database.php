<?php
namespace app\core;

class Database
{
    public $pdo;

    public function __construct($config)
    {
        $servername = $config['db_host'];
        $dbname = $config['db_name'];
        $username = $config['db_user'];
        $password = $config['db_password'];

        try {
            $this->pdo = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // set the PDO error mode to exception
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            // echo "Database Connected successfully.";

        } catch (\PDOException $e) {
            echo "Database Connection failed: " . $e->getMessage();
            die();
        }
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $files = scandir(Application::$rootDir . '/migrations');

        $toApplyMigrations = array_diff($files, $appliedMigrations);

        $newMigrations = [];
        foreach ($toApplyMigrations as $migration) {

            if ($migration === '.' || $migration === '..') {
                continue;
            }

            require_once Application::$rootDir . "/migrations/" . $migration;

            $className = pathinfo($migration, PATHINFO_FILENAME);

            $instance = new $className();

            $this->Log('Initializing Migration ' . $migration);

            $instance->up();
            
            $this->Log('Applied Migration ' . $migration);

            $newMigrations[] = $migration;
        }

        if ( ! empty($newMigrations) ) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->Log('All migrations are applied.');
        }

    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR (255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
    }

    public function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $migrations)
    {
        $migrations = array_map(fn($m) => "('$m')", $migrations );

        $migrations = implode(',', $migrations);

        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES 
            $migrations;
        ");

        $statement->execute();
    }

    protected function Log($message)
    {
        echo '[' . date('Y-m-d H-i-s') . '] ' . $message . PHP_EOL;
    }
}

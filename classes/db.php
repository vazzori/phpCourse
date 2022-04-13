<?php

class DB
{
  
    private static $instances = [];

    private $connection;

    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

  
    public static function getInstance(): DB
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    public function create_table($tablename)
    {
        $query = "CREATE TABLE {$tablename} ( id INT(5))";
        $this->connection->exec($query);
    }

    private function connect(){
        $database_cfg = Config::get_config('db');
        $this->connection =  new PDO("mysql:host={$database_cfg['host']};dbname={$database_cfg['database']}", $database_cfg['username'], $database_cfg['password']);
    }

    protected function __construct() {
        $this->connect();
    }
  
}


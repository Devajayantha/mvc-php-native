<?php

    require_once("config/Database.php");
    require_once("lib/Function.php");

    class Database 
    {
        private $host;
        private $user;
        private $name;
        private $pass;
        private static $instance = NULL;

        public function __construct() 
        {
            $this -> host = DB_SERVER;
            $this -> user = DB_USER;
            $this -> name = DB_NAME;
            $this -> pass = DB_PASS;
        }

        public function getInstance() 
        {
            $db = "mysql:host={$this->host};dbname={$this->name}";
            if (!isset(self::$instance)) 
            {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                self::$instance = new PDO($db, $this->user, $this->pass);
            }

            return self::$instance;
        }   

        public function getAll($tableName, $fillable)
        {
            $sql     = "SELECT {$fillable[0]}, {$fillable[1]}  FROM {$tableName} ORDER BY id DESC";
            $request = $this->getInstance()->query($sql);

            return $request;
        }

        public function saveAll($comment, $tableName, $fillable)
        {
            $date = save_format_date();
            $sql     = "INSERT INTO {$tableName} ({$fillable[0]}, {$fillable[1]}) VALUES ('".$comment."','".$date."')";
            $request = $this->getInstance()->query($sql);
            
            return $request;
        }
    }

?>
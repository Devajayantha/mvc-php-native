<?php
    require_once("config/Database.php");


    class Database {
        private $host;
        private $user;
        private $name;
        private $pass;

        private static $instance = NULL;

        public function __construct() {
            $this -> host = DB_SERVER;
            $this -> user = DB_USER;
            $this -> name = DB_NAME;
            $this -> pass = DB_PASS;

        }

        public function getInstance() {

            $db = "mysql:host={$this->host};dbname={$this->name}";

            if (!isset(self::$instance)) {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                self::$instance = new PDO($db, $this->user, $this->pass);
                
            }

            return self::$instance;
        }   

        public function getAll($tableName)
        {

            $sql = "SELECT * FROM {$tableName} ORDER BY id DESC";
            $request = $this->getInstance()->query($sql);
            return $request;
        }

        public function saveAll($comment, $tableName)
        {
            date_default_timezone_set("Asia/Bangkok");
            $date = date('Y-m-d H:i:s');
            $sql = "INSERT INTO {$tableName} (comment,created_at) VALUES ('".$comment."','".$date."')";
            $request = $this->getInstance()->query($sql);
            
            return $request;
        }
    }

?>
<?php
require_once("config/Database.php");


class Database {
    private $host;
    private $user;
    private $name;
    private $pass;

    private static $instance = NULL;

    public function __construct(){
        $this -> host = DB_SERVER;
        $this -> user = DB_USER;
        $this -> name = DB_NAME;
        $this -> pass = DB_PASS;

    }

    // private function __clone(){}

    public function getInstance(){
        // $this -> host = DB_SERVER;
        // $this -> user = DB_USER;
        // $this -> name = DB_NAME;
        // $this -> pass = DB_PASS;
        
        // var_dump($this->host,$this->user,$this->name,$this->pass);
        $db = "mysql:host={$this->host};dbname={$this->name}";

        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO($db, $this->user, $this->pass);

            // $sql = "SELECT * FROM tb_comment";
            // var_dump($sql);
            // $var = self::$instance->query($sql);
            // // $request = $this->getInstance()->query($sql);
            // var_dump($var);
            // return $request;
            
          }

          return self::$instance;
    }   

    public function getAll($tableName)
    {
        // var_dump($tableName);
        // var_dump($this->getInstance());
        $sql = "SELECT * FROM {$tableName} ORDER BY id DESC";
        $request = $this->getInstance()->query($sql);
        // var_dump($request);
        return $request;
    }

    public function saveAll($comment, $tableName)
    {
        date_default_timezone_set("Asia/Bangkok");
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO {$tableName} (comment,created_at) VALUES ('".$comment."','".$date."')";
        $request = $this->getInstance()->query($sql);
        // var_dump($request);
        return $request;
    }
}

?>
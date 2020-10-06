<?php

include_once("lib/Database.php");
include_once("models/Comment.php");

class Model {
    private $database;
    protected $tableName;

    public function __construct()
    {
        $db = new Database();
        $this -> database = $db;


        // $this->dbh = Database();
        
    }


    public function showData()
    {
        // $query = $this->database->query("SELECT * FROM tb_comment");
        // var_dump($this ->tableName);
        $query = $this->database->getAll($this->tableName);
        // var_dump($query);
        return $query;

    }

    public function saveData($comment)
    {
        $query = $this->database->saveAll($comment, $this->tableName);

        return $query;
        // date_default_timezone_set("Asia/Bangkok");
        // $date = date('Y-m-d H:i:s');
        // $sql = "INSERT INTO tb_comment (comment,created_at) VALUES ('".$comment."','".$$date."')";
        // $rs = $this->database->query($sql);
    }
}


?>
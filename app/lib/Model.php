<?php

    include_once("lib/Database.php");
    include_once("models/Comment.php");

    class Model 
    {
        private $database;
        protected $tableName;

        public function __construct()
        {
            $db = new Database();
            $this -> database = $db;
        }

        public function showData()
        {
            $query = $this->database->getAll($this->tableName);
            return $query;
        }

        public function saveData($comment)
        {
            $query = $this->database->saveAll($comment, $this->tableName);
            return $query;
        }
    }


?>
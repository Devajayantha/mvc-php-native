<?php

    include_once("lib/Model.php");
    include_once("models/Comment.php");

    class Controller 
    {
        public function model($model)
        {
            require_once '../app/models/' . $model . '.php';
            return new $model;
        }
    }
?>
<?php

include_once("lib/Model.php");
include_once("models/Comment.php");
// include_once("lib/function.php");


class Controller {
    public $model;
    public $comment;
    public $vars  = "";
    public $setData = [];

    public function __construct()
    {
        // $this->model = new Model;
        $this->comment = new Comment;
    }

    public function index()
    {
        

        if(!isset($_GET['i']))
        {
            $data = [
                'showData'         => $this -> comment ->showData(),
                'notifMessage'     => $this->vars
            ];

            $this->setData = $data;
            extract($this->setData);
            // $result = $this -> comment ->showData();
            // $test = $this->vars;
            // var_dump();
            // var_dump($result);
            // var_dump($test);
            require_once('views/index.php');
        }
        
    }

    public function save()
    {
        
        $comment = $_POST['comment'];
        if(empty($comment)){
            $this->vars = "Must be filled in";
        } else {
            $this->comment->saveData($comment);
        }
        
        // extract($this->vars);

        // var_dump($test);
        $this->index();
    }
}

?>
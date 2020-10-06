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

    public function newIndex()
    {
        var_dump("reply");

        $data = [
            'showData'         => $this->comment->showData(),
            'notifMessage'     => $this->vars
        ];
        // var_dump($data["notifMessage"]);
        $this->setData = $data;
        $baru = extract($this->setData);

        $new = $this->comment->showData();
        // var_dump($this-> comment ->showData());
        // $result = $this -> comment ->showData();
        // $test = $this->vars;
        // var_dump();
        // var_dump($result);
        // var_dump($test);
        // var_dump($showData);
        // var_dump($baru);
        return $this->setData;
    }
    public function index()
    {
        

        if(!isset($_GET['i']))
        {
            $data = [
                'showData'         => $this-> comment ->showData(),
                'notifMessage'     => $this->vars
            ];

            $this->setData = $data;

            extract($this->setData);
            // var_dump($showData);
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

        if (strlen($comment) >= 10 && strlen($comment) <= 200) {
            $this->comment->saveData($comment);
        } elseif (empty($comment)) {
            $this->vars = "Must be filled in";
        } else {
            $this->vars = "Your message must be 10 to 200 characters long";
        }
        
        // extract($this->vars);

        // var_dump($test);
        $this->index();
    }
    public function saveNew($comment)
    {
        
        var_dump($comment);

        if (strlen($comment) >= 10 && strlen($comment) <= 200) {
            $this->comment->saveData($comment);
        } elseif (empty($comment)) {
            $this->vars = "Must be filled in";
        } else {
            $this->vars = "Your message must be 10 to 200 characters long";
        }
        
        // extract($this->vars);

        // var_dump($test);
        $this->newIndex();
    }
}

?>
<?php
<<<<<<< Updated upstream

=======
    include_once("lib/Controller.php");

<<<<<<<< Updated upstream:app/controllers/CommentController.php
    class CommentController extends Controller
    {
        public $setData = [];
        public $vars    = "";
========
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
=======
    public function newIndex()
    {
        var_dump("reply");
>>>>>>>> Stashed changes:app/controllers/Controller.php

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
>>>>>>> Stashed changes
    public function index()
    {
        

        if(!isset($_GET['i']))
        {
            $data = [
<<<<<<< Updated upstream
                'showData'         => $this -> comment ->showData(),
=======
<<<<<<<< Updated upstream:app/controllers/CommentController.php
                'showData'         => $this->model('Comment')->showData(),
========
                'showData'         => $this-> comment ->showData(),
>>>>>>>> Stashed changes:app/controllers/Controller.php
>>>>>>> Stashed changes
                'notifMessage'     => $this->vars
            ];

            $this->setData = $data;
<<<<<<< Updated upstream
            extract($this->setData);
=======
<<<<<<<< Updated upstream:app/controllers/CommentController.php
            
            return $this->setData;
========

            extract($this->setData);
            // var_dump($showData);
>>>>>>> Stashed changes
            // $result = $this -> comment ->showData();
            // $test = $this->vars;
            // var_dump();
            // var_dump($result);
            // var_dump($test);
            require_once('views/index.php');
<<<<<<< Updated upstream
=======
>>>>>>>> Stashed changes:app/controllers/Controller.php
>>>>>>> Stashed changes
        }
        
    }

<<<<<<< Updated upstream
=======
<<<<<<<< Updated upstream:app/controllers/CommentController.php
        public function save($comment)
        {
            if (strlen($comment) >= 10 && strlen($comment) <= 200) {
                $this->model('Comment')->saveData($comment);
            } elseif (empty($comment)) {
                $this->vars = "Must be filled in";
            } else {
                $this->vars = "Your message must be 10 to 200 characters long";
            }
            
            $this->index();
========
>>>>>>> Stashed changes
    public function save()
    {
        
        $comment = $_POST['comment'];
<<<<<<< Updated upstream
        if(empty($comment)){
            $this->vars = "Must be filled in";
        } else {
            $this->comment->saveData($comment);
=======

        if (strlen($comment) >= 10 && strlen($comment) <= 200) {
            $this->comment->saveData($comment);
        } elseif (empty($comment)) {
            $this->vars = "Must be filled in";
        } else {
            $this->vars = "Your message must be 10 to 200 characters long";
>>>>>>> Stashed changes
        }
        
        // extract($this->vars);

        // var_dump($test);
        $this->index();
    }
<<<<<<< Updated upstream
}

=======
    public function saveNew($comment)
    {
        
        var_dump($comment);

        if (strlen($comment) >= 10 && strlen($comment) <= 200) {
            $this->comment->saveData($comment);
        } elseif (empty($comment)) {
            $this->vars = "Must be filled in";
        } else {
            $this->vars = "Your message must be 10 to 200 characters long";
>>>>>>>> Stashed changes:app/controllers/Controller.php
        }
        
        // extract($this->vars);

        // var_dump($test);
        $this->newIndex();
    }
<<<<<<<< Updated upstream:app/controllers/CommentController.php
========
}

>>>>>>>> Stashed changes:app/controllers/Controller.php
>>>>>>> Stashed changes
?>
<?php

    include_once("lib/Model.php");
    include_once("models/Comment.php");


    class Controller {
        public $model;
        public $comment;
        public $vars  = "";
        public $setData = [];

        public function __construct()
        {
            $this->comment = new Comment;
        }

        public function index()
        {
            $data = [
                'showData'         => $this->comment->showData(),
                'notifMessage'     => $this->vars
            ];

            $this->setData = $data;
            // var_dump($this->setData);
            // extract($this->setData);
            // var_dump($this->setData);

            return $this->setData;
        }

        public function save($comment)
        {
            
            if (strlen($comment) >= 10 && strlen($comment) <= 200) {
                $this->comment->saveData($comment);
            } elseif (empty($comment)) {
                $this->vars = "Must be filled in";
            } else {
                $this->vars = "Your message must be 10 to 200 characters long";
            }
            
            $this->index();
        }
    }

?>
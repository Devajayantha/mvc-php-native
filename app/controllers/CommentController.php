<?php
    include_once("lib/Controller.php");
    require_once("lib/Function.php");

    class CommentController extends Controller 
    {
        public $vars    = "";

        public function index()
        {
            $showAll = $this->model('Comment')->showData();
            
            return $showAll;
        }

        public function save($comment)
        {
            $length = strlen($comment);

            if ($length >= 10 && $length <= 200) {
                $this->model('Comment')->saveData($comment);
            } else {
                $this->vars = notif_validation($comment);
            }
            
            return $this->vars;
        }
    }
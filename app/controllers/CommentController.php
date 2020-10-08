<?php
    include_once("lib/Controller.php");
    require_once("lib/Function.php");
    require_once("models/Comment.php");

    class CommentController extends Controller 
    {
        public $vars    = "";


        public function index()
        {
            $commentModel = new Comment();
            $showAll = $commentModel->showData();
            
            return $showAll;
        }

        public function save($comment)
        {
            $notifValue = notif_validation($comment);
            
            if(empty($notifValue)) {
                $commentModel = new Comment();
                $commentModel->saveData($comment);
            }
            
            return $notifValue;
        }
    }
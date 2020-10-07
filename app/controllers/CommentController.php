<?php
    include_once("lib/Controller.php");

    class CommentController extends Controller
    {
        public $setData = [];
        public $vars    = "";

        public function index()
        {
            $data = [
                'showData'         => $this->model('Comment')->showData(),
                'notifMessage'     => $this->vars
            ];

            $this->setData = $data;
            
            return $this->setData;
        }

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
        }
    }
?>
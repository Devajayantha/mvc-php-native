<?php

    include_once("lib/Model.php");
    
    class Comment extends Model
    {
        protected $tableName    = "tb_comment";

        protected $fillable     = ['comment','created_at'];
    }


?>
<?php

    function save_format_date()
    {
        date_default_timezone_set("Asia/Bangkok");
        $date    = date('Y-m-d H:i:s');

        return $date;
    }

    function notif_validation($comment)
    {
    
        $length = strlen($comment);
        $value = "";
        var_dump($length);
        
        if (empty($comment)) {
            print_r("lewat sini");
            $value = "Must be filled in";

            return $value;
        }
        
        if ($length <= 10 || $length >= 200)  {
            $value = "Your message must be 10 to 200 characters long";
        
            return $value;
        }
 
        return $value;
    }


?>
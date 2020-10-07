<?php

    function save_format_date()
    {
        date_default_timezone_set("Asia/Bangkok");
        $date    = date('Y-m-d H:i:s');

        return $date;
    }

    function notif_validation($comment)
    {
        if(empty($comment)) {
            $value = "Must be filled in";
        } else {
            $value = "Your message must be 10 to 200 characters long";
        }

        return $value;
    }

?>
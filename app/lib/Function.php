<?php

    function save_format_date()
    {
        date_default_timezone_set("Asia/Bangkok");
        $date    = date('Y-m-d H:i:s');

        return $date;
    }


?>
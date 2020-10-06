<?php

include_once("controllers/Controller.php");

$controller = new Controller();



if(!isset($_GET['act']))
{
    $controller->index();
}
else
{
    switch($_GET['act'])
    {
        case 'index' :
            $controller -> index();
            break;
        case 'simpan':
            $controller -> save();
            break;
        default :
            $controller -> index();
            break;
    }
}



?>
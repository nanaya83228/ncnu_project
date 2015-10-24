<?php
    require_once 'db.php';
    require_once 'function.php';

    $saveresult = register($_POST, $link);

    if ($saveresult) {
	    echo "儲存成功";
    } 
    else {
	    echo "儲存失敗";
    }

    header('refresh:5; url= ../index.php');
?>
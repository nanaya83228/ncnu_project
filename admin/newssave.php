<?php
    session_start();
	require_once '../php/db.php';
	require_once '../php/function.php';
	
	if(isset($_SESSION['is_mlogin']) && $_SESSION['is_mlogin'] == TRUE) {
		//print_r($_POST);
		$saveresult = newssave($_POST,$link);
		if($saveresult){
			echo "儲存成功";
		}
		else{
			echo "儲存失敗";
		}
	}
	
	
	
	
	header('refresh:60; url= back.php');
?>
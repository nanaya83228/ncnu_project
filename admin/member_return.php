<?php
    session_start();
	require_once '../php/db.php';
	require_once '../php/function.php';
	
	if(isset($_SESSION['is_mlogin']) && $_SESSION['is_mlogin'] == TRUE) {
		//print_r($_POST);
		$saveresult = member_return($_GET['id']);
		
		if($saveresult){
			echo "退回成功";
		}
		else{
			echo "退回失敗";
		}
	}
	
	
	
	
	header('refresh:2; url= ../admin/join.php');
?>
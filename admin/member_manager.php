<?php
    session_start();
	require_once '../php/db.php';
	require_once '../php/function.php';
	
	if(isset($_SESSION['is_mlogin']) && $_SESSION['is_mlogin'] == TRUE) {
		//print_r($_POST);
		$saveresult = member_manager($_GET['id']);
		
		if($saveresult){
			echo "升格成功";
		}
		else{
			echo "升格失敗";
		}
	}
	
	
	
	
	header('refresh:3; url= ../admin/member.php');
?>
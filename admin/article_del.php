<?php
    session_start();
	require_once '../php/db.php';
	require_once '../php/function.php';
	
	if(isset($_SESSION['is_mlogin']) && $_SESSION['is_mlogin'] == TRUE) {
		//print_r($_POST);
		$saveresult = article_del($_GET['id']);
		
		if($saveresult){
			echo "刪除成功";
		}
		else{
			echo "刪除失敗";
		}
	}
	
	
	
	
	header('refresh:2; url= ../admin/communication.php');
?>
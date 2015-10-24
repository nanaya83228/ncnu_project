<?php
    session_start();
	require_once '../php/db.php';
	require_once '../php/function.php';
	
	
	//print_r($_POST);
	
	if(isset($_POST['u']) && isset($_POST['p'])){
		
		$has_user = mlogin($_POST['u'], $_POST['p']);
		
		if($has_user){
			$_SESSION['is_mlogin'] = TRUE;	
		}
		else{
			$_SESSION['is_mlogin'] = FALSE;
			$_SESSION['msg'] = '登陸失敗，請重新輸入帳號密碼';
			
		}
	}
	
	header('Location:back.php');
?>
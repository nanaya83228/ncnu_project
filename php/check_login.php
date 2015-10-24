<?php
    session_start();
	require_once 'db.php';
	require_once 'function.php';
	
	
	//print_r($_POST);
	
	if(isset($_POST['u']) && isset($_POST['p'])){
		
		$has_user = login($_POST['u'], $_POST['p']);
		
		if($has_user){
			
			$_SESSION['is_login'] = TRUE;	
			$_SESSION["name"]=getloginusername();
			$_SESSION["id"] = getloginuserid();
			header('Location:../index.php');
			
		}
		else{
			$_SESSION['is_login'] = FALSE;
			$_SESSION['msg'] = '登陸失敗，請重新輸入帳號密碼';
			header('Location:memberlogin.php');
			
			
			
		}
	}
	
	
?>
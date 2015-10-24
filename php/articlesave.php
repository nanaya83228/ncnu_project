<?php
     session_start();
	require_once 'db.php';
	require_once 'function.php';
	
	if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE) {
		//print_r($_POST);
		/*$saveresult = articlesave($_POST,$link);*/ //放的位置錯誤
		/*$image_path = NULL;*/ //不需要指定因為$_POST裡面不會有 image_path, 因此不會輸入
		if(file_exists($_FILES['imagepath']['tmp_name'])){
			//訂意圖片資料夾	
			$folder = "files/image/";
			
			//上傳檔案名稱
			$file_name = $_FILES['imagepath']['name'];
			//搬移檔案
			move_uploaded_file($_FILES['imagepath']['tmp_name'], "../".$folder.$file_name);
			//把圖片路徑放到$_post中，以儲存到資料庫去
			//$_POST['image_path'] = $folder . $file_name; //你的資料庫圖片路徑欄位名稱是 imagepath 不是 image_path，可能是因為這樣才找不到正確欄位
			$_POST['imagepath'] = $folder . $file_name; //改回 imagepath 再給 articlesave 存看看

		}
		//var_dump($_POST);
		
		$saveresult = articlesave($_POST,$link); //這邊才對
		if($saveresult){
			echo "儲存成功";
		}
		else{
			echo "儲存失敗";
		}
	}
	
	
	
	
	header('refresh:2; url= ../communication.php');
?>
<?php
    $host = 'localhost';
	$dbuser = 'root';
	$dbpw = '';
	$dbname = '101213011';
	
	$link = mysql_connect($host,$dbuser,$dbpw);
	
	if($link){
		mysql_query("SET NAMES utf8");
		$db = mysql_select_db($dbname,$link);
		if($db){
			//echo "以正確連接資料庫:" . $dbname;
		}
		else{
			echo "未能連接資料庫 {$dbname}，錯誤訊息：<br/>" . mysql_error();
		}
	}
	else{
		echo "無法連接mysql資料庫：<br/>" . mysql_error();
	}
?>
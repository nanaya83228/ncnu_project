<?php
    //取所有發布的文章
    
	function getphoto(){
    	$datas = array();
		$sql = "SELECT `title` , `imagepath` FROM `article` WHERE `imagepath` != 'NULL' order by id desc;";
        $result = mysql_query($sql);
		if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
    }
	
	//取得所有的文章
	function getallarticle(){
        $datas = array();
	    $sql = "SELECT * FROM `article`;";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
    }
	//取單一文章
	function getarticle($id){
        $article = null;
	    $sql = "SELECT * FROM `article` WHERE `id` = {$id};";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) == 1){
   		        $article = mysql_fetch_assoc($result);
		    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $article;
    }
	//後台登錄方法
	function mlogin($managername = null, $password = null){
		$has_user = FALSE;
	    $sql = "SELECT * FROM `manager` WHERE `managername` = '{$managername}' AND `password` = '{$password}';";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) == 1){
   		        $has_user = TRUE;
		    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $has_user;
	}
	//會員登錄方法
	function login($username = null, $password = null){
		$has_user = FALSE;
	    $sql = "SELECT * FROM `user` WHERE `username` = '{$username}' AND `password` = '{$password}';";
        $result = mysql_query($sql);
        if($result){
   	     /*   if(($row = mysql_num_rows($result))==1){
   		        $has_user = TRUE;
				$GLOBALS[loginusername]= $row['name'];
				//$GLOBALS[loginusername]="namesssssss";
		    }
	   	 */
	   	 
	   	   while($row = mysql_fetch_array($result)){
      				  $has_user = TRUE;
			          $loginusername = $row['name'];
					  $loginuserid = $row['id'];
				      $GLOBALS[loginusername] = $loginusername;
					  $GLOBALS[loginuserid] = $loginuserid;
  		   }
	   				    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $has_user;
	}
	if(!isset($loginusername)){
    	$loginusername = "null";
    }
	
	if(!isset($loginuserid)){
    	$loginuserid = "null";
    }
	
	function getloginusername(){
		
		return $GLOBALS[loginusername];
	}
	
	function getloginuserid(){
		
		return $GLOBALS[loginuserid];
	}
	
	//註冊會員
	function register($data, $link) {
        $saveresult = false;
		date_default_timezone_set('Asia/Taipei');
        $time = date("Y-m-d H:i:s");
        //新增
        $sql = "INSERT INTO `user` (`username` ,
                                    `password` ,
                                     `name` ,
                                    `sex` ,
                                    `yesorno`,
                                    `why`,
                                `registerdate`)
                      value ('{$data['username']}' ,
                           '{$data['password']}',
                            '{$data['name']}',
                           '{$data['sex']}',
                            '{$data['yesorno']}',
                            '{$data['why']}',
                                   '{$time}');";
		
		
		
		$result = mysql_query($sql);
		if ($result) {
			if(!isset($data['id'])){
				$new_id = mysql_insert_id($link);
			    echo "執行成功，新增後的id為{$new_id}";
			}

			$saveresult =TRUE;
		} else {
			echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
		}
        return $saveresult;
	}
	//新聞儲存

	function newssave($data, $link) {
        $saveresult = false;
		date_default_timezone_set('Asia/Taipei');
        $time = date("Y-m-d H:i:s");
        //新增
        $field = array();
		$fieldvalue = array();
		foreach($data as $key => $value){
			$field[] = "`{$key}`";
			$fieldvalue[] = "'{$value}'";
		}
		$field[] = "`publishdate`";
		$fieldvalue[] = "'{$time}'";
        $sql = "INSERT INTO `news` (`title` ,
                                    `category` ,
                                     `content` ,
                                `publishdate`,
                                `publish`,
                                `publishtime`,
                                `deldate`)
                      value ('{$data['title']}' ,
                             '{$data['category']}',
                             '{$data['content']}',
                             '{$time}',
                             '3',
                             '{$data['publishtime']}',
                             '{$data['deldate']}');";
        $result = mysql_query($sql);
		if ($result) {
			if(!isset($data['id'])){
				$new_id = mysql_insert_id($link);
			    echo "執行成功，新增後的id為{$new_id}";
			}

			$saveresult =TRUE;
		} else {
			echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
		}
        return $saveresult;
	}


	//文章儲存

	function articlesave($data, $link) {
        $saveresult = false;
		date_default_timezone_set('Asia/Taipei');
        $time = date("Y-m-d H:i:s");
		$uid = $_SESSION["name"];
		/*$sql = "SELECT `name` FROM `user` WHERE `id` = {$uid}";
		$result = mysql_query($sql);
		$id = mysql_fetch_assoc($result);*/
        //新增
        $field = array();
		$fieldvalue = array();
		foreach($data as $key => $value){
			$field[] = "`{$key}`";
			$fieldvalue[] = "'{$value}'";
		}
		$field[] = "`publishdate`";
		$fieldvalue[] = "'{$time}'";
		$field[] = "`createusername`";
		$fieldvalue[] = "'{$uid}'";
        $sql = "INSERT INTO `article` (" . join(", " , $field) . ")
                      VALUE (" . join(", " , $fieldvalue) . ");";
		
		
		//echo $sql;
		$result = mysql_query($sql);
		if ($result) {
			if(!isset($data['id'])){
				$new_id = mysql_insert_id($link);
			    echo "執行成功，新增後的id為{$new_id}";
			}

			$saveresult =TRUE;
		} else {
			echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
		}
        return $saveresult;
	}
    //新聞刪除
		function news_del($id) {
			$del_result = false;	
				
			$sql = "DELETE FROM `news` where `id` = {$id};";
			$result = mysql_query($sql);
			if ($result) {
				echo "刪除成功";
				$del_result = true;
				//mysql_free_result($result);
			} else {
				echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
			}
			
			return $del_result;
		}
		
		//討論區文章刪除
		function article_del($id) {
			$del_result = false;	
				
			$sql = "DELETE FROM `article` where `id` = {$id};";
			$result = mysql_query($sql);
			if ($result) {
				$del_result = true;
				//mysql_free_result($result);
			} else {
				echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
			}
			
			return $del_result;
		}
		//管理員刪除
		function manager_del($id) {
			$del_result = false;	
				
			$sql = "DELETE FROM `manager` where `id` = {$id};";
			$result = mysql_query($sql);
			if ($result) {
				$del_result = true;
				//mysql_free_result($result);
			} else {
				echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
			}
			
			return $del_result;
		}
		
		//退回申請ˇ
		function member_return($id) {
			$del_result = false;	
				
			$sql = "UPDATE `user` SET `yesorno` = '2' where `id` = {$id};";
			$result = mysql_query($sql);
			if ($result) {
				$del_result = true;
				//mysql_free_result($result);
			} else {
				echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
			}
			
			return $del_result;
		}
		
		//會員刪除
		function member_del($id) {
			$del_result = false;	
				
			$sql = "DELETE FROM `user` where `id` = {$id};";
			$result = mysql_query($sql);
			if ($result) {
				$del_result = true;
				//mysql_free_result($result);
			} else {
				echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
			}
			
			return $del_result;
		}
		
		//會員升格
	    function member_manager($id) {
			$manager_result = false;	
			
				
			$member = "SELECT * FROM `user` where `id` = {$id};";
			
            $sql="INSERT INTO manager (`managername` ,
                                `password` ,
                                `name` )
								SELECT `username`, `password` ,`name` FROM user;";
		 
            $result = mysql_query($sql);
			if ($result) {
				$manager_result = true;
				//mysql_free_result($result);
			} else {
				echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
			}
			
			return $manager_result;
		}
		
	//取單一消息
	function getnews($id){
        $news = null;
	    $sql = "SELECT * FROM `news` WHERE `id` = {$id};";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) == 1){
   		        $news = mysql_fetch_assoc($result);
		    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $news;
	}
	
		//取得所有的消息
	function getallnews(){
        $datas = array();
	    $sql = "SELECT * FROM `news`;";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
    }
	
	//取得所有發佈的消息
	function getpublicnews(){
		date_default_timezone_set('Asia/Taipei');
        $datas = array();
		$current = strtotime("now");//取得目前的時間搓記
		$publicdate = "SELECT `id`,`publishtime`, `deldate` FROM `news` order by id desc;";
		$result = mysql_query($publicdate);
		
		while ($row = mysql_fetch_assoc($result)) {
			if ($current >= strtotime($row['publishtime'])) {
				//如果目前時間，還比發布日期前或剛好為發布日期
            	$A = "UPDATE `news` SET `publish` = '1' WHERE `id` = {$row['id']};";
				mysql_query($A);
			    if($current >= strtotime($row['deldate'])){
                    //如果目前時間，已經超過發布日期
                    $B = "DELETE FROM `news` WHERE `id` = {$row['id']};";
			        mysql_query($B);
                }
			}	
		}
	    $sql = "SELECT * FROM `news` WHERE `publish` = '1';";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
    }
	
	//取得所有的會員資訊
	function getallmember(){
        $datas = array();
	    $sql = "SELECT * FROM `user`;";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
	}
	
	//查詢申請管理員意願
	function getmanagermember(){
        $datas = array();
	    $sql = "SELECT * FROM `user` WHERE `yesorno` = '1';";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
	}
	
	//取得所有的管理員資訊
	function getallmanager(){
        $datas = array();
	    $sql = "SELECT * FROM `manager`;";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
	}
	
	//取得活動的消息
	function getn1news(){
        $datas = array();
	    $sql = "SELECT * FROM `news` WHERE `category` = '焦點活動' && `publish` = '1' order by id desc;";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
    }
	function getn2news(){
        $datas = array();
	    $sql = "SELECT * FROM `news` WHERE `category` = '旅遊新聞' && `publish` = '1' order by id desc;";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
    }
	function getn3news(){
        $datas = array();
	    $sql = "SELECT * FROM `news` WHERE `category` = '好康優惠' && `publish` = '1' order by id desc;";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
    }
	function getn4news(){
        $datas = array();
	    $sql = "SELECT * FROM `news` WHERE `category` = '旅遊安全' && `publish` = '1' order by id desc;";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
    }
	function getc1article(){
        $datas = array();
	    $sql = "SELECT * FROM `article` WHERE `category` = '經驗分享' order by id desc;";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
    }
	function getc2article(){
        $datas = array();
	    $sql = "SELECT * FROM `article` WHERE `category` = '釣點分享' order by id desc;";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
    }
	function getc3article(){
        $datas = array();
	    $sql = "SELECT * FROM `article` WHERE `category` = '最新魚況' order by id desc;";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
    }
	function getc4article(){
        $datas = array();
	    $sql = "SELECT * FROM `article` WHERE `category` = '最新戰果' order by id desc;";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
    }
	function getc5article(){
        $datas = array();
	    $sql = "SELECT * FROM `article` WHERE `category` = '揪團釣魚' order by id desc;";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
    }
	function getc6article(){
        $datas = array();
	    $sql = "SELECT * FROM `article` WHERE `category` = '一起團購' order by id desc;";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) > 0){
   		        while($row = mysql_fetch_assoc($result)){
		     	    $datas[] = $row;
	   		    }
    	    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $datas;
    }
	//取單一資訊
	function getinformation($id){
        $information = null;
	    $sql = "SELECT * FROM `information` WHERE `id` = {$id};";
        $result = mysql_query($sql);
        if($result){
   	        if(mysql_num_rows($result) == 1){
   		        $information = mysql_fetch_assoc($result);
		    }
	   	    mysql_free_result($result);
        }
        else{
    	    echo "{$sql}語法執行失敗，錯誤訊息：" . mysql_error();
        }	
		return $information;
	}
		
?>
<?php
   session_start();
   //require_once '../php/db.php';
   //require_once '../php/function.php';
   //$data = getallarticle();
?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>文章新增</title>
		<meta name="description" content="">
		<meta name="author" content="kevin">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
	</head>

	<body>
		<?php 
		    if(isset($_SESSION['is_mlogin']) && $_SESSION['is_mlogin'] == TRUE): 
		?>
		
		<div class="content ">
        	<div class="container">
				<div class="row">
					<div class="col-xs-12">
					    <p class="text-right"><a href="logout.php">登出</a></p>
					    <h1 class="text-center">後台管理</h1>
                        
                        <h2>文章新增</h2>
                        <form method="post" action="newssave.php">
							<div class="form-group">
								<label for="title">標題</label>
								<input type="text" class="form-control" id="title" name="title">
							</div>
							<div class="form-group">
								<label for="publishtime">發佈日期</label>
								<input type="text" class="form-control" id="publishtime" name="publishtime">
							</div>
							<div class="form-group">
								<label for="deldate">刪除日期</label>
								<input type="text" class="form-control" id="deldate" name="deldate">
							</div>
							<div class="form-group">
								<label for="category">分類</label>
								<select class="form-control" name="category">
									<option value="焦點活動">焦點活動</option>
									<option value="旅遊新聞">旅遊新聞</option>
									<option value="好康優惠">好康優惠</option>
									<option value="旅遊安全">旅遊安全</option>
								</select>
							</div>
							<div class="form-group">
								<label for="content">內容</label>
								<textarea class="form-control" rows="5" id="content" name="content"></textarea>
							</div>
							<button type="submit" class="btn btn-default">
								存檔
							</button>
						</form>
					</div>
				</div>
			</div>            
        </div>   
		<?php else:?> 
		    <h1>尚未登錄</h1>
		    <?php header('Location:index.php')?>
		<?php endif; ?>
        
        <!-- 頁底  -->
        <div class="content">
        	<div class="container">
				<div class="row">
					<div class="col-xs-12">
				 	    <p class = "text-center">
				 	    	&copy 2015 xie xing yu
				 	    </p>
					</div>
				</div>
			</div>            
        </div>
	</body>
</html>
<?php
   session_start();
   require_once '../php/db.php';
   require_once '../php/function.php';
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>
	    $(document).ready(function() {
	        $("#formm").submit( function(eventObj) {
        	    var fullName = $('#image_path').val().split('/').pop().split('\\').pop();
        	    //var fullName = $('#image_path').val();
        	    alert(fullName);
        	    var input = $("<input>")
                .attr("type", "hidden")
                .attr("name", "imagepath").val(fullName);
				$('#formm').append($(input));
            } )
        });
		</script>
	</head>

	<body>
		<?php 
		    if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE): 
		?>
		
		<div class="content ">
        	<div class="container">
				<div class="row">
					<div class="col-xs-12">
					    <p class="text-right"><a href="../php/logout.php">登出</a></p>
					    <h1 class="text-center">日月潭釣友網</h1>
                        <h2>文章新增</h2>
                        <form method="post" action="articlesave.php" enctype="multipart/form-data" id = "formm">
							<div class="form-group">
								<label for="title">標題</label>
								<input type="text" class="form-control" id="title" name="title">
							</div>
							<div class="form-group">
								<label for="category">分類</label>
								<select class="form-control" name="category">
									<option value="經驗分享">經驗分享</option>
									<option value="釣點分享">釣點分享</option>
									<option value="最新魚況">最新魚況</option>
									<option value="最新戰果">最新戰果</option>
									<option value="揪團釣魚">揪團釣魚</option>
									<option value="一起團購">一起團購</option>
								</select>
							</div>
							<div class="form-group">
								<label for="content">內容</label>
								<textarea class="form-control" rows="5" id="content" name="content"></textarea>
							</div>
							<div class="form-group">
								<input type="file" accept=".mp4 , .png , .gif" id="imagepath" name="imagepath">	
							</div>
							<button type="submit" class="btn btn-default" id = "submitbtn">
								存檔
							</button>
						</form>
					</div>
				</div>
			</div>            
        </div>   
		<?php else:?> 
		    <h1>尚未登錄</h1>
		    <?php header('Location:communication.php')?>
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
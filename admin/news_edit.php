<?php
   session_start();
   require_once '../php/db.php';
   require_once '../php/function.php';
   $data = getnews($_GET['id']);
?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>新聞編輯</title>
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
					    <p class="text-right"><a href="../php/logout.php">登出</a></p>
					    <h1 class="text-center">後台管理</h1>
                        <ul class="nav nav-pills">
                            <li role="presentation" class="active"><a href="article.php">文章管理</a></li>
                            <li role="presentation"><a href="work.php">作品管理</a></li>
                        </ul>
                        <h2>新聞編輯</h2>
                        <form method="post" action="newssave.php">
							<input type = "hidden" name = "id" value = "<?php echo $data['id'];?>">
							
							<div class="form-group">
								<label for="title">標題</label>
								<input type="text" class="form-control" id="title" name="title" value = "<?php echo $data['title'];?>">
							</div>
							<div class="form-group">
								<label for="category">分類</label>
								<select class="form-control" name="category">
									<option value="焦點活動" <?php if($data['category'] == "焦點活動"){echo "selected";}?>>焦點活動</option>
									<option value="旅遊新聞" <?php if($data['category'] == "旅遊新聞"){echo "selected";}?>>旅遊新聞</option>
									<option value="好康優惠" <?php if($data['category'] == "好康優惠"){echo "selected";}?>>好康優惠</option>
									<option value="旅遊安全" <?php if($data['category'] == "旅遊安全"){echo "selected";}?>>旅遊安全</option>
								</select>
							</div>
							<div class="form-group">
								<label for="content">內容</label>
								<textarea class="form-control" rows="5" id="content" name="content" ><?php echo $data['content']?></textarea>
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
        <footer>
        	<p class = "text-center">
				&copy 2015 xie xing yu
			</p>
        </footer>
	</body>
</html>
<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>後台登錄</title>
		<meta name="description" content="">
		<meta name="author" content="kevin">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
	</head>

	<body>
		<?php 
		    if(isset($_SESSION['is_mlogin']) && $_SESSION['is_mlogin'] == TRUE):
		    header('Location: back.php'); 
		?>
		<?php else:?> 
		<div class="content ">
        	<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-sm-offset-4">
					    <h1>後台登錄</h1>
					    
					    <form method="post" action="manager_login.php">
					    	<?php
			                    if(isset($_SESSION['msg'])){
			    	                echo "<p class = 'danger'>{$_SESSION['msg']}</p>";
			                    }
			                ?>
                            <div class="form-group">
                                <label for="username">帳號</label>
                                <input type="text" class="form-control" id="managername" name="u" placeholder="請輸入帳號...">
                            </div>
                            <div class="form-group">
                                <label for="password">密碼</label>
                                <input type="password" class="form-control" id="password" name="p" placeholder="請輸入密碼...">
                            </div>
                            <div class="form-group">
                                <div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> 記住我
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default">登錄</button>
                        </form>
					</div>
				</div>
			</div>            
        </div>   
		<?php endif; ?>
        
        <!-- 頁底  -->
        <footer>
        	<p class = "text-center">
				&copy 2015 xie xing yu
			</p>
        </footer>
	</body>
</html>
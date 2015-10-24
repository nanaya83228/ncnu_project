<?php   
    session_start();

    require_once 'db.php';
    require_once 'function.php';
?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
    <title>日月潭釣友網----會員登錄</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <!-- TODO: make sure bootstrap.min.css points to BootTheme generated file
        -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
         body {
        	background-image: url("../img/lake.jpg");
			background-size:1500px 1500px;
            padding-top: 60px;
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }
        img {
			border: 2px solid white;
			border-color: white #666 #666 white;
			background-color: ivory;
			padding: 10px;
			margin: 5px 10px;
		}
    </style>
    <!-- TODO: make sure bootstrap-responsive.min.css points to BootTheme
        generated file -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
	</head>
	<body>
		<div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="../index.php"><font face='微軟正黑體'>日月潭釣友網</font></a>
                <!--/.nav-collapse -->
                </div>
            </div>
        </div>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span4 offset4">
                <div class="well sidebar-nav">
			    <?php 
		            if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE):
		            header('Location: index.php'); 
	        	?>
		        <?php else:?> 
		            <div class="content ">
        	<div class="container">
				
					<div class="col-xs-12 col-sm-4 col-sm-offset-4">
					    <h1>會員登錄</h1>
					    
					    <form method="post" action="check_login.php">
					    	<?php
			                    if(isset($_SESSION['msg'])){
			    	                echo "<p class = 'danger'>{$_SESSION['msg']}</p>";
			                    }
			                ?>
                            <div class="form-group">
                                <label for="username">帳號</label>
                                <input type="text" class="form-control" id="username" name="u" placeholder="請輸入帳號...">
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
                            <a class="btn" href="register.php">加入會員</a>
                        </form>
					</div>
				
			</div>            
        </div>   
		    <?php endif; ?>
		    
        </div>
        </div>
        </div>
        </div>
	    <hr>
        <footer>
             <p>&copy 2015 xie xing yu</p>
        </footer>
	</body>
</html>
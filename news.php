<?php

session_start();

    require_once 'php/db.php';
	require_once 'php/function.php';
	$news = getpublicnews();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>日月潭釣友網</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <!-- TODO: make sure bootstrap.min.css points to BootTheme generated file
        -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body {
        	background-image: url("img/lake.jpg");
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
                <div class="nav-collapse collapse">
                    <?php if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true):?>
                        <p class="navbar-text pull-right">會員
                            <a href="php/logout.php" class="navbar-link">登出</a>
                        </p>
                    <?php else:?>
                        <p class="navbar-text pull-right">會員
                            <a href="php/memberlogin.php" class="navbar-link">登錄</a>
                        </p>
                    <?php endif;?>
                    <ul class="nav">
                        <li>
                            <a href="index.php">首頁</a>
                        </li>
                        <li>
                            <a href="intro.php">關於釣魚</a>
                        </li>
                        <li class="active">
                            <a href="news.php">日月潭最新消息</a>
                        </li>
                        <li>
                            <a href="weather.php">一周天氣</a>
                        </li>
                        <li>
                            <a href="communication.php">討論區</a>
                        </li>
                        
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span2 offset1">
        		<div class="well sidebar-nav">
					<ul class="nav nav-list">
						<li class="nav-header"><font face='微軟正黑體'>分類看板</font></li>
                        <li>
						<li>
							<a href="page/n1.php">焦點活動</a>
						</li>
						<li>
							<a href="page/n2.php">旅遊新聞</a>
						</li>
						<li>
							<a href="page/n3.php">好康優惠</a>
						</li>
						<li>
							<a href="page/n4.php">旅遊安全</a>
						</li>
						
					</ul>
				</div>
			</div>
            <div class="span8">
                <div class="hero-unit">
                    <?php if(!empty($news)):?>
					    <?php foreach($news as $row):?>
					    <?php
					        $str = strip_tags($row['content']);
					   	    $str = mb_substr($str,0,100);
					   	?>  
					   	    <div class="panel panel-default col-xs-8">
                            <div class="panel-heading"><a href="show_news.php?p=<?php echo $row['id'];?>"><font face='微軟正黑體'><?php echo $row['title'];?></font></a></div>
                                <div class="panel-body">
                                    <span class="label label-info"><?php echo $row['category'];?></span>
                                    <span class="label label-warning"><?php echo $row['publishdate'];?></span>
                                    <pre><?php echo $str . "...";?><a href="show_news.php?p=<?php echo $row['id'];?>">more</a></pre>
                                </div>
                            </div>
                    <?php endforeach;?>
				    <?php else:?>
					    <h1>沒資料</h1>
				    <?php endif;?>
				</div>		
            </div>
            <!--/span-->
        </div>
        <!--/row-->
        <hr>
        <footer>
            <p>&copy 2015 xie xing yu</p>
        </footer>
    </div>
    <!--/.fluid-container-->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
    </script>
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
</body>

</html>
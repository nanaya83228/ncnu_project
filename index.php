<?php

    session_start();
    require_once 'php/db.php';
	require_once 'php/function.php';
	require_once 'php/simple_html_dom.php';
	$news = getpublicnews();
	$photo = getphoto();

    $html = file_get_html('http://www.cwb.gov.tw/m/f/entertainment/E055.php');
    $url = 'http://www.cwb.gov.tw/m/f/entertainment/E055.php';
    $lines_array = file($url);
    $lines_string = implode('', $lines_array);
    $htmlpicnumber = 0;
	
	$html1 = file_get_html('http://www.cwb.gov.tw/V7/forecast/entertainment/GT/E055.htm');
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
        .carousel-inner{
        	width:800px;
        	height:450px;
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
                <a class="brand" href="index.php"><font face='微軟正黑體'>日月潭釣友網</font></a>
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
                        <li class="active">
                            <a href="index.php">首頁</a>
                        </li>
                        <li>
                            <a href="intro.php">關於釣魚</a>
                        </li>
                        <li>
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
                	<h4><font face='微軟正黑體'>目前天氣</font>:</h4>
					<?php
                        foreach($html->find('img') as $a){
	                        $htmlpicnumber ++;
	                        if($htmlpicnumber == 3){
		                       $cutstring = substr($a->src,0, -4); 
		                        echo '<img src="http://www.cwb.gov.tw'.$cutstring."@2x.png\"". '<br>';	
	                        }
	                    }
						
		                $tds = $html->find('table td') ;
		                $info = array();
		                foreach($tds as $key => $td){
			                if($key > 0){
				                $info[] = $td->innertext;
			                }
		                }
		                //print_r($info);
		                //var_dump($info['3']);
                    ?> 
                    <h5><font face='微軟正黑體'>風速</font>:</h5>
                    <?php
                        echo $info['1'];
                    ?>
                    <h5><font face='微軟正黑體'>風速</font>:</h5>
                    <?php
                        echo $info['2'];
                    ?>
                    <h5><font face='微軟正黑體'>風向</font>:</h5>
                    <?php
                        echo $info['3'];
                    ?>
                    <h5><font face='微軟正黑體'>相對溼度</font>:</h5>
                    <?php
                        echo $info['4'];
                    ?>
                    <h5><font face='微軟正黑體'>降雨機率</font>:</h5>
                    <?php
                        echo $info['5'];
                    ?>
                    <ul class="nav nav-list">
                    	<li class="nav-header"><font face='微軟正黑體'>分類看板</font></li>
                        <li>
						<li>
							<a href="page/c1.php">經驗分享</a>
						</li>
						<li>
							<a href="page/c2.php">釣點分享</a>
						</li>
						<li>
							<a href="page/c3.php">最新魚況</a>
						</li>
						<li>
							<a href="page/c4.php">最新戰果</a>
						</li>
						
						<li>
							<a href="page/c5.php">揪團釣魚</a>
						</li>
						<li>
							<a href="page/c6.php">一起團購</a>
						</li>
                        <li class="nav-header"><font face='微軟正黑體'>魚種介紹</font></li>
                        <li>
                            <a href="intro.php#f1">鯁魚</a>
                        </li>
                        <li>
                            <a href="intro.php#f2">鯉魚</a>
                        </li>
                        <li>
                            <a href="intro.php#f3">紅魔鬼</a>
                        </li>
                        <li>
                            <a href="intro.php#f4">曲腰魚</a>
                        </li>
                        
                        <li>
                            <a href="intro.php#f5">大頭鰱</a>
                        </li>
                        <li>
                            <a href="intro.php#f6">吳郭魚</a>
                        </li>
                        <li>
                            <a href="intro.php#f7">草魚</a>
                        </li>
                        <li>
                            <a href="intro.php#f8">烏鰡</a>
                        </li>
                        <li>
                            <a href="intro.php#f9">鱸鰻</a>
                        </li>
                        
                    </ul>
                    
                </div>
                <!--/.well -->
            </div>
            <!--/span-->
            <div class="span8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						</ol>

						<!-- Wrapper for slides -->						
                        <div class="carousel-inner" role="listbox">
							<div class="item active">																    						                                                 
							    <img src="<?php echo $photo['0']['imagepath'];?>">
							    <div class="carousel-caption">
			                        <?php echo $photo['0']['title'];?>
				                </div>					                
						    </div>
						    <div class="item">							    						                                                 
							    <img src="<?php echo $photo['1']['imagepath'];?>">
							    <div class="carousel-caption">
			                        <?php echo $photo['1']['title'];?>
				                </div>
						    </div>
						    <div class="item">							    						                                                 
							    <img src="<?php echo $photo['2']['imagepath'];?>">
							    <div class="carousel-caption">
			                        <?php echo $photo['2']['title'];?>
				                </div>
						    </div>
							    <!--文字-->
					    </div>
						    <!-- Controls -->
						    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only"><</span> </a>
						    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">></span> </a>
					    </div>
                    <div class="row-fluid">
                	    <?php if(!empty($news)):?>
					        <?php foreach($news as $row):?>
					   	    <?php
					   	        $str = strip_tags($row['content']);
					   	        $str = mb_substr($str,0,50);
					   	    ?>  
				    	        <div class="span3">
				    	    	    <span class="label label-info"><?php echo $row['category'];?></span>				    	    				    	    	
                                    <pre><h4><font face='微軟正黑體'><?php echo $row['title'];?></font></h4>
                                    
                                    <?php echo $str . "...";?></pre>
                                    <p><a class="btn" href="show_news.php?p=<?php echo $row['id'];?>">看全文 »</a></p>
                                </div>
                            <?php endforeach;?>
	        	        <?php else:?>
				    	    <h1>沒資料</h1>
				        <?php endif;?>
                    
                    </div>
                
                <!--/row-->
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
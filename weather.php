<?php  

session_start();
 
//get and post 
    require 'php/functionW.php';
    require_once 'php/db.php';
    require_once 'php/function.php';
    require_once 'php/simple_html_dom.php';

    $weather = [];
    $showCity = "南投縣";
    $forecasting = fetchWeatherWeekly();
    if (isset($forecasting[$showCity])) {
        $weather = $forecasting[$showCity];
    } else {
        $msg = "City Forecasting Data not Exists";
    }
?>

<!DOCTYPE html>
<html lang="">
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
                            <li>
                                <a href="index.php">首頁</a>
                            </li>
                            <li>
                                <a href="intro.php">關於釣魚</a>
                            </li>
                            <li>
                                <a href="news.php">日月潭最新消息</a>
                            </li>
                            <li class="active">
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
			    <div class="span10 offset1">
				    <div class="hero-unit">
			            <div class="row weatherContainer span4">
				            <?php if (count($weather)): ?>
				                <?php foreach ($weather as $date => $times): ?>
				                <div class="dayWeather">
					                <div>
						                <h4><?php echo $date;?></h4>
						                <div class="list-group">
							                <?php foreach ($times as $time => $data): ?>							                    
								                <div><?php echo $time . "點"?></div>
								                <div>
									            <?php echo sprintf("%s (%d ~ %d &deg;C)", $data['wx'], $data['maxt'], $data['mint'])?>
								                </div>
							                <?php endforeach;?>
					                	</div>
					                </div>
				                </div>
				                <?php endforeach;?>
				            <?php elseif (strlen($msg)): ?>
					        <h3><?php echo $msg;?></h3>				           
				            <?php endif;?>
			            </div>
                        <table border="1">
							<tr>
								<td rowspan="2">季節</td>
								<td rowspan="2">天氣狀況</td>
								<td>早晨</td>
								<td>中午</td>
								<td>下午</td>
								<td rowspan="2">晚間</td>
							</tr>
							<tr>
								<td>05~10</td>
								<td>10~14</td>
								<td>14~18</td>
							</tr>
							<tr>
								<td rowspan="7">春季</td>
								<td>正常晴天</td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>陰天</td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>梅雨</td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>東北季風</td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>起霧</td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>暴熱</td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>寒流</td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td rowspan="8">夏季</td>
								<td>正常晴天</td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>陰天</td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>大雨</td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>颱風</td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>起霧</td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>悶熱</td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>陣雨後</td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>西南季風</td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td rowspan="7"></td>
								<td>正常晴天</td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>陰天</td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>大雨</td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>連綿冷雨</td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>颱風</td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>							
							<tr>
								<td>起霧</td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>寒流</td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td rowspan="3">冬季</td>
								<td>正常晴天</td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/oklogo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>寒流</td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>
							<tr>
								<td>下雨</td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
								<td><img src="img/nologo.png" width=50px height=50px></td>
							</tr>
							
						</table>
						
                    </div>
                </div>
            </div>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.1/masonry.pkgd.min.js"></script>

		<script>
		$('.weatherContainer').masonry({
			itemSelector: '.dayWeather',
			columnWidth: '.dayWeather',
			percentPosition: true
		});
		</script>
		<hr>
        <footer>
            <p>&copy 2015 xie xing yu</p>
        </footer>
	</body>
</html>
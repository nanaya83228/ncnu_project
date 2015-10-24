<?php

session_start();

    require_once 'php/db.php';
	require_once 'php/function.php';
	require_once 'php/simple_html_dom.php';
	
	$html = file_get_html('http://www.cwb.gov.tw/m/f/entertainment/E055.php');
    $url = 'http://www.cwb.gov.tw/m/f/entertainment/E055.php';
    $lines_array = file($url);
    $lines_string = implode('', $lines_array);
    $htmlpicnumber = 0;
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
			background-size: 1500px 1500px;
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
                        <li class="active">
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
                    <ul class="nav nav-list">
                        <li class="nav-header"><font face='微軟正黑體'>魚種介紹</font></li>
                        <li>
                            <a href="#f1">鯁魚</a>
                        </li>
                        <li>
                            <a href="#f2">鯉魚</a>
                        </li>
                        <li>
                            <a href="#f3">紅魔鬼</a>
                        </li>
                        <li>
                            <a href="#f4">曲腰魚</a>
                        </li>
                        <li>
                            <a href="#f5">大頭鰱</a>
                        </li>
                        <li>
                            <a href="#f6">吳郭魚</a>
                        </li>
                        <li>
                            <a href="#f7">草魚</a>
                        </li>
                        <li>
                            <a href="#f8">烏鰡</a>
                        </li>
                        <li>
                            <a href="#f9">鱸鰻</a>
                        </li>
                        
                    </ul>
                </div>
                <!--/.well -->
            </div>
            <div class="span8">
            	<div class="hero-unit">
                    <h2><font face='微軟正黑體'>釣魚心境</font></h2>
                    <pre>  <img src="img/sunrise.jpg" style="float: right" width=200px height=100px><h6>釣魚是一個很好的休閒活動，專注的釣魚可以培養耐心。看著平靜的湖面也有讓人心理平靜的效果，不時意外的收穫更讓人期待。自己釣魚常常志不在魚，釣魚有很常的時間是處於放空的狀態，可以想很多事情，也可以和身旁的朋友聊天培養感情，看著萬變的風景，放著自己喜歡的音樂，和一起等待的好朋友們抬槓，就算最後空手而歸也覺得心滿意足。</h6></pre>
                    </hr>  
                    <h2><font face='微軟正黑體'>魚種介紹</font></h2>
                    <pre>釣魚除了經驗、技術外，主要還是運氣問題，其實什麼餌釣到什麼於沒有絕對答案，只是知道一些小撇步會比較容易中自己的目標魚~~</pre>
                    <div id="f1"><pre><h4><font face='微軟正黑體'>鯁魚</font></h4><img src="img/f1.jpg" style="float: left" width=200px height=100px><font face='微軟正黑體'><h6>別 名：</h6></font> 鯪仔、鯁仔、鯪魚、青鱗魚、鯪公、土鯪</br><font face='微軟正黑體'><h6>介紹：</h6></font>鯁魚為外來種(自大陸引進)通常以12～30公分較常見，最大體長可達60公分以上，較大者可達8公斤左右。為初級淡水魚類。喜好棲息於水溫較高的水域中。活動於淺水域的岩灘，雜食性。主要攝食附著藻類、有機碎屑及浮游動物、底棲動物等。活潑，善群游活動。<h6>感想：</h6>吃餌時只要鉤子一刺進去，感覺到痛就往回衝，拉力強，如果常分心的釣友建議綁失手繩，不然竿子會直接下水。，主要釣點有九龍口、九蛙步道。</pre></div>
                    <div id="f2"><pre><h4><font face='微軟正黑體'>鯉魚</font></h4><img src="img/f2.jpg" style="float: left" width=200px height=100px><font face='微軟正黑體'><h6>別 名：</h6></font>呆仔</br><font face='微軟正黑體'><h6>介紹：</h6></font>體背部暗灰色，側面略帶黃綠色，腹面淺灰色。胸鰭和腹鰭微金黃色。體長一般為20~40公分，最大體長可達60公分以上。身體側扁，略呈紡綞形。多棲息於水域中下層。喜歡在富營養且泥砂底質的靜水域活動，較少棲息於流水域中。為雜食性魚類，以小型無脊椎動物與底棲動物為主。日月潭全境，台灣各河川中下游與池塘皆有分布。<h6>感想：</h6>日月潭最好釣的魚，貪吃，一被鉤子刺到發現逃不掉，就不反駁，拉力只有第一下。</pre></div>
                    <div id="f3"><pre><h4><font face='微軟正黑體'>紅魔鬼</font></h4><img src="img/f3.jpg" style="float: left" width=200px height=100px><font face='微軟正黑體'><h6>別 名：</h6></font>紅魔麗體魚、壽星頭、壽星魚、隆頭麗魚、金剛紅財神、火鶴魚、火鶴、皇冠魚、凹頭鯛</br><font face='微軟正黑體'><h6>介紹：</h6></font>本魚成魚體色為橘紅色或橘色，幼魚體色為褐色，具有黑色的斑點，唇厚，大眼。雄魚體型較大，魚鰭較長，前額有隆起突出物。體長約在24.4公分。肉食性，以蝸牛、小魚、昆蟲、甲殼類為食。在其成長的過程中，體色會產生變化。<h6>感想：</h6>此魚分布全潭，數量之多，吃餌之精，為外來種會迫害原生種魚苗，肉質不錯，釣到請不要留活口。</pre></div>
                    <div id="f4"><pre><h4><font face='微軟正黑體'>曲腰魚</font></h4><img src="img/f4.jpg" style="float: left" width=200px height=100px><font face='微軟正黑體'><h6>別 名：</h6></font>翹嘴魚、總統魚</br><font face='微軟正黑體'><h6>介紹：</h6></font>棲息於中上層水域。背部隆起，口明顯地向上翹。通常為30-50公分，最大可達100公分。眼睛大，位於頭側上方。背部淺棕色，體側下半部為灰白色，腹部銀白色，背鰭和尾鰭為灰黑色，其餘各鰭為灰白色。<h6>感想：</h6>此魚分不魚全潭，釣半浮，建議用溪蝦當餌，或者直接魚皮鉤都是很好的選擇，曲腰魚喜歡吃蝦，魚皮鉤的螢光珠有蝦眼的感覺，魚群看到後就會直接上鉤。</pre></div>
                    <div id="f5"><pre><h4><font face='微軟正黑體'>大頭鰱</font></h4><img src="img/f5.jpg" style="float: left" width=200px height=100px><font face='微軟正黑體'><h6>別 名：</h6></font>花鰱、黑鰱、胖頭魚、大頭魚</br><font face='微軟正黑體'><h6>介紹：</h6></font>本魚原產於中國，並引進世界各地的淡水水域，目前已對部分國家造成生態問題。本魚體側扁，頭部特大，眼在頭的下半部。背部暗黑色，有不規則的深色斑塊，腹部灰白色且呈圓滑狀。尾鰭叉形，體長可達112公分。本魚為初級淡水魚，棲息在江河水庫、湖泊的中上層，屬濾食性，以細密的鰓耙濾食浮遊動物，性情溫和。生長迅速，最大個體可達40千克。為高經濟性的魚類，清蒸、紅燒、沙鍋魚頭或煮味增湯皆宜。<h6>感想：</h6>常常是整個魚群一起行動繞著湖流，沒有固定的出沒點，當魚群來時，大頭鰱的魚腥味很重，會飄上水面，如果突然有一股臭味上來就要顧好竿子了。釣大頭連最好半浮，用7號魚皮鉤或乒乓都是不錯的選擇，拉力極強，釣到成就感高，不少釣友為之著迷，值得挑戰！</pre></div>
                    <div id="f6"><pre><h4><font face='微軟正黑體'>吳郭魚</font></h4><img src="img/f6.jpeg" style="float: left" width=200px height=100px><font face='微軟正黑體'><h6>別 名：</h6></font>𩶘魚、非洲鯽魚、非鯽、越南魚、南洋鯽</br><font face='微軟正黑體'><h6>介紹：</h6></font>吳郭魚通常生活於淡水中，可以存活於在湖、河、池塘的淺水中，也能生活於出海口、近岸沿海等不同鹽份含量的鹹水中。牠有很強的適應能力，且對溶氧較少之水有極強之適應性。絕大部份吳郭魚是雜食性，常吃水中植物和碎物。此魚在面積狹小之水域中亦能繁殖。甚至在水稻田裡能夠生長。<h6>感想：</h6>吃餌之小心，絕不大口咬餌，非常敏感，如果線收太緊，吃餌時感到拉力立刻放餌。日月潭的吳郭魚非常好吃，很多不愛帶魚走的釣友都只挑吳郭魚回家。日月潭的吳郭魚極難釣，數量少又精，值得挑戰！</pre></div>
                    <div id="f7"><pre><h4><font face='微軟正黑體'>草魚</font></h4><img src="img/f7.jpeg" style="float: left" width=200px height=100px><font face='微軟正黑體'><h6>別 名：</h6></font>鯇魚、混子、草青</br><font face='微軟正黑體'><h6>介紹：</h6></font>本魚體側扁且延長，吻短而圓鈍，口大，無鬚，特徵是具2排梳狀咽頭齒。魚體背部青褐色而略帶黃色，腹部乳白，鱗片大且具黑緣；胸鰭與腹鰭略帶黃色，尾鰭淺叉形，體長可達1.5公尺。本魚原產於中國各大江河水系至俄羅斯西伯利亞東部均有分布，已廣泛引進世界各地，並對某些地區造成生態衝擊。本魚為初級淡水魚，生活於水深5至30公尺。棲息於中下水域，游泳迅速，性情活潑，常成群覓食。3至4歲成熟，成長迅速。草食，如食苦草、馬來眼子菜等，以及象草、蘇丹草、 稗草、瓜類的葉、藤等。<h6>感想：</h6>餌料建議用豆餅、玉米，盡量往有草牌的地方拋竿。</pre></div>
                    <div id="f8"><pre><h4><font face='微軟正黑體'>烏鰡</font></h4><img src="img/f8.jpg" style="float: left" width=200px height=100px><font face='微軟正黑體'><h6>別 名：</h6></font>青鯇、烏青、螺螄青、黑鯇、烏鯇、黑鯖、烏鯖、銅青、青棒、五侯青</br><font face='微軟正黑體'><h6>介紹：</h6></font>原產於中國，已引進世界各地，並造成部分地區生態衝擊。水深5至30公尺。本魚體延長而側扁，體型壯碩，口大。魚體背部青黑色，腹部灰白色，成長後全身黝黑，體表有較大的圓鱗，鰭為灰黑色，尾鰭凹形，體長可達180公分。<h6>感想：</h6>釣烏鰡需要打底打一段時間，把烏鰡群吸引過來後才比較好釣，拉力強。</pre></div>
                    <div id="f9"><pre><h4><font face='微軟正黑體'>鱸鰻</font></h4><img src="img/f9.jpg" style="float: left" width=200px height=100px><font face='微軟正黑體'><h6>別 名：</h6></font>花鰻、烏耳鰻、土龍</br><font face='微軟正黑體'><h6>介紹：</h6></font>通常為70-120公分，最大可達160公分，約重達30公斤。體延長而頗粗壯，軀幹部呈圓柱形，尾部稍側扁。頭大而稍平扁，背鰭及臀鰭均與尾鰭相連。胸鰭為長橢圓形。無腹鰭。尾鰭圓鈍。體背部灰褐或灰黃色，腹部顏色較為淡白。常棲息於於河川深潭或水庫的洞穴中，夜行性動物。性情兇猛，攝食多種小型動物。<h6>感想：</h6>建議用單鉤綁黑蚯蚓，因為常出現鱸鰻的點也都是常會卡底的釣點，盡量靠岸邊釣，岸邊多石洞，鱸鰻常棲於那裏面，經濟價值極高，拉力極強，絕對值得挑戰！</pre></div>
                    
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
<?php
   session_start();
   require_once '../php/db.php';
   require_once '../php/function.php';
   $data = getmanagermember();
?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>後台管理</title>
		<meta name="description" content="">
		<meta name="author" content="kevin">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="../js/admin.js"></script>

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
                        <ul class="nav nav-pills">
                            <li role="presentation"><a href="back.php">新聞管理</a></li>
                            <li role="presentation"><a href="communication.php">討論區管理</a></li>
                            <li role="presentation"><a href="member.php">會員管理</a></li> 
                            <li role="presentation" class="active"><a href="join.php">申請管理員通知</a></li> 
                            <li role="presentation"><a href="manager.php">管理員管理</a></li>                          
                        </ul>
                        <?php if(!empty($data)):?>
					    	<table class="table table-hover">
                                <tr>
                                	<td>會員名稱</td>
                                	<td>會員帳號</td>
                                	<td>申請理由</td>
                                	<td>管理動作</td>
                                </tr>
                                
                                <?php foreach($data as $row):?>
					        	    <tr>
                                    	<td><?php echo $row['name']?></td>
                                    	<td><?php echo $row['username']?></td>
                                    	<td><?php echo $row['why']?></td>
                                	    <td>                                		    
                                		    <a href="member_return.php?id=<?php echo $row['id']  ?>" class="return">退回</a>
                                		    <a href="member_manager.php?id=<?php echo $row['id']  ?>">加為管理員</a>
                                	    </td>
                                    </tr>
                                <?php endforeach;?>
                            </table>
					    	
					    <?php else:?>
					    	<h1>尚無申請</h1>
					    <?php endif;?>	    
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
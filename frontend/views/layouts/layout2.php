<?php
	use yii\helpers\Html;
?>

<!DOCTYPE html>
<html>
<head>
	<title><?= "原象-".Html::encode($this->title) ?></title>  
	<link rel="stylesheet" type="text/css" href="/static/css/layout1.css">
	<link rel="stylesheet" type="text/css" href="/static/css/style.css">
	<link rel="stylesheet" type="text/css" href="/static/yii/less/bootstrap/bootstrap.css">
	<script type="text/javascript" src="/static/yii/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="/static/yii/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/static/js/main.js"></script>
	<!--[if lt IE 9]>
	  <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body>
<header id="header">
	<div id="top_nav">
		<div class="top_nav_inner">
			<div class="top_nav_left">
				<span>关于原象</span>
			</div>
			<div class="top_nav_right">
				<div class="login-text t_r">
					<span id="js_isNotLogin">
						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index" rel="nofollow">登录账户</a>
					</span>
				</div>
				<dl class="top_account t_r">
					<dt>
						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index" rel="nofollow" class="mycoount"></a>
					</dt>
					<dd style="">
						<ul>
							<li><a href="http://localhost/advanced/frontend/web/index.php?r=index/index" rel="nofollow">我的账户</a></li>
							<li><a href="http://localhost/advanced/frontend/web/index.php?r=index/index" rel="nofollow">我的订单</a></li>
							<li><a href="http://localhost/advanced/frontend/web/index.php?r=index/index" rel="nofollow">我的收藏</a></li>
							<li><a href="http://localhost/advanced/frontend/web/index.php?r=index/index" rel="nofollow">我的评论</a></li>
						</ul>
					</dd>
				</dl>
				<div class="mywish t_r">
					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">
						<span class="mywishbg"></span>
					</a>
					<span class="mywish-text" id="js_favour_num">0</span>
				</div>
				<div class="mycart t_r">
					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">
						<span class="mycartbg" id="js_topBagWarp"></span>
					</a>
					<span class="mycart-text" id="js_cart_items">0</span>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="main-container">
	<div class="main container">
		<?= $content ?>
	</div>
</div>

<footer id="footer">
	<div style="height: 140px;">
		
	</div>
	<div>
		<a href="#">原象简介</a> | 
		<a href="#">原象公告</a> | 
		<a href="#">招纳贤士</a> | 
		<a href="#">联系我们</a> | 
		<a href="#">客服热线：xxx-xxx-xxxx</a>
	</div>
	<div>
		Copyright © 2017 - 20xx 原象版权所有   深ICP备xxxxxxxxx号   深ICP证xxxxx-xxxx号   x市公安局xx分局备案编号：xxxxxxxxxxxxx
	</div>
</footer>
</body>
</html>
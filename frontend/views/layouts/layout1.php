<?php
	use yii\helpers\Html;
?>

<!DOCTYPE html>
<html>
<head>
	<title><?= "原象-".Html::encode($this->title) ?></title>  
	<link rel="stylesheet" type="text/css" href="static/css/layout1.css">
	<link rel="stylesheet" type="text/css" href="static/css/style.css">
	<link rel="stylesheet" type="text/css" href="static/yii/less/bootstrap/bootstrap.css">
	<script type="text/javascript" src="static/yii/js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="static/yii/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="static/js/main.js"></script>
	<!--[if lt IE 9]>
	  <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body>
<header id="header">
	<div id="top_nav">
		<div class="top_nav_inner">
			<div class="top_nav_left">
				<a href="#" class="header-title">关于原象</a>
			</div>
			<div class="top_nav_right">
				<div class="login-text t_r">
					<span id="js_isNotLogin">
						<a href="#" rel="nofollow" class="header-title">登录账户</a>
					</span>
				</div>
				<dl class="top_account t_r">
					<dt>
						<a href="#" class="header-title">我的原象</a>
					</dt>
					<dd style="">
						<ul>
							<li><a href="#" rel="nofollow">我的账户</a></li>
							<li><a href="#" rel="nofollow">我的订单</a></li>
							<li><a href="#" rel="nofollow">我的收藏</a></li>
							<li><a href="#" rel="nofollow">我的评论</a></li>
						</ul>
					</dd>
				</dl>
				<dl class="top_account t_r">
					<dt>
						<a href="#" class="header-title">卖家中心</a>
					</dt>
					<dd style="">
						<ul>
							<li><a href="#" rel="nofollow">卖家登陆</a></li>
							<li><a href="#" rel="nofollow">如何成为商家</a></li>
							<li><a href="#" rel="nofollow">服务中心</a></li>
						</ul>
					</dd>
				</dl>
				<dl class="top_account t_r">
					<dt>
						<a href="#" class="header-title">联系服务</a>
					</dt>
					<dd style="">
						<ul>
							<li><a href="#" rel="nofollow">消费者客服</a></li>
							<li><a href="#" rel="nofollow">商家客服</a></li>
						</ul>
					</dd>
				</dl>
			</div>
		</div>
	</div>

	<div id="top_main">
		<div class="top_main_inner pr">
			<div class="top_header clearfix">
				<div class="logo">
					<a titel="fecshop logo" href="#" style="">
						<img src="static/img/logo.jpg">
					</a>
				</div>
				<div class="topSeachForm">
					<form method="get" name="searchFrom" class="js_topSeachForm" action="https://fecshop.appfront.fancyecommerce.com/cn/catalogsearch/index">
						<div class="top_seachBox">
							<div class="searchInput fl">
								<input type="text" value="" maxlength="150" placeholder="搜索服务" class="searchArea js_k2 ac_input" name="q">
							</div>
							<button class="fl js_topSearch seachBtn" type="submit"><span class="t_hidden">search</span></button>
							<!-- <input type="hidden" class="category" value="0" name="category"> -->
						</div>
					</form>
				</div>
				<div class="logo yx_server">
					<a titel="fecshop logo" href="#" style="">
						<img src="static/img/yx_server.jpg">
					</a>
				</div>
			</div>
	    </div>
	</div>

	<div class="top_menu"> 
	   	<nav id="nav"> 
		    <ul class="clearfix"> 
		     	<li style="width: 166px;display: flex;justify-content: center;"> 
		     		<a href="#" class="nav_t">服务类型</a> 
		     	</li> 
		     	<li> 
			     	<a href="#" class="nav_t">保洁</a> 
		      	</li> 
		     	<li> 
		     		<a href="#" class="nav_t">家电清洗</a> 
		      	</li> 
		     	<li> 
		     		<a href="#" class="nav_t">家居保养</a> 
		      	</li> 
		     	<li> 
		     		<a href="#" class="nav_t">保姆</a>
		     	</li> 
		     	<li> 
		     		<a href="#" class="nav_t">月嫂</a> 
		     	</li> 
		     	<li> 
		     		<a href="#" class="nav_t">育儿嫂</a> 
		     	</li> 
		     	<li>
		     		<a href="#" class="nav_t">维修</a>
		     	</li>
		     	<li>
		     		<a href="#" class="nav_t">开锁</a> 
		     	</li>
		    </ul> 
	   	</nav> 
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
		<a href=" ">关于原象</ a>  
		<a href="http://47.95.7.204:8081/index/index#">常见问题</ a>  
		<a href="http://47.95.7.204:8081/index/index#">服务协议</ a>  
		<a href="http://47.95.7.204:8081/index/index#">联系客服</ a> 
		<a href="http://47.95.7.204:8081/index/index#">客服热线：xxx-xxx-xxxx</ a>
	</div>
	<div>
		Copyright  2018 - 20xx 原象版权所有   粤ICP备18006463号   粤ICP证xxxxx-xxxx号   深圳市公安局xx分局备案编号：xxxxxxxxxxxxx
	</div>
</footer>
</body>
</html>
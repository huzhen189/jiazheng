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

	<div id="top_main">
		<div class="top_main_inner pr">
			<div class="top_header clearfix">
				<div class="logo">
					<a titel="fecshop logo" href="http://localhost/advanced/frontend/web/index.php?r=index/index" style="">
						<img src="/static/img/logo.jpg">
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
					<a titel="fecshop logo" href="http://localhost/advanced/frontend/web/index.php?r=index/index" style="">
						<img src="/static/img/yx_server.jpg">
					</a>
				</div>
			</div>
	    </div>
	</div>

	<div class="top_menu"> 
	   	<nav id="nav"> 
		    <ul class="clearfix"> 
		     	<li style="width: 166px;display: flex;justify-content: center;"> 
		     		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index" class="nav_t">服务类型</a> 
		     	</li> 
		     	<li> 
			     	<a href="http://localhost/advanced/frontend/web/index.php?r=index/index" class="nav_t">保洁</a> 
			      	<div class="sub_menu big_sub_menu clearfix"> 
			       		<div class="trends_item clearfix"> 
			        		<dl> 
			         			<dt>
			          				<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">基础保洁</a>
			         			</dt>
			         			<dd>
			          				<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">长期/周期保洁</a>
			         			</dd> 
					         	<dd>
					          		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">深度保洁</a>
					         	</dd> 
			        		</dl> 
					        <dl> 
						        <dt>
						         	<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">新居开荒</a>
						        </dt>
						        <dd>
						          	<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">厨房保养</a>
						        </dd> 
					         	<dd>
					          		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">卫生间保养</a>
					         	</dd> 
					         	<dd>
					          		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">擦玻璃</a>
					         	</dd>
					        </dl> 
			       		</div> 
			       		<div class="trends_img"> 
			        		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"><img alt="" src="/static/img/clean1.jpg" width="244" /></a>
			        		<a style="margin-left: 20px;" href="http://localhost/advanced/frontend/web/index.php?r=index/index"><img alt="" src="/static/img/clean2.jpg" width="244" /></a> 
			       		</div> 
			      	</div>
		      	</li> 
		     	<li> 
		     		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index" class="nav_t">家电清洗</a> 
		      		<div class="sub_menu big_sub_menu clearfix"> 
		       			<div class="trends_item clearfix"> 
		        			<dl> 
		         				<dt>
		          					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">油烟机清洗</a>
		         				</dt>
		         				<dd><a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> 灶台清洗</a></dd>
		         				<dd><a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> 电烤箱清洗</a></dd>
		         				<dd><a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> 微波炉清洗</a></dd>
		         				<dd><a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> 消毒柜清洗</a></dd>
		        			</dl>
		        			<dl>
		         				<dt>
		          					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">洗衣机清洗</a>
		         				</dt>
		         				<dd>
		         					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">冰箱清洗</a>
		         				</dd>
		         				<dd>
		         					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">空调清洗</a>
		         				</dd>
		         				<dd>
		         					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">饮水机清洗</a>
		         				</dd>
		         				<dd>
		         					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">热水器清洗</a>
		         				</dd>
		        			</dl>
			       		</div>
			      		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> </a>
			       		<div class="trends_img">
			        		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> </a>
			        		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"><img alt="" src="/static/img/appliances1.jpg" width="398" /></a>
			        		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"><img alt="" style="margin-left: 20px;" src="/static/img/appliances2.jpg" width="244" /></a> 
			       		</div> 
		      		</div> 
		      	</li> 
		     	<li> 
		     		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index" class="nav_t">家居保养</a> 
		      		<div class="sub_menu big_sub_menu clearfix"> 
		       			<div class="trends_item clearfix"> 
		        			<dl> 
		         				<dt>
		          					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">沙发保养</a>
		         				</dt>
		         				<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> </a>
		        			</dl>
		        			<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> </a>
		        			<dl>
		         				<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> </a>
		         				<dt>
		          					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"></a>
		          					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">除螨</a>
		         				</dt>
		         				<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> </a>
		        			</dl>
		        			<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> </a>
		        			<dl>
		         				<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> </a>
		         				<dt>
		          					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"></a>
		          					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">地板打蜡</a>
		         				</dt>
		         				<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> </a>
		        			</dl>
		        			<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> </a>
		       			</div>
		       			<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> </a>
		       			<div class="trends_img">
		        			<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> </a>
					        <a href="http://localhost/advanced/frontend/web/index.php?r=index/index"><img alt="" src="/static/img/home1.jpg" width="398" /></a>
					        <a href="http://localhost/advanced/frontend/web/index.php?r=index/index"><img alt="" style="margin-left: 20px;" src="/static/img/home2.jpg" width="244" /></a> 
		       			</div> 
		      		</div>
		      	</li> 
		     	<li> 
		     		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index" class="nav_t">保姆</a>
		     		<div class="sub_menu big_sub_menu clearfix"> 
		       			<div class="trends_item clearfix">
		       				<dl> 
			         			<dt>
			          				<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">住家保姆</a>
			         			</dt>
			         			<dd>
			          				<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">不住家保姆</a>
			         			</dd> 
			         			<dd>
		       						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">老人陪护</a>
		       					</dd>
			        		</dl> 
		       				<dl>
		       					<dt>
		       						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">长期做饭</a>
		       					</dt>
		       					<dd>
		       						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">固定钟点工</a>
		       					</dd>
		       				</dl>
		       			</div>
		       		</div>
		     	</li> 
		     	<li> 
		     		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index" class="nav_t">月嫂</a> 
		     	</li> 
		     	<li> 
		     		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index" class="nav_t">育儿嫂</a> 
		     	</li> 
		     	<li>
		     		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index" class="nav_t">维修</a>
		     		<div class="sub_menu big_sub_menu clearfix">
		     			<div class="trends_item clearfix">
		     				<dl>
		     					<dt>
		     						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">管道疏通</a>
		     					</dt>
		     					<dd>
		     						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">空调加氟</a>
		     					</dd>
		     					<dd>
		     						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">空调维修</a>
		     					</dd>
		     					<dd>
		     						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">马桶维修</a>
		     					</dd>
		     					<dd>
		     						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">水龙头更换</a>
		     					</dd>
		     					<dd>
		     						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">冰箱维修</a>
		     					</dd>
		     					<dd>
		     						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">油烟机维修</a>
		     					</dd>
		     				</dl>
		     				<dl>
		     					<dt>
		     						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">热水器维修</a>
		     					</dt>
		     					<dd>
		     						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">洗衣机维修</a>
		     					</dd>
		     					<dd>
		     						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">微波炉维修</a>
		     					</dd>
		     					<dd>
		     						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">电视机维修</a>
		     					</dd>
		     					<dd>
		     						<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">电路维修</a>
		     					</dd>
		     				</dl>
		     			</div>
		     			<div class="trends_img">
		        			<a href="http://localhost/advanced/frontend/web/index.php?r=index/index"> </a>
					        <a href="http://localhost/advanced/frontend/web/index.php?r=index/index"><img alt="" src="/static/img/service1.jpg" width="398" /></a>
					        <a href="http://localhost/advanced/frontend/web/index.php?r=index/index"><img alt="" style="margin-left: 20px;" src="/static/img/service2.jpg" width="244" /></a> 
		       			</div> 
		     		</div>
		     	</li>
		     	<li>
		     		<a href="http://localhost/advanced/frontend/web/index.php?r=index/index" class="nav_t">开锁</a> 
		     		<div class="sub_menu big_sub_menu clearfix">
		     			<div class="trends_item clearfix">
			     			<dl>
			     				<dt>
			     					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">普通门开锁</a> 
			     				</dt>
			     				<dd>
			     					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">球锁更换</a> 
			     				</dd>
			     				<dd>
			     					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">撞锁更换</a> 
			     				</dd>
			     				<dd>
			     					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">执手锁更换</a> 
			     				</dd>
			     			</dl>
			     			<dl>	
			     				<dt>
			     					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">防盗门开锁</a> 
			     				</dt>
			     				<dd>
			     					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">防盗门A级锁芯更换</a> 
			     				</dd>
			     				<dd>
			     					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">防盗门B级锁芯更换</a> 
			     				</dd>
			     				<dd>
			     					<a href="http://localhost/advanced/frontend/web/index.php?r=index/index">防盗门C级锁芯更换</a> 
			     				</dd>
			     			</dl>
		     			</div>
		     		</div>
		     	</li>
		    </ul> 
		    <div class="nav_fullbg" style="display: none;"></div> 
		    <div class="navmask" style="display: none;"></div> 
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
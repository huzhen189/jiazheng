<?php
	use yii\helpers\Html;
	use yii\bootstrap\Carousel;
?>
<div>
	<?php echo Carousel::widget([
	    'items' => [
	        [
	        	'content' => '<img src="http://bjw-a.oss-cn-shanghai.aliyuncs.com/p1/big/n_v1bl2lwwjinv5vp3kxgqma.jpg" style="height:600px;width:1200px"/>',
	        	'caption' => '<h4>保洁</h4><p>爱家就要经常清洁它</p>',
	        ],
	        [
	        	'content' => '<img src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1517826053975&di=0739842a5572a44ee7e7e13078ef70da&imgtype=0&src=http%3A%2F%2Fimgsrc.baidu.com%2Fimage%2Fc0%253Dshijue1%252C0%252C0%252C294%252C40%2Fsign%3D9be26c80db43ad4bb2234e83ea6b30da%2Fd01373f082025aafe6deefeef1edab64034f1a22.jpg" style="height:600px;width:1200px"/>',
	        	'caption' => '<h4>保姆</h4><p>照顾家的好帮手</p>',
	        ],
	        // 包含图片和字幕的格式
	        [
	            'content' => '<img src="https://img.appfront.fancyecommerce.com/images/en_2.jpg" style="height:600px;width:1200px"/>',
	            'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
	            //'options' => ['style:height:600px,width:1200px'],       //配置对应的样式
	        ],
	    ]
	]);
	?>
	<?= Html::style('.carousel-control { 
		display: flex;
    	font-size: 60px;
    	justify-content: center;
    	align-items: center; }') 
    ?>
</div>

<div class="banners">
	<div class="banner_two"><!-- 两张中等banner -->
		<div class="banner_l_top">
			<a class="link_ad" href="">
				<img class="js_lazy" data-original="//img.appfront.fancyecommerce.com/images/en_a.jpg" src="//img.appfront.fancyecommerce.com/images/en_a.jpg" alt="" width="100%" style="">
			</a>
		</div>
		<div class="banner_r_top">
			<a href="">
				<img class="js_lazy" data-original="//img.appfront.fancyecommerce.com/images/sammy.jpg" src="//img.appfront.fancyecommerce.com/images/sammy.jpg" alt="" width="100%" style="">
			</a>
		</div>
		<div style="clear:both"></div>
	</div>
	<?= Html::style('
		.banners {
			margin: 20px 0;
			display: none;
		}
		.banner_two .banner_l_top {
		    float: left;
		    height: 500px;
		    overflow: hidden;
		    position: relative;
		    width: 590px;
		}
		.banner_two .banner_l_top .link_ad {
		    height: 500px;
		}
		.banner_two a {
		    display: block;
		    font-size: 0;
		    height: 500px;
		    overflow: hidden;
		}
		.banner_two img {
		    display: block;
		    height: 500px;
		    width: 590px;
		}
		img {
		    border: none;
		}
		.banner_two .banner_r_top {
		    float: right;
		    height: 500px;
		    overflow: hidden;
		    position: relative;
		    width: 590px;
		}
    ') 
    ?>
</div>

<div class="popular_server">
	<div class="featured">
		<h3>原象精选</h3>
		<h5>
			<a href="#">更多</a>
		</h5>
	</div>
	<!-- 商家 -->
	<div class="rows">
		<div class="store">
			<div class="store_one">
				<div style="text-align: center;">
					<a href="#">
						<?= Html::img('@web/static/img/store1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹家政</h3>
					<span>服务优先服务优先服务优先服务优先服务优先服</span>
				</div>
				<div style="text-align: center;">
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="store">
			<div class="store_one">
				<div style="text-align: center;">
					<a href="#">
						<?= Html::img('@web/static/img/store1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹家政</h3>
					<span>服务优先服务优先服务优先服务优先服务优先服</span>
				</div>
				<div style="text-align: center;">
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="store">
			<div class="store_one">
				<div style="text-align: center;">
					<a href="#">
						<?= Html::img('@web/static/img/store1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹家政</h3>
					<span>服务优先服务优先服务优先服务优先服务优先服</span>
				</div>
				<div style="text-align: center;">
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="store">
			<div class="store_one">
				<div style="text-align: center;">
					<a href="#">
						<?= Html::img('@web/static/img/store1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹家政</h3>
					<span>服务至上</span>
				</div>
				<div style="text-align: center;">
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
	</div>
	<!-- 服务人员 -->
	<div class="rows">
		<div class="staff">
			<div style="height: 100%;margin: 5px;padding: 5px;border: 1px solid #eee;display: flex;">
				<div style="text-align: center;width: 40%;">
					<a href="#">
						<?= Html::img('@web/static/img/staff1.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;width: 60%;">
					<h4>黄小妹家政</h4>
					<p>服务优先服务优先服务优先</p>
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="staff">
			<div style="height: 100%;margin: 5px;padding: 5px;border: 1px solid #eee;display: flex;">
				<div style="text-align: center;width: 40%;">
					<a href="#">
						<?= Html::img('@web/static/img/staff1.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;width: 60%;">
					<h4>黄小妹家政</h4>
					<p>服务优先服务优先服务优先</p>
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="staff">
			<div style="height: 100%;margin: 5px;padding: 5px;border: 1px solid #eee;display: flex;">
				<div style="text-align: center;width: 40%;">
					<a href="#">
						<?= Html::img('@web/static/img/staff1.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;width: 60%;">
					<h4>黄小妹家政</h4>
					<p>服务优先服务优先服务优先</p>
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="staff">
			<div style="height: 100%;margin: 5px;padding: 5px;border: 1px solid #eee;display: flex;">
				<div style="text-align: center;width: 40%;">
					<a href="#">
						<?= Html::img('@web/static/img/staff1.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;width: 60%;">
					<h4>黄小妹家政</h4>
					<p>服务优先服务优先服务优先</p>
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
	</div>
	<?= Html::style('
		.popular_server {
			margin-bottom: 50px;
		}
		.popular_server .featured {
			border-bottom: 2px solid;
    		height: 60px;
		}
		.popular_server .featured h3 {
			float: left;
		}
		.popular_server .featured h5 {
			float: right;
		    margin-top: 40px;
		    margin-right: 10px;
		}
		.rows {
			margin-top: 20px;
			margin-right: 0px;
			margin-left: 0px;
			display: flex;
		}
		.popular_server .store {
			height: 300px;
			width: 25%;
			margin: 0;
    		padding: 0;
		}
		.popular_server .store .store_one {
			height: 100%;
			margin: 5px;
			padding: 5px;
			border: 1px solid #eee;
		}
		.popular_server .store img {
			width: 250px;
    		height: 160px;
		}
		.popular_server .staff {
			height: 105px;
			width: 25%;
			margin: 0;
    		padding: 0;
		}
		.popular_server .staff h4,.popular_server .staff p {
			margin-top: 4px!important;
			margin-bottom: 4px!important;
		}
	')
	?>
</div>

<div class="popular_server">
	<div class="featured">
		<h3>清洁</h3>
		<h5>
			<a href="#">更多</a>
		</h5>
	</div>
	<!-- 商家 -->
	<div class="row rows">
		<div class="col-lg-3 store">
			<div class="store_one">
				<div style="text-align: center;">
					<a href="#">
						<?= Html::img('@web/static/img/store1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹家政</h3>
					<span>服务优先服务优先服务优先服务优先服务优先服</span>
				</div>
				<div style="text-align: center;">
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="col-lg-3 store">
			<div class="store_one">
				<div style="text-align: center;">
					<a href="#">
						<?= Html::img('@web/static/img/store1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹家政</h3>
					<span>服务优先服务优先服务优先服务优先服务优先服</span>
				</div>
				<div style="text-align: center;">
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="col-lg-3 store">
			<div class="store_one">
				<div style="text-align: center;">
					<a href="#">
						<?= Html::img('@web/static/img/store1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹家政</h3>
					<span>服务优先服务优先服务优先服务优先服务优先服</span>
				</div>
				<div style="text-align: center;">
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="col-lg-3 store">
			<div class="store_one">
				<div style="text-align: center;">
					<a href="#">
						<?= Html::img('@web/static/img/store1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹家政</h3>
					<span>服务至上</span>
				</div>
				<div style="text-align: center;">
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
	</div>
	<!-- 服务人员 -->
	<div class="row rows">
		<div class="col-lg-3 staff">
			<div style="height: 100%;margin: 5px;padding: 5px;border: 1px solid #eee;display: flex;">
				<div style="text-align: center;width: 40%;">
					<a href="#">
						<?= Html::img('@web/static/img/staff1.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;width: 60%;">
					<h4>黄小妹家政</h4>
					<p>服务优先服务优先服务优先</p>
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="col-lg-3 staff">
			<div style="height: 100%;margin: 5px;padding: 5px;border: 1px solid #eee;display: flex;">
				<div style="text-align: center;width: 40%;">
					<a href="#">
						<?= Html::img('@web/static/img/staff1.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;width: 60%;">
					<h4>黄小妹家政</h4>
					<p>服务优先服务优先服务优先</p>
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="col-lg-3 staff">
			<div style="height: 100%;margin: 5px;padding: 5px;border: 1px solid #eee;display: flex;">
				<div style="text-align: center;width: 40%;">
					<a href="#">
						<?= Html::img('@web/static/img/staff1.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;width: 60%;">
					<h4>黄小妹家政</h4>
					<p>服务优先服务优先服务优先</p>
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="col-lg-3 staff">
			<div style="height: 100%;margin: 5px;padding: 5px;border: 1px solid #eee;display: flex;">
				<div style="text-align: center;width: 40%;">
					<a href="#">
						<?= Html::img('@web/static/img/staff1.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;width: 60%;">
					<h4>黄小妹家政</h4>
					<p>服务优先服务优先服务优先</p>
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
	</div>
	<?= Html::style('
		.popular_server {
			margin-bottom: 50px;
		}
		.popular_server .featured {
			border-bottom: 2px solid;
    		height: 60px;
		}
		.popular_server .featured h3 {
			float: left;
		}
		.popular_server .featured h5 {
			float: right;
		    margin-top: 40px;
		    margin-right: 10px;
		}
		.rows {
			margin-top: 20px;
			margin-right: 0px;
			margin-left: 0px;
		}
		.popular_server .store {
			height: 300px;
			margin: 0;
    		padding: 0;
		}
		.popular_server .store img {
			width: 250px;
    		height: 160px;
		}
		.popular_server .staff {
			height: 105px;
			margin: 0;
    		padding: 0;
		}
		.popular_server .staff h4,.popular_server .staff p {
			margin-top: 4px!important;
			margin-bottom: 4px!important;
		}
	')
	?>
</div>

<div class="popular_server">
	<div class="featured">
		<h3>月嫂</h3>
		<h5>
			<a href="#">更多</a>
		</h5>
	</div>
	<!-- 商家 -->
	<div class="row rows">
		<div class="col-lg-3 store">
			<div class="store_one">
				<div style="text-align: center;">
					<a href="#">
						<?= Html::img('@web/static/img/store1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹家政</h3>
					<span>服务优先服务优先服务优先服务优先服务优先服</span>
				</div>
				<div style="text-align: center;">
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="col-lg-3 store">
			<div class="store_one">
				<div style="text-align: center;">
					<a href="#">
						<?= Html::img('@web/static/img/store1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹家政</h3>
					<span>服务优先服务优先服务优先服务优先服务优先服</span>
				</div>
				<div style="text-align: center;">
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="col-lg-3 store">
			<div class="store_one">
				<div style="text-align: center;">
					<a href="#">
						<?= Html::img('@web/static/img/store1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹家政</h3>
					<span>服务优先服务优先服务优先服务优先服务优先服</span>
				</div>
				<div style="text-align: center;">
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="col-lg-3 store">
			<div class="store_one">
				<div style="text-align: center;">
					<a href="#">
						<?= Html::img('@web/static/img/store1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹家政</h3>
					<span>服务至上</span>
				</div>
				<div style="text-align: center;">
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
	</div>
	<!-- 服务人员 -->
	<div class="row rows">
		<div class="col-lg-3 staff">
			<div style="height: 100%;margin: 5px;padding: 5px;border: 1px solid #eee;display: flex;">
				<div style="text-align: center;width: 40%;">
					<a href="#">
						<?= Html::img('@web/static/img/staff1.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;width: 60%;">
					<h4>黄小妹家政</h4>
					<p>服务优先服务优先服务优先</p>
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="col-lg-3 staff">
			<div style="height: 100%;margin: 5px;padding: 5px;border: 1px solid #eee;display: flex;">
				<div style="text-align: center;width: 40%;">
					<a href="#">
						<?= Html::img('@web/static/img/staff1.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;width: 60%;">
					<h4>黄小妹家政</h4>
					<p>服务优先服务优先服务优先</p>
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="col-lg-3 staff">
			<div style="height: 100%;margin: 5px;padding: 5px;border: 1px solid #eee;display: flex;">
				<div style="text-align: center;width: 40%;">
					<a href="#">
						<?= Html::img('@web/static/img/staff1.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;width: 60%;">
					<h4>黄小妹家政</h4>
					<p>服务优先服务优先服务优先</p>
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
		<div class="col-lg-3 staff">
			<div style="height: 100%;margin: 5px;padding: 5px;border: 1px solid #eee;display: flex;">
				<div style="text-align: center;width: 40%;">
					<a href="#">
						<?= Html::img('@web/static/img/staff1.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;width: 60%;">
					<h4>黄小妹家政</h4>
					<p>服务优先服务优先服务优先</p>
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
	</div>
	<?= Html::style('
		.popular_server {
			margin-bottom: 50px;
		}
		.popular_server .featured {
			border-bottom: 2px solid;
    		height: 60px;
		}
		.popular_server .featured h3 {
			float: left;
		}
		.popular_server .featured h5 {
			float: right;
		    margin-top: 40px;
		    margin-right: 10px;
		}
		.rows {
			margin-top: 20px;
			margin-right: 0px;
			margin-left: 0px;
		}
		.popular_server .store {
			height: 300px;
			margin: 0;
    		padding: 0;
		}
		.popular_server .store img {
			width: 250px;
    		height: 160px;
		}
		.popular_server .staff {
			height: 105px;
			margin: 0;
    		padding: 0;
		}
		.popular_server .staff h4,.popular_server .staff p {
			margin-top: 4px!important;
			margin-bottom: 4px!important;
		}
	')
	?>
</div>
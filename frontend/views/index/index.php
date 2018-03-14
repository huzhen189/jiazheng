<?php
	use yii\helpers\Html;
	use yii\bootstrap\Carousel;
?>
<!-- 二级菜单、轮播、登陆 -->
<?= Html::cssFile('static/css/index.css') ?>
<div class="container-header">
	<div class="menu_2">
		<nav>
			<ul>
				<li>
					<a href="#">基础保洁</a> / 
					<a href="#">深度保洁</a>
				</li>
				<li>
					<a href="#">长期/周期保洁</a> /
					<a href="#">新居开荒</a>
				</li>
				<li>
					<a href="#">厨房保养</a> /
					<a href="#">卫生间保养</a>
				</li>
				<li>
					<a href="#">擦玻璃</a> /
					<a href="#">油烟机清洗</a>
				</li>
				<li>
					<a href="#">灶台清洗</a>  /
					<a href="#">热水器清洗</a>
				</li>
				<li>
					<a href="#">电烤箱清洗</a> /
					<a href="#">微波炉清洗</a> 
				</li>
				<li>
					<a href="#">消毒柜清洗</a> /
					<a href="#">洗衣机清洗</a>
				</li>
				<li>
					<a href="#">冰箱清洗</a> /
					<a href="#">空调清洗</a> 
				</li>
				<li>
					<a href="#">饮水机清洗</a> /
					<a href="#">除螨</a>
				</li>
				<li>
					<a href="#">沙发保养</a> /
					<a href="#">地板打蜡</a>
				</li>
				<li>
					<a href="#">住家保姆</a> /
					<a href="#">不住家保姆</a>
				</li>
				<li>
					<a href="#">老人陪护</a> /
					<a href="#">长期做饭</a>
				</li>
				<li>
					<a href="#">固定钟点工</a> /
					<a href="#">月嫂</a>
				</li>
				<li>
					<a href="#">育儿嫂</a> /
					<a href="#">管道疏通</a>
				</li>
				<li>
					<a href="#">空调加氟</a> /
					<a href="#">空调维修</a>
				</li>
				<li>
					<a href="#">马桶维修</a> /
					<a href="#">水龙头更换</a>
				</li>
				<li>
					<a href="#">冰箱维修</a> /
					<a href="#">油烟机维修</a>
				</li>
				<li>
					<a href="#">热水器维修</a> /
					<a href="#">洗衣机维修</a>
				</li>
				<li>
					<a href="#">微波炉维修</a> /
					<a href="#">电视机维修</a>
				</li>
				<li>
					<a href="#">电路维修</a> /
					<a href="#">普通门开锁</a>
				</li>
				<li>
					<a href="#">球锁更换</a> /
					<a href="#">撞锁更换</a>
				</li>
				<li>
					<a href="#">执手锁更换</a> /
					<a href="#">防盗门开锁</a>
				</li>
				<li>
					<a href="#">防盗门A级锁芯更换</a>
				</li>
				<li>
					<a href="#">防盗门B级锁芯更换</a>
				</li>
				<li>
					<a href="#">防盗门C级锁芯更换</a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="carous">
		<?php echo Carousel::widget([
		    'items' => [
		        [
		        	'content' => '<img src="static/img/carousel_1.jpg" style="height:480px;width:800px"/>',
		        	'caption' => '<h4>保洁</h4><p>爱家就要经常清洁它</p>',
		        ],
		        [
		        	'content' => '<img src="static/img/carousel_2.jpg" style="height:480px;width:800px"/>',
		        	'caption' => '<h4>保姆</h4><p>照顾家的好帮手</p>',
		        ],
		        // 包含图片和字幕的格式
		        [
		            'content' => '<img src="static/img/carousel_3.jpg" style="height:480px;width:800px"/>',
		            'caption' => '<h4>This is title</h4><p>This is the caption text</p>',
		            //'options' => ['style:height:600px,width:1200px'],       //配置对应的样式
		        ],
		    ]
		]);
	    ?>
	</div>
	<div class="login">
    <div style="padding: 20px 10px 20px 10px;border: 1px solid rgb(172, 30, 35);-webkit-box-shadow: 0 1px 6px rgb(172, 30, 35);box-shadow: 0 1px 6px rgb(172, 30, 35);border-radius: 5px;">
    	<div>
    		<img src="//wwc.alicdn.com/avatar/getAvatar.do?userNick=幼稚完后&width=50&height=50&type=sns&_input_charset=UTF-8" />
    	</div>
        <div style="margin-top:10px;margin-bottom:10px;">
               <span style="color: rgb(172, 30, 35);">hello!你好</span>
        </div>
    	<div style="display: flex;flex-direction: row;justify-content: space-around;">
                <button class="btn btn-info btn-sm">注册</button>
    		<button class="btn btn-info btn-sm">登陆</button>
    		<button class="btn btn-warning btn-sm">入驻</button>
    	</div>
    </div>
</div>
</div>
<!-- 精选商检 -->
<div class="popular_server">
	<div class="featured">
		<h3>精选商家</h3>
		<h5>
		     <a href="#" style="color: rgb(172, 30, 35);">更多</a>
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
</div>
<!-- 精选服务 -->
<div class="popular_server">
	<div class="featured">
		<h3>精选服务</h3>
		<h5>
			<a href="#" style="color: rgb(172, 30, 35);">更多</a>
		</h5>
	</div>
	<!-- 服务人员 -->
	<div class="rows">
		<div class="store">
			<div class="store_one">
				<div style="text-align: center;">
					<a href="#">
						<?= Html::img('@web/static/img/user.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹</h3>
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
						<?= Html::img('@web/static/img/user.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹</h3>
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
						<?= Html::img('@web/static/img/user.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹</h3>
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
						<?= Html::img('@web/static/img/user.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹</h3>
					<span>服务至上</span>
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
						<?= Html::img('@web/static/img/user.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹</h3>
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
						<?= Html::img('@web/static/img/user.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹</h3>
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
						<?= Html::img('@web/static/img/user.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹</h3>
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
						<?= Html::img('@web/static/img/user.jpg', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
					</a>
				</div>
				<div style="margin: 0 11px;height: 76px;">
					<h3>黄小妹</h3>
					<span>服务至上</span>
				</div>
				<div style="text-align: center;">
					<button class="btn btn-primary">查看详情</button>
				</div>
			</div>
		</div>
	</div>
</div>

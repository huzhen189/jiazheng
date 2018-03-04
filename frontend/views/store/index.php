<?php
	use yii\helpers\Html;
?>

<div class="store_detail">
	<div class="store_info">
		<div style="text-align: center;">
			<h3>商家详情</h3>
		</div>
		<div>
			<p><b>简介：</b>本公司是一个拥有上千优秀的服务人员，一直本着服务的态度而立足于行业中。</p>
		</div>
		<div>
			<h4><b>公司执照：</b></h4>
			<?= Html::a('<img src="/static/img/license.jpg" style="width: 230px;height: 180px;margin-left: 3px;" />', ['store/license'], ['class' => 'profile-link','style' => 'text-align: center;']); ?>
		</div>
		<div>
			<h4><b>相似商家：</b></h4>
			<div class="other_store">
				<img src="/static/img/store1.png" />
				<div>
					<h5><b>黄小妹家政</b></h5>
					<p title="本公司是一个拥有上千优秀的服务人员，一直本着服务的态度而立足于行业中。">本公司是一个拥有上千优秀的服务人员</p>
				</div>
			</div>
			<div class="other_store">
				<img src="/static/img/store1.png" />
				<div>
					<h5><b>黄小妹家政</b></h5>
					<p title="本公司是一个拥有上千优秀的服务人员，一直本着服务的态度而立足于行业中。">本公司是一个拥有上千优秀的服务人员</p>
				</div>
			</div>
			<div class="other_store">
				<img src="/static/img/store1.png" />
				<div>
					<h5><b>黄小妹家政</b></h5>
					<p title="本公司是一个拥有上千优秀的服务人员，一直本着服务的态度而立足于行业中。">本公司是一个拥有上千优秀的服务人员</p>
				</div>
			</div>
			<div class="other_store">
				<img src="/static/img/store1.png" />
				<div>
					<h5><b>黄小妹家政</b></h5>
					<p title="本公司是一个拥有上千优秀的服务人员，一直本着服务的态度而立足于行业中。">本公司是一个拥有上千优秀的服务人员</p>
				</div>
			</div>
		</div>
	</div>
	<div class="store_pro">
		<div class="selector">
			<div class="selector_child">
				<a href="#" class="btn btn-link">评分</a>
				<a href="#" class="btn btn-link">销量</a>
				<a href="#" class="btn btn-link">价格</a>
			</div>
			<div class="selector_child">
				<input type="number" style="width:50px;" placeholder="低">&nbsp;- &nbsp;
				<input type="number" style="width:50px;" placeholder="高">
				<a href="#" class="btn btn-primar" style="border-left: 1px solid #dcd7d7">确定</a>
			</div>
			<div class="selector_child">
				<input list="companys" style="width:100px;" placeholder="服务类型"/>
				<datalist id="companys">
				  <option value="基础保洁">
				  <option value="长期/周期保洁">
				  <option value="深度保洁">
				  <option value="厨房保养">
				  <option value="卫生间保养">
				  <option value="擦玻璃">
				  <option value="油烟机清洗">
				  <option value="灶台清洗">
				  <option value="电烤箱清洗">
				  <option value="微波炉清洗">
				  <option value="消毒柜清洗">
				  <option value="洗衣机清洗">
				  <option value="空调清洗">
				  <option value="饮水机清洗">
				  <option value="热水器清洗">
				  <option value="月嫂">
				  <option value="育儿嫂">
				  <option value="擦玻璃">
				</datalist>
				<a href="#" class="btn btn-primar" style="border-left: 1px solid #dcd7d7">确定</a>
			</div>
		</div>
		<div class="content">
			<div class="rows">
				<div class="staff">
					<div class="staff_one">
						<div style="text-align: center;">
							<a href="#">
								<?= Html::img('@web/static/img/staff1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
							</a>
						</div>
						<div style="margin: 0 11px;height: 100px;">
							<h3>易棵松</h3>
							<span><b title="服务类型：管道疏通、空调维修、空调加氟、马桶维修、水龙头更换、冰箱维修、油烟机维修">服务类型：</b>管道疏通、空调维修、空调加氟、马桶维修、水龙头更换、冰箱维修、油烟...</span>
						</div>
						<div style="text-align: center;">
							<button class="btn btn-primary">查看详情</button>
						</div>
					</div>
				</div>
				<div class="staff">
					<div class="staff_one">
						<div style="text-align: center;">
							<a href="#">
								<?= Html::img('@web/static/img/staff1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
							</a>
						</div>
						<div style="margin: 0 11px;height: 100px;">
							<h3>胡振</h3>
							<span><b title="普通门开锁、球锁更换、撞锁更换、执手锁更换、防盗门开锁、防盗门A级锁芯更换、防盗门B级锁芯更换、防盗门C级锁芯更换">服务类型：</b>普通门开锁、球锁更换、撞锁更换、执手锁更换、防盗门开...</span>
						</div>
						<div style="text-align: center;">
							<button class="btn btn-primary">查看详情</button>
						</div>
					</div>
				</div>
				<div class="staff">
					<div class="staff_one">
						<div style="text-align: center;">
							<a href="#">
								<?= Html::img('@web/static/img/staff1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
							</a>
						</div>
						<div style="margin: 0 11px;height: 100px;">
							<h3>杨兴耀</h3>
							<span><b title="油烟机清洗、灶台清洗、电烤箱清洗、微波炉清洗、消毒柜清洗、洗衣机清洗、冰箱清洗、空调清洗、饮水机清洗、热水器清洗">服务类型：</b>油烟机清洗、灶台清洗、电烤箱清洗、微波炉清...</span>
						</div>
						<div style="text-align: center;">
							<button class="btn btn-primary">查看详情</button>
						</div>
					</div>
				</div>
				<div class="staff">
					<div class="staff_one">
						<div style="text-align: center;">
							<a href="#">
								<?= Html::img('@web/static/img/staff1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
							</a>
						</div>
						<div style="margin: 0 11px;height: 100px;">
							<h3>陆正茂</h3>
							<span><b title="基础保洁、长期/周期保洁、深度保洁、新居开荒、厨房保养、卫生间保养、擦玻璃">服务类型：</b>基础保洁、长期/周期保洁、深度保洁、新居开荒、厨房...</span>
						</div>
						<div style="text-align: center;">
							<button class="btn btn-primary">查看详情</button>
						</div>
					</div>
				</div>
			</div>
			<div class="rows">
				<div class="staff">
					<div class="staff_one">
						<div style="text-align: center;">
							<a href="#">
								<?= Html::img('@web/static/img/staff1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
							</a>
						</div>
						<div style="margin: 0 11px;height: 100px;">
							<h3>易棵松</h3>
							<span><b title="服务类型：管道疏通、空调维修、空调加氟、马桶维修、水龙头更换、冰箱维修、油烟机维修">服务类型：</b>管道疏通、空调维修、空调加氟、马桶维修、水龙头更换、冰箱维修、油烟...</span>
						</div>
						<div style="text-align: center;">
							<button class="btn btn-primary">查看详情</button>
						</div>
					</div>
				</div>
				<div class="staff">
					<div class="staff_one">
						<div style="text-align: center;">
							<a href="#">
								<?= Html::img('@web/static/img/staff1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
							</a>
						</div>
						<div style="margin: 0 11px;height: 100px;">
							<h3>胡振</h3>
							<span><b title="普通门开锁、球锁更换、撞锁更换、执手锁更换、防盗门开锁、防盗门A级锁芯更换、防盗门B级锁芯更换、防盗门C级锁芯更换">服务类型：</b>普通门开锁、球锁更换、撞锁更换、执手锁更换、防盗门开...</span>
						</div>
						<div style="text-align: center;">
							<button class="btn btn-primary">查看详情</button>
						</div>
					</div>
				</div>
				<div class="staff">
					<div class="staff_one">
						<div style="text-align: center;">
							<a href="#">
								<?= Html::img('@web/static/img/staff1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
							</a>
						</div>
						<div style="margin: 0 11px;height: 100px;">
							<h3>杨兴耀</h3>
							<span><b title="油烟机清洗、灶台清洗、电烤箱清洗、微波炉清洗、消毒柜清洗、洗衣机清洗、冰箱清洗、空调清洗、饮水机清洗、热水器清洗">服务类型：</b>油烟机清洗、灶台清洗、电烤箱清洗、微波炉清...</span>
						</div>
						<div style="text-align: center;">
							<button class="btn btn-primary">查看详情</button>
						</div>
					</div>
				</div>
				<div class="staff">
					<div class="staff_one">
						<div style="text-align: center;">
							<a href="#">
								<?= Html::img('@web/static/img/staff1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
							</a>
						</div>
						<div style="margin: 0 11px;height: 100px;">
							<h3>陆正茂</h3>
							<span><b title="基础保洁、长期/周期保洁、深度保洁、新居开荒、厨房保养、卫生间保养、擦玻璃">服务类型：</b>基础保洁、长期/周期保洁、深度保洁、新居开荒、厨房...</span>
						</div>
						<div style="text-align: center;">
							<button class="btn btn-primary">查看详情</button>
						</div>
					</div>
				</div>
			</div>
			<div class="rows">
				<div class="staff">
					<div class="staff_one">
						<div style="text-align: center;">
							<a href="#">
								<?= Html::img('@web/static/img/staff1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
							</a>
						</div>
						<div style="margin: 0 11px;height: 100px;">
							<h3>易棵松</h3>
							<span><b title="服务类型：管道疏通、空调维修、空调加氟、马桶维修、水龙头更换、冰箱维修、油烟机维修">服务类型：</b>管道疏通、空调维修、空调加氟、马桶维修、水龙头更换、冰箱维修、油烟...</span>
						</div>
						<div style="text-align: center;">
							<button class="btn btn-primary">查看详情</button>
						</div>
					</div>
				</div>
				<div class="staff">
					<div class="staff_one">
						<div style="text-align: center;">
							<a href="#">
								<?= Html::img('@web/static/img/staff1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
							</a>
						</div>
						<div style="margin: 0 11px;height: 100px;">
							<h3>胡振</h3>
							<span><b title="普通门开锁、球锁更换、撞锁更换、执手锁更换、防盗门开锁、防盗门A级锁芯更换、防盗门B级锁芯更换、防盗门C级锁芯更换">服务类型：</b>普通门开锁、球锁更换、撞锁更换、执手锁更换、防盗门开...</span>
						</div>
						<div style="text-align: center;">
							<button class="btn btn-primary">查看详情</button>
						</div>
					</div>
				</div>
				<div class="staff">
					<div class="staff_one">
						<div style="text-align: center;">
							<a href="#">
								<?= Html::img('@web/static/img/staff1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
							</a>
						</div>
						<div style="margin: 0 11px;height: 100px;">
							<h3>杨兴耀</h3>
							<span><b title="油烟机清洗、灶台清洗、电烤箱清洗、微波炉清洗、消毒柜清洗、洗衣机清洗、冰箱清洗、空调清洗、饮水机清洗、热水器清洗">服务类型：</b>油烟机清洗、灶台清洗、电烤箱清洗、微波炉清...</span>
						</div>
						<div style="text-align: center;">
							<button class="btn btn-primary">查看详情</button>
						</div>
					</div>
				</div>
				<div class="staff">
					<div class="staff_one">
						<div style="text-align: center;">
							<a href="#">
								<?= Html::img('@web/static/img/staff1.png', ['alt' => 'My logo',"class"=>"img-thumbnail"]) ?>
							</a>
						</div>
						<div style="margin: 0 11px;height: 100px;">
							<h3>陆正茂</h3>
							<span><b title="基础保洁、长期/周期保洁、深度保洁、新居开荒、厨房保养、卫生间保养、擦玻璃">服务类型：</b>基础保洁、长期/周期保洁、深度保洁、新居开荒、厨房...</span>
						</div>
						<div style="text-align: center;">
							<button class="btn btn-primary">查看详情</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?= Html::style('
		.store_detail {
			display: flex;
			width: 100%;
			margin-top: 20px;
		}
		.store_info {
			width: 20%;
			padding-left: 5px;
			padding-right: 5px;
			border: 1px solid #eee;
		}
		.store_info .other_store {
			padding: 10px 0;
			display: flex;
			border-bottom: 1px solid #eee;
		}
		.store_info .other_store img {
			width: 120px;
			height: 100px;
		}
		.store_pro {
			width: 80%;
			border: 1px solid #eee;
		}
		.store_pro .selector {
			height: 40px;
			display: flex;
			align-items: center;
			border-bottom: 1px solid #eee;
		}
		.store_pro .selector .selector_child {
			margin-left: 20px;
			border: 1px solid #dcd7d7;
			border-radius: 4px;
			display: flex;
			align-items: center;
		}
		.store_pro .selector .selector_child input {
			height: 22px;
			padding: 0 5px;
			border: none;
		}
		.store_pro .selector a {
			padding: 2px 10px;
		    border: none;
		    margin-left: -3px;
		}
		.content .rows {
			margin-right: 0px;
			margin-left: 0px;
			margin-bottom: 30px;
			display: flex;
		}
		.content .staff {
			height: 280px;
			width: 25%;
			margin: 0;
    		padding: 0;
		}
		.content .staff .staff_one {
			height: 100%;
			margin: 5px;
			padding: 5px;
			border: 1px solid #eee;
		}
		.content .staff img {
			width: 200px;
    		height: 110px;
		}
	')?>
</div>

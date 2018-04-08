<?php
	use yii\helpers\Html;
	use yii\widgets\LinkPager;
	use common\models\YxStaff;
	$sortText = '排序';
?>

<?= Html::cssFile('/static/css/store.css') ?>

<div class="store-detail">
	<div class="store-info">
		<div style="text-align: center;">
			<h3>商家详情</h3>
		</div>
		<div>
			<p><b>简介：</b>本公司是一个拥有上千优秀的服务人员，一直本着服务的态度而立足于行业中。</p>
		</div>
		<div>
			<h4><b>相似商家：</b></h4>
			<?php foreach ($recommendArr as $value): ?>
				<div class="other-store">
					<img src="/static/img/staff/staff1.jpg" />
					<div class="other-store-info">
						<h5><a href="/company/staff?company=<?= $value['id'] ?>" title="<?= $value['name'] ?>"><?= $value['name'] ?></a></h5>
						<p title="<?= $value['introduction'] ?>"><?= $value['introduction'] ?></p>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>
	<div class="store-pro">
		<div class="store-condition">
			<div class="condition-row">
				<div class="condition-inner">
					<div class="condition-left">
						<ul>
							<li class="<?php if($sort == 'default'){
								echo "active";
							}?>">
								<a href="?server_id=<?= $serverId?>&company_id=<?= $companyId?>&sort=default">默认<?php if($sort == 'default'){
										echo $sortText;
									}?></a>
							</li>
							<li class="<?php if($sort == 'fraction'){
								echo "active";
								}?>">
								<a href="?server_id=<?= $serverId?>&company_id=<?= $companyId?>&sort=fraction">分数<?php if($sort == 'fraction'){
										echo $sortText;
								}?></a>
							</li>
							<li class="<?php if($sort == 'price'){
								echo "active";
								}?>">
								<a href="?server_id=<?= $serverId?>&company_id=<?= $companyId?>&sort=price">价格<?php if($sort == 'price'){
										echo $sortText;
								}?></a>
							</li>
						</ul>
					</div>
					<div class="condition-right">
						<ul>
							<li>
								<?php
										echo '<a href="/company/index?server_id='.$serverId.'company_id='.$companyId.'&sort=default" class="header-title">商家详情</a>';
								?>
							</li>
							<li class="active">
								<a href="#">服务者</a>
							</li>
							</li>
							<li>
								<a href="#">信息攻略</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="select-server">
				<div class="selector-child">
					服务类型：<input list="companys" style="width:100px;" placeholder="服务类型"/>
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
				</div>
			</div>
		</div>


		<div class="content">
			<div class="row">
				<?php foreach ($models as $model): ?>
				<div class="staff col-xs-3 col-sm-3">
					<div class="staff-one">
						<div class="img">
							<img class="img-thumbnail" src="<?= $model->staff_img ?>" >
						</div>
						<h3><?= $model->staff_name ?></h3>
						<div class="staff-info">
							<div>价格: <?= $model->staff_fraction ?>元</div>
							<div>分数: <?= $model->staff_fraction ?></div>
							<div class="staff-servers">主营业务: <?= YxStaff::getServerName($model->staff_id) ?></div>
							<div class="see-details">
								<a href="/staff/index?staff_id=<?= $model->staff_id ?>" target="_blank">查看详情</a>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="page">
			<?php echo LinkPager::widget([
				'pagination' => $pages,
				'nextPageLabel' => '下一页',
				'prevPageLabel' => '上一页',
				'firstPageLabel' => '首页',
		     'lastPageLabel' => '尾页'
			])?>
		</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	window.onload = function() {
		$(".staff-one").mouseenter(function(){
			$(this).addClass("active");
			$(this).find(".staff-info").addClass("block");
	  });
	  $(".staff-one").mouseleave(function(){
			$(this).removeClass("active");
			$(this).find(".staff-info").removeClass("block");
	  });
	}
</script>

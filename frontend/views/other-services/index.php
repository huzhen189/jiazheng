<!-- 基础保洁的中间部分,分左右两部分，左是商家和服务者详情，右是原象推荐 -->
<?php
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	use yii\bootstrap\dropDownList;
	use yii\widgets\LinkPager;
	$sortText = '排序';
?>

<?= Html::cssFile('/static/css/basic.css') ?>

<div class="basic-store">
	<!-- 商家列表  -->
	<div class="store-list">
		<!-- 商家选项条件 -->
		<div class="store-condition">
			<div class="condition-row">
				<div class="condition-inner">
					<div class="condition-left">
						<ul>
							<li class="<?php if($sort == 'default'){
								echo "active";
							}?>">
								<a href="?server_id=<?= $serverId?>&sort=default">默认<?php if($sort == 'default'){
										echo $sortText;
									}?></a>
							</li>
							<li class="<?php if($sort == 'fraction'){
								echo "active";
								}?>">
								<a href="?server_id=<?= $serverId?>&sort=fraction">分数<?php if($sort == 'fraction'){
										echo $sortText;
								}?></a>
							</li>
							<li class="<?php if($sort == 'price'){
								echo "active";
								}?>">
								<a href="?server_id=<?= $serverId?>&sort=price">价格<?php if($sort == 'price'){
										echo $sortText;
								}?></a>
							</li>
						</ul>
					</div>
					<div class="condition-right">
						<ul>
							<li class="active">
								<a href="#">商家</a>
							</li>
							<li>
								<?php
										echo '<a href="/other-services/staff?server_id='.$serverId.'&sort=default" class="header-title">服务者</a>';
								?>
							</li>
							</li>
							<li>
								<a href="#">我的收藏</a>
							</li>
							<li>
								<a href="#">信息攻略</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="stores">
			<?php foreach ($models as $model): ?>
				<div class="store-one">
						<div class="store-image">
							<img src="<?= $model->image?>" alt="yuanxiang">
						</div>
						<div class="store-detail">
							<h4 title="<?= $model->name?>">
								<?= Html::a(Yii::t('app', $model->name), ['/company/staff', 'server_id'=> $serverId, 'company_id' => $model->id,'sort' => 'default'], []) ?>
							</h4>
			                <p title="<?= $model->address?>">地址：<?= $model->address?></p>
							<p title="<?= $model->total_fraction?>">分数：<?= round($model->total_fraction/1000,1)?></p>
			                <p title="<?= $model->main_server_id?>">业务：<?= $model->main_server_id?></p>
						</div>
						<div class="store-result">
							<img src="/static/img/achievement/achieve1.jpg">
							<img src="/static/img/achievement/achieve1.jpg"">
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

	<div class="recommend"></div>
</div>

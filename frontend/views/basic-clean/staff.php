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
							<li>
								<?php
										echo '<a href="/basic-clean/index?server_id='.$serverId.'&sort=default" class="header-title">商家</a>';
								?>
							</li>
							<li class="active">
								<a href="#">服务者</a>
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

		<div class="staff">
			<?php foreach ($models as $model): ?>
				<div class="staff-one">
					<div class="img">
						<img src="<?= $model->staff_img?>" alg="yuanxiang" />
					</div>
					<div class="name"><?= $model->staff_name?></div>
					<div class="staff-info">
						<div class="price-fraction">
							<div class="fraction">分数：<?= number_format($model->staff_fraction/1000,1)?></div>
						</div>
						<div class="server">主营服务：<?= $model->staff_query?></div>
						<div class="detail">
							<a class="btn btn-url" href="/staff?staff_id=<?= $model->staff_id?>">查看详情</a>
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

	<div class="recommend"></div>
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

<!-- 基础保洁的中间部分,分左右两部分，左是商家和服务者详情，右是原象推荐 -->
<?php
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	use yii\bootstrap\dropDownList;
	use yii\widgets\LinkPager;
	use common\models\YxStaffServer;
	// 信息攻略
	use common\models\YxRules;
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
							<li class="sequence <?php if($sort == 'fraction'){
								echo "active";
								}?>" data-sort="fraction">
								<a href="#">分数<?php if($sort == 'fraction'){
										echo $sortText;
								}?></a>
							</li>
							<li class="sequence <?php if($sort == 'price'){
								echo "active";
								}?>" data-sort="price">
								<a href="#">价格<?php if($sort == 'price'){
										echo $sortText;
								}?></a>
							</li>
						</ul>
					</div>
					<div class="condition-right">
						<ul>
							<li>
								<?php
										echo '<a href="/other-services/index?server_parent='.$serverParent.'&server_id='.$serverId.'&sort=fraction" class="header-title">商家</a>';
								?>
							</li>
							<li class="active">
								<a href="#">服务者</a>
							</li>
							<li>
								<a href="/yx-order/index?yx_user_id=<?php echo Yii::$app->user->id; ?>">我的收藏</a>
							</li>
							<li>
								<a href="/yx-rules/view?id=<?php echo YxRules::getRulesInfo($serverId); ?>">信息攻略</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="address-server-all">
				<div class="server-all">
					服务类型：
					<select class="select-service" style="height: 25px;" server_parent="<?= $serverParent;?>">
						<?php foreach ($YxServerAll as $key => $value): ?>
							<option value="<?= $value['server_id']?>" <?php if ($value['server_id']==$serverId) {
								echo "selected";
							}?>><?= $value['server_name']?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="address">
					服务地域:
					<?php echo $serviceArea;?>

				</div>
			</div>

		</div>

		<div class="staff">
			<?php foreach ($models as $model): ?>
				<div class="staff-one">
					<div class="img">
						<img src="<?= $model->staff_img?>" alg="yuanxiang"/>
					</div>
					<h3 title="<?= $model->staff_name?>"><?= $model->staff_name?></h3>
					<p title="价格: <?=number_format(YxStaffServer::getStaffPrice($model->staff_name,$serverId)/100,2)?>元">价格: <?=number_format(YxStaffServer::getStaffPrice($model->staff_name,$serverId)/100,2)?>元</p>
					<p title="分数：<?= number_format($model->staff_fraction/1000,1)?>">分数：<?= number_format($model->staff_fraction/1000,1)?></p>
					<p title="主营服务：<?= $model->staff_query?>">主营服务：<?= $model->staff_query?></p>
					<div class="staff-info">
						<a href="/staff?staff_id=<?= $model->staff_id?>&server_id=<?= $serverId?>" target="_blank">查看详情</a>
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
	// 判断用户是否登录
	var userIs = <?= $userIs;?>;
	window.onload = function() {
		$(".staff-one").mouseenter(function(){
			$(this).addClass("active");
			$(this).find(".staff-info").addClass("block");
	  });
	  $(".staff-one").mouseleave(function(){
			$(this).removeClass("active");
			$(this).find(".staff-info").removeClass("block");
	  });

		$(".sequence").click(function(event) {
			// 切换服务
			if(userIs == 1) {
				window.location.href = "/other-services/staff?server_parent="+$(".select-service").attr('server_parent')+"&server_id="+$(".select-service option:selected").attr('value')+"&county="+$("#area_list option:selected").attr('value')+"&sort="+$(this).attr('data-sort');
			}else {
				window.location.href = "/other-services/staff?server_parent="+$(".select-service").attr('server_parent')+"&server_id="+$(".select-service option:selected").attr('value')+"&province="+$("#province_list option:selected").attr('value')+"&city="+$("#city_list option:selected").attr('value')+"&sort="+$(this).attr('data-sort');
			}
		});
		$(".select-service").change(function(event) {
			// 切换服务
			if(userIs == 1) {
				window.location.href = "/other-services/staff?server_parent="+$(".select-service").attr('server_parent')+"&server_id="+$(".select-service option:selected").attr('value')+"&county="+$("#area_list option:selected").attr('value')+"&sort=fraction";
			}else {
				window.location.href = "/other-services/staff?server_parent="+$(".select-service").attr('server_parent')+"&server_id="+$(".select-service option:selected").attr('value')+"&province="+$("#province_list option:selected").attr('value')+"&city="+$("#city_list option:selected").attr('value')+"&sort=fraction";
			}

		});
		$("#area_list").change(function(event) {
			// 切换地区
			window.location.href = "/other-services/staff?server_parent="+$(".select-service").attr('server_parent')+"&server_id="+$(".select-service option:selected").attr('value')+"&county="+$("#area_list option:selected").attr('value')+"&sort=fraction";
		});
		$("#province_list").change(function(event) {
			// 切换地区
			window.location.href = "/other-services/staff?server_parent="+$(".select-service").attr('server_parent')+"&server_id="+$(".select-service option:selected").attr('value')+"&province="+$("#province_list option:selected").attr('value')+"&city="+$("#city_list option:selected").attr('value')+"&sort=fraction";
		});
		$("#city_list").change(function(event) {
			// 切换地区
			window.location.href = "/other-services/staff?server_parent="+$(".select-service").attr('server_parent')+"&server_id="+$(".select-service option:selected").attr('value')+"&province="+$("#province_list option:selected").attr('value')+"&city="+$("#city_list option:selected").attr('value')+"&sort=fraction";
		});
	}
</script>

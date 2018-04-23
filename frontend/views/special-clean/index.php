<!-- 基础保洁的中间部分,分左右两部分，左是商家和服务者详情，右是原象推荐 -->
<?php
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	use yii\bootstrap\dropDownList;
	use yii\widgets\LinkPager;

	use common\models\YxCmpServer;
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
							<li class="<?php if($sort == 'fraction'){
								echo "active";
								}?>">
								<a href="?server_parent=<?= $serverParent?>&server_id=<?= $serverId?>&sort=fraction">分数<?php if($sort == 'fraction'){
										echo $sortText;
								}?></a>
							</li>
							<li class="<?php if($sort == 'price'){
								echo "active";
								}?>">
								<a href="?server_parent=<?= $serverParent?>&server_id=<?= $serverId?>&sort=price">价格<?php if($sort == 'price'){
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
								<a href="#">我的收藏</a>
							</li>
							<li>
								<a href="#">信息攻略</a>
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
					<select id="area_list" style="height: 25px;margin: 0 10px;">
						<?php foreach ($countyAll as $key => $value) {
							if($county == $key) {
								echo '<option value="'.$key.'"  selected/>'.$value.'</option>';
								continue;
							}
							echo '<option value="'.$key.'"  />'.$value.'</option>';
						}?>
					</select>
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
								<?= Html::a(Yii::t('app', $model->name), ['/basic-clean/detail', 'company' => $model->id,'server_id' => $serverId], []) ?>
							</h4>
			                <p title="<?= $model->address?>">地址：<?= $model->address?></p>
							<p title="<?= $model->total_fraction?>">分数：<?= number_format($model->total_fraction/1000,1)?></p>
			                <p title="<?= number_format(YxCmpServer::getCompanyPrice($model->id,$serverId)/100,2);?>">价格：<?= number_format(YxCmpServer::getCompanyPrice($model->id,$serverId)/100,2);?></p>
			                <p>最低价格：35元/小时</p>
						</div>
						<div class="store-result">
							<img src="/static/img/achievement/achieve1.jpg" />
							<img src="/static/img/achievement/achieve1.jpg" />
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

	<div class="recommend">

	</div>
</div>

<script type="text/javascript">
	window.onload = function() {
		$(".select-service").change(function(event) {
			// 切换服务
			window.location.href = "/special-clean/index?server_parent="+$(".select-service").attr('server_parent')+"&server_id="+$(".select-service option:selected").attr('value')+"&county="+$("#area_list option:selected").attr('value')+"&sort=fraction";
		});
		$("#area_list").change(function(event) {
			// 切换地区
			window.location.href = "/special-clean/index?server_parent="+$(".select-service").attr('server_parent')+"&server_id="+$(".select-service option:selected").attr('value')+"&county="+$("#area_list option:selected").attr('value')+"&sort=fraction";
		});
	}
</script>

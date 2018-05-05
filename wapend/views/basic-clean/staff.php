<?php
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	use yii\bootstrap\dropDownList;
	use yii\widgets\LinkPager; 
	use common\models\YxServer;
	use common\models\YxStaffServer;
	$sortText = '排序';
?>

<div class="page-container">
		
		<div class="page-index" style="background-color: #f2f2f2;">
			<div class="page-top _orange-red" style="padding-bottom: 5%">
				<div class="search">
					<div class="search-so">
						<input />
						<div class="so-btn" >so</div>
					</div>
				</div>  <!-- top so--> 
				<div class="search-type">
					<div><a href="#">服务者</a><div class="type-now"></div></div>
					<div><a href="<?= '/basic-clean/index?server_parent='.$serverParent.'&server_id='.$serverId.'&sort=fraction'; ?>">商家</a></div>
					<div><a href="#">信息攻略</a></div>
					<div><a href="#">新秀</a></div>
				</div>
			</div> <!-- top -->
			
			<div class="search-list">
				<!-- shaixuan -->
				<div class="sx">
					<div class="sx-btn"><p>广州<span>X</span></p></div>
				</div>
				<!-- tiaojian -->
				<div class="tj">
					<div class="action"><p>评分排序</p></div>
					<div><p>价格排序</p></div>
				</div>

				<?php foreach ($models as $model): ?>
				<a href="/staff?staff_id=<?= $model->staff_id?>&server_id=<?= $serverId ?>">
	  				<div class="search-li" >
	  					<img src="<?= $model->staff_img?>">
	  					<div class="search-li-info">
	  						<p class="search-li-name"><?= $model->staff_name?></p>
	  						<p>主营业务：<?= YxServer::getServerName($model->staff_main_server_id)?></p>
	  					</div>
	  					<div class="search-li-right">
	  						<span><b>¥</b><?=number_format(YxStaffServer::getStaffPrice($model->staff_name,$serverId)/100,2)?></span>
	  						<p><?= number_format($model->staff_fraction/1000,0)?>分</p>
	  					</div>
	  				</div>
  				</a>
  				<?php endforeach; ?>
			</div> 
		</div>
</div>

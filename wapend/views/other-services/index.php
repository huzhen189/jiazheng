<?php
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;
	use yii\bootstrap\dropDownList;
	use yii\widgets\LinkPager;
	use common\models\YxServer;
	use common\models\YxCmpServer;
	$sortText = '排序';
?>

<div class="page-container">
		
		<div class="page-index" style="background-color: #f2f2f2;">
			<div class="page-top _orange-red" style="padding-bottom: 5%">
				 <!-- 弹出服务--> 
				<div class="ui basic modal">
				  <div class="ui icon header">
				    您可以选择一项服务
				  </div>
				  <div class="actions" style="text-align: center;">
				  	<?php foreach ($YxServerAll as $key => $value): ?>
				  	<a href="<?= '/other-services/index?server_parent='.$serverParent.'&server_id='.$value['server_id'].'&sort=fraction'; ?>">
					    <div class="so-server ui ok button <?php if($serverId==$value['server_id']){echo 'orange';}else{echo 'inverted basic';} ?>">
					      <i class="remove icon"></i>
					      <?= $value['server_name']?> 
					    </div>
					</a>
				    <?php endforeach; ?>
				  </div>
				</div>
				 <!-- top so--> 
				<div class="search">
					<div class="search-so">
						<input />
						<div class="so-btn" >so</div>
					</div>
				</div>  <!-- top so--> 
				<div class="search-type">
					<div><a href="<?= '/other-services/staff?server_parent='.$serverParent.'&server_id='.$serverId.'&sort=fraction'; ?>">服务者</a></div>
					<div><a href="#">商家</a><div class="type-now"></div></div>
					<div><a href="#">信息攻略</a></div>
					<div><a href="#">新秀</a></div>
				</div>
			</div> <!-- top -->
			
			<div class="search-list">
				<!-- shaixuan -->
				<div class="sx">
					<div class="sx-btn"><p>广州<span>X</span></p></div>
					<div class="sx-btn" onclick="showModal()"><p><?= YxServer::getServerName($serverId)?><span>X</span></p></div>
				</div>
				<!-- tiaojian -->
				<div class="tj">
					<div class="action"><p>评分排序</p></div>
					<div><p>价格排序</p></div>
				</div>

				<?php foreach ($models as $model): ?>
				<a href="/company/index?company_id=<?= $model->id;?>&server_id=<?= $serverId; ?>">
	  				<div class="search-li li-co" >
	  					<img src="<?= $model->image?>">
	  					<div class="search-li-info">
	  						<p class="search-li-name"><?= $model->name?></p>
	  						<p>地址：<?= $model->address?></p>
	  					</div>
	  					<div class="search-li-right">
	  						<span><b>¥</b><?= number_format(YxCmpServer::getCompanyPrice($model->id,$serverId)/100,2);?></span>
	  						<p><?= number_format($model->total_fraction/1000,1)?>分</p>
	  					</div>
	  				</div>
  				</a>
  				<?php endforeach; ?>
			</div> 
		</div>
</div>
<script type="text/javascript">
		function showModal(){
			$('.ui.basic.modal')
			  .modal('setting', 'closable', false)
			  .modal('show')
			;
		}
		<?php if($serverId){echo 'var ServerId="'.$serverId.'";';}else{echo 'var ServerId="";';}?>
		if(!ServerId){
			showModal();
		}
</script>

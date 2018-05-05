<?php
	use yii\helpers\Html;
	use yii\bootstrap\Tabs;
	use common\models\YxStaff;
	use common\models\YxServer;
	use common\models\YxStaffServer;
	use common\models\Region;
	date_default_timezone_set('PRC');
?>


<div class="page-container page-full">
		<div class="page-index _orange-red" >
			<div class="ui basic modal">
			  <div class="ui icon header">
			    您可以选择一项服务
			  </div>
			  <div class="actions" style="text-align: center;">
			  	<?php foreach ($dataProvider as $key => $value): ?>
			  	<a href="/staff?staff_id=<?= $YxStaff->staff_id;?>&server_id=<?=$value['server_id']; ?>">
				    <div class="btn-staff ui ok button <?php if($serverId==$value['server_id']){echo 'orange';}else{echo 'inverted basic';} ?>">
				      <i class="remove icon"></i>
				      <?= YxServer::getServerName($value['server_id'])?>
				      <span><?= number_format($value['server_price']/100,2);?>元/<?= YxServer::getServerUnit($value['server_id'])?></span>
				    </div>
				</a>
			    <?php endforeach; ?>
			  </div>
			</div>
			<div class="page-top staff-top">
				<div class="left">
					<div class="btn-back" onclick="history.go(-1);"><i class="chevron left icon"></i></div>
				</div>
				<div></div>
			</div>
			<div class="staff-card">
				<div class="staff-info">
					<div class="left"><h3 class="s-name"><?= $YxStaff->staff_name;?></h3>
						<p>						
							<?php if($YxStaff->staff_sex==1) {
									echo '男';
							}else {
								 	echo '女';
							}?>
								
						</p>
					</div>
					<div class="right"><p class="s-where"><?php echo Region::getOneName($YxStaff->staff_province).'人';?></p><p><?= date("Y")-date("Y",$YxStaff->staff_age);?>岁</p></div>
				</div>
				<div class="staff-pic">
					<img class="p-pic" src="static/img/woman.png" >
				</div>
			</div>
			<!-- 服务内容 -->
			<div class="uicard" >
				<div class="uicard-head" onclick="showModal()">已选服务<div class="_orange right btn-info"></div><span>点击重选</span></div>
				<div class="uicard-index">
				<?php foreach ($dataProvider as $key => $value): ?>
						<?php if($serverId==$value['server_id']){ echo YxServer::getServerName($value['server_id']).'<span>'.number_format($value['server_price']/100,2).'元/'. YxServer::getServerUnit($value['server_id']).'</span>';	}?>
				<?php endforeach; ?>
				</div>
				<!-- 附加服务内容 -->
				<?php echo $serverAdd;?>
			</div>
			<!-- 评论区 -->
			<div class="uicard staff-pl ">
				<div class="uicard-head">评分<span><?= number_format($YxStaff->staff_fraction/1000,2);?>分</span></div>
				<div> </div>
				<div class="pl-icons">
					<div class="pl-icon"><div class="_orange">99</div><p>非常满意</p></div>
					<div class="pl-icon"><div class="_orange">99</div><p>满意</p></div>
					<div class="pl-icon"><div class="_orange">99</div><p>一般</p></div>
					<div class="pl-icon"><div class="_orange">99</div><p>不满意</p></div>
				</div>
			</div>
			<!-- 详情区 -->
			<div class="uicard staff-xqs">
				<?php 
				$openStaff = array( 'staff_intro' => '',
									'staff_manage_time' => '1',
									'staff_educate' => '1', 
									'staff_main_server_id' => '1',
									'staff_all_server_id' => '1');
				$openStaffName = YxStaff::attributeLabels();
				foreach ($openStaff as $value=>$function): ?>
				<div class="staff-xq">
					<p class="left"><?= $openStaffName[$value]; ?></p>
					<p class="right">
						<?php if(!$function){ echo $YxStaff->$value;}else{ 
								if($value=='staff_manage_time'){echo YxStaff::getStaffEducateName($YxStaff->$value);}
								if($value=='staff_educate'){echo YxStaff::getStaffTimeName($YxStaff->$value);}
								if($value=='staff_main_server_id'){echo YxStaff::getCmpServerName($YxStaff->$value);}
								if($value=='staff_all_server_id'){echo YxStaff::getAllServer($YxStaff->$value);}
							}
						?></p>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="btn-order-ui">
				<div class="btn-order _orange" onclick="makeOrderBefor()">去下单</div>
				<?php if (YxServer::getReserve($serverId)==1) {
					echo '<div class="btn-order _orange" onclick="makeOrderBefor()">去预约</div>';
				}?>
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

		var yx_staff_id = <?= $YxStaff->staff_id;?>;
		var yx_company_id = <?= $YxStaff->company_id;?>;
		var server_unit = '<?= YxStaffServer::getServerUnit($serverId);?>';
		var order_type = 1;
		var order_server = <?= $serverId;?>

		function makeOrderBefor(){
			$.ajax({
					type  : "POST",
					url   : "/yx-order/create",
					dataType:"json",
					data:{
							"order_server":order_server,
							"yx_company_id":yx_company_id,
							"yx_staff_id":yx_staff_id,
							"start_time":start_time,
							"amount":amount,
							"extra_server":extra_server,
							"order_type":order_type
					},
					success:function(json) {
						if(json.code == -1){
							if(typeof json.msg == "string"){
								alert(json.msg);
							}else {
								for (var i = 0; i < json.msg.length; i++) {
									alert(json.msg[i]);
								}
							}
						}else {
								window.location.href = "/yx-order/payment?id=" + json.order_id;
						}
					}
			});
		}
	</script>
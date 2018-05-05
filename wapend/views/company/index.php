<?php
	use yii\helpers\Html;
	use yii\bootstrap\Tabs;
	use yii\widgets\LinkPager;
  use common\models\YxServer;
  use common\models\YxStaff;
	use common\models\YxStaffServer;
  use common\models\YxCmpServer;
  use common\models\YxCompany;
	// 信息攻略
	use common\models\YxRules;
	$sortText = '排序';
?>

<div class="page-container page-full">
		<div class="page-index _orange-red" >
			<div class="ui basic modal">
			  <div class="ui icon header">
			    您可以选择一项服务
			  </div>
			  <div class="actions" style="text-align: center;">
				  	<?php foreach ($CompanyServerAll as $key => $value): ?>
				  	<a href="<?= '/company/index?company_id='.$companyId.'&server_id='.$key.'&sort=fraction'; ?>">
					    <div class="so-server ui ok button <?php if($serverId==$key){echo 'orange';}else{echo 'inverted basic';} ?>">
					      <i class="remove icon"></i>
					      <?= $value?> 
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
			<div class="uicard">
				<div class="co-pic">
					<img src="<?= $YxCompany->image;?>" >
				</div>
				<div class="co-info">
					<div></div>
					<div></div>
					<div class="co-name"><?= $YxCompany->name;?></div>
					<div class="co-into"><?= $YxCompany->introduction;?></div>
				</div>
			</div>
			<!-- 服务内容 -->
			<div class="uicard" >
				<div class="uicard-head" onclick="showModal()">已选服务<div class="_orange right btn-info"></div><span>点击重选</span></div>
				<div class="uicard-index">
				<?php foreach ($CompanyServerAll as $key => $value): ?>
						<?php if($serverId==$key ){ echo $value.'<span>'.number_format(YxCmpServer::getCompanyPrice($companyId,$serverId)/100,2).'元/'.YxStaffServer::getServerUnit($serverId).'</span>';	}?>
				<?php endforeach; ?>
				</div>
				<!-- 附加服务内容 -->
				<?php echo $serverAdd;?>
			</div>
			<div class="uicard">
				<div class="uicard-head center">
					<div class="co-type">商家详情<div class="type-now"></div></div>
					<div class="co-type">服务者</div>
					<div class="co-type">信息攻略</div>
				</div>
				<div class="uicard-index">
					<?php 
					$openStaff = array( 'address' => '',
										'manage_time' => '',
										'price' => '',
										'created_at' => '');
					$openStaffName = YxCompany::attributeLabels();
					foreach ($openStaff as $value=>$function): ?>
					<div class="staff-xq">
						<p class="left"><?= $openStaffName[$value]; ?></p>
						<p class="right">
							<?php if(!$function){ echo $YxCompany->$value;}else{ 

								}
							?></p>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<!-- 评论区 -->
			
			<!-- 详情区 -->

			<!-- 下单按钮 -->
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
</script>


<div class="store-detail">
	<div class="store-info">
		<div style="text-align: center;">
			<h3>商家详情</h3>
		</div>
		<div>
			<p><b>简介：</b><?= $YxCompany->introduction;?></p>
		</div>
		<div>
			<h4><b>原象推荐：</b></h4>
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
					</div>
					<div class="condition-right">
						<ul>
							<li class="active">
                <a href="#">商家详情</a>
              </li>
							<li>
                <?php
										echo '<a href="/company/staff?server_id='.$serverId.'&company_id='.$companyId.'&sort=fraction" class="header-title">服务者</a>';
								?>
							</li>
							</li>
							<li>
								<a href="/yx-rules/view?id=<?php echo YxRules::getRulesInfo($serverId); ?>">信息攻略</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="select-server">
				<div class="selector-child">
					服务类型：
					<select class="server-type" style="width:100px;height:25px;">
						<?php foreach ($CompanyServerAll as $key => $value) {
							if ($serverId == $key) {
								echo '<option value="'.$key.'" title="'.$value.'" selected>'.$value.'</option>';
							}else {
								echo '<option value="'.$key.'" title="'.$value.'">'.$value.'</option>';
							}
						}?>
					</select>
				</div>
			</div>
		</div>


		<div class="company-info">
    	<div class="company-image-text">
    			<div class="img">
    				<?= Html::img('/static/img/store/store1.jpg', ['alt' => '商家']) ?>
    			</div>
    			<div class="company-detail">
    				<div class="name">
    					<p style="font-size: 30px;"><?= $YxCompany->name;?></p>
    				</div>
    				<div>
    					<p>ID：<?= $YxCompany->number;?></p>
    				</div>
    				<div class="company-detail-text">
    					<div class="first-child">
    						<div class="price">
    							<p>价格：<?= number_format(YxCmpServer::getCompanyPrice($companyId,$serverId)/100,2);?>元/<?=YxStaffServer::getServerUnit($serverId)?></p>
    						</div>
    						<div class="fraction">
    							<p>分数：<?= number_format($YxCompany->total_fraction/1000,2);?>分</p>
    						</div>
    						<div class="server">
    							<p id="server-id" date-id="<?=$serverId?>">服务：<?=YxServer::getServerName($serverId)?></p>
    						</div>
    					</div>
    					<div class="second-child">
    						<div class="business">
    							<p title="主营业务：<?= $YxCompany->query;?>">主营业务：<?= $YxCompany->query;?></p>
    						</div>

    						<div class="address">
    							<p title="地址：<?= $YxCompany->address;?>">地址：<?= $YxCompany->address;?></p>
    						</div>

    					</div>
    				</div>

    				<!-- 附加服务内容 -->
    				<?php echo $serverAdd;?>
    				<!-- 时间表 -->
    				<div style="margin: 5px;">
    					<div class="date-hour">
    						<div class="date-all">
    							<span>上门时间：</span>
    							<select id="order_day" style="height:25px;margin-right:10px;">
    								<?php
    									for ($i=0; $i < 7; $i++) {
    										echo '<option value="'.strtotime(date('Y-m-d',strtotime("+$i day"))).'">'.date('Y-m-d',strtotime("+$i day")).' '.YxStaff::getChineseWeek(date("w",strtotime("+$i day"))).'</option>';
    									}
    								?>
    							</select>
    						</div>

								<div class="hour-no" style="margin-top: 10px;">
									<span>上门时间：</span>
									<select id="hour-time">

									</select>
								</div>
								<div class="hour-no" style="margin-top: 10px;">
									<span>服务：</span>
									<input type="number" id="hour-count" style="width:50px;" value="1" step="1" min="1" />
									<span><?=YxStaffServer::getServerUnit($serverId)?></span>
								</div>
								<div class="hour-is" style="margin-top: 10px;">
									<button class="btn btn-danger disabled">不可选</button>
									<button class="btn btn-defaul">可选</button>
									<button class="btn btn-danger">已选</button>
									<div class="hour-all row" id="time_unit_list">
									</div>
								</div>

    					</div>
    				</div>
    				<!-- 下单、预约 -->
    				<div class="store-order">
    					<button id="order_button" class="btn btn-danger" style="padding: 10px 40px;" onclick="makeOrderBefor()">立即下单</a></button>
    					<?php if (YxServer::getReserve($serverId)==1) {
    						echo '<button id="reserve" class="btn btn-warning" style="padding: 10px 40px;">预约</button>';
    					}?>
    				</div>

    			</div>

    		</div>
		</div>

		<div class="staff-info">
			<?php
			echo Tabs::widget([
				'items' => [
							[
									'label' => '基本信息',
									'content' => $this->render('detail/basic',['YxCompany'=>$YxCompany]),
									'active' => true
							],
							[
									'label' => '成果显示',
									'content' => $this->render('detail/successful-show',['YxCompany'=>$YxCompany]),
							],
							[
									'label' => '评论',
									'content' => $this->render('detail/comment',['comment'=>$comment]),
							],
					],
			]);
			?>
		</div>

	</div>
</div>

<?= Html::style('
	.company-info {
		margin-top: 20px;
	}
  .hour-all.row {
    margin: 10px 0;
  }
  .hour-all.row .hour-one {
    margin-bottom: 10px;
    padding: 0;
  }
') ?>

<script type="text/javascript">
var yx_company_id = <?= $companyId;?>;
var order_server = <?= $serverId;?>;
var server_unit = '<?= YxStaffServer::getServerUnit($serverId);?>';
var order_type = 2;
function makeOrderBefor(){
	var order_day = Number($("#order_day").val());
	var time_unit = [];
	if(isNaN(order_server) || order_server <=0){
		alert("请选择服务~");
		return;
	}
	if(isNaN(order_day) || order_day <=0){
		alert("请选择服务日期~");
		return;
	}
	if(server_unit == "小时") {
		if(!checkTimeSuccessive()){
			return;
		}
		var time_unit_arr = $("#time_unit_list .selected");
		for (var i = 0; i < time_unit_arr.length; i++) {
				time_unit.push(Number($(time_unit_arr[i]).attr("date-time")));
		}
		// 开始时间戳
		var start_time = order_day + time_unit_arr.length*3600;
		// 服务时间
		var amount = time_unit_arr.length;
	}else {
		var hourTime = Number($("#hour-time").find("option:selected").val());
		// 开始时间戳
		var start_time = order_day + hourTime*3600;
		// 服务时间
		var amount = Number($("#hour-count").val());
	}


	// 附加服务
	var extra_server = [];
	var addServer = $(".one-server");
	var server_num,server_seleced;
	for (var i = 0; i < addServer.length; i++) {
		server_seleced = $(addServer[i])[0].querySelector("input");
		server_num = $(addServer[i])[0].querySelector('.server_num input');
		if(server_seleced.checked){
			extra_server.push({
					'id':server_num.getAttribute('serverid'),
					'amount':server_num.value
			})
		}
	}
	console.log(order_server);
	console.log(yx_company_id);
	console.log(start_time);
	console.log(amount);
	console.log(extra_server);
	$.ajax({
			type  : "POST",
			url   : "/yx-order/create",
			dataType:"json",
			data:{
					"order_server":order_server,
					"yx_company_id":yx_company_id,
					"yx_staff_id":0,
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
function checkTimeSuccessive(){
		var time_unit_arr = $("#time_unit_list .selected");
		if(time_unit_arr.length < 1){
			alert("请选择服务时长~");
			return false;
		}
		for (var i = 0; i < time_unit_arr.length; i++) {
			var new_time_unit = Number($(time_unit_arr[i]).attr("date-time"));
			if(i > 0){
				if(new_time_unit != last_time_unit + 1){
					alert("请选择连续的服务时长");
					return false;
				}
			}
			last_time_unit = new_time_unit
		}
		return true;
}
window.onload = function() {
	// 切换服务
	$(".server-type").change(function(){
		window.location.href = "/company/index?server_id="+$(this).find("option:selected").val()+"&company_id="+yx_company_id+"&sort=fraction";
	});

	$("#reserve").click(function() {
		order_type = 3;
		makeOrderBefor();
	})

	// 显示发送当天的时间戳，得到当天的各个小时的状态
	function getHourAll(dayTime){
		if(server_unit == "小时") {
			var listDom = $("#time_unit_list");
			$('.hour-no').css("display","none");
			listDom.html("");
			// 当天已过的时间不能下单
			var orderDay = $("#order_day").children("option:first-child").val();
			var nowDate = new Date();
			var nowHour = nowDate.getHours();
			$.ajax({
					type  : "POST",
					url   : "/staff/get_staff_times",
					dataType:"json",
					data:{"dayTime":dayTime},
					success:function(json) {
							var time_datas = json.time_datas;
							for(let i = 7,j = 0;i < 23;i++,j++) {
								if(time_datas[i] == 0 || (i < nowHour+1 && dayTime == orderDay)) {
									listDom.append(
													'<div class="hour-one col-md-3 col-lg-3">'+
															'<button class="btn btn-danger disabled hour-one-button" date-time="'+i+'" disabled="disabled" onclick="changeTimeUnitBtn(this)">'+returnNum(i)+'点-'+returnNum(i+1)+'点</button>'+
													'</div>'
									)
								}else {
									listDom.append(
													'<div class="hour-one col-md-3 col-lg-3">'+
															'<button class="btn btn-default hour-one-button" date-time="'+i+'" data-choosed="0" onclick="changeTimeUnitBtn(this)">'+returnNum(i)+'点-'+returnNum(i+1)+'点</button>'+
													'</div>'
									)
								}
							}
					}
			});
		}else {
			$('.hour-is').css("display","none");
			// 找到当前的时间（小时）
			var myDate = new Date();
			var hour = myDate.getHours();
			// 具体时间（小时）select
			var hourTime = $("#hour-time");
			hourTime.html("");
			// 日期select
			var dataSub = $('#order_day').find("option:selected").attr('data-sub');
			console.log(dataSub)
			if(dataSub == 0) {
				for (var i = 8; i < 22; i++) {
					if(i > hour) {
						hourTime.append('<option value="'+i+'">'+i+':00</option>')
					}
				}
			}else {
				for (var i = 8; i < 22; i++) {
					hourTime.append('<option value="'+i+'">'+i+':00</option>')
				}
			}
		}
	}
	getHourAll($("#order_day").val());
	// 切换时间查看每天各个小时的状态
	$("#order_day").change(function(){
		var dayTime = $(this).val();
		getHourAll(dayTime);
	})

}
function changeTimeUnitBtn(btnDom){
		console.log($(btnDom).attr('data-choosed'))
		if ($(btnDom).attr('data-choosed') == "0"){
				$(btnDom).attr('class', 'btn btn-danger selected hour-one-button');
				$(btnDom).attr('data-choosed', '1');
		}else {
				$(btnDom).attr('class', 'btn btn-default hour-one-button');
				$(btnDom).attr('data-choosed', '0');
				$(btnDom).blur()
		}
}
function returnNum(num){
		if(num >= 10) return num;
		return "0"+num;
}
</script>

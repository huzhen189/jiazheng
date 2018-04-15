<?php
	use yii\helpers\Html;
	use yii\bootstrap\Tabs;
	use common\models\YxServer;
	use common\models\YxCmpServer;
	use common\models\YxStaffServer;
	use common\models\YxStaff;
?>
<?= Html::cssFile('/static/css/detail.css') ?>

<div class="basic-detail">
	<div class="store-switch">
		<div class="store-title">
			<div class="name">
				<p><?= $YxCompany->name;?></p>
			</div>
			<div class="business">
				<p>主营业务：<?= $YxCompany->query;?></p>
			</div>
		</div>
		<div class="store-name">
			<ul>
				<li>
					<a class="active" href="#">商家详情</a>
				</li>
				<li>
					<a href="#">信息攻略</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="store-basic">
		<div class="store-info">
			<div class="img">
				<?= Html::img('/static/img/store/store1.jpg', ['alt' => '商家']) ?>
			</div>
			<div class="basic">
				<div class="name">
					<p style="font-size: 30px;"><?= $YxCompany->name;?></p>
				</div>
				<div>
					<p>ID：<?= $YxCompany->number;?></p>
				</div>
				<div class="basic-detail-text">
					<div class="first-child">
						<div class="price">
							<p>价格：<?= number_format(YxCmpServer::getCompanyPrice($companyId,$serverId)/100,2);?>元/<?=YxStaffServer::getServerUnit($serverId)?></p>
						</div>
						<div class="fraction">
							<p>分数：<?= number_format($YxCompany->total_fraction,2);?>分</p>
						</div>
						<div class="server">
							<p id="server-id" date-id="<?=$serverId?>">服务：<?=$ServerName?></p>
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
							<i>上门时间：</i>
							<select id="order_day" style="height:25px;margin-right:10px;">
								<?php
									for ($i=0; $i < 7; $i++) {
										echo '<option value="'.strtotime(date('Y-m-d',strtotime("+$i day"))).'">'.date('Y-m-d',strtotime("+$i day")).' '.YxStaff::getChineseWeek(date("w",strtotime("+$i day"))).'</option>';
									}
								?>
							</select>
							<button class="btn btn-defaul">可选</button>
							<button class="btn btn-danger">已选</button>
						</div>
						<div class="hour-all row" id="time_unit_list">
						</div>
					</div>
				</div>
				<!-- 下单、预约 -->
				<div class="store-order">
					<button id="order_button" class="btn btn-danger" style="padding: 10px 40px;" onclick="makeOrderBefor()">立即下单</button>
					<?php if (YxServer::getReserve($serverId)==1) {
						echo '<button id="reserve" class="btn btn-warning" style="padding: 10px 40px;">预约</button>';
					}?>
				</div>
			</div>
		</div>

		<div class="basic-info">
			<div class="staff-other">
				<div class="staff-other-child" style="text-align: center;">
					<h3>商家详情</h3>
				</div>
				<div class="staff-other-child">
					<p><b>简介：</b><?= $YxCompany->introduction;?></p>
				</div>
				<div class="staff-other-child">
					<h4><b>原象推荐：</b></h4>
					<?php foreach ($recommendArr as $value): ?>
						<div class="other-store">
							<img src="/static/img/staff/staff1.jpg" />
							<div class="other-store-info">
								<h5><a href="/company/index?company=<?= $value['id'] ?>"><?= $value['name'] ?></a></h5>
								<p title="<?= $value['introduction'] ?>"><?= $value['introduction'] ?></p>
							</div>
						</div>
					<?php endforeach; ?>
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
				          	'content' => '<div class="tabs">
				         				<img src="/static/img/achievement/achieve1.jpg" width="870px" />
				         				<img src="/static/img/achievement/achieve2.jpg" width="870px" />
				         			</div>'
				      	],
				      	[
				          	'label' => '评论',
				          	'content' => '<div class="tabs">
				          				第三个tab页
				          			</div>'
				      	],
				  	],
				]);
				?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var yx_company_id = <?= $companyId;?>;
	var order_server = <?= $serverId;?>;
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
		if(!checkTimeSuccessive()){
			return;
		}
		var time_unit_arr = $("#time_unit_list .selected");
		for (var i = 0; i < time_unit_arr.length; i++) {
				time_unit.push(Number($(time_unit_arr[i]).attr("date-time")));
		}
		console.log(" 服务  order_server : "+order_server);
		console.log(" 服务日期  order_day : "+order_day);
		console.log(" 服务时长  time_unit : ");
		console.log(time_unit);
		$.ajax({
				type  : "POST",
				url   : "/yx-order/create",
				dataType:"json",
				data:{
						"order_server":order_server,
						"yx_company_id":yx_company_id,
						"dayTime":order_day,
						"time_unit":time_unit,
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

		$("#reservation").click(function() {
			alert("预约");
		})

		// 显示发送当天的时间戳，得到当天的各个小时的状态
		function getHourAll(dayTime){
			var listDom = $("#time_unit_list");
			listDom.html("");
			$.ajax({
					type  : "POST",
					url   : "/staff/get_staff_times",
					dataType:"json",
					data:{"dayTime":dayTime},
					success:function(json) {
							var time_datas = json.time_datas;
							for(let i = 7,j = 0;i < 23;i++,j++) {
								if(time_datas[i] == 0) {
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

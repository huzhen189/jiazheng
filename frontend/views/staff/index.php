<?php
	use yii\helpers\Html;
	use yii\bootstrap\Tabs;
	use common\models\YxStaff;
	use common\models\YxServer;
	date_default_timezone_set('PRC');
?>
<?= Html::cssFile('/static/css/staff.css') ?>

<div class="staff-detail">
	<div class="detail-cart">
		<div class="img">
			<img src="/static/img/staff/staff1.jpg">
		</div>
		<div class="detail">
			<h3 id="staff_id" staff_id="<?= $YxStaff->staff_id;?>"><?= $YxStaff->staff_name;?></h3>
			<h5>ID： <span><?= $YxStaff->staff_number;?></span></h5>
			<div class="detail-header">
				<div class="detail-header-left">
					<div class="price">
						<p>价格：<span id="order_money" style="color: rgb(255, 90, 0);"><?= number_format($serverPrice/100,2);?></span>元/<?=$serverUnit;?></p>
					</div>
					<div class="fraction">
						<p>分数：<span style="color: rgb(255, 90, 0);"><?= number_format($YxStaff->staff_fraction,2);?></span>分</p>
					</div>
					<div class="service">
						<p>服务：<select class="server-price" id="order_server">
							<?php foreach ($dataProvider as $key => $value): ?>
								<option class="server-name" value="<?=$value['server_id']?>" price-data="<?=number_format($value['server_price']/100,2)?>" <?php if($serverId==$value['server_id']){
									echo 'selected';
								}?>><?=$value['server_name']?></option>
							<?php endforeach; ?>
						</select></p>
					</div>
				</div>
				<div class="detail-header-right">
					<div class="IDcard">
						<p>身份证：<?= $YxStaff->staff_idcard;?></p>
					</div>
					<div class="row age-sex">
						<p class="col-md-6 col-lg-6">年龄：<?= date("Y")-date("Y",$YxStaff->staff_age);?>岁</p>
						<p class="col-md-6 col-lg-6">性别：
							<?php if($YxStaff->staff_sex==1) {
									echo '男';
							}else {
								 	echo '女';
							}?>
						</p>
					</div>
					<div class="addre">
						<p>籍贯：<?= $YxStaff->staff_address;?></p>
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
						<button class="btn btn-danger disabled">不可选</button>
						<button class="btn btn-danger">已选</button>
					</div>
					<div class="hour-all row" id="time_unit_list">
					</div>
				</div>
			</div>
			<!-- 下单、预约 -->
			<div style="margin: 5px;">
				<button id="order_button" class="btn btn-danger" style="padding: 10px 40px;" onclick="makeOrderBefor()">立即下单</button>
				<?php if (YxServer::getReserve($serverId)==1) {
					echo '<button id="reserve" class="btn btn-warning" style="padding: 10px 40px;">预约</button>';
				}?>
			</div>

		</div>
	</div>
	<div class="detail-info">
		<div class="staff-info">
			<div style="text-align: center;">
				<h3 style="margin: 13px 0;">商家详情</h3>
			</div>
			<div>
				<p><b>简介：</b>本公司是一个拥有上千优秀的服务人员，一直本着服务的态度而立足于行业中。</p>
			</div>
			<div>
				<h4><b>原象推荐：</b></h4>
				<?php foreach ($YxStaffArr as $value): ?>
					<div class="other-staff">
						<img src="<?= $value['staff_img']?>" alg="yuanxiang"/>
						<div class="other-staff-info">
							<h5><a href="/staff/index?staff_id=<?= $value['staff_id'] ?>"><?= $value['staff_name']?></a></h5>
							<p title="<?= $value['staff_intro']?>"><?= $value['staff_intro']?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="staff-comment">
			<?php
				echo Tabs::widget([
				  'items' => [
				      	[
				           	'label' => '基本信息',
				          	'content' => $this->render('detail/basic-info',['YxStaff'=>$YxStaff]),
				          	'active' => true
				      	],
				      	[
				          	'label' => '成果显示',
				          	'content' => $this->render('detail/successful-show',['YxStaff'=>$YxStaff]),
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

<script type="text/javascript">
	var yx_staff_id = <?= $YxStaff->staff_id;?>;
	var yx_company_id = <?= $YxStaff->company_id;?>;
	function makeOrderBefor(){
		var order_server = Number($("#order_server").val());
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
		console.log(" 服务人员  yx_staff_id : "+yx_staff_id);
		console.log(" 服务日期  order_day : "+order_day);
		console.log(" 服务时长  time_unit : ");
		console.log(time_unit);
		var extra_server = [
			{
				"id":1,
				"amount":1
			}
		];
		var order_type = 1; //下单类型：1商家下单，2服务者下单，3商家预约
		$.ajax({
				type  : "POST",
				url   : "/yx-order/create",
				dataType:"json",
				data:{
						"order_server":order_server,
						"yx_company_id":yx_company_id,
						"yx_staff_id":yx_staff_id,
						"start_time":order_day,
						"amount":time_unit,
						"extra_server":extra_server,
						"order_type":extra_server,
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
		$(".server-price").change(function() {
			// 根据选择服务显示价格
			window.location.href = "/staff/index?staff_id="+$("#staff_id").attr('staff_id')+"&server_id="+$(".server-price option:selected").attr('value');
		});

		$("#reservation").click(function() {
			alert("预约");
		})

		// 显示发送当天的时间戳，得到当天的各个小时的状态
		function getHourAll(dayTime,yx_staff_id){
			var listDom = $("#time_unit_list");
			listDom.html("");
			$.ajax({
					type  : "POST",
					url   : "/staff/get_staff_times",
					dataType:"json",
					data:{"dayTime":dayTime,"yx_staff_id":yx_staff_id},
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
		getHourAll($("#order_day").val(),yx_staff_id);
		// 切换时间查看每天各个小时的状态
		$("#order_day").change(function(){
			var dayTime = $(this).val();
			getHourAll(dayTime,yx_staff_id);
		})
		// 选择时间
		// $(".hour-one-button").click(function(){
		// 	if (this.getAttribute('class') == 'btn btn-default hour-one-button') {
		// 		this.setAttribute('class', 'btn btn-danger selected hour-one-button');
		// 	}else {
		// 		this.setAttribute('class', 'btn btn-default hour-one-button');
		// 	}
		// })

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

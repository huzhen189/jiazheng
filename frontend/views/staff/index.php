<?php
	use yii\helpers\Html;
	use yii\bootstrap\Tabs;
	use common\models\YxStaff;
	date_default_timezone_set('PRC');
?>
<?= Html::cssFile('/static/css/staff.css') ?>

<div class="staff-detail">
	<div class="detail-cart">
		<div class="img">
			<img src="/static/img/staff/staff1.jpg">
		</div>
		<div class="detail">
			<h3><b style="font-size: 20px;"><?= $YxStaff->staff_name;?></b></h3>
			<h5>ID： <span><?= $YxStaff->staff_number;?></span></h5>
			<div class="detail-header">
				<div class="detail-header-left">
					<div class="price">
						<p>价格：<span id="order_money" style="color: rgb(255, 90, 0);"><?= number_format($dataProvider[0]['server_price']/100,2);?></span>元/小时</p>
					</div>
					<div class="fraction">
						<p>分数：<span style="color: rgb(255, 90, 0);"><?= number_format($YxStaff->staff_fraction/1000,2);?></span>分</p>
					</div>
					<div class="service">
						<p>服务：<select class="server-price">
							<?php foreach ($dataProvider as $key => $value): ?>
								<option class="server-name" value="<?=$value['server_id']?>" price-data="<?=number_format($value['server_price']/100,2)?>"><?=$value['server_name']?></option>
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
			<!-- 保姆的附加服务 -->
			<div class="babysitter" style="margin: 5px;display:none;">
				<div>您可以勾选以下服务要求：</div>
				<div class="choose-server">
					<div class="one-server"><input type="checkbox" name="server"> 保洁</div>
					<div class="one-server"><input type="checkbox" name="server"> 日常烹饪</div>
					<div class="one-server"><input type="checkbox" name="server"> 洗衣熨烫</div>
					<div class="one-server"><input type="checkbox" name="server"> 收纳整理</div>
					<div class="one-server"><input type="checkbox" name="server"> 绿植养护</div>
					<div class="one-server"><input type="checkbox" name="server"> 照顾小孩</div>
					<div class="one-server"><input type="checkbox" name="server"> 照顾老人</div>
					<div class="one-server"><input type="checkbox" name="server"> 照顾宠物</div>
					<div class="one-server"><input type="checkbox" name="server"> 住家</div>
					<div class="one-server"><input type="checkbox" name="server"> 不住家</div>
				</div>
			</div>
			<!-- 月嫂的附加服务 -->
			<div class="moonlight" style="margin: 5px;display:none;">
				<div>您可以勾选以下服务要求：</div>
				<div class="choose-server">
					<div class="one-server"><input type="checkbox" name="server"> 住家</div>
					<div class="one-server"><input type="checkbox" name="server"> 不住家</div>
				</div>
			</div>
			<!-- 育儿嫂的附加服务 -->
			<div class="parenting" style="margin: 5px;display:none;">
				<div>您可以勾选以下服务要求：</div>
				<div class="choose-server">
					<div class="one-server"><input type="checkbox" name="server"> 1~3个月(宝宝年龄)</div>
					<div class="one-server"><input type="checkbox" name="server"> 3~8个月(宝宝年龄)</div>
					<div class="one-server"><input type="checkbox" name="server"> 8~12个月(宝宝年龄)</div>
					<div class="one-server"><input type="checkbox" name="server"> 1岁以上(宝宝年龄)</div>
					<div class="one-server"><input type="checkbox" name="server"> 住家</div>
					<div class="one-server"><input type="checkbox" name="server"> 不住家</div>
				</div>
			</div>
			<!-- 钟点工的附加服务 -->
			<div class="long-hourly" style="margin: 5px;display:none;">
				<div>您可以勾选以下服务要求：</div>
				<div class="choose-server">
				</div>
			</div>
			<div style="margin: 5px;">
				<div class="date-hour">
					<i>上门时间：</i>
					<select id="date" style="height:25px;margin-right:10px;">
						<?php
							for ($i=0; $i < 7; $i++) {
								echo '<option value="'.strtotime(date('Y-m-d',strtotime("+$i day"))).'">'.date('Y-m-d',strtotime("+$i day")).' '.YxStaff::getChineseWeek(date("w",strtotime("+$i day"))).'</option>';
							}
						?>
					</select>
					<select id="time" style="height:25px;margin-right:10px;">
						<?php
							for ($i=8; $i <= 22; $i++) {
								echo '<option value="'.($i*3600).'">'.$i.'点</option>';
							}
						?>
					</select>
					<i>服务时长：</i>
					<input style="height: 25px;" type="number" id="name" placeholder="请输入时长，例如1、2..">
				</div>
			</div>
			<div style="margin: 5px;">
				<button id="order" class="btn btn-danger" style="padding: 10px 40px;">立即下单</button>
				<?php if (false) {
					echo '<button id="reservation" class="btn btn-warning" style="padding: 10px 40px;">预约</button>';
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
			<div style="margin-top:20px;">
				<h4><b>原象推荐：</b></h4>
				<?php foreach ($YxStaffArr as $value): ?>
					<div class="other-staff">
						<img src="<?= $value['staff_img']?>" alg="yuanxiang"/>
						<div>
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
				          	'content' => $this->render('basic-info',['YxStaff'=>$YxStaff]),
				          	'active' => true
				      	],
				      	[
				          	'label' => '成果显示',
				          	'content' => $this->render('result',['YxStaff'=>$YxStaff]),
				          	// 'headerOptions' => [...],
				          	// 'options' => ['id' => 'myveryownID'],
				      	],
				      	[
				          	'label' => '评论',
				          	'content' => $this->render('comment',['model'=>$YxStaff]),
				          	// 'url' => 'http://www.example.com',
				      	],
				  	],
			]);
			?>
		</div>
	</div>
</div>

<script type="text/javascript">
	window.onload = function() {
		$(".server-price").change(function() {
				$(".price span:first").text($(".server-price option:selected").attr('price-data'));
		});

		// function

		// 默认选择当前时间（小时）+2
		(function(){
			var hour = now.getHours();
			console.log(hour);
			// $("#time")
			// for ($i=8; $i <= 22; $i++) {
			// 	echo '<option value="'.($i*3600).'">'.$i.'点</option>';
			// }
		})();

		$("#order").click(function() {
			// order_name：订单名
			// address：地址
			// phone：手机号码
			// order_money：订单总金额
			// var order_money = $(".")
			// order_state：订单状态
			// order_memo：订单备注
			// yx_user_id：用户id
			// user_name：用户名
			// alert("下单");
		})

		$("#reservation").click(function() {
			alert("预约");
		})
	}
</script>

<?php
	use yii\helpers\Html;
	use yii\bootstrap\Tabs;

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
				<div style="width: 600px;height: 100px;background-color: #f5f5f5;display: flex;align-items: center;padding-left: 10px;padding-right: 10px;font-size: 18px;">
					<div style="width: 30%;">
						<div class="price">
							<p style="color: rgb(255, 90, 0);">保洁价：35元/小时</p>
						</div>
						<div class="fraction">
							<p style="color: rgb(255, 90, 0);">分数：<?= number_format($YxCompany->total_fraction/1000,1);?>分</p>
						</div>
					</div>
					<div style="width: 70%;">
						<div class="address">
							<p>地址：<?= $YxCompany->address;?></p>
						</div>

						<div class="business">
							<p>主营业务：<?= $YxCompany->query;?></p>
						</div>
					</div>
				</div>

				<div class="store-order">
					<button class="btn btn-warning"><a href="http://www.yuanxiangwu.com/order/index" style="color: #fff;">立即下单</a></button>
					<button id="reserve" class="btn btn-danger">预约服务</button>
				</div>
			</div>
		</div>

		<div class="basic-info">
			<div class="staff-other">
				<div style="text-align: center;">
					<h3>商家详情</h3>
				</div>
				<div>
					<p><b>简介：</b><?= $YxCompany->introduction;?></p>
				</div>
				<div>
					<h4><b>相似商家：</b></h4>
					<div class="other-staff">
						<img src="/static/img/staff/staff1.jpg" />
						<div>
							<h5><b>好运来家政</b></h5>
							<p title="服务、热心">服务、热心</p>
						</div>
					</div>
					<div class="other-staff">
						<img src="/static/img/staff/staff1.jpg" />
						<div>
							<h5><b>好运来家政</b></h5>
							<p title="服务、热心">服务、热心</p>
						</div>
					</div>
					<div class="other-staff">
						<img src="/static/img/staff/staff1.jpg" />
						<div>
							<h5><b>好运来家政</b></h5>
							<p title="服务、热心">服务、热心</p>
						</div>
					</div>
					<div class="other-staff">
						<img src="/static/img/staff/staff1.jpg" />
						<div>
							<h5><b>好运来家政</b></h5>
							<p title="服务、热心">服务、热心</p>
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
				          	'content' => '<div class="tabs">
									<table class="table table-bordered">
										<tbody>
											<tr>
												<td>商家名</td>
												<td>'.$YxCompany->name.'</td>
											</tr>
											<tr>
												<td>ID</td>
												<td>'.$YxCompany->number.'</td>
											</tr>
											<tr>
												<td>地址</td>
												<td>'.$YxCompany->address.'</td>
											</tr>
											<tr>
												<td>业务范围</td>
												<td>'.$YxCompany->query.'</td>
											</tr>
											<tr>
												<td>营业地域范围</td>
												<td>'.$YxCompany->name.'</td>
											</tr>
											<tr>
												<td>营业时长</td>
												<td>'.$YxCompany->name.'年</td>
											</tr>
											<tr>
												<td>规模</td>
												<td>'.$YxCompany->name.'名服务者</td>
											</tr>
											<tr>
												<td>服务总量</td>
												<td>'.$YxCompany->name.'次</td>
											</tr>
											<tr>
												<td>服务总金额</td>
												<td>'.$YxCompany->name.'元</td>
											</tr>
											<tr>
												<td>入驻平台时间</td>
												<td>'.$YxCompany->created_at.'</td>
											</tr>
											<tr>
												<td>联系商家</td>
												<td>'.$YxCompany->telephone.'</td>
											</tr>
											<tr>
												<td>商家宣言</td>
												<td>'.$YxCompany->introduction.'</td>
											</tr>
										</tbody>
									</table>
								</div>',
				          	'active' => true
				      	],
				      	[
				          	'label' => '成果显示',
				          	'content' => '<div class="tabs">
				         				<img src="/static/img/achievement/achieve1.jpg" width="870px" />
				         				<img src="/static/img/achievement/achieve2.jpg" width="870px" />
				         			</div>',
				          	// 'headerOptions' => [...],
				          	// 'options' => ['id' => 'myveryownID'],
				      	],
				      	[
				          	'label' => '评论',
				          	'content' => '<div class="tabs">
				          				第三个tab页
				          			</div>',
				          	// 'url' => 'http://www.example.com',
				      	],
				  	],
				]);
				?>
			</div>
		</div>
	</div>
</div>

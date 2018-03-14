<?php
	use yii\helpers\Html;
	use yii\bootstrap\Tabs;
	$babel = '<table class="table table-hover">
				<thead>
					<tr>
					    <th>名称</th>
					    <th>城市</th>
					    <th>邮编</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					    <td>Tanmay</td>
					    <td>Bangalore</td>
					    <td>560001</td>
					</tr>
					<tr>
					    <td>Sachin</td>
					    <td>Mumbai</td>
					    <td>400003</td>
					</tr>
					<tr>
					    <td>Uma</td>
					    <td>Pune</td>
					    <td>411027</td>
					</tr>
			    </tbody>
		    </table>';
?>

<div class="staff_detail">
	<div class="detail_cart">
		<div class="img">
			<img src="static/img/user.jpg">
		</div>
		<div class="detail">
			<h3><b style="font-size: 20px;">黄小妹家政-易棵松</b></h3>
			<h5 style="color: #e9203d;"><b>服务、热心</b></h5>
			<div class="price">
				<h5>原象服务价</h5>
				<h3 style="color: #e9203d;">￥ 38.00</h3>
				<h5>每小时</h5>
			</div>
			<div style="height: 100px;">
				服务类型
			</div>
			<div>
				<a href="#" class="btn" style="background-color: #ffeded;color: #e9203d;border: 1px solid;padding: 10px 40px;">立即下单</a>
				<button class="btn" style="background-color: #e9203d;color: #fff;border: 1px solid;padding: 10px 40px;">加入购物车</button>
			</div>
		</div>
	</div>
	<div class="detail_info">
		<div class="staff_info">
			<div style="text-align: center;">
				<h3>商家详情</h3>
			</div>
			<div>
				<p><b>简介：</b>本公司是一个拥有上千优秀的服务人员，一直本着服务的态度而立足于行业中。</p>
			</div>
			<div>
				<h4><b>公司执照：</b></h4>
				<?= Html::a('<img src="static/img/license.jpg" style="width: 230px;height: 180px;margin-left: 3px;" />', ['store/license'], ['class' => 'profile-link','style' => 'text-align: center;']); ?>
			</div>
			<div>
				<h4><b>相似服务人员：</b></h4>
				<div class="other_staff">
					<img src="static/img/user.jpg" />
					<div>
						<h5><b>易棵松</b></h5>
						<p title="服务、热心">服务、热心</p>
					</div>
				</div>
				<div class="other_staff">
					<img src="static/img/user.jpg" />
					<div>
						<h5><b>易棵松</b></h5>
						<p title="服务、热心">服务、热心</p>
					</div>
				</div>
				<div class="other_staff">
					<img src="static/img/user.jpg" />
					<div>
						<h5><b>易棵松</b></h5>
						<p title="服务、热心">服务、热心</p>
					</div>
				</div>
				<div class="other_staff">
					<img src="static/img/user.jpg" />
					<div>
						<h5><b>易棵松</b></h5>
						<p title="服务、热心">服务、热心</p>
					</div>
				</div>
			</div>
		</div>

		<div class="staff_comment">
			<?php
				echo Tabs::widget([
				  'items' => [
				      	[
				           	'label' => '基本信息',
				          	'content' => '<div class="tabs">
				          		<table class="table table-bordered">
									<tbody>
										<tr>
											<td>姓名</td>
											<td>一棵树</td>
										</tr>
										<tr>
											<td>性别</td>
											<td>男</td>
										</tr>
										<tr>
											<td>从业时间</td>
											<td>10年</td>
										</tr>
										<tr>
											<td>年龄</td>
											<td>35</td>
										</tr>
										<tr>
											<td>服务类型</td>
											<td>清洁、月嫂</td>
										</tr>
										<tr>
											<td>所属商家</td>
											<td>腾讯</td>
										</tr>
										<tr>
											<td>是否培训</td>
											<td>是</td>
										</tr>
										<tr>
											<td>身份认证</td>
											<td>是</td>
										</tr>
										<tr>
											<td>相关记录</td>
											<td>荣获深圳市优秀市民</td>
										</tr>
									</tbody>
								</table>
				          	</div>',
				          	'active' => true
				      	],
				      	[	
				          	'label' => '成果显示',
				          	'content' => '<div class="tabs">
				         				第二个tab页
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
	<?= Html::style('
		.main.container {
			border: 1px solid #e9e9e9;
		}
		.staff_detail .detail_cart {
			margin: 10px 0;
			display: flex;
		}
		.staff_detail .detail_cart .img img {
			width: 300px;
			height: 300px;
			border: 1px solid #e9e9e9;
		}
		.staff_detail .detail_cart .detail {
			width: 100%;
			padding: 0 30px;
		}
		.staff_detail .detail_cart .detail .price {
			height: 100px;
			width: 100%;
			padding: 5px 10px;
			background-color: #e9e9e9;
		}
		.staff_detail .detail_cart h3,.staff_detail .detail_cart h4,.staff_detail .detail_cart h5 {
			margin: 0 0 5px 0;
			padding: 0;
		}
		.detail_info {
			display: flex;
		}
		.staff_info {
			width: 20%;
			padding-left: 5px;
			padding-right: 5px;
			border: 1px solid #eee;
		}
		.staff_info .other_staff {
			padding: 10px 0;
			display: flex;
			border-bottom: 1px solid #eee;
		}
		.staff_info .other_staff img {
			width: 120px;
			height: 100px;
		}

		.detail_info .staff_comment {
			width: 80%;
			border: 1px solid #eee;
		}

		.tabs {
			margin: 40px 60px;
			border: 1px solid #eee;
		}
		.tabs .table {
			margin-bottom: 0px!important;
		}
	')?>
</div>
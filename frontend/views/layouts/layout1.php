<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
$user_info = Yii::$app->user->identity;
?>
<?php $this->beginPage();?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language;?>">
<head>
    <meta charset="<?=Yii::$app->charset;?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?=Html::csrfMetaTags();?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head();?>
</head>
<body>
<?php $this->beginBody();?>
<header id="header">
	<div id="top_nav">
		<div class="top_nav_inner">
			<div class="top_nav_left">

				<?php
						if (Yii::$app->user->isGuest) {
								echo '<a href="/site/login" class="header-title" style="color:rgb(255,90,0)">请登录！</a>';
								echo '<a href="/site/signup" class="header-title">免费注册</a>';
						} else {
              echo '<div class="header-city">'.$user_info['city'].'<a href="#">[切换]</a></div>';
              echo '<div class="header-login">'
                  . Html::beginForm(['/site/logout'], 'post',['class' => 'logout-form','style'=>'float:right'])
                  . Html::submitButton('[退出]',['class' => 'btn btn-link logout'])
                  . Html::endForm();
              echo '<a href="/yx-user-address/index?yx_user_id='.Yii::$app->user->id.'" class="header-title">'.Yii::$app->user->identity->username.'</a>';
							echo '</div>';
						}
				 ?>
			</div>
			<div class="top_nav_right">
        <div class="login-text t_r">
					<span id="js_isNotLogin">
						<a href="http://www.yuanxiangwu.com/" rel="nofollow" class="header-title">首页</a>
					</span>
				</div>
				<div class="login-text t_r">
					<span id="js_isNotLogin">
						<a href="#" rel="nofollow" class="header-title">我的收藏</a>
					</span>
				</div>
				<dl class="top_account t_r">
					<dt>
						<a href="#" class="header-title">我的原象</a>
					</dt>
					<dd style="">
						<ul>
							<li><a href="/yx-order/index?yx_user_id=<?php echo Yii::$app->user->id; ?>" rel="nofollow">我的订单</a></li>
							<li><a href="#" rel="nofollow">我的评论</a></li>
              <li><a href="/yx-user-address/index?yx_user_id=<?= Yii::$app->user->id ?>" rel="nofollow">我的收货地址</a></li>
						</ul>
					</dd>
				</dl>
				<dl class="top_account t_r">
					<dt>
						<a href="http://manage.yuanxiangwu.com/" class="header-title">商家登录</a>
					</dt>
					<dd style="">
						<ul>

							<li><a href="#" rel="nofollow">入驻帮助</a></li>

						</ul>
					</dd>
				</dl>
				<dl class="top_account t_r">
					<dt>
						<a href="#" class="header-title">联系客服</a>
					</dt>
				</dl>
			</div>
		</div>
	</div>

	<div id="top_main">
		<div class="top_main_inner pr">
			<div class="top_header clearfix">
				<div class="logo">
					<a titel="fecshop logo" href="/" style="">
						<img src="/static/img/logo.jpg">
					</a>
				</div>
				<div class="topSeachForm">
					<form class="js_topSeachForm">
						<div class="choose_type">
							<input type="button" class="types choosed" name="1" value="服务" />
							<input type="button" class="types" name="2" value="商家">
						</div>
						<div class="top_seachBox">
							<div class="searchInput fl">
								<input type="text" class="searchContent" value="" maxlength="150" placeholder="搜索服务">
							</div>
							<button id="submit" class="fl js_topSearch seachBtn" type="button">
								搜索
							</button>
			      </div>
					</form>
				</div>
				<div class="logo yx_server">
					<a titel="fecshop logo" href="#" style="">
						<img src="/static/img/yx_server.png">
					</a>
				</div>
			</div>
	    </div>
	</div>

	<div class="top_menu">
	   	<nav id="nav">
		    <ul class="clearfix">
		     	<li class="frist_li">
		     		<a class="nav_t">全部服务</a>
		     	</li>
		     	<li>
			     	<a href="/basic-clean/index?server_parent=65&sort=fraction" target="_blank" class="nav_t">日常保洁</a>
		      	</li>
		      	<li>
			     	<a href="/special-clean/index?server_parent=66&sort=fraction" target="_blank"  class="nav_t">专项保洁</a>
		      	</li>
		     	<li>
		     		<a href="/other-services/index?server_parent=67&sort=fraction" target="_blank"  class="nav_t">家电清洗</a>
		      	</li>
		     	<li>
		     		<a href="/other-services/index?server_parent=68&sort=fraction" target="_blank"  class="nav_t">家居保养</a>
		      	</li>
		     	<li>
		     		<a href="/other-services/index?server_parent=71&sort=fraction" target="_blank" class="nav_t">保姆</a>
		     	</li>
		     	<li>
		     		<a href="/other-services/index?server_parent=69&sort=fraction" target="_blank"  class="nav_t">月嫂</a>
		     	</li>
		     	<li>
		     		<a href="/other-services/index?server_parent=70&sort=fraction" target="_blank"  class="nav_t">育儿嫂</a>
		     	</li>
		     	<li>
		     		<a href="/other-services/index?server_parent=18&sort=fraction" target="_blank"  class="nav_t">维修</a>
		     	</li>
		     	<li>
		     		<a href="/other-services/index?server_parent=19&sort=fraction" target="_blank"  class="nav_t">开锁</a>
		     	</li>
		    </ul>
	   	</nav>
	</div>
</header>

<div class="main-container">
	<div class="main container">
		<?= $content ?>
	</div>
</div>

<footer id="footer">
	<div style="margin-top:  50px;">
        <div style="color: #7f7f7f;overflow-x:  hidden;width: 100%;">
            <div style="background:  #f2f2f2 none repeat scroll 0 0;font-size:  12px;line-height:  21px;padding:  40px 0 33px;">
                <div style="margin:  auto;width:  1170px;">
                    <div style="padding: 0;margin: 0;">
                        <div style="float:  left;margin-bottom:  30px;width:  25%;">
                            <header style="border-bottom: 1px solid #ccc;margin:  0 0 18px;padding:  0 0 9px;width:  200px;">
                                <h3 class="title" style="color: #000;font-size: 16px;font-weight:  normal;line-height:  1.3;text-transform: uppercase;">关注我们 </h3>
                            </header>
                            <p style="padding: 0 0 16px;">在社交平台关注我们</p>
                        </div>
                        <div style="float:  left;margin-bottom:  30px;width:  25%;">
                            <div style="border-bottom: 1px solid #ccc;margin: 0 0 18px;padding:  0 0 9px;width:  200px;">
                                <h3 style="color: #000;font-size:  16px;font-weight:  normal;line-height:  1.3;text-transform: uppercase;">意见反馈
                                </h3>
                            </div>
                            <p>
                                意见反馈
                            </p>
                            <form>
                                <div>
                                    <input type="text" name="" id="newsletter" placeholder="输入您的对我们的建议..." title="" class="input-text-form-control  validate-email input-block-level">
                                    <button type="submit" title="Subscribe" class="newsletter-button">提交</button>
                                </div>
                            </form>
                        </div>
                        <div style="float:  left;margin-bottom:  30px;width:  25%;">
                            <header style="border-bottom: 1px solid #ccc;margin:  0 0 18px;padding:  0 0 9px;width:  200px;">
                                <h3 class="title" style="color: #000;font-size:  16px;font-weight: normal;line-height:  1.3;text-transform: uppercase;">文字条款</h3>
                            </header>
                            <nav>
                                <ul style="list-style: outside none none;padding-left: 0px;">
                                    <li class="first"><a>关于我们</a></li>
                                    <li><a>隐私政策</a></li>
                                    <li><a>退款条约</a></li>
                                    <li><a>常见问题</a></li>
                                    <li class=" last"><a>联系客服</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div style="float:  left;margin-bottom:  30px;width:  25%;">
                            <header style="border-bottom: 1px solid #ccc;margin:  0 0 18px;padding:  0 0 9px;width:  200px;">
                                <h3 class="title" style="color:  #000;font-size:  16px;font-weight: normal;line-height:  1.3;text-transform: uppercase;">我的账户</h3>
                            </header>
                            <ul style="list-style: outside  none none;padding-left: 0px;">

                                <li><a>我的订单</a></li>
                                <li><a>我的评论</a></li>
                                <li><a>我的收藏</a></li>

                            </ul>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>

</body>
<?php $this->endBody() ?>
</body>
<script type="text/javascript">
  // 切换服务或商家
  $('.types').click(function(event) {
    $('.types').removeClass('choosed');
    $(this).addClass('choosed');
  });
  // 提交信息，搜索
  $('#submit').click(function(event) {
    let choosed = $('.choosed').attr('name');
    let searchContent = $('.searchContent').val();
    $.ajax({
        type: "POST",
        url: "/index/search",
        datatype: 'json',
        data:{"choosed":choosed,"searchContent":searchContent},
        success:function(json) {
          window.location.href = ''+json;
          // console.log(json);
        }
    });
  });
  // 按回车键搜索
  document.onkeydown = function (e) {
    if (!e) e = window.event;
    if ((e.keyCode || e.which) == 13) {
      $('#submit').click();
    }
  }
</script>
</html>
<?php $this->endPage() ?>

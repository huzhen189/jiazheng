<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage();?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language;?>">
<head>
    <meta charset="<?=Yii::$app->charset;?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?=Html::csrfMetaTags();?>
    <title><?= "原象屋-".Html::encode($this->title) ?></title>
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
              echo '<li class="header-title">'
                  . Html::beginForm(['/site/logout'], 'post',['class' => 'logout-form','style'=>'float:right'])
                  . Html::submitButton('退出',['class' => 'btn btn-link logout'])
                  . Html::endForm();
              echo '<a href="/yx-user-address/index?yx_user_id='.Yii::$app->user->id.'" class="header-title">'.Yii::$app->user->identity->username.'</a>';
							echo '</li>';
						}
				 ?>
			</div>
			<div class="top_nav_right">
				<dl class="top_account t_r">
					<dt>
						<a href="#" class="header-title">我的原象</a>
					</dt>
					<dd style="">
						<ul>
							<li><a href="/yx-order/index?yx_user_id=<?php echo Yii::$app->user->id; ?>" rel="nofollow">我的订单</a></li>
							<li><a href="#" rel="nofollow">我的评论</a></li>
						</ul>
					</dd>
				</dl>
				<dl class="top_account t_r">
					<dt>
						<a href="http://manage.yuanxiangwu.com/" class="header-title">商家中心</a>
					</dt>
					<dd style="">
						<ul>
							<li><a href="#" rel="nofollow">商家登陆</a></li>
							<li><a href="#" rel="nofollow">如何成为商家</a></li>
							<li><a href="#" rel="nofollow">服务中心</a></li>
						</ul>
					</dd>
				</dl>
				<dl class="top_account t_r">
					<dt>
						<a href="#" class="header-title">联系服务</a>
					</dt>
					<dd style="">
						<ul>
							<li><a href="#" rel="nofollow">消费者客服</a></li>
							<li><a href="#" rel="nofollow">商家客服</a></li>
						</ul>
					</dd>
				</dl>
			</div>
		</div>
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
                                    <li class=" last"><a>联系我们</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div style="float:  left;margin-bottom:  30px;width:  25%;">
                            <header style="border-bottom: 1px solid #ccc;margin:  0 0 18px;padding:  0 0 9px;width:  200px;">
                                <h3 class="title" style="color:  #000;font-size:  16px;font-weight: normal;line-height:  1.3;text-transform: uppercase;">我的账户</h3>
                            </header>
                            <ul style="list-style: outside  none none;padding-left: 0px;">
                                <li><a>我的账户</a></li>
                                <li><a>我的订单</a></li>
                                <li><a>我的评论</a></li>
                                <li><a>我的收藏</a></li>
                                <li><a>网站地图</a></li>
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
</html>
<?php $this->endPage() ?>

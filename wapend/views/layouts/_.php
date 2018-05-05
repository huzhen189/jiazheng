<?php
use wapend\assets\AppAsset;
use yii\helpers\Html;
use common\models\Region;
AppAsset::register($this);
$user_info = Yii::$app->user->identity;
if(!$user_info){
  $user_info = array('city' => 1607);
}
?>
<?php $this->beginPage();?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language;?>">
<head> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta charset="<?=Yii::$app->charset;?>"> 
    <?=Html::csrfMetaTags();?>
    <title><?= Html::encode($this->title) ?></title>
    <?php //$this->head();?>
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
            echo '<div class="header-city">'.Region::getOneName($user_info['city']).'<a href="/yx-user/update_city?id='.Yii::$app->user->id.'">[切换]</a></div>';
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
						<a href="http://www.yuanxiangwu.com/" rel="nofollow" class="header-title">原象屋首页</a>
					</span>
				</div>
        <div class="login-text t_r">
					<span id="js_isNotLogin">
						<a href="/yx-order/index?yx_user_id=<?php echo Yii::$app->user->id; ?>" rel="nofollow" class="header-title">我的收藏</a>
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
						<a  href="http://manage.yuanxiangwu.com/" class="header-title">商家登录</a>
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



</header>

<div class="main-container">
	<div class="main container">
		<?= $content ?>
	</div>
</div>
 

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

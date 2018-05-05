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
    <meta charset="<?=Yii::$app->charset;?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?=Html::csrfMetaTags();?>
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::cssFile('/static/css/semantic.min.css') ?>
	<?= Html::cssFile('/static/css/style.css') ?>
	<?= Html::cssFile('/static/css/dnSlide.css') ?>
	<script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/semantic.min.js"></script>
</head>
<body>
<?php $this->beginBody();?>

<?= $content ?>
        <div class="bottom-menu"> 
            <a href="/index.php"><span class="iconfont">S</span><p class="text">首页</p></a>
            <a href="/help.php"><span class="iconfont">S</span><p class="text">帮助中心</p></a>
            <a href="/back.php"><span class="iconfont">S</span><p class="text">商家后台</p></a>
            <a href="/my.php"><span class="iconfont">S</span><p class="text">我的</p></a> 
        </div>
</body>
</html>
<?php $this->endPage() ?>
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
        <?php  
            $Bmenu = array('index' => ['首  页','/'],
                            'help' => ['帮助中心','/yx-rules/index'],
                            'co' => ['商家后台' ,'/co'],
                            'my' => ['我  的' , '/site/login'] );
        ?>
        
        <div class="bottom-menu"> 
            <?php foreach ($Bmenu as $a => $v): ?>
            <a href="<?= $v[1]?>"><span class="iconfont"><img src="/static/img/<?php echo $a;if($_SERVER['REQUEST_URI'] != $v[1]){echo '-b';} ?>.png"></span><p class="<?php if($_SERVER['REQUEST_URI'] != $v[1]){echo 'no-m';} ?> text"><?= $v[0]?></p></a>
            <?php endforeach; ?>
        </div>
        
</body>
</html>
<?php $this->endPage() ?>
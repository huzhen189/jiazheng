<?php
	use yii\helpers\Html;
  // 商家成果图
  use common\models\YxCmpRes;
?>

<div class="tabs">
  <?php foreach (YxCmpRes::getCompanyRes($YxCompany->id,20) as $key => $value): ?>
    <?php echo '<img src="'.$value.'" width="870px"/>'; ?>
  <?php endforeach; ?>
</div>

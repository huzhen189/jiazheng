<?php
	use yii\helpers\Html;
  // 商家成果图
  use common\models\YxStaffRes;
?>

<div class="tabs">
  <?php foreach (YxStaffRes::getStaffRes($YxStaff->staff_id,20) as $key => $value): ?>
    <?php echo '<img src="'.$value.'" style="width:870px;margin-top:20px;" />'; ?>
  <?php endforeach; ?>
</div>

<?php
	use yii\helpers\Html;
?>

<div class="tabs" style="height: 88px;display: flex;flex-direction: column;align-items: center;justify-content: center;">
  <?php foreach ($YxNotice as $key => $value): ?>
    <div class=""><a href="/yx-notice/index?id=<?= $value['notice_id'];?>" style="color:rgb(255, 90, 0);text-decoration:none;"><?= $value['notice_title'];?></a></div>
  <?php endforeach; ?>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\YxNotice;
/* @var $this yii\web\View */
/* @var $model common\models\YxNotice */

?>
<div class="yx-rules-view">

    <div>
      <?php echo $model->notice_content ?>
    </div>

    <button type="button" id="return_back" class="btn btn-default" style="margin:60px auto 120px;">返回</button>


</div>
<script>
  window.onload = function(){
    $("#return_back").click(function(){
      window.history.go(-1);
    })
  }


</script>

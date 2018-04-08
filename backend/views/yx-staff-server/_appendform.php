<?php

use common\models\YxStaffServer;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\YxServer;
/* @var $this yii\web\View */
/* @var $model common\models\YxStaffServer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yx-staff-server-appendform">
    <?php

$queryParams = Yii::$app->request->queryParams;
$staff_id = $queryParams['staff_id'];
?>

    <?php $form = ActiveForm::begin();?>

    <?php $server_parent = YxServer::getOneServerMap($model->server_parent_id);?>
   <?=$form->field($model, 'server_parent_id')->dropDownList($server_parent, [
        'onchange' => '$.post("/yx-staff-server/test?server_id='. '"+$(this).val(),function(data){
            $("select#yxstaffserver-server_id").html(data);
        });',
    ]);?>
    <?php
        foreach ($server_parent as $key => $value) {
            $model->server_parent_id=$key;
            break;
        }
    ?>

    <?=$form->field($model, 'server_name')->textInput();?>

    <?=$form->field($model, 'server_least')->textInput();?>

    <?=$form->field($model, 'server_price')->textInput();?>



    <div class="form-group">
        <?=Html::submitButton(Yii::t('app', '保存'), ['class' => 'btn btn-success']);?>
    </div>

    <?php ActiveForm::end();?>

</div>

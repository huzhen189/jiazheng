<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use zh\qiniu\QiniuFileInput;
use common\models\YxServer;
/* @var $this yii\web\View */
/* @var $model common\models\YxStaff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yx-staff-form">

    <?php $form = ActiveForm::begin(); ?>

<!--     <?= $form->field($model, 'company_id')->textInput() ?> -->

    <?= $form->field($model, 'staff_name')->textInput(['maxlength' => true]) ?>

    <?php $model->staff_sex = $model->getCmpSex(); ?>
    <?= $form->field($model, 'staff_sex')->dropDownList($model->staff_sex) ?>

    <?= $form->field($model, 'staff_age')->textInput() ?>

    <?= $form->field($model, 'staff_img')->widget(QiniuFileInput::className(),[
        'uploadUrl' => 'https://upload-z2.qiniup.com/', //文件上传地址 不同地区的空间上传地址不一样 参见官方文档
        'qlConfig' => Yii::$app->params['qnConfig'],
        'clientOptions' => [
            'max' => 1,//最多允许上传图片个数  默认为3
            'accept' => 'image/jpeg,image/png'//上传允许类型
        ],
    ]) ?>

    <?= $form->field($model, 'staff_idcard')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_intro')->textInput(['maxlength' => true]) ?>

<!--     <?= $form->field($model, 'staff_found')->textInput(['maxlength' => true]) ?> -->

    <?php $model->staff_state = $model->getCmpState(); ?>
    <?= $form->field($model, 'staff_state')->dropDownList($model->staff_state) ?>

    <?= $form->field($model, 'staff_memo')->textInput(['maxlength' => true]) ?>

<!--     <?= $form->field($model, 'staff_login_ip')->textInput(['maxlength' => true]) ?> -->

<!--     <?= $form->field($model, 'staff_login_time')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'staff_account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_password')->textInput(['maxlength' => true]) ?>

    <?php $server_id = $model->getCmpServer(); ?>
    <?= $form->field($model, 'staff_main_server_id')->dropDownList($server_id) ?>

    <?php 
        $server2_id = $model->getCmpServer(); 
        foreach ($server2_id as $key => $value) {
            if($key==$model->staff_main_server_id){
                unset($server2_id[$key]);
            }
        }
        $model->staff_all_server_id = explode(',', $model->staff_all_server_id);
    ?>
    <?= $form->field($model, 'staff_all_server_id')->checkboxList($server2_id);?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '保存'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

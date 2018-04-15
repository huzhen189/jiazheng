<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use zh\qiniu\QiniuFileInput;
/* @var $this yii\web\View */
/* @var $model common\models\YxRecomLeft */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yx-recom-left-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'recom_left_pic')->widget(QiniuFileInput::className(),[
        'uploadUrl' => 'https://upload-z2.qiniup.com/', //文件上传地址 不同地区的空间上传地址不一样 参见官方文档
        'qlConfig' => Yii::$app->params['qnConfig'],
        'clientOptions' => [
            'max' => 1,//最多允许上传图片个数  默认为3
            'accept' => 'image/jpeg,image/png',//上传允许类型
	    'size'=>102400
        ],
    ]) ?>

    <?= $form->field($model, 'recom_left_href')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '保存'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

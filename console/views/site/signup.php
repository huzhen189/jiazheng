<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.control-label{
  display: block;
  margin-bottom: 0px;
}
.form-group {
    margin-bottom: 0px;
    height: 48px;
    margin-top: 0px;
}
.help-block{
  margin-top:0px;
  margin-bottom: 0px;
}
.field-cmploginform-rememberme{
  float: left;
  margin-left: 62px;
  margin-top: -10px;
}
</style>

<div class="max_sgin">
    <div class="min_sgin">
        <div class="sgin_T">
            <span>
            <em>原象屋商家注册</em>
            </span>
        </div>
        <div class="sgin_C">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']);?>

                <span style="position: relative;"><?=$form->field($model, 'username')->textInput(['autofocus' => true]);?></span>

                <span style="position: relative;"><?=$form->field($model, 'email');?></span>

                <span style="position: relative;"><?=$form->field($model, 'password')->passwordInput();?></span>
                <div class="form-group">
                    <?=Html::submitButton('注册', ['class' => 'btn btn-primary sginSubmit', 'name' => 'signup-button']);?>
                </div>

            <?php ActiveForm::end();?>
        </div>
    </div>
</div>
<script>
$(".field-signupform-username ").find(".control-label").html('<em><img src="http://p6htqszz4.bkt.clouddn.com/login_name.png"></em>')
$(".field-signupform-email ").find(".control-label").html('<em><img src="http://p6htqszz4.bkt.clouddn.com/login_phone.png"></em>')
$(".field-signupform-password").find(".control-label").html('<em><img src="http://p6htqszz4.bkt.clouddn.com/login_password.png"></em>')

</script>

<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '请填写注册信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
  .site-signup .control-label{
      width: 20%;
      position: absolute;
      height: 48px;
      line-height: 48px;
      text-align: center;
      background: #40bbff;
      border-radius: 3px;
      color: #ffffff;
  }
  .site-signup .form-control{
      width: 78%;
      margin-left: 22%;
      padding: 0px;
      height: 46px;
  }
  .site-signup .help-block{
      clear: both;
  }
  #signupform-getcode{
      margin-top: 0px;
      padding: 11px 16px;
  }
</style>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5" >
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>




                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                <button type="button" id="signupform-getcode" class="btn btn-primary btn-lg active">获取验证码</button>
                <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'repassword')->passwordInput() ?>

                <div style="height30px;">
                    <input type="checkbox" id="rule_check" style="height:14px;width:14px;margin: 8px;float: left;" checked="true"/>
                    <?= Html::a('原象屋平台服务协议	', ['/yx-rules/view?id=11'], ['style' => 'height:30px;line-height:30px;margin-left:10px;display: block;float: left;']) ?>
                    <div style="clear:both;margin-bottom:30px;"></div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('注册', ['id' => 'signup_button','class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<script>
    window.onload =function(){
      $("#rule_check").click(function(){
        console.log(this.checked)
        if(this.checked){
            $("#signup_button").attr("disabled",false);
        }else {
            $("#signup_button").attr("disabled","disabled");
        }
      })
      $("#signupform-getcode").click(function(){
        var phoneNum = $("#signupform-phone").val();
        if(phoneNum.length != 11){
          alert("请输入正确的11位手机号码");
          return;
        };
        var buttonDom = this;
        $.ajax({
            type  : "POST",
            url   : "/site/getsignupcode",
            dataType:"json",
            data:{"phone":phoneNum},
           success:function(json) {
                //alert("success");
                console.log(json);
                if(json.code == 0){
                    $(buttonDom).attr("disabled","disabled");
                }else {
                    $(".field-signupform-phone").attr("class","form-group field-signupform-phone required has-error");
                    $(".field-signupform-phone .help-block-error").html(json.msg);
                }
            }
        });

      })
    }
</script>

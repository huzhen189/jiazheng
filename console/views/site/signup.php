<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use common\models\YxRules;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Html;
$this->title = '商家入驻';
?>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
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

                <button style="margin-left: 60px;margin-bottom:10px" type="button" id="field-signupform-getcode" class="btn btn-primary btn-lg active">获取验证码</button>

                <span style="position: relative;"><?=$form->field($model, 'code')->textInput(['maxlength' => true]);?></span>
                <div class="form-group">
                    <?= Html::submitButton('注册', ['class' => 'btn btn-primary sginSubmit', 'name' => 'sigin-button']) ?>
                </div>


            <?php ActiveForm::end();?>
        </div>
    </div>
</div>

<?php

Modal::begin([
    'id' => 'deny-modal',
    'header' => '<h4 class="modal-title">入驻协议</h4>',
]);
$verify = Yii::$app->request->csrfToken;
$content = (YxRules::find()->where(['rules_title' => '原象屋平台商家入驻协议'])->one())['rules_content'];
$submitButton=Html::button('同意入驻协议',['class' => 'btn btn-danger center-block','name'=>'agree']);
$content = str_replace(array("\r\n", "\r", "\n"), "", $content);
$js = <<<JS
    var data='{$content}'
    var button='{$submitButton}'
    data=data+button;
    $('.modal-body').html(data);

JS;
$this->registerJs($js);
Modal::end();
?>

<script>
    window.onload =function(){
      $("#field-signupform-getcode").click(function(){
        var phoneNum = $("#signupform-email").val();
        if(phoneNum.length != 11){
          alert("请输入正确的11位手机号码");
          return;
        };
        <?php 
          $verify=Yii::$app->request->getCsrfToken();
        ?>;
        var buttonDom = this;
        var verify= "<?php echo Yii::$app->request->getCsrfToken()?>";       

        $.ajax({
            type  : "POST",
            url   : "/site/getsignupcode",
            dataType:"json",
            data:{"email":phoneNum,"_csrf-console":verify},
           success:function(json) {
                //alert("success");
                console.log(json);
                if(json.code == 0){
                    $(buttonDom).attr("disabled","disabled");
                }else {
                    $(".field-signupform-email").attr("class","form-group field-signupform-email required has-error");
                    $(".field-signupform-email .help-block-error").html(json.msg);
                }
            },error:function(){
              console.log(verify);
            }
        });

      })

      $("#form-signup").on("beforeSubmit",function(e){
        modal=$("#deny-modal")
        if(modal[0].className=="fade modal"){
          modal.modal()
          return false;
        }
      })

    $("button[name='agree']").click(function(){
        $("#form-signup").submit();
    })
}

    
$(".field-signupform-username ").find(".control-label").html('<em><img src="http://p6htqszz4.bkt.clouddn.com/login_name.png"></em>')
$(".field-signupform-email ").find(".control-label").html('<em><img src="http://p6htqszz4.bkt.clouddn.com/login_phone.png"></em>')
$(".field-signupform-password").find(".control-label").html('<em><img src="http://p6htqszz4.bkt.clouddn.com/login_password.png"></em>')
$(".field-signupform-code").find(".control-label").html('<em><img src="http://p6htqszz4.bkt.clouddn.com/login_password.png"></em>')




</script>


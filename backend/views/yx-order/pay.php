<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\YxOrder */
$this->registerJsFile(Yii::$app->params['webuploader']['fileDomain']."pingpp-js/dist/pingpp.js");

$this->registerCssFile(Yii::$app->params['webuploader']['fileDomain']."react/build/static/css/main.css");

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yx Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="yx-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a("支付宝支付", ['#'], ['class' => 'btn btn-primary']) ?> -->
        <input type="button" id="payBtn" class="btn btn-primary" value="支付宝支付"/>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'order_name',
            'address',
            'phone',
            [
        			'label' => '订单金额',
        			'value' => function ($model) {
        				return sprintf("%.2f",($model->order_money/100)).'元';
        			},
        		],
            //'order_money',
            'order_state',
            'order_memo',
            'usera_id',
            'usera_name',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
<script>
  var ch =  eval('(' + '<?php echo $chargeJson ?>' + ')');
  $("#payBtn").click(function(){
    pingpp.createPayment(ch, function(result, err){
       // 可按需使用 alert 方法弹出 log
        console.log(result);
        console.log(err.msg);
        console.log(err.extra);
        if (result == "success") {
          // 只有微信公众号 (wx_pub)、QQ 公众号 (qpay_pub)支付成功的结果会在这里返回，其他的支付结果都会跳转到 extra 中对应的 URL
        } else if (result == "fail") {
            // Ping++ 对象不正确或者微信公众号 / QQ公众号支付失败时会在此处返回
        } else if (result == "cancel") {
            // 微信公众号支付取消支付
        }
    });

  })
</script>

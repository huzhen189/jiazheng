<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\YxOrder */
$this->registerJsFile(Yii::$app->params['webuploader']['fromtEndDomain']."pingpp-js/dist/pingpp.js");
$this->registerJs(
   '
      $("#payBtn").click(function(){})
    '
);
$this->registerCssFile(Yii::$app->params['webuploader']['fromtEndDomain']."react/build/static/css/main.css");

$this->title = $model->order_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yx Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yx-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a("支付宝支付", ['#'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'order_id',
            'order_name',
            'address',
            'phone',
            'order_money',
            'order_state',
            'order_memo',
            'usera_id',
            'usera_name',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

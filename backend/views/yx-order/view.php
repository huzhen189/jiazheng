<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\YxOrder */

$this->title = $model->id;
$queryParams = Yii::$app->request->queryParams;
$index_url='index';
if(isset($queryParams['yx_user_id'])){
    $index_url='index?yx_user_id='.$queryParams['yx_user_id'];
}

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '订单列表'), 'url' => [$index_url]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yx-order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '修改'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '您确定删除此项吗?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'order_name',
            'address',
            'phone',
            'order_money',
            'order_state',
            'order_memo',
            'usera_name',
        [
            'attribute' => 'created_at',
            'value' => function ($model) {
                return date('Y-m-d H:i', $model->created_at);
            },
        ],
        [
            'attribute' => 'updated_at',
            'value' => function ($model) {
                return date('Y-m-d H:i', $model->updated_at);
            },
        ],  
        ],
    ]) ?>

</div>

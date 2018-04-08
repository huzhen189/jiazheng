<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\YxOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '订单列表');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yx-order-index">

    <h1><?=Html::encode($this->title);?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ;;;?>

<!--     <p>
        <?=Html::a(Yii::t('app', 'Create Yx Order'), ['create'], ['class' => 'btn btn-success']);?>
    </p> -->

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

            'id',
            'order_name',
            'address',
            'phone',
            'order_money',
            //'order_state',
            //'order_memo',
            //'yx_user_id',
            //'usera_name',
            //'created_at',
            //'updated_at',

        ['class' => 'yii\grid\ActionColumn', 'header' => '操作', 'template' => '{view} {update} {delete} {payment}', 'options' => ['style' => 'width: 100px;'],
            'buttons' => [
                'payment' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('app', 'Pay Ment'),
                        'aria-label' => Yii::t('app', 'Payment'),
                        'data-pjax' => '0',
                        'style' => 'padding:0 5px',
                    ];
                    return Html::a('<span class="glyphicon glyphicon-shopping-cart"></span>', $url, $options);
                },
                'view' => function ($url, $model, $yx_user_id) {
                    $queryParams = Yii::$app->request->queryParams;

                    if (isset($queryParams['yx_user_id'])) {
                        $url = "/yx-order/view?id=" . $model->id . '&yx_user_id=' . $queryParams['yx_user_id'];
                    } else {
                        $url = "/yx-order/view?id=" . $model->id;
                    }

                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => '查看']);
                },
            ],
        ],
    ],
]);?>
</div>

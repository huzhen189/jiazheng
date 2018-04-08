<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\YxOrder;
/* @var $this yii\web\View */
/* @var $searchModel common\models\YxOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerCssFile("/css/order/index.css");
$this->title = Yii::t('app', 'Yx Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yx-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showHeader' =>false,
        'columns' => [
            'id',
            'order_name',
            'address',
            'phone',
            'order_money',
            [
                'attribute' => 'order_state',
                'value' => function ($model) {
                    return YxOrder::getStateName($model->order_state);
                },
            ],
            'order_memo',
            'yx_user_id',
            'usera_name',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn', 'header' => '操作', 'template' => '{view} {update} {delete} {payment}','options'=>['style'=>'width: 100px;'],
              'buttons'=>[
        				'payment'=> function ($url, $model, $key) {
        					$options = [
                    'title' => Yii::t('app', 'Pay Ment'),
                    'aria-label' => Yii::t('app', 'Payment'),
        						'data-pjax' => '0',
        						'style'=>'padding:0 5px',
        					];
        					return Html::a('<span class="glyphicon glyphicon-shopping-cart"></span>', $url, $options);
        				},
        			],
            ],
        ],
        'layout'=>'{items}<div class="text-right tooltip-demo">{pager}</div>',
        'pager'=>[
            //'options'=>['class'=>'hidden']//关闭分页
            'firstPageLabel'=>"First",
            'prevPageLabel'=>'Prev',
            'nextPageLabel'=>'Next',
            'lastPageLabel'=>'Last',
        ],
    ]); ?>
</div>

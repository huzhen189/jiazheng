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
<style>
  .grid-view .filters{
    display: none;
  }
</style>
<br></br>
<?php //YxOrder::testSql(38,31); ?>

<div class="yx-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showHeader' => false,
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
            'user_name',
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

    <button class="btn" id="test_btn">测试订单生成</button>
</div>


<script>
  window.onload = function(){
     $("#test_btn").click(function(){
         var order_server = 97;
         var yx_company_id = 32;
         var yx_staff_id = 0;
         var start_time = 1523782800;
         var amount = 1;
         var order_type = 1;
         var extra_server = [
           {
             'id':20,
             'amount':1
           }
         ];

         $.ajax({
             type  : "POST",
             url   : "/yx-order/create",
             dataType:"json",
             data:{
                 "order_server":order_server,
                 "yx_company_id":yx_company_id,
                 "yx_staff_id":yx_staff_id,
                 "start_time":start_time,
                 "amount":amount,
                 "extra_server":extra_server,
                 "order_type":order_type,
             },
             success:function(json) {
               console.log(json);
               if(json.code == -1){
                 alert(json.msg);
               }else {
               }
             }
         });
     })

  }

</script>

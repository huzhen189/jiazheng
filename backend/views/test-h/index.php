<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TestHSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Test Hs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-h-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Test H'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('支付测试', ['testpay'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
	           [
                'attribute'=>'img_url',
                'format' => ['image',['width'=>'30','height'=>'30',]],
                'value' => function($model){
                        return $model->img_url;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<<?php
    //$result = json_decode($res, true); //接受一个 JSON 格式的字符串并且把它转换为 PHP 变量
    // $access_token = $result['access_token'];
    // echo $access_token;//
    // echo '<br>';//
    // print_r($result);
     echo $result; 
 ?>

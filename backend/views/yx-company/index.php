<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Region;
/* @var $this yii\web\View */
/* @var $searchModel common\models\HmCompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '公司列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yx-company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加公司', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute'=>'provinceName',
                'value' => function($model) {
                    return Region::getOneName($model->province);
                }
            ],
            [
                'attribute'=>'cityName',
                'value' => function($model) {
                    return Region::getOneName($model->city);
                }
            ],
            [
                'attribute'=>'districtName',
                'value' => function($model) {
                    return Region::getOneName($model->district);
                }
            ],
            //'address',
            //'telephone',
            //'charge_phone',
            //'charge_man',
            //'longitude',
            //'latitude',
            //'operating_radius',
            //'wechat',
            //'created_at',
            //'updated_at',
            //'number',
            [
              'attribute'=>'status',
              'filter'=>common\models\YxCompany::getCmpStatus(),
              'value' => function($model) {
                  return common\models\YxCompany::getCmpStatusName($model->status);
              }
            ],
           //  [
           //     'attribute'=>'business_licences',
           //     'format' => ['image',['width'=>'30','height'=>'30',]],
           //     'value' => function($model){
           //             return $model->business_licences;
           //     }
           // ],
            //'models',
            //'introduction:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作', 
                'template' => '{view} {update} {delete} {waiter-list}',
                'buttons'=>[
                    'waiter-list'=>function($url,$model){
                        $url="/yx-staff/index?company_id=".$model->id;
                        return Html::a('<span class="glyphicon glyphicon-user"></span>', $url, ['title' => '服务者列表', 'target' => '_blank']);
                    }
                ]
            ],
        ],
    ]); ?>
</div>

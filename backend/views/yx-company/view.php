<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Region;
/* @var $this yii\web\View */
/* @var $model common\models\YxCompany */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '公司列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yx-company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute'=>'province',
                'value' => function($model) {
                    return Region::getOneName($model->province);
                }
            ],
            [
                'attribute'=>'city',
                'value' => function($model) {
                    return Region::getOneName($model->city);
                }
            ],
            [
                'attribute'=>'district',
                'value' => function($model) {
                    return Region::getOneName($model->district);
                }
            ],
            'address',
            'telephone',
            'charge_phone',
            'charge_man',
            'longitude',
            'latitude',
            'operating_radius',
            'wechat',
            [
              'attribute'=>'created_at',
              'value' => function($model) {
                  return date('Y-m-d H:i', $model->created_at);
              }
            ],
            [
              'attribute'=>'updated_at',
              'value' => function($model) {
                  return date('Y-m-d H:i', $model->created_at);
              }
            ],
            'number',
            [
              'attribute'=>'status',
              'value' => function($model) {
                  return common\models\YxCompany::getCmpStatusName($model->status);
              }
            ],

            [
              'attribute'=>'models',
              'value' => function($model) {
                  return common\models\YxCompany::getCmpModelsName($model->models);
              }
            ],
            'introduction:ntext',
            [
         	   	'attribute'=>'business_licences',
         	   	'format' => ['image',['width'=>'200','height'=>'200',]],
         	   	'value' => function($model){
         	       		return $model->business_licences;
         	   	}
      	    ],
            [
              'attribute'=>'clinch',
              'value' => function($model) {
                  return common\models\YxCompany::getClinch($model->id);
              }
            ],
            [
              'attribute'=>'price',
              'value' => function($model) {
                  return common\models\YxCompany::getPrice($model->id);
              }
            ],
            [
              'attribute'=>'pre_clinch',
              'value' => function($model) {
                  return common\models\YxCompany::getPreClinch($model->id);
              }
            ],
            [
              'attribute'=>'pre_price',
              'value' => function($model) {
                  return common\models\YxCompany::getPrePrice($model->id);
              }
            ],
        ],
    ]) ?>

</div>

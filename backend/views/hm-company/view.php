<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\HmCompany */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Hm Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hm-company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'province',
            'city',
            'district',
            'address',
            'telephone',
            'charge_phone',
            'charge_man',
            'longitude',
            'latitude',
            'operating_radius',
            'wechat',
            'created_at',
            'updated_at',
            'number',
            'status',
            'business_licences',
            'models',
            'introduction:ntext',
        ],
    ]) ?>

</div>

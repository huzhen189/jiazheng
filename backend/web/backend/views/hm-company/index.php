<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HmCompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Hm Companies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hm-company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Hm Company'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'province',
            'city',
            'district',
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
            //'status',
            //'business_licences',
            //'models',
            //'introduction:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

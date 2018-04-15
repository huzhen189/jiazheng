<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\YxRulesSearch;
use common\models\YxRules;
/* @var $this yii\web\View */
/* @var $searchModel common\models\YxRulesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '规则');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yx-rules-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '新增'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'rules_id',
            'rules_title',
        [
            'attribute' => 'rules_type',
            'filter'=>YxRules::getRulesTypeMap(),
            'value' => function ($model) {
                return YxRules::getName($model->rules_type,'getRulesTypeMap');
            },
        ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

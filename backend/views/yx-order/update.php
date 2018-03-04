<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\YxOrder */

$this->title = Yii::t('app', 'Update Yx Order: {nameAttribute}', [
    'nameAttribute' => $model->order_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yx Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_id, 'url' => ['view', 'id' => $model->order_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="yx-order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

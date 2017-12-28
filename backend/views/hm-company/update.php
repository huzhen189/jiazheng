<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HmCompany */

$this->title = 'Update Hm Company: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Hm Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hm-company-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

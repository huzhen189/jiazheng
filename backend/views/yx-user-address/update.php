<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\YxUserAddress */

$this->title = 'Update Yx User Address: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Yx User Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'address' => $model->address]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="yx-user-address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

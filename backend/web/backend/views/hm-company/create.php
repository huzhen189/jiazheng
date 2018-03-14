<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\HmCompany */

$this->title = Yii::t('app', 'Create Hm Company');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hm Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hm-company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

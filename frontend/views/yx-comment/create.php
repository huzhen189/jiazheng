<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\YxComment */

$this->title = 'Create Yx Comment';
$this->params['breadcrumbs'][] = ['label' => 'Yx Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yx-comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

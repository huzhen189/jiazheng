<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\YxComment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Yx Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yx-comment-view">

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
            'content',
            'star',
            'yx_company_id',
            'yx_staff_id',
            'yx_user_id',
            'is_praise',
            'yx_order_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

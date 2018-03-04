<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\YxCompany;
use common\models\YxStaff;
/* @var $this yii\web\View */
/* @var $model common\models\YxStaff */

$this->title = $model->staff_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '员工列表'), 'url' => ['index?company_id='.$model->company_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yx-staff-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '修改'), ['update', 'id' => $model->staff_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->staff_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', '您确定要删除此项吗?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'staff_id',
            [
                'attribute'=>'companyName',
                'value' => function($model) {
                    return YxCompany::getOneName($model->company_id);
                }
            ],
            'staff_name',
            [
                'attribute'=>'staff_sex',
                'value' => function($model) {
                    return YxStaff::getCmpSexName($model->staff_sex);
                }
            ],
            'staff_age',
            [
               'attribute'=>'staff_img',
               'format' => ['image',['width'=>'200','height'=>'200',]],
               'value' => function($model){
                       return $model->staff_img;
               }
           ],
            'staff_idcard',
            'staff_intro',
            [
              'attribute'=>'staff_found',
              'value' => function($model) {
                  return date('Y-m-d H:i', $model->staff_found);
              }
            ],
            'staff_main_server',
            'staff_all_server',
            [
                'attribute'=>'staff_state',
                'value' => function($model) {
                    return YxStaff::getCmpStateName($model->staff_state);
                }
            ],
            'staff_memo',
            'staff_login_ip',
            'staff_login_time',
            'staff_account',
            'staff_password',
            [
              'attribute'=>'clinch',
              'value' => function($model) {
                  return YxStaff::getClinch($model->staff_id);
              }
            ],
            [
              'attribute'=>'price',
              'value' => function($model) {
                  return YxStaff::getPrice($model->staff_id);
              }
            ],
            [
              'attribute'=>'pre_clinch',
              'value' => function($model) {
                  return YxStaff::getPreClinch($model->staff_id);
              }
            ],
            [
              'attribute'=>'pre_price',
              'value' => function($model) {
                  return YxStaff::getPrePrice($model->staff_id);
              }
            ],
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\YxStaff;
/* @var $this yii\web\View */
/* @var $searchModel common\models\YxStaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '员工列表');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yx-staff-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php         
            $queryParams = Yii::$app->request->queryParams;
            $company_id=$queryParams['company_id'];
        ?>

        <?= Html::a(Yii::t('app', '添加员工'), ['create?company_id='.$company_id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'staff_id',
            // 'company_id',
            'staff_name',
            [
                'attribute'=>'staff_sex',
                'filter'=>YxStaff::getCmpSex(),
                'value' => function($model) {
                    return YxStaff::getCmpSexName($model->staff_sex);
                }
            ],
            'staff_age',
            //'staff_img',
            'staff_idcard',
            //'staff_intro',
            //'staff_found',
            //'staff_main_server',
            //'staff_all_server',
            [
              'attribute'=>'staff_state',
              'filter'=>YxStaff::getCmpState(),
              'value' => function($model) {
                  return YxStaff::getCmpStateName($model->staff_state);
              }
            ],
            //'staff_memo',
            //'staff_login_ip',
            //'staff_login_time',
            //'staff_account',
            //'staff_password',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

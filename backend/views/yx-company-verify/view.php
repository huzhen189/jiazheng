<?php

use common\models\Region;
use common\models\YxCompanyVerify;
use common\models\YxStaff;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\YxCompany;
/* @var $this yii\web\View */
/* @var $model common\models\YxCompanyVerify */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '公司审核列表'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yx-company-verify-view">

    <h1><?=Html::encode($this->title);?></h1>

    <p>
        <?=Html::a(Yii::t('app', '修改'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);?>
        <?=Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger',
    'data' => [
        'confirm' => Yii::t('app', '您确定要删除此项吗?'),
        'method' => 'post',
    ],
]);?>
    </p>

    <?=DetailView::widget([
    'model' => $model,
    'attributes' => [
        'company_id',
        'name',
        [
            'attribute' => 'province',
            'value' => function ($model) {
                return Region::getOneName($model->province);
            },
        ],
        [
            'attribute' => 'city',
            'value' => function ($model) {
                return Region::getOneName($model->city);
            },
        ],
        [
            'attribute' => 'district',
            'value' => function ($model) {
                return Region::getOneName($model->district);
            },
        ],
        'address',
        'telephone',
        'charge_phone',
        'charge_man',
        'longitude',
        'latitude',
        'operating_radius',
        'wechat',
        [
            'attribute' => 'created_at',
            'value' => function ($model) {
                return date('Y-m-d H:i', $model->created_at);
            },
        ],
        [
            'attribute' => 'updated_at',
            'value' => function ($model) {
                return date('Y-m-d H:i', $model->updated_at);
            },
        ],
        'number',
        // [
        //     'attribute' => 'status',
        //     'value' => function ($model) {
        //         return common\models\YxCompany::getCmpStatusName($model->status);
        //     },
        // ],

        [
            'attribute' => 'models',
            'value' => function ($model) {
                return common\models\YxCompany::getCmpModelsName($model->models);
            },
        ],
        [
            'attribute' => 'business_licences',
            'format' => ['image', ['width' => '200', 'height' => '200']],
            'value' => function ($model) {
                return $model->business_licences;
            },
        ],
        'introduction:ntext',
        [
            'attribute' => 'verify_sate',
            'value' => function ($model) {
                return common\models\YxCompanyVerify::getVerifyStateName($model->verify_sate);
            },
        ],
        'verify_memo:ntext',
        //'id',
        [
            'attribute' => 'main_server_id',
            'value' => function ($model) {
                return YxCompany::getAllServer($model->main_server_id);
            },
        ],
        [
            'attribute' => 'all_server_id',
            'value' => function ($model) {
                return YxCompany::getAllServer($model->all_server_id);
            },
        ],
       'query:ntext',
        // 'cmp_user_id',
        [
            'attribute' => 'image',
            'format' => ['image', ['width' => '200', 'height' => '200']],
            'value' => function ($model) {
                return $model->image;
            },
        ],
       'total_fraction',
       'base_fraction',
       'history_fraction',
       'clinch',
       'price',
        [
            'attribute' => 'manage_time',
            'value' => function ($model) {
                return YxStaff::getStaffTimeName($model->manage_time);
            },
        ],
       'banck_card',
       'alipay',
       'business_code',
    ],
]);?>
    <p>
        <?php 
            if($model->verify_sate==1){

         ?>
        <?=Html::a(Yii::t('app', '通过审核'), ['pass', 'id' => $model->id], ['class' => 'btn btn-success']);?>
        <?=Html::a('驳回审核', '#', [
            'id' => 'deny',
            'data-toggle' => 'modal',
            'data-target' => '#deny-modal',
            'class' => 'btn btn-danger',
        ]);?>
        <?php } ?>
    </p>
</div>
<?php

Modal::begin([
    'id' => 'deny-modal',
    'header' => '<h4 class="modal-title">驳回建议</h4>',
    //'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">提交</a>',
]);
// $requestUrl = Url::toRoute('test');
// $js = <<<JS
//     $.get('{$requestUrl}', {},
//         function (data) {
//             $('.modal-body').html(data);
//             console.log(data);
//         }
//     );
// JS;
$verify=Yii::$app->request->csrfToken;
$js = <<<JS
    var data='<form class="form-horizontal myform" method="post" enctype="multipart/form-data"><input name="_csrf-backend" type="hidden" id="_csrf-backend" value="{$verify}"><div class="form-group"><div class="col-sm-12"><textarea class="form-control" name="verify_memo" rows="12"></textarea></div></div><div class="form-group"><div class="col-sm-offset-2 col-sm-12"><button type="submit" class="btn btn-warning">提交</button></div></div></form>'
    $('.modal-body').html(data);
JS;
$this->registerJs($js);
Modal::end();
?>

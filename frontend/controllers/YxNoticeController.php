<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\YxNotice;

class YxNoticeController extends Controller {

  public function actionIndex(){
      $request = Yii::$app->request;
      $id = $request->get('id');
      $YxNotice = YxNotice::find()->where(['notice_id' => $id,'notice_state' => 1])->one();
      $this->getView()->title = $YxNotice['notice_title'];
      return $this->render('index', [
          'model' => $YxNotice,
      ]);
  }
}

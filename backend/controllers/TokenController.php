<?php

namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use common\tools\WechatCallbackapiTest;

/**
 * YxStaffController implements the CRUD actions for YxStaff model.
 */
class TokenController extends Controller
{
  public function behaviors()
  {
      return [
          'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                  'delete' => ['POST'],
              ],
          ],
      ];

  }
  public function actionToken()
  {
    /**
      * wechat php test
      */
      //define your token
      define("TOKEN", "wudiphp");
      $wechatObj = new WechatCallbackapiTest();
      $wechatObj->valid();
  }
}
?>

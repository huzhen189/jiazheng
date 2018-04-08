<?php

namespace frontend\controllers;

use Yii;
use common\models\YxOrder;
use frontend\models\YxOrderSearch;
use common\tools\CheckController;
use common\tools\Helper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \Pingpp\Pingpp;
use \Pingpp\WxpubOAuth;
/**
 * YxOrderController implements the CRUD actions for YxOrder model.
 */
class YxOrderController extends CheckController
{
    /**
     * @inheritdoc
     */
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

    /**
     * Lists all YxOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new YxOrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single YxOrder model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new YxOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new YxOrder();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing YxOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing YxOrder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPayment($id)
    {
        $isWechat = Helper::isWechatBrowser();
        $order = $this->findModel($id);
        return $this->render('payment', [
            'model' => $order,
            'isWechat' => $isWechat,
        ]);
    }
    public function actionPaysuccess($id)
    {
        $order = $this->findModel($id);
        return $this->render('paysuccess', [
            'model' => $order
        ]);
    }

    public function actionPay($id,$channel)
    {
        $order = $this->findModel($id);
        \Pingpp\Pingpp::setApiKey(Yii::$app->params['ping++']['API_KEY']);
        \Pingpp\Pingpp::setPrivateKeyPath(__DIR__ . '/../../'.Yii::$app->params['ping++']['PRIVATE_KEY_DIR']);

        $extra = [];
        switch ($channel) {
            case 'alipay_pc_direct':
                $extra = array(
                    'success_url' => Yii::$app->params['webuploader']['frontendEndDomain'].'yx-order/paysuccess?id='.$id,
                );
                break;
            case 'wx_pub':
                $cookies = Yii::$app->request->cookies;
                $wx_code = $cookies->getValue('wx_code');//下面有將怎麼獲取
                $wx_app_id = Yii::$app->params['wechat']['wx_app_id'];
                $wx_app_secret = Yii::$app->params['wechat']['wx_app_secret'];
                $open_id = WxpubOAuth::getOpenid($wx_app_id, $wx_app_secret, $wx_code);
                // return $this->render('pay', [
                //     'model' => $order,
                //     'res' => $open_id,
                // ]);
                $extra = array(
                    'open_id' => $open_id,// 用户在商户微信公众号下的唯一标识，获取方式可参考 pingpp-php/lib/WxpubOAuth.php
                );
                break;
        }
        try {
          $ch = \Pingpp\Charge::create(array(
            'order_no'  => '20180328'.$id,
            'amount'    => $order->order_money,//订单总金额, 人民币单位：分（如订单总金额为 1 元，此处请填 100）
            'app'       => array('id' => Yii::$app->params['ping++']['PAPP_ID']),
            'channel'   => $channel,
            'currency'  => 'cny',
            'client_ip' => '127.0.0.1',
            'subject'   => $order->order_name,
            'body'      => date('Y-m-d H:i', $order->created_at),
            'extra'     => $extra
          ));
          $chargeJson = json_encode($ch);
          //Yii::$app->response->cookies->remove('wx_code');
          return $this->render('pay', [
              'model' => $order,
              'chargeJson' => $chargeJson,
          ]);
        } catch (\Pingpp\Error\Base $e) { //如果发起支付请求失败，则抛出异常
             // 捕获报错信息
             if ($e->getHttpStatus() != NULL) {
                 header('Status: ' . $e->getHttpStatus());
                 echo $e->getHttpBody();
             } else {
                 echo $e->getMessage();
             }
         }
    }
    /**
    * 判断是否在微信客户端打开链接
    * 如果是就跳转到微信code的重定向url地址
    * 如果不是就跳到支付宝支付界面
    */
    public function actionGetcode($id,$channel)
   {
       $isWechat = Helper::isWechatBrowser();
       if($isWechat){
           $url = Helper::GetWxCodeUrl($id,$channel);
           header("Location: $url");
           exit();
       } else {
           $this->redirect(['yx-order/pay?id='.$id.'&channel='.$channel]);
       }
   }



   /**
    * 通过微信重定向url获取code，
    * 并且把code设置为cookie
    */

   public function actionGetwxcode()
   {
       $yx_order_id = Yii::$app->request->get('yx_order_id');
       $channel = Yii::$app->request->get('channel');
       $code = Yii::$app->request->get('code');
       if(!empty($code)){
           $cookies = Yii::$app->response->cookies;
           $cookies->add(new \yii\web\Cookie([
               'name' => 'wx_code',
               'value' => $code,
               'expire'=>time()+1800,
           ]));
       }
       $this->redirect(['yx-order/pay?id='.$yx_order_id.'&channel='.$channel]);
   }
    /**
     * Finds the YxOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return YxOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = YxOrder::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

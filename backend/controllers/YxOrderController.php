<?php

namespace backend\controllers;

use Yii;
use common\models\YxOrder;
use common\models\YxOrderSearch;
use common\tools\CheckController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \Pingpp\Pingpp;
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

    public function actionPay($id)
    {
        $order = $this->findModel($id);
        \Pingpp\Pingpp::setApiKey(Yii::$app->params['ping++']['API_KEY']);
        \Pingpp\Pingpp::setPrivateKeyPath(__DIR__ . '/../../'.Yii::$app->params['ping++']['PRIVATE_KEY_DIR']);
        $ch = \Pingpp\Charge::create(array(
          'order_no'  => $id,
          'amount'    => $order->order_money,//订单总金额, 人民币单位：分（如订单总金额为 1 元，此处请填 100）
          'app'       => array('id' => Yii::$app->params['ping++']['PAPP_ID']),
          'channel'   => 'alipay_pc_direct',
          'currency'  => 'cny',
          'client_ip' => '127.0.0.1',
          'subject'   => $order->order_name,
          'body'      => date('Y-m-d H:i', $order->created_at),
          'extra'     => array('success_url' => 'http://baidu.com/')
        ));
        $chargeJson = json_encode($ch);
        return $this->render('pay', [
            'model' => $order,
            'chargeJson' => $chargeJson,
        ]);
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

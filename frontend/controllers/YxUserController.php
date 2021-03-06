<?php

namespace frontend\controllers;

use Yii;
use common\models\YxUser;
use common\models\YxUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Region;

/**
 * YxUserController implements the CRUD actions for YxUser model.
 */
class YxUserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'update_city2' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all YxUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new YxUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single YxUser model.
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
     * Creates a new YxUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new YxUser();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing YxUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
     public function actionUpdate_city($id)
     {
         $model = $this->findModel($id);

         if ($model->load(Yii::$app->request->post()) && $model->save()) {
             Yii::$app->user->identity['id'] = $model['city'];
             return $this->goBack();
         }

         return $this->render('update_city', [
             'model' => $model,
         ]);
     }

     public function actionUpdate_city2()
     {
         $this->enableCsrfValidation = false;
         Yii::$app->response->format = 'json';
         $reJson = [ 'msg' => "失败", 'code' => -1];
         if(Yii::$app->request->isAjax) {
             $params = Yii::$app->request->post();
             if(!isset($params['yx_user_id']) || $params['yx_user_id'] <= 0 || !isset($params['province']) || !isset($params['city'])){
                 $reJson["msg"] = "用户信息有误";
                 return $reJson;
             }
             $yx_user_id = $params['yx_user_id'];
             $province = $params['province'];
             $city = $params['city'];
             $provinceId = Region::getOneId($province);
             $cityId = Region::getOneId($city);
             if($provinceId <= 0 || $cityId <= 0){
                 $reJson["msg"] = "用户信息有误";
                 return $reJson;
             }
             $model = $this->findModel($yx_user_id);
             $model->province = $provinceId;
             $model->city = $cityId;
             if ($model->save()) {
               $reJson["code"] = 0;
               $reJson["msg"] = "成功";
               return $reJson;
             }
         }
         return $reJson;
     }

    /**
     * Deletes an existing YxUser model.
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

    /**
     * Finds the YxUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return YxUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = YxUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actions()
    {
        $actions=parent::actions();
        $actions['get-region']=[
            'class'=>\chenkby\region\RegionAction::className(),
            'model'=>\common\models\Region::className()
        ];
        return $actions;
    }
}

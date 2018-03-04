<?php

namespace backend\controllers;

use common\models\YxStaff;
use common\models\YxStaffSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * YxStaffController implements the CRUD actions for YxStaff model.
 */
class YxStaffController extends Controller
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
     * Lists all YxStaff models.
     * @return mixed
     */
    public function actionIndex($company_id)
    {
        $searchModel = new YxStaffSearch();

        $queryParams = Yii::$app->request->queryParams;
        if(!empty($company_id)){
            if (!isset($queryParams['YxStaffSearch'])) {
                $queryParams['YxStaffSearch'] = ['company_id' => $company_id];
            } else {
                $queryParams['YxStaffSearch'] = array_merge($queryParams['YxStaffSearch'], ['company_id' => $company_id]);
            }  
        }else{
            $queryParams['YxStaffSearch'] = ['company_id' => -1];
        }

        print_r($queryParams);
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single YxStaff model.
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
     * Creates a new YxStaff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($company_id)
    {
        $model = new YxStaff();

        if ($model->load(Yii::$app->request->post())) {
            $model->company_id=$company_id;
            $model->staff_img = $model->staff_img[0];
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->staff_id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing YxStaff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->staff_img = $model->staff_img[0];
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->staff_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing YxStaff model.
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
     * Finds the YxStaff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return YxStaff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = YxStaff::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

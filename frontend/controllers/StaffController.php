<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\YxStaff;
use common\models\YxStaffServer;

/**
* 服务人员的Controller
 */

class StaffController extends Controller {

	public function actionIndex($staff_id) {
		$this->layout = 'layout1';
		$this->getView()->title = YxStaff::getStaffName($staff_id);
		$YxStaff = YxStaff::find()->where(['staff_id'=>$staff_id])->one();
		// 得到分数在前5位的服务人员
		$YxStaffArr = YxStaff::find()->orderby('staff_fraction desc')->limit(5)->all();
		$searchModel = new YxStaffServer();
		$queryParams = Yii::$app->request->queryParams;
		$dataProvider = $searchModel->getServerAll($queryParams);
		return $this->render('index',
			[
				'YxStaff'=>$YxStaff,
				'dataProvider'=>$dataProvider,
				'YxStaffArr' =>$YxStaffArr
			]);
	}
}

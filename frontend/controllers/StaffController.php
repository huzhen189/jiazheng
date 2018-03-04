<?php

namespace frontend\controllers;

use yii\web\Controller;

/**
* 服务人员的Controller
 */

class StaffController extends Controller {

	public function actionIndex() {
		$this->getView()->title = "服务者信息";
		$this->layout = 'layout1';
		return $this->render('index');
	} 
}
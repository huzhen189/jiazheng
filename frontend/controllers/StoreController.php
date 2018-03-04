<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;

/**
* 商家的Controller
 */

class StoreController extends Controller {
	
	public function actionIndex() {
		$this->getView()->title = "商家";  
		$this->layout = 'layout1';
		return $this->render('index');
	}

	public function actionLicense() {
		$this->getView()->title = "商家执照";  
		$this->layout = 'layout2';
		return $this->render('license');
	}
}
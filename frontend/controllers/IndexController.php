<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;

/**
* 主页的Controller
 */

class IndexController extends Controller {
	
	public function actionIndex() {
		$this->getView()->title = "首页"; 
		$this->layout = "layout1";
		return $this->render("index");
	}
}
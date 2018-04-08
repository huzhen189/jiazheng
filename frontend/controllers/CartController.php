<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii;


/**
* 购物车的Controlller
*/
class CartController extends Controller {

	public function actionIndex() {
		$this->getView()->title = "购物车"; 
		$this->layout = "layout2";
		return $this->render("index");
	}
}

<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii;


/**
* 购物车的Controlller
*/
class CartController extends Controller {

	public function actionIndex() {
		$user = Yii::$app->user;
		$this->getView()->title = "购物车";
		$this->layout = "layout2";
		// print_r($user);
		return $this->render("index");
	}
}

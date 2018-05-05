<?php

namespace wapend\controllers;

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

	public function actionUser() {
		$request = Yii::$app->request;
		$js_code = $request->get('code');
		$url = 'https://api.weixin.qq.com/sns/jscode2session?appid=wx4bc381ce654a5121&secret=80a9b4c56fb8bf6dff1065f683f9a36c&js_code='.$js_code.'&grant_type=authorization_code';
		$res = file_get_contents($url);
		return $res;
	}
}

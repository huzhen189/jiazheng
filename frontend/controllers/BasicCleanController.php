<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use common\models\YxCompany;
use common\models\YxStaff;
use common\models\YxServer;
use Yii;

/**
* 基础保洁主页的Controller
 */

class BasicCleanController extends Controller {

	// 商家信息
	public function actionIndex() {
		$this->layout = "layout2";
		$request = Yii::$app->request;
		$serverId = $request->get('server_id');
		$serverName = YxServer::getServerName($serverId);
		$this->getView()->title = $serverName;
		$sort = $request->get('sort');
		if($sort === 'fraction') {
			$YxCompany = YxCompany::find()->where(['like','query',''.$serverName])->orderBy('total_fraction desc');
		}else if($sort === 'price') {
			$YxCompany = YxCompany::find()->where(['like','query',''.$serverName])->orderBy('total_fraction');
		}else {
			$sort = 'default';
			$YxCompany = YxCompany::find()->where(['like','query',''.$serverName]);
		}
		$pages = new Pagination([
			'totalCount' => $YxCompany->count(),
			'pageSize' => 4,
			'pageSizeParam'=>false
		]);
		$models = $YxCompany->offset($pages->offset)
		    ->limit($pages->limit)
		    ->all();
		return $this->render('index', [
		    'models' => $models,
		    'pages' => $pages,
		    'sort' => $sort,
		    'serverId' => $serverId
		]);
	}
	// 预约
	public function actionIndexReserve() {
		$request = Yii::$app->request;
		$name = $request->post('name');
		$time = $request->post('time');
		print_r(json_encode($name));
	}

	// 服务者信息
	public function actionStaff() {
		$this->layout = "layout2";
		$request = Yii::$app->request;
		$serverId = $request->get('server_id');
		$serverName = YxServer::getServerName($serverId);
		$this->getView()->title = $serverName;
		$sort = $request->get('sort');
		if($sort === 'fraction') {
			$YxStaff = YxStaff::find()->where(['like','staff_query',''.$serverName])->orderBy('staff_fraction desc');
		}else if($sort === 'price') {
			$YxStaff = YxStaff::find()->where(['like','staff_query',''.$serverName])->orderBy('staff_fraction');
		}else {
			$sort = 'default';
			$YxStaff = YxStaff::find()->where(['like','staff_query',''.$serverName]);
		}
		$pages = new Pagination([
			'totalCount' => $YxStaff->count(),
			'pageSize' => 6,
			'pageSizeParam'=>false
		]);
		$models = $YxStaff->offset($pages->offset)
		    ->limit($pages->limit)
		    ->all();
		return $this->render('staff', [
		    'models' => $models,
		    'pages' => $pages,
		    'sort' => $sort,
		    'serverId' => $serverId
		]);
	}

	public function actionDetail() {
		$this->getView()->title = "商家详情";
		$this->layout = "layout2";
		$request = Yii::$app->request;
		$companyId = $request->get('company');
		$YxCompany = new YxCompany();
		$YxCompany = $YxCompany::find()->where(['id' => $companyId])->one();
		// 原象推荐
		$recommendArr = $YxCompany::find()->orderby('total_fraction desc')->limit(5)->all();
		return $this->render("detail", [
			'YxCompany' => $YxCompany,
			'recommendArr' => $recommendArr
		]);
	}


}

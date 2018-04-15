<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use common\models\YxCompany;
use common\models\YxStaff;
use common\models\YxServer;
use Yii;

/**
* 其它服务(除专项保洁和基础保洁外)的Controller
 */

class OtherServicesController extends Controller {

	// 其它服务（默认是显示商家信息）
	public function actionIndex() {
		$this->layout = "layout2";
		$request = Yii::$app->request;
		$server_parent = $request->get('server_parent');
		$YxServerAll = YxServer::getServerSecond($server_parent);
		$serverId = $request->get('server_id');
		// print_r( $YxServerAll);
		if (!$serverId) {
			$serverId = $YxServerAll[0]['server_id'];
		}
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
				'serverId' => $serverId,
				'serverParent' => $server_parent,
				'YxServerAll' => $YxServerAll
		]);
	}

	// 服务者信息
	public function actionStaff() {
		$this->layout = "layout2";
		$request = Yii::$app->request;
		$server_parent = $request->get('server_parent');
		$YxServerAll = YxServer::getServerSecond($server_parent);
		$serverId = $request->get('server_id');
		if (!$serverId) {
			$serverId = $YxServerAll[0]['server_id'];
		}
		$serverName = YxServer::getServerName($serverId);
		$this->getView()->title = $serverName;
		$sort = $request->get('sort');
		if($sort === 'fraction') {
			$YxStaff = YxStaff::find()->where(['like','staff_query',''.$serverName])->orderBy('staff_fraction desc');
		}else if($sort === 'price') {
			$YxStaff = YxStaff::find()->where(['like','staff_query',''.$serverName])->orderBy('staff_fraction');
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
				'serverId' => $serverId,
				'serverParent' => $server_parent,
				'YxServerAll' => $YxServerAll
			]);
	}

	// 商家详情
	public function actionDetail() {
		$this->getView()->title = "商家详情";
		$this->layout = "layout2";
		$request = Yii::$app->request;
		$companyId = $request->get('company');
		$YxCompany = YxCompany::find()->where(['id' => $companyId])->one();
		return $this->render("detail", [
			'YxCompany' => $YxCompany
		]);
	}


}

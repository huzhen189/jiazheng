<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use common\models\YxCompany;
use common\models\YxStaff;
use common\models\YxServer;
use Yii;

/**
* 专项保洁主页的Controller
 */

class SpecialCleanController extends Controller {

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
}

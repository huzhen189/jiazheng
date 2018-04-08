<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use common\models\YxCompany;
use common\models\YxStaff;
use common\models\YxServer;
use Yii;

/**
* 商家的Controller
 */

class CompanyController extends Controller {

	public function actionStaff() {
		$this->layout = 'layout2';
		$request = Yii::$app->request;
		$companyId = $request->get('company_id');
		$serverId = $request->get('server_id');
		$sort = $request->get('sort');
		$serverName = YxServer::getServerName($serverId);
		$this->getView()->title = $serverName;
		if($sort === 'fraction') {
			$YxStaff = YxStaff::find()->where(['company_id'=>$companyId])->andWhere(['like','staff_query',''.$serverName]);
		}else if($sort === 'price') {
			$YxStaff = YxStaff::find()->where(['company_id'=>$companyId])->andWhere(['like','staff_query',''.$serverName])->orderBy('staff_fraction desc');
		}else {
			$sort = 'default';
			$YxStaff = YxStaff::find()->where(['company_id'=>$companyId])->andWhere(['like','staff_query',''.$serverName])->orderBy('staff_fraction');
		}
		// 原象推荐
		$recommendArr = YxCompany::find()->orderby('total_fraction desc')->limit(5)->all();
		$pages = new Pagination([
			'totalCount' => $YxStaff->count(),
			'pageSize' => 8,
			'pageSizeParam'=>false
		]);
		$models = $YxStaff->offset($pages->offset)
		    ->limit($pages->limit)
		    ->all();
		return $this->render('staff', [
		    'models' => $models,
		    'pages' => $pages,
		    'serverId' =>  $serverId,
				'companyId' => $companyId,
				'sort' => $sort,
				'recommendArr' => $recommendArr
		]);
	}

	public function actionLicense() {
		$this->getView()->title = "商家执照";
		$this->layout = 'layout2';
		return $this->render('license');
	}
}

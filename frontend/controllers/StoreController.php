<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\YxCompany;
use Yii;


/**
* 购物车的Controlller
*/
class StoreController extends Controller {

	public function actionIndex() {
		$this->layout = "layout2";
    $this->getView()->title = "商家搜索";
    $request = Yii::$app->request;
    $companyAll = $request->get('company_all');
		$searchContent = $request->get('searchContent');
		if ($companyAll) {
			$comma_separated = explode(",", $companyAll);
			$ids = 'yx_company.id = ';
	    foreach ($comma_separated as $key => $value) {
	      if($key == 0) {
	        $ids = $ids.$value;
	      }else {
	        $ids = $ids.' or yx_company.id = '.$value;
	      }
	    }
	    $sql = 'select DISTINCT(yx_company.id),yx_company.name,yx_company.image,yx_company.introduction,yx_company.total_fraction'.
	    ' from yx_company inner join yx_cmp_server where yx_cmp_server.company_id = yx_company.id and yx_company.status = 2 and ('.$ids.') order by total_fraction desc';
	    $companyAll = Yii::$app->db->createCommand($sql)->queryAll();
		}else {
			$companyAll = [];
		}

		return $this->render("index",[
      'companyAll' => $companyAll,
			'searchContent' => $searchContent,
      'serverId' => 30,
    ]);
	}
}

<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\YxBanner;
use common\models\YxActivity;
use common\models\YxRecomLeft;
use common\models\YxRecomRight;
use common\models\YxCompany;
use common\models\YxStaff;
use Yii;

/**
* 主页的Controller
 */

class IndexController extends Controller {

	public function actionIndex() {
		$this->getView()->title = "首页";
		$this->layout = "layout1";
		$YxBanner = YxBanner::find()->limit(4)->all();
		$YxRecomLeft = YxRecomLeft::find()->limit(4)->all();
		$YxActivity = YxActivity::find()->one();
		$YxRecomRight = YxRecomRight::find()->one();
		$YxCompany = YxCompany::find()->where(['status'=>2])->limit(4)->all();
		$YxStaff = YxStaff::find()->orderby('staff_fraction desc')->limit(8)->all();
		return $this->render("index", [
            'YxBanner' => $YxBanner,
            'YxRecomLeft' => $YxRecomLeft,
            'YxActivity' => $YxActivity,
            'YxRecomRight' => $YxRecomRight,
            'YxCompany' => $YxCompany,
            'YxStaff' => $YxStaff
        ]);
	}
}

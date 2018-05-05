<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use common\models\YxCompany;
use common\models\YxStaff;
use common\models\YxServer;
use common\models\Region;
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
		if (!$serverId) {
			$serverId = $YxServerAll[0]['server_id'];
		}

		$serverName = YxServer::getServerName($serverId);
		$this->getView()->title = $serverName;
		$sort = $request->get('sort');

		// 初始化省、市、区
		$province 	 = null;
		$provinceAll = null;
		$city 			 = null;
		$cityAll 		 = null;
		$county 		 = null;
		$countyAll 	 = null;
		// 当用户登录时
		if(Yii::$app->user->identity) {
			// 用户登录时$userIs为1
			$userIs = 1;
			// 获取地区
			$user_info = Yii::$app->user->identity;
			// 获取地区下的所有县区
			$countyAll = Region::getRegion($user_info['city']);
			$county = $request->get('county');

			// 服务地区的html
			$serviceArea = '<select id="area_list" style="height: 25px;margin: 0 10px;"><option value="0"  />全部</option>';
			foreach ($countyAll as $key => $value) {
				if($county == $key) {
					$serviceArea.='<option value="'.$key.'"  selected/>'.$value.'</option>';
					continue;
				}
				$serviceArea.='<option value="'.$key.'"  />'.$value.'</option>';
			}
			$serviceArea.='</select>';
			if($sort === 'fraction') {
				if ($county) {
					$YxCompany = YxCompany::find()->select(['*'])
										->innerjoin('yx_cmp_server', 'yx_cmp_server.company_id=yx_company.id')
											->where(['yx_company.status'=>2,'yx_cmp_server.server_id'=>$serverId,'yx_company.city'=>$user_info['city'],'yx_company.district'=>$county])->orderBy('yx_company.total_fraction desc');
				}else {
					$YxCompany = YxCompany::find()->select(['*'])
										->innerjoin('yx_cmp_server', 'yx_cmp_server.company_id=yx_company.id')
											->where(['yx_company.status'=>2,'yx_cmp_server.server_id'=>$serverId,'yx_company.city'=>$user_info['city']])->orderBy('yx_company.total_fraction desc');
				}

			}else if($sort === 'price') {
				if ($county) {
					$YxCompany = YxCompany::find()->select(['*'])
										->innerjoin('yx_cmp_server', 'yx_cmp_server.company_id=yx_company.id')
											->where(['yx_company.status'=>2,'yx_cmp_server.server_id'=>$serverId,'yx_company.city'=>$user_info['city'],'yx_company.district'=>$county])->orderBy('yx_cmp_server.server_price desc');
				}else {
					$YxCompany = YxCompany::find()->select(['*'])
										->innerjoin('yx_cmp_server', 'yx_cmp_server.company_id=yx_company.id')
											->where(['yx_company.status'=>2,'yx_cmp_server.server_id'=>$serverId,'yx_company.city'=>$user_info['city']])->orderBy('yx_cmp_server.server_price desc');
				}

			}else {
				$sort = 'fraction';
				if ($county) {
					$YxCompany = YxCompany::find()->select(['*'])
										->innerjoin('yx_cmp_server', 'yx_cmp_server.company_id=yx_company.id')
											->where(['yx_company.status'=>2,'yx_cmp_server.server_id'=>$serverId,'yx_company.city'=>$user_info['city'],'yx_company.district'=>$county])->orderBy('yx_company.total_fraction desc');
				}else {
					$YxCompany = YxCompany::find()->select(['*'])
										->innerjoin('yx_cmp_server', 'yx_cmp_server.company_id=yx_company.id')
											->where(['yx_company.status'=>2,'yx_cmp_server.server_id'=>$serverId,'yx_company.city'=>$user_info['city']])->orderBy('yx_company.total_fraction desc');
				}
			}
		}else {
				// 用户未登录时$userIs为0
				$userIs = 0;
				//用户未登录
				$province = $request->get('province');
				$city = $request->get('city');
				// 判断是否带省（$province）和市（city）的参数

				// 得到所有省
  		 	 $provinceAll = Region::getRegion(0);
 			 // 服务地区的html
  			 $serviceArea = '<select id="province_list" style="height: 25px;margin: 0 10px;"><option value="0"/>全部</option>';
   		 foreach ($provinceAll as $key => $value) {
   			 if($province == $key) {
   				 $serviceArea.='<option value="'.$key.'"  selected/>'.$value.'</option>';
   				 continue;
   			 }
   			 $serviceArea.='<option value="'.$key.'"  />'.$value.'</option>';
   		 }
  	 		 $serviceArea.='</select>';
 			 // 带了省参数
 			 if($province>0) {
 				 // 得到所有省下面的市
 				 $cityAll = Region::getRegion($province);
 				 $serviceArea.= '<select id="city_list" style="height: 25px;margin: 0 10px;"><option value="0"/>全部</option>';
 	 			 foreach ($cityAll as $key => $value) {
 	 				 if($city == $key) {
 	 					 $serviceArea.='<option value="'.$key.'"  selected/>'.$value.'</option>';
 	 					 continue;
 	 				 }
 	 					 $serviceArea.='<option value="'.$key.'"  />'.$value.'</option>';
 	 			 }
 	 			 $serviceArea.='</select>';
 			 }

			 if($sort === 'fraction') {
 				if($province>0 && $city==0) {
 					$YxCompany = YxCompany::find()->select(['*'])
 										->innerjoin('yx_cmp_server', 'yx_cmp_server.company_id=yx_company.id')
 											->where(['yx_company.status'=>2,'yx_cmp_server.server_id'=>$serverId,'yx_company.province'=>$province])->orderBy('yx_company.total_fraction desc');
 				}elseif($province>0 && $city>0) {
 					$YxCompany = YxCompany::find()->select(['*'])
 										->innerjoin('yx_cmp_server', 'yx_cmp_server.company_id=yx_company.id')
 											->where(['yx_company.status'=>2,'yx_cmp_server.server_id'=>$serverId,'yx_company.province'=>$province,'yx_company.city'=>$city])->orderBy('yx_company.total_fraction desc');
 				}else {
 					$YxCompany = YxCompany::find()->select(['*'])
 										->innerjoin('yx_cmp_server', 'yx_cmp_server.company_id=yx_company.id')
 											->where(['yx_company.status'=>2,'yx_cmp_server.server_id'=>$serverId])->orderBy('yx_company.total_fraction desc');
 				}
 			}else if($sort === 'price') {
 				if($province>0 && $city==0) {
 					$YxCompany = YxCompany::find()->select(['*'])
 										->innerjoin('yx_cmp_server', 'yx_cmp_server.company_id=yx_company.id')
 											->where(['yx_company.status'=>2,'yx_cmp_server.server_id'=>$serverId,'yx_company.province'=>$province])->orderBy('yx_cmp_server.server_price desc');
 				}elseif ($province>0 && $city>0) {
 					$YxCompany = YxCompany::find()->select(['*'])
 										->innerjoin('yx_cmp_server', 'yx_cmp_server.company_id=yx_company.id')
 											->where(['yx_company.status'=>2,'yx_cmp_server.server_id'=>$serverId,'yx_company.province'=>$province,'yx_company.city'=>$city])->orderBy('yx_cmp_server.server_price desc');
 				}else {
 					$YxCompany = YxCompany::find()->select(['*'])
 										->innerjoin('yx_cmp_server', 'yx_cmp_server.company_id=yx_company.id')
 											->where(['yx_company.status'=>2,'yx_cmp_server.server_id'=>$serverId])->orderBy('yx_cmp_server.server_price desc');
 				}
 			}else {
 				$sort = 'fraction';
				if($province>0 && $city==0) {
 					$YxCompany = YxCompany::find()->select(['*'])
 										->innerjoin('yx_cmp_server', 'yx_cmp_server.company_id=yx_company.id')
 											->where(['yx_company.status'=>2,'yx_cmp_server.server_id'=>$serverId,'yx_company.province'=>$province])->orderBy('yx_company.total_fraction desc');
 				}elseif($province>0 && $city>0) {
 					$YxCompany = YxCompany::find()->select(['*'])
 										->innerjoin('yx_cmp_server', 'yx_cmp_server.company_id=yx_company.id')
 											->where(['yx_company.status'=>2,'yx_cmp_server.server_id'=>$serverId,'yx_company.province'=>$province,'yx_company.city'=>$city])->orderBy('yx_company.total_fraction desc');
 				}else {
 					$YxCompany = YxCompany::find()->select(['*'])
 										->innerjoin('yx_cmp_server', 'yx_cmp_server.company_id=yx_company.id')
 											->where(['yx_company.status'=>2,'yx_cmp_server.server_id'=>$serverId])->orderBy('yx_company.total_fraction desc');
 				}
 			}
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
				'YxServerAll' => $YxServerAll,
				'serviceArea' => $serviceArea,
				'userIs' => $userIs
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

		// 初始化省、市、区
		$province 	 = null;
		$provinceAll = null;
		$city 			 = null;
		$cityAll 		 = null;
		$county 		 = null;
		$countyAll 	 = null;
		// 当用户登录时
		// 当用户登录时
		if(Yii::$app->user->identity) {
			// 用户登录时$userIs为1
			$userIs = 1;
			// 获取地区
			$user_info = Yii::$app->user->identity;
			// 获取地区下的所有县区
			$countyAll = Region::getRegion($user_info['city']);
			$county = $request->get('county');

			// 服务地区的html
			$serviceArea = '<select id="area_list" style="height: 25px;margin: 0 10px;"><option value="0"/>全部</option>';
			foreach ($countyAll as $key => $value) {
				if($county == $key) {
					$serviceArea.='<option value="'.$key.'"  selected/>'.$value.'</option>';
					continue;
				}
				$serviceArea.='<option value="'.$key.'"  />'.$value.'</option>';
			}
			$serviceArea.='</select>';
			if($sort === 'fraction') {
				if ($county) {
					$YxStaff = YxStaff::find()->select(['*'])
										->innerjoin('yx_company', 'yx_company.id=yx_staff.company_id')
										->innerjoin('yx_staff_server', 'yx_staff_server.staff_id=yx_staff.staff_id')
											->where(['yx_staff.staff_state'=>1,'yx_staff_server.server_id'=>$serverId,'yx_company.city'=>$user_info['city'],'yx_company.district'=>$county])->orderBy('yx_staff.staff_fraction desc');
				}else {
					$YxStaff = YxStaff::find()->select(['*'])
										->innerjoin('yx_company', 'yx_company.id=yx_staff.company_id')
										->innerjoin('yx_staff_server', 'yx_staff_server.staff_id=yx_staff.staff_id')
											->where(['yx_staff.staff_state'=>1,'yx_staff_server.server_id'=>$serverId,'yx_company.city'=>$user_info['city']])->orderBy('yx_staff.staff_fraction desc');
				}

			}else if($sort === 'price') {
				if ($county) {
					$YxStaff = YxStaff::find()->select(['*'])
										->innerjoin('yx_company', 'yx_company.id=yx_staff.company_id')
										->innerjoin('yx_staff_server', 'yx_staff_server.staff_id=yx_staff.staff_id')
											->where(['yx_staff.staff_state'=>1,'yx_staff_server.server_id'=>$serverId,'yx_company.city'=>$user_info['city'],'yx_company.district'=>$county])->orderBy('yx_staff_server.server_price desc');
				}else {
					$YxStaff = YxStaff::find()->select(['*'])
										->innerjoin('yx_company', 'yx_company.id=yx_staff.company_id')
										->innerjoin('yx_staff_server', 'yx_staff_server.staff_id=yx_staff.staff_id')
											->where(['yx_staff.staff_state'=>1,'yx_staff_server.server_id'=>$serverId,'yx_company.city'=>$user_info['city']])->orderBy('yx_staff_server.server_price desc');
				}

			} else {
				$sort = 'fraction';
				if ($county) {
					$YxStaff = YxStaff::find()->select(['*'])
										->innerjoin('yx_company', 'yx_company.id=yx_staff.company_id')
										->innerjoin('yx_staff_server', 'yx_staff_server.staff_id=yx_staff.staff_id')
											->where(['yx_staff.staff_state'=>1,'yx_staff_server.server_id'=>$serverId,'yx_company.city'=>$user_info['city'],'yx_company.district'=>$county])->orderBy('yx_staff.staff_fraction desc');
				}else {
					$YxStaff = YxStaff::find()->select(['*'])
										->innerjoin('yx_company', 'yx_company.id=yx_staff.company_id')
										->innerjoin('yx_staff_server', 'yx_staff_server.staff_id=yx_staff.staff_id')
											->where(['yx_staff.staff_state'=>1,'yx_staff_server.server_id'=>$serverId,'yx_company.city'=>$user_info['city']])->orderBy('yx_staff.staff_fraction desc');
				}
			}
		}else {
			// 用户未登录时$userIs为0
			$userIs = 0;
			//用户未登录
			$province = $request->get('province');
			$city = $request->get('city');
			// 判断是否带省（$province）和市（city）的参数

			// 得到所有省
			$provinceAll = Region::getRegion(0);
			// 服务地区的html
			$serviceArea = '<select id="province_list" style="height: 25px;margin: 0 10px;"><option value="0"/>全部</option>';
			foreach ($provinceAll as $key => $value) {
				if($province == $key) {
					$serviceArea.='<option value="'.$key.'"  selected/>'.$value.'</option>';
					continue;
				}
				$serviceArea.='<option value="'.$key.'"  />'.$value.'</option>';
			}
			$serviceArea.='</select>';
			// 带了省参数
			if($province>0) {
				// 得到所有省下面的市
				$cityAll = Region::getRegion($province);
				$serviceArea.= '<select id="city_list" style="height: 25px;margin: 0 10px;"><option value="0"/>全部</option>';
				foreach ($cityAll as $key => $value) {
					if($city == $key) {
						$serviceArea.='<option value="'.$key.'"  selected/>'.$value.'</option>';
						continue;
					}
					$serviceArea.='<option value="'.$key.'"  />'.$value.'</option>';
				}
				$serviceArea.='</select>';
			}

			if($sort === 'fraction') {
 			 if($province>0 && $city==0) {
 				 $YxStaff = YxStaff::find()->select(['*'])
 									 ->innerjoin('yx_company', 'yx_company.id=yx_staff.company_id')
 									 ->innerjoin('yx_staff_server', 'yx_staff_server.staff_id=yx_staff.staff_id')
 										 ->where(['yx_staff.staff_state'=>1,'yx_staff_server.server_id'=>$serverId,'yx_company.province'=>$province])->orderBy('yx_staff.staff_fraction desc');
 			 }elseif ($province>0 && $city>0) {
 				 $YxStaff = YxStaff::find()->select(['*'])
 									 ->innerjoin('yx_company', 'yx_company.id=yx_staff.company_id')
 									 ->innerjoin('yx_staff_server', 'yx_staff_server.staff_id=yx_staff.staff_id')
 										 ->where(['yx_staff.staff_state'=>1,'yx_staff_server.server_id'=>$serverId,'yx_company.province'=>$province,'yx_company.city'=>$city])->orderBy('yx_staff.staff_fraction desc');
 			 }else {
 				 $YxStaff = YxStaff::find()->select(['*'])
 									 ->innerjoin('yx_company', 'yx_company.id=yx_staff.company_id')
 									 ->innerjoin('yx_staff_server', 'yx_staff_server.staff_id=yx_staff.staff_id')
 										 ->where(['yx_staff.staff_state'=>1,'yx_staff_server.server_id'=>$serverId])->orderBy('yx_staff.staff_fraction desc');
 			 }

 		 }else if($sort === 'price') {
 			 if($province>0 && $city==0) {
 				 $YxStaff = YxStaff::find()->select(['*'])
 									 ->innerjoin('yx_company', 'yx_company.id=yx_staff.company_id')
 									 ->innerjoin('yx_staff_server', 'yx_staff_server.staff_id=yx_staff.staff_id')
 										 ->where(['yx_staff.staff_state'=>1,'yx_staff_server.server_id'=>$serverId,'yx_company.province'=>$province])->orderBy('yx_staff_server.server_price desc');
 			 }elseif ($province>0 && $city>0) {
 				 $YxStaff = YxStaff::find()->select(['*'])
 									 ->innerjoin('yx_company', 'yx_company.id=yx_staff.company_id')
 									 ->innerjoin('yx_staff_server', 'yx_staff_server.staff_id=yx_staff.staff_id')
 										 ->where(['yx_staff.staff_state'=>1,'yx_staff_server.server_id'=>$serverId,'yx_company.province'=>$province,'yx_company.city'=>$city])->orderBy('yx_staff_server.server_price desc');
 			 }else {
 				 $YxStaff = YxStaff::find()->select(['*'])
 									 ->innerjoin('yx_company', 'yx_company.id=yx_staff.company_id')
 									 ->innerjoin('yx_staff_server', 'yx_staff_server.staff_id=yx_staff.staff_id')
 										 ->where(['yx_staff.staff_state'=>1,'yx_staff_server.server_id'=>$serverId])->orderBy('yx_staff_server.server_price desc');
 			 }

 		 } else {
 			 $sort = 'fraction';
 			 if($province>0 && $city==0) {
 				 $YxStaff = YxStaff::find()->select(['*'])
 									 ->innerjoin('yx_company', 'yx_company.id=yx_staff.company_id')
 									 ->innerjoin('yx_staff_server', 'yx_staff_server.staff_id=yx_staff.staff_id')
 										 ->where(['yx_staff.staff_state'=>1,'yx_staff_server.server_id'=>$serverId,'yx_company.province'=>$province])->orderBy('yx_staff.staff_fraction desc');
 			 }elseif ($province>0 && $city>0) {
 				 $YxStaff = YxStaff::find()->select(['*'])
 									 ->innerjoin('yx_company', 'yx_company.id=yx_staff.company_id')
 									 ->innerjoin('yx_staff_server', 'yx_staff_server.staff_id=yx_staff.staff_id')
 										 ->where(['yx_staff.staff_state'=>1,'yx_staff_server.server_id'=>$serverId,'yx_company.province'=>$province,'yx_company.city'=>$city])->orderBy('yx_staff.staff_fraction desc');
 			 }else {
 				 $YxStaff = YxStaff::find()->select(['*'])
 									 ->innerjoin('yx_company', 'yx_company.id=yx_staff.company_id')
 									 ->innerjoin('yx_staff_server', 'yx_staff_server.staff_id=yx_staff.staff_id')
 										 ->where(['yx_staff.staff_state'=>1,'yx_staff_server.server_id'=>$serverId])->orderBy('yx_staff.staff_fraction desc');
 			 }
 		 }
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
				'YxServerAll' => $YxServerAll,
				'serviceArea' => $serviceArea,
				'userIs' => $userIs
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

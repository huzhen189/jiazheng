<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yx_staff_server".
 *
 * @property int $staff_id 员工ID
 * @property int $server_id 服务ID
 * @property int $server_least 最低服务量
 * @property int $server_price 服务价格
* @property int $server_parent_id 一级服务ID
* 
 * @property YxStaff $staff
 * @property YxServer $server
 */
class YxStaffServer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yx_staff_server';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['server_id'], 'required'],
            [['staff_id', 'server_id', 'server_least', 'server_parent_id','server_type'], 'integer'],
            [['server_price','server_name'],'safe'],
            [['staff_id', 'server_id'], 'unique', 'targetAttribute' => ['staff_id', 'server_id']],
            [['staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => YxStaff::className(), 'targetAttribute' => ['staff_id' => 'staff_id']],
            [['server_id'], 'exist', 'skipOnError' => true, 'targetClass' => YxServer::className(), 'targetAttribute' => ['server_id' => 'server_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'staff_id' => '员工ID',
            'server_id' => '服务',
            'server_least' => '最低服务量',
            'server_price' => '单位服务价格',
            'server_parent_id' => '父级服务',
            'server_type'=>'服务类型',
            'server_name'=>'服务名'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(YxStaff::className(), ['staff_id' => 'staff_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServer()
    {
        return $this->hasOne(YxServer::className(), ['server_id' => 'server_id']);
    }

    public static function getParentServerName($models)
    {
        $types = self::getParentServer();
        if (isset($types[$models])) {
            return $types[$models];
        }

        return '未知';
    }

    public static function getParentServer($staff_id){
        $info_staff=YxStaff::find()->where(['staff_id'=>$staff_id])->one();
        $str_server_id=$info_staff['staff_main_server_id'].','.$info_staff['staff_all_server_id'];
        $str_server_name=YxStaff::getAllServer($str_server_id);
        $arr_server_id=explode(',', $str_server_id);
        $arr_server_name=explode(',',$str_server_name);
        $arr_server=[];
        foreach ($arr_server_id as $key => $value) {
            $arr_server[$value]=$arr_server_name[$key];
        }
        return $arr_server;
    }


    public static function getChildServer($server_parent_id){
        $arr_child_server=YxServer::find()->where(['server_parent'=>$server_parent_id])->all();
        $map_child_server=[];
        foreach ($arr_child_server as $key => $value) {
            $map_child_server[$value['server_id']]=$value['server_name'];
        }
        return $map_child_server;
    }
    /**
     * @inheritdoc
     * @return YxStaffServerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new YxStaffServerQuery(get_called_class());
    }

    // 得到服务人员所有服务（oyzx）
    public static function getServerAll($staff_id) {
      $YxStaffServer = YxStaffServer::find()->where(['staff_id' => $staff_id])->all();
      return $YxStaffServer;
    }

}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yx_server".
 *
 * @property int $server_id 服务id
 * @property string $server_name 服务名称
 * @property int $server_type 服务等级1:大服务 2:小服务
 * @property int $server_parent 服务上一级
 * @property int $server_state 服务的状态（1：使用，2：下架，0：删除）
 * @property string $server_memo 服务备注
 * @property int $server_sort 服务显示顺序
 * @property string $server_unit 服务单位
 * @property string $server_pic 服务图片
 * @property int $server_mans 服务人数：1单人，2多人，3单人/多人
 */
class YxServer extends \yii\db\ActiveRecord
{
    public $one_server;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yx_server';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['server_name', 'server_state'], 'required'],
            [['server_type', 'server_parent', 'server_state', 'server_sort', 'server_mans'], 'integer'],
            [['server_name','server_class'], 'string', 'max' => 50],
            [['server_memo'], 'string', 'max' => 1000],
            [['server_unit', 'server_pic'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'server_id' => '服务id
',
            'server_name' => '名称',
            'server_type' => '等级',
            'server_parent' => '上级分类',
            'server_state' => '状态',
            'server_memo' => '备注',
            'server_sort' => '排序',
            'server_unit' => '单位',
            'server_pic' => '服务图片',
            'server_mans' => '服务人数',
            'one_server' => '一级分类',
            'server_class'=>'服务类型'
        ];
    }

    /**
     * @inheritdoc
     * @return YxServerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new YxServerQuery(get_called_class());
    }
    public static function getCmpStateName($models)
    {
        $types = self::getCmpState();
        if (isset($types[$models])) {
            return $types[$models];
        }

        return '未知';
    }
    public static function getCmpState()
    {
        return array(1 => '使用', 2 => '下架', 0 => '删除');
    }

    public static function getCmpTypeName($models)
    {
        $types = self::getCmpType();
        if (isset($types[$models])) {
            return $types[$models];
        }

        return '未知';
    }
    public static function getCmpType()
    {
        return array(1 => '一级', 2 => '二级', 3 => '三级');
    }

    public static function getCmpParentName($models)
    {
        $types = self::getCmpParent();
        if (isset($types[$models])) {
            return $types[$models];
        }

        return '未知';
    }
    public static function getCmpParent()
    {
        $result = self::find()->all();
        $arr_Parent = [];
        if ($result) {
            foreach ($result as $key => $value) {
                $arr_Parent[$value['server_id']] = $value['server_name'];
            }
        }
        $arr_Parent['0'] = "无";
        return $arr_Parent;
    }

    public static function getMansName($models)
    {
        $types = self::getMans();
        if (isset($types[$models])) {
            return $types[$models];
        }

        return '未知';
    }
    public static function getMans()
    {
        return array(1 => '单人', 2 => '多人', 3 => '单人/多人');
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYxStaffServers()
    {
        return $this->hasMany(YxStaffServer::className(), ['server_id' => 'server_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(YxStaff::className(), ['staff_id' => 'staff_id'])->viaTable('yx_staff_server', ['server_id' => 'server_id']);
    }

    /**
     * [getName 匹配名字]
     * @Author   Yoon
     * @DateTime 2018-04-05T18:23:53+0800
     * @param    [type]                     $models    [键]
     * @param    [type]                     $ClassName [方法名]
     * @param    [type]                     $params    [方法参数]
     * @return   [type]                                [名字]
     */
    public static function getName($models, $ClassName = "", ...$params)
    {
        $types = self::$ClassName(...$params);

        if (isset($types[$models])) {
            return $types[$models];
        }
        return '未知';
    }
    /**
     * [getLvServer 取对应上级的子服务]
     * @Author   Yoon
     * @DateTime 2018-04-05T18:05:16+0800
     * @return   [array]                   [ID-NAME键值对]
     */
    public static function getLvServer($server_type, $server_parent)
    {
        $result = self::find()->where(['server_type' => $server_type, 'server_parent' => $server_parent])->all();
        $arr_Parent = [];
        if ($result) {
            foreach ($result as $key => $value) {
                $arr_Parent[$value['server_id']] = $value['server_name'];
            }
        }
        return $arr_Parent;
    }
    /**
     * [getTopServer 根据ID取顶级服务]
     * @Author   Yoon
     * @DateTime 2018-04-06T20:13:51+0800
     * @param    [type]                   $id [description]
     * @return   [type]                       [description]
     */
    public static function getTopServer($id)
    {
        $result = self::find()->where(['server_id' => $id])->one();
        if ($result->server_parent != 0) {
            $result=self::getTopServer($result->server_parent);
        }else{
            return $result;
        }
        return $result;
    }
/**
 * [getAllLvServer 取该等级所有服务]
 * @Author   Yoon
 * @DateTime 2018-04-06T23:37:09+0800
 * @param    [type]                   $server_type [description]
 * @return   [type]                                [description]
 */
    public static function getAllLvServer($server_type){
        $result = self::find()->where(['server_type' => $server_type])->all();
        $arr_Parent = [];
        if ($result) {
            foreach ($result as $key => $value) {
                $arr_Parent[$value['server_id']] = $value['server_name'];
            }
        }
        return $arr_Parent;
    }
/**
 * [getOneServerMap 取单个服务 id-name键值对]
 * @Author   Yoon
 * @DateTime 2018-04-06T23:38:48+0800
 * @param    [type]                   $server_id [description]
 * @return   [type]                              [description]
 */
    public static function getOneServerMap($server_id){
        $result = self::find()->where(['server_id' => $server_id])->all();
        $arr_Parent = [];
        if ($result) {
            foreach ($result as $key => $value) {
                $arr_Parent[$value['server_id']] = $value['server_name'];
            }
        }
        return $arr_Parent;
    }

    // 得到服务对应的名字（oyzx）
    public static function getServerName($server_id) {
      $YxServer = YxServer::find()->where(['server_id' => $server_id])->one();
      return $YxServer['server_name'];
    }
}

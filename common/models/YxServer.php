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
 */
class YxServer extends \yii\db\ActiveRecord
{
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
            [['server_name', 'server_parent', 'server_state'], 'required'],
            [['server_type', 'server_parent', 'server_state', 'server_sort'], 'integer'],
            [['server_name'], 'string', 'max' => 50],
            [['server_memo'], 'string', 'max' => 1000],
            [['server_unit'], 'string', 'max' => 255],
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
        return array(1 => '一级', 2 => '二级');
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
        $result = self::find()->where(['server_type' => 1])->all();
        $arr_Parent = [];
        if (empty($result)) {
            return $arr_Parent;
        }

        foreach ($result as $key => $value) {
            $arr_Parent[$value['server_id']] = $value['server_name'];
        }
        $arr_Parent['0']="无";
        return $arr_Parent;
    }
}

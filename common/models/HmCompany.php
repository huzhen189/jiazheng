<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hm_company".
 *
 * @property int $id
 * @property string $name 公司名
 * @property int $province 省
 * @property int $city 市
 * @property int $district 区
 * @property string $address 详细地址
 * @property string $telephone 固定电话
 * @property string $charge_phone 负责人电话
 * @property string $charge_man 负责人
 * @property double $longitude 经度
 * @property double $latitude 维度
 * @property double $operating_radius 服务半径/米
 * @property string $wechat 微信
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 * @property string $number 商家编号
 * @property int $status 状态：1审核中，2营业中，10已下架
 * @property string $business_licences 营业执照
 * @property int $models 营业模式: 1公司制，2中介制
 */
class HmCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hm_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'telephone', 'charge_phone', 'charge_man', 'wechat'], 'required'],
            [['province', 'city', 'district', 'created_at', 'updated_at', 'status', 'models'], 'integer'],
            [['longitude', 'latitude', 'operating_radius'], 'number'],
            [['name', 'telephone', 'wechat', 'number'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 200],
            [['charge_phone'], 'string', 'max' => 30],
            [['charge_man'], 'string', 'max' => 10],
            [['business_licences'], 'string', 'max' => 50],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '公司名',
            'province' => '省',
            'city' => '市',
            'district' => '区',
            'address' => '详细地址',
            'telephone' => '固定电话',
            'charge_phone' => '负责人电话',
            'charge_man' => '负责人',
            'longitude' => '经度',
            'latitude' => '维度',
            'operating_radius' => '服务半径/米',
            'wechat' => '微信',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'number' => '商家编号',
            'status' => '状态：1审核中，2营业中，10已下架',
            'business_licences' => '营业执照',
            'models' => '营业模式: 1公司制，2中介制',
        ];
    }

    /**
     * @inheritdoc
     * @return HmCompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HmCompanyQuery(get_called_class());
    }
}

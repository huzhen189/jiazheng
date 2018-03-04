<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "yx_company".
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
class YxCompany extends \yii\db\ActiveRecord
{
    #总成交量
    public $clinch;
    #总成交金额
    public $price;
    #上月成交量
    public $pre_clinch;
    #上月成交金额
    public $pre_price;
    #省名
    public $provinceName;
    #市名
    public $cityName;
    #区名
    public $districtName;
    /**
     * @inheritdoc
     */
     public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
    public static function tableName()
    {
        return 'yx_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address', 'telephone', 'charge_phone', 'charge_man', 'wechat','business_licences'], 'required'],
            [['province', 'city', 'district', 'created_at', 'updated_at', 'status', 'models'], 'integer'],
            [['longitude', 'latitude', 'operating_radius'], 'number'],
            [['name', 'telephone', 'wechat', 'number'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 200],
            [['charge_phone'], 'string', 'max' => 30],
            [['charge_man'], 'string', 'max' => 10],
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
            'province' => '省ID',
            'city' => '市ID',
            'district' => '区ID',
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
            'status' => '状态',
            'business_licences' => '营业执照',
            'models' => '营业模式',
            'introduction' => '公司介绍',
            'clinch' => '总成交量',
            'price'=>'总成交金额',
            'pre_clinch'=>'上月成交量',
            'pre_price'=>'上月成交金额',
            'provinceName'=>'省',
            'cityName'=>'市',
            'districtName'=>'区',
        ];
    }

    /**
     * @inheritdoc
     * @return YxCompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new YxCompanyQuery(get_called_class());
    }
    public static function getCmpStatusName($status)
    {
      $types = self::getCmpStatus();
      if (isset($types[$status])) return $types[$status];
      return '未知';
    }
    public static function getCmpStatus() {
        return array( 1=>'审核中', 2=>'营业中', 10=>'已下架');
    }
    public static function getCmpModelsName($models)
    {
      $types = self::getCmpModels();
      if (isset($types[$models])) return $types[$models];
      return '未知';
    }
    public static function getCmpModels() {
        return array( 1=>'公司制', 2=>'中介制');
    }
    /**
     * [getClinch 取总交易成功量]
     * @Author   Yoon
     * @DateTime 2018-02-26T17:15:30+0800
     * @param    [type]                   $id [description]
     * @return   [type]                       [description]
     */
    public static function getClinch($id){
        #根据公司ID，交易成功取订单条数；
        return '总交易成功量';
    }

    public static function getPreClinch($id){
        #根据公司ID，交易成功，时间取订单条数；
        return '上月交易成功量';
    }
    public static function getPrice($id){
        #根据公司ID取订单，交易成功取订单金额，求和；
        return '总交易成功金额';
    }
    public static function getPrePrice($id){
        #根据公司ID取订单，时间段，交易成功取订单金额，求和；
        return '上月交易成功金额';
    }

    public static function getOneName($id=0)
    {
        $result = static::findOne($id);
        return $result->name;
    }
}

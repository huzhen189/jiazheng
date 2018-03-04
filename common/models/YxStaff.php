<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "yx_staff".
 *
 * @property int $staff_id 服务人员id
 * @property int $company_id 服务人员所属商家
 * @property string $staff_name 服务人员姓名
 * @property int $staff_sex 服务人员性别(1:男，2:女)
 * @property int $staff_age 服务人员年龄
 * @property string $staff_img 服务人员照片
 * @property string $staff_idcard 服务人员的身份证号码
 * @property string $staff_intro 服务人员简介
 * @property string $staff_found
 * @property string $staff_main_server 主打服务
 * @property string $staff_all_server 所有服务内容：,隔开
 * @property string $staff_state 服务人员的状态(1:空闲,2:工作中,3:休假,0:退出平台)
 * @property string $staff_memo 备注
 * @property string $staff_login_ip 服务人员登陆ip(记入最新的登陆ip,把上一次登录ip写入日志文件中)
 * @property string $staff_login_time 服务人员登陆时间(记入最新的登陆时间,把上一次登录时间写入日志文件中)
 * @property string $staff_account 服务人员的账号
 * @property string $staff_password 服务人员的密码
 */
class YxStaff extends \yii\db\ActiveRecord
{
    #总成交量
    public $clinch;
    #总成交金额
    public $price;
    #上月成交量
    public $pre_clinch;
    #上月成交金额
    public $pre_price;
    #公司名
    public $companyName;
    /**
     * @inheritdoc
     */
     public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['staff_found'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
    public static function tableName()
    {
        return 'yx_staff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_name', 'staff_sex', 'staff_age', 'staff_idcard', 'staff_main_server', 'staff_state','staff_img', 'staff_account', 'staff_password'], 'required'],
            [['company_id', 'staff_sex', 'staff_age', 'staff_found'], 'integer'],
            [['staff_name'], 'string', 'max' => 50],
            [['staff_main_server', 'staff_all_server'], 'string', 'max' => 200],
            [['staff_idcard'], 'string', 'max' => 18],
            [['staff_intro', 'staff_memo'], 'string', 'max' => 1000],
            [['staff_state'], 'string', 'max' => 1],
            [['staff_login_ip', 'staff_login_time'], 'string', 'max' => 45],
            [['staff_account'], 'string', 'max' => 11],
            [['staff_password'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'staff_id' => 'ID',
            'company_id' => '所属商家ID',
            'staff_name' => '姓名',
            'staff_sex' => '性别',
            'staff_age' => '年龄',
            'staff_img' => '照片',
            'staff_idcard' => '身份证号码',
            'staff_intro' => '简介',
            'staff_found' => '创建时间',
            'staff_main_server' => '主打服务',
            'staff_all_server' => '所有服务',
            'staff_state' => '状态',
            'staff_memo' => '备注',
            'staff_login_ip' => '登陆ip',
            'staff_login_time' => '登陆时间',
            'staff_account' => '账号',
            'staff_password' => '密码',
            'companyName'=>'所属公司',
            'clinch' => '总成交量',
            'price'=>'总成交金额',
            'pre_clinch'=>'上月成交量',
            'pre_price'=>'上月成交金额',
        ];
    }

    /**
     * @inheritdoc
     * @return YxStaffQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new YxStaffQuery(get_called_class());
    }
    public static function getCmpSexName($models)
    {
      $types = self::getCmpSex();
      if (isset($types[$models])) return $types[$models];
      return '未知';
    }
    public static function getCmpSex() {
        return array( 1=>'男', 2=>'女');
    }
    public static function getCmpStateName($models)
    {
      $types = self::getCmpState();
      if (isset($types[$models])) return $types[$models];
      return '未知';
    }
    public static function getCmpState() {
        return array( 1=>'空闲', 2=>'工作中',3=>'休假',0=>'退出平台');
    }
    public static function getClinch($staff_id){
        #根据公司ID，交易成功取订单条数；
        return '总交易成功量';
    }

    public static function getPreClinch($staff_id){
        #根据公司ID，交易成功，时间取订单条数；
        return '上月交易成功量';
    }
    public static function getPrice($staff_id){
        #根据公司ID取订单，交易成功取订单金额，求和；
        return '总交易成功金额';
    }
    public static function getPrePrice($staff_id){
        #根据公司ID取订单，时间段，交易成功取订单金额，求和；
        return '上月交易成功金额';
    }
}

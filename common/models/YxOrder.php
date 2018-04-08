<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use common\models\YxStaff;
use common\models\YxCompany;
use common\models\YxServer;
/**
 * This is the model class for table "yx_order".
 *
 * @property int $id 订单id
 * @property string $order_name 订单名称
 * @property string $address 收货地址
 * @property string $phone 联系电话
 * @property int $order_money 订单总金额
 * @property int $order_state 订单状态(1:执行中,2:完成,3:废除)
 * @property string $order_memo 订单备注
 * @property int $yx_user_id 顾客id
 * @property string $usera_name 顾客姓名
 * @property int $created_at 订单创建时间
 * @property int $updated_at 订单修改时间
 */
class YxOrder extends \yii\db\ActiveRecord
{
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
        return 'yx_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_name', 'order_money', 'order_state', 'yx_user_id', 'usera_name'], 'required'],
            [['order_money', 'order_state', 'is_delete', 'yx_user_id', 'created_at', 'updated_at'], 'integer'],
            [['order_name', 'usera_name'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 400],
            [['phone'], 'string', 'max' => 20],
            [['order_memo'], 'string', 'max' => 200],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '订单id',
            'order_name' => '订单名称',
            'address' => '收货地址',
            'phone' => '联系电话',
            'order_money' => '订单总金额(分)',
            'order_state' => '订单状态',
            'order_memo' => '订单备注',
            'yx_user_id' => '顾客id',
            'usera_name' => '顾客姓名',
            'created_at' => '订单创建时间',
            'updated_at' => '订单修改时间',
            'status' => '状态',
            'is_delete' => '是否删除',
        ];
    }

    /**
     * @inheritdoc
     * @return YxOrderQuery the active query used by this AR class.
     */
     public static function getStateName($models)
     {
         $types = self::getOrderStatus();
         if (isset($types[$models])) {
             return $types[$models];
         }

         return '未知';
     }
     public static function getUserState()
     {
         return array(0 => '全部',1 => '未付款',  2=>'进行中',  3=>'已完成', 4=>'退单');
     }
    public static function find()
    {
        return new YxOrderQuery(get_called_class());
    }

    public static function getOrderStatus() {
        return array( 1=>'未付款', 2=>'已付款', 3=>'商家同意', 4=>'服务中', 5=>'已完成', 6=>'退单中', 7=>'商家同意退单', 8=>'退单完成', 9=>'废单');
    }

/**
 * [generateOrderNumber 生成订单编号]
 * @Author   Yoon
 * @DateTime 2018-04-07T16:44:58+0800
 * @param    [type]                   $server_id  [服务ID]
 * @param    [type]                   $order_type [订单类型：1服务者下单，2商家下单]
 * @param    [type]                   $id         [公司ID/服务者ID]
 * @return   [type]                               [订单编号]
 */
    public static function generateOrderNumber($server_id,$order_type,$id){
        $order_number='';
        $server_model=YxServer::findOne($server_id);
        $order_number=$server_model->server_class;

        $order_number=$order_number.date('ymd');

        $start_date=strtotime(date('Ymd'));
        $end_date=strtotime(date('Ymd',strtotime('+1 day')));
        if($order_type==1){
            $model=YxStaff::findOne($id);
            $server_count=self::find()
                    ->join('INNER JOIN','yx_details YD','yx_order.id=YD.order_id')
                    ->where(['staff_id'=>$id])
                    ->andFilterWhere(['between','created_at',$start_date,$end_date])
                    ->count();
            $server_count++;

            $order_number=$order_number.$model->staff_number.$server_count;
        }elseif($order_type==2){
            $model=YxCompany::findOne($id);
            $server_count=self::find()
                        ->join('INNER JOIN','yx_details YD','yx_order.id=YD.order_id')
                        ->where(['company_id'=>$id])
                        ->andFilterWhere(['between','created_at',$start_date,$end_date])
                        ->count();
            $server_count++;
            $order_number=$order_number.$model->number.$server_count;
        }
        return $order_number;
    }
}

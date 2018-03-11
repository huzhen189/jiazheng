<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
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
 * @property int $usera_id 顾客id
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
            [['order_name', 'order_money', 'order_state', 'usera_id', 'usera_name'], 'required'],
            [['order_money', 'order_state', 'usera_id', 'created_at', 'updated_at'], 'integer'],
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
            'order_state' => '订单状态(1:执行中,2:完成,3:废除)',
            'order_memo' => '订单备注',
            'usera_id' => '顾客id',
            'usera_name' => '顾客姓名',
            'created_at' => '订单创建时间',
            'updated_at' => '订单修改时间',
        ];
    }

    /**
     * @inheritdoc
     * @return YxOrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new YxOrderQuery(get_called_class());
    }
}

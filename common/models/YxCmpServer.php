<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yx_cmp_server".
 *
 * @property int $company_id
 * @property int $server_id 服务ID
 * @property int $server_least 最低服务量
 * @property int $server_price 服务价格
 * @property int $server_parent_id 上级服务ID
 * @property string $server_name 服务名
 * @property int $server_type 类型：0非附加服务，1默认附加服务，2商家附加服务
 *
 * @property YxCompany $company 
 * @property YxServer $server 
 */
class YxCmpServer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yx_cmp_server';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['server_id'], 'required'],
            [['company_id', 'server_id', 'server_least', 'server_price', 'server_parent_id', 'server_type'], 'integer'],
            [['server_name'], 'string', 'max' => 255],
            [['company_id', 'server_id'], 'unique', 'targetAttribute' => ['company_id', 'server_id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => YxCompany::className(), 'targetAttribute' => ['company_id' => 'id']], 
           [['server_id'], 'exist', 'skipOnError' => true, 'targetClass' => YxServer::className(), 'targetAttribute' => ['server_id' => 'server_id']], 
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'server_id' => '服务',
            'server_least' => '最低服务量',
            'server_price' => '服务价格',
            'server_parent_id' => '上级服务',
            'server_name' => '服务名',
            'server_type' => '类型：0非附加服务，1默认附加服务，2商家附加服务',
        ];
    }

    /** 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getCompany() 
   { 
       return $this->hasOne(YxCompany::className(), ['id' => 'company_id']); 
   } 
 
   /** 
    * @return \yii\db\ActiveQuery 
    */ 
   public function getServer() 
   { 
       return $this->hasOne(YxServer::className(), ['server_id' => 'server_id']); 
   }
    /**
     * {@inheritdoc}
     * @return YxCmpServerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new YxCmpServerQuery(get_called_class());
    }
}

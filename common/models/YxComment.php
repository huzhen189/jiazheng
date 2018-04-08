<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yx_comment".
 *
 * @property int $id
 * @property string $content 评论
 * @property int $star 星级
 * @property int $yx_company_id 公司
 * @property int $yx_staff_id 服务人员
 * @property int $yx_user_id 用户
 * @property int $is_praise 是否好评
 * @property int $yx_order_id 订单号
 * @property int $created_at
 * @property int $updated_at
 */
class YxComment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'yx_comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['star', 'yx_company_id', 'yx_staff_id', 'yx_user_id', 'is_praise', 'yx_order_id', 'created_at', 'updated_at'], 'integer'],
            [['yx_company_id'], 'required'],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => '评论',
            'star' => '星级',
            'yx_company_id' => '公司',
            'yx_staff_id' => '服务人员',
            'yx_user_id' => '用户',
            'is_praise' => '是否好评',
            'yx_order_id' => '订单号',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return YxCommentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new YxCommentQuery(get_called_class());
    }
}

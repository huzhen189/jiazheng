<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yx_rules".
 *
 * @property int $rules_id
 * @property string $rules_title 规则标题
 * @property string $rules_content 规则内容
 */
class YxRules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yx_rules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rules_content'], 'string'],
            [['rules_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rules_id' => 'Rules ID',
            'rules_title' => '规则标题',
            'rules_content' => '规则内容',
        ];
    }

    /**
     * @inheritdoc
     * @return YxRulesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new YxRulesQuery(get_called_class());
    }
}

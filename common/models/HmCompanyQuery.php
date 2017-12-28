<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[HmCompany]].
 *
 * @see HmCompany
 */
class HmCompanyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return HmCompany[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HmCompany|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

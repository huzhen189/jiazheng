<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\YxStaff;

/**
 * YxStaffSearch represents the model behind the search form of `common\models\YxStaff`.
 */
class YxStaffSearch extends YxStaff
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_id', 'company_id', 'staff_sex', 'staff_age', 'staff_found'], 'integer'],
            [['staff_name', 'staff_img', 'staff_idcard', 'staff_intro', 'staff_main_server', 'staff_all_server', 'staff_state', 'staff_memo', 'staff_login_ip', 'staff_login_time', 'staff_account', 'staff_password'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = YxStaff::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'staff_id' => $this->staff_id,
            'company_id' => $this->company_id,
            'staff_sex' => $this->staff_sex,
            'staff_age' => $this->staff_age,
            'staff_found' => $this->staff_found,
        ]);

        $query->andFilterWhere(['like', 'staff_name', $this->staff_name])
            ->andFilterWhere(['like', 'staff_img', $this->staff_img])
            ->andFilterWhere(['like', 'staff_idcard', $this->staff_idcard])
            ->andFilterWhere(['like', 'staff_intro', $this->staff_intro])
            ->andFilterWhere(['like', 'staff_main_server', $this->staff_main_server])
            ->andFilterWhere(['like', 'staff_all_server', $this->staff_all_server])
            ->andFilterWhere(['like', 'staff_state', $this->staff_state])
            ->andFilterWhere(['like', 'staff_memo', $this->staff_memo])
            ->andFilterWhere(['like', 'staff_login_ip', $this->staff_login_ip])
            ->andFilterWhere(['like', 'staff_login_time', $this->staff_login_time])
            ->andFilterWhere(['like', 'staff_account', $this->staff_account])
            ->andFilterWhere(['like', 'staff_password', $this->staff_password]);

        return $dataProvider;
    }
}

<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\YxOrder;

/**
 * YxOrderSearch represents the model behind the search form of `common\models\YxOrder`.
 */
class YxOrderSearch extends YxOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order_money', 'order_state', 'yx_user_id', 'created_at', 'updated_at','status'], 'integer'],
            [['order_name', 'address', 'phone', 'order_memo', 'usera_name'], 'safe'],
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
        $query = YxOrder::find();

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
        $yx_user_id = isset($params['yx_user_id']) ? $params['yx_user_id'] : $this->yx_user_id;
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'order_money' => $this->order_money,
            'order_state' => $this->order_state,
            'yx_user_id' => $yx_user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'order_name', $this->order_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'order_memo', $this->order_memo])
            ->andFilterWhere(['like', 'usera_name', $this->usera_name]);

        return $dataProvider;
    }
}

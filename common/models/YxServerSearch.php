<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\YxServer;

/**
 * YxServerSearch represents the model behind the search form of `common\models\YxServer`.
 */
class YxServerSearch extends YxServer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['server_id', 'server_type', 'server_parent', 'server_state', 'server_sort'], 'integer'],
            [['server_name', 'server_memo'], 'safe'],
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
        $query = YxServer::find();

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
            'server_id' => $this->server_id,
            'server_type' => $this->server_type,
            'server_parent' => $this->server_parent,
            'server_state' => $this->server_state,
            'server_sort' => $this->server_sort,
        ]);

        $query->andFilterWhere(['like', 'server_name', $this->server_name])
            ->andFilterWhere(['like', 'server_memo', $this->server_memo]);

        return $dataProvider;
    }
}

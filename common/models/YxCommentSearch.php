<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\YxComment;

/**
 * YxCommentSearch represents the model behind the search form of `common\models\YxComment`.
 */
class YxCommentSearch extends YxComment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'star', 'yx_company_id', 'yx_staff_id', 'yx_user_id', 'is_praise', 'yx_order_id', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = YxComment::find();

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
            'id' => $this->id,
            'star' => $this->star,
            'yx_company_id' => $this->yx_company_id,
            'yx_staff_id' => $this->yx_staff_id,
            'yx_user_id' => $this->yx_user_id,
            'is_praise' => $this->is_praise,
            'yx_order_id' => $this->yx_order_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}

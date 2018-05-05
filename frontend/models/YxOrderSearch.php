<?php

namespace frontend\models;

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
          [['order_state'], 'integer'],
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
        //$query->select('*')->leftJoin('yx_order_server','yx_order.id = yx_order_server.yx_order_id');
        $query->with('yx_order_server');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
             ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $yx_user_id = Yii::$app->user->id;
        $query->andFilterWhere([
            'yx_user_id' => $yx_user_id,
            'is_delete' => 0,
        ]);
        $this->order_state = isset($params['order_state']) ? $params['order_state'] : 0;
        // array(0 => '全部', 1 => '未付款', 2 => '进行中', 3 => '已完成', 4 => '退单');
        switch ($this->order_state) {
            case 1:
                $query->andFilterWhere(['in', 'order_state',[1,2]]);
                break;
            case 2:
                $query->andFilterWhere(['in', 'order_state',[4]]);
                break;
            case 3:
                $query->andFilterWhere(['in', 'order_state',[5,8,10]]);
                break;
            case 4:
                $query->andFilterWhere(['in', 'order_state',[3,6,7,9,11,12]]);
                break;
            default:
                break;
        }
        $query->orderBy(['created_at'=>SORT_DESC]);
        return $dataProvider;
    }
}

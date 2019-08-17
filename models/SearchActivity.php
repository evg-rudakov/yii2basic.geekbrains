<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * SearchActivity represents the model behind the search form of `app\models\Activity`.
 */
class SearchActivity extends Activity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'start_date', 'end_date', 'user_id', 'cycle', 'main'], 'integer'],
            [['title', 'body'], 'safe'],
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
        $query = Activity::find();

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
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'user_id' => $this->user_id,
            'cycle' => $this->cycle,
            'main' => $this->main,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body]);

        return $dataProvider;
    }
}

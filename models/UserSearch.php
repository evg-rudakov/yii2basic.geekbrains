<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['username', 'email'], 'safe'],
            [['created_at', 'updated_at'], 'date', 'format' => 'php:d.m.Y'],

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
        $query = User::find();

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
            'status' => $this->status,
        ]);

        if (!empty($this->created_at)) {
            $dayStart = \Yii::$app->formatter->asTimestamp($this->created_at . ' 00:00:00');
            $dayStop = \Yii::$app->formatter->asTimestamp($this->created_at . ' 23:59:59');
            $query->andFilterWhere([
                'between',
                self::tableName() . '.created_at',
                $dayStart,
                $dayStop,
            ]);
        }

        if (!empty($this->updated_at)) {
            $dayStart = \Yii::$app->formatter->asTimestamp($this->updated_at . ' 00:00:00');
            $dayStop = \Yii::$app->formatter->asTimestamp($this->updated_at . ' 23:59:59');
            $query->andFilterWhere([
                'between',
                self::tableName() . '.created_at',
                $dayStart,
                $dayStop,
            ]);
        }

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}

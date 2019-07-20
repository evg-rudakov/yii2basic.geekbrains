<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Activity;

/**
 * ActivitySearch represents the model behind the search form of `app\models\Activity`.
 */
class ActivitySearch extends Activity
{
    /**
     * {@inheritdoc}
     */

    public $authorEmail;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['start_date', 'end_date'], 'date', 'format' => 'php:d.m.Y'],
            [['created_at', 'updated_at'], 'date', 'format' => 'php:d.m.Y'],
            [['cycle', 'main'], 'boolean'],
            [['title', 'body', 'authorEmail'], 'string'],
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
        $query = Activity::find()->joinWith('author');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['created_at' => SORT_DESC],
            ],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if (!empty($this->start_date)) {
            $dayStart = \Yii::$app->formatter->asTimestamp($this->start_date . ' 00:00:00');
            $dayStop = \Yii::$app->formatter->asTimestamp($this->start_date . ' 23:59:59');
            $query->andFilterWhere([
                'between',
                self::tableName() . '.start_date',
                $dayStart,
                $dayStop,
            ]);
        }

        if (!empty($this->end_date)) {
            $dayStart = \Yii::$app->formatter->asTimestamp($this->end_date . ' 00:00:00');
            $dayStop = \Yii::$app->formatter->asTimestamp($this->end_date . ' 23:59:59');
            $query->andFilterWhere([
                'between',
                self::tableName() . '.end_date',
                $dayStart,
                $dayStop,
            ]);
        }

        if (!empty($this->authorEmail))
        {
            $query->andWhere('user.email like :authorEmail', [':authorEmail' => $this->authorEmail]);
        }


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cycle' => $this->cycle,
            'main' => $this->main,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $start_date
 * @property int $end_date
 * @property int $user_id
 * @property boolean $cycle
 * @property boolean $main
 * @property Calendar[] $calendarRecords
 */


class Activity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body', 'start_date', 'end_date','title' ], 'required'],
            [['cycle', 'main'], 'boolean'],
            [['start_date', 'end_date', 'user_id'], 'integer'],
            [['title', 'body'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'user_id' => 'User ID',
            'cycle' => 'Cycle',
            'main' => 'Main',
        ];
    }


    public function getUsers()
    {
        $this->hasMany(User::class, ['id'=>'user_id'])
            ->via('calendarRecords');
    }


    public function getCalendarRecords()
    {
        return $this->hasMany(Calendar::class, ['activity_id' => 'id']);
    }
}

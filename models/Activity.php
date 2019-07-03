<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 03/07/2019
 * Time: 19:43
 */

namespace app\models;

class Activity extends \yii\base\Model
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $body;

    /**
     * Unix Timestamp
     * @var int
     */
    public $startDay;

    /**
     * Unix Timestamp
     * @var int
     */
    public $endDay;


    /**
     * @var int
     */
    public $idAuthor;

    public function attributeLabels()
    {
        return [
            'title'=>'Название',
            'startDay' => 'Дата начала',
            'endDay' => 'Дата конца',
            'idAuthor' => 'Автор',
            'body' => 'Описание события',
        ];
    }

    public function rules()
    {
        return [
            [['title', 'startDay', 'endDay', 'idAuthor', 'body'], 'safe']
        ];
    }

    public static function getValues(){
        return [
            'title'=>'Урок 2',
            'startDay' => time(),
            'endDay' => time(),
            'idAuthor' => '123',
            'body' => 'Yii2 Basic Lesson 2. MVC',
        ];
    }

    public function getPrice()
    {
        return 'какая цена? мы об активностях говорим. Они бесценны';
    }


}
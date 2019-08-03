<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 03/08/2019
 * Time: 13:38
 */

namespace app\models;

use yii\base\Model;


class Activity extends Model
{
    public $id;
    public $title;
    public $body;
    public $start_date;
    public $end_date;
    public $author_id;
    public $cycle;
    public $main;

    public function attributeLabels()
    {
        return [
            'id'=>'id',
            'title'=>'Название',
            'body'=>'Описание события',
            'start_date'=>'Дата начала',
            'end_date'=>'Дата окончания',
            'author_id'=>'id автора',
            'cycle'=>'повторяется',
            'main'=>'главное',
        ];


    }


}
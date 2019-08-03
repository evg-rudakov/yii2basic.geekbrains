<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 03/08/2019
 * Time: 13:26
 */

namespace app\controllers;

use app\models\Activity;
use yii\web\Controller;

class ActivityController extends Controller
{
    public function actionProfile() {
        echo 'Мы пришли куда хотели';
    }

    public function actionView()
    {
        $model = new Activity();
        $model->id = 5;
        $model->title = '5 активность';
        $model->body = 'Тело пятого активности';
        $model->start_date = time();
        $model->end_date = time()+24*60*60;
        $model->cycle = true;
        $model->main = true;

        $model->attributes = [
            'id' => 6,
            'title' => 6,
            'body' => 6,
            'end_date' => 6,
        ];


        return $this->render('view', ['model'=>$model]);


    }
}

//http://yii2basic.geekbrains:81/user/profile
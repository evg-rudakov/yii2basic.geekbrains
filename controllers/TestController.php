<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 10/07/2019
 * Time: 20:34
 */

namespace app\controllers;

use app\models\Activity;
use yii\helpers\VarDumper;
use yii\web\Controller;
use Yii;

class TestController extends Controller
{
    public function actionIndex()
    {
//        for ($i=0; $i<10; $i++){
//            $model = new Activity();
//            $model->start_date = time();
//            $model->end_date = time()+24*60*60;
//            $model->title = \Yii::$app->security->generateRandomString(20);
//            $model->body = \Yii::$app->security->generateRandomString(30);
//            if ($model->validate()) {
//                $model->save(false);
//            }
//        }


        Yii::$app->db->createCommand()->insert('activity', [
            'start_date'=>time(),
            'end_date'=>time()+10000,
            'title'=>time(),
            'body'=>time(),
        ])->execute();

        $activities = Yii::$app->db
            ->createCommand(
                'SELECT * 
                      FROM activity 
                      WHERE activity.id > :id',
                [':id'=>5])->queryAll();
        $result = VarDumper::dumpAsString($activities);



        return $this->render('index', ['result'=>$result]);
    }
}
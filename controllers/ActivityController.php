<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 03/07/2019
 * Time: 19:17
 */
namespace app\controllers;

use app\models\Activity;
use yii\helpers\ArrayHelper;

class ActivityController extends \yii\web\Controller
{

    //http://yii2basic.geekbrains/activity/create
    public function actionView()
    {
        $model = new Activity();
        $arrayToLoad = ['Activity' => Activity::getValues()];
        $model->load($arrayToLoad);
        $model->attributes = Activity::getValues();

        $testArray = $model->attributes;


       return $this->render('view', [
           'model' => $model,
           'testArray' => $testArray,
       ]);
    }

    public function actionIndex()
    {
        $model = new Activity();
        $arrayToLoad = ['Activity' => Activity::getValues()];
        $model->load($arrayToLoad);
        $model->attributes = Activity::getValues();

        $testArray = $model->attributes;


        return $this->render('view', [
            'model' => $model,
            'testArray' => $testArray,
        ]);
    }

}

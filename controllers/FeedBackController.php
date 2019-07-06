<?php

namespace app\controllers;

use app\models\FeedBackForm;
use yii\helpers\VarDumper;

class FeedBackController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new FeedBackForm();
        return $this->render('index', ['model'=>$model]);
    }

    public function actionSubmit()
    {
        $model = new FeedBackForm();
        $result = '';

        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate()) {
                $result = VarDumper::dumpAsString($model);
            } else {
                $result = VarDumper::dumpAsString($model->errors);
            }
        }

        return $this->render('submit', ['result' => $result]);
    }

}

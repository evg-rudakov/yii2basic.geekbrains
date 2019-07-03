<?php

namespace app\controllers;

class GeekController extends \yii\web\Controller
{
    public function actionBrain()
    {
        return $this->render('brain');
    }

    public function actionGeek()
    {
        return $this->render('geek');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 31/07/2019
 * Time: 20:29
 */

namespace app\controllers;

use yii\web\Controller;

class HelloController extends Controller
{
    public function actionWorld()
    {
        return $this->render('world');
    }

    public function actionIndex()
    {
        return $this->render('../site/about');
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 29/06/2019
 * Time: 15:49
 */

namespace app\controllers;

use yii\web\Controller;


class HelloController extends Controller
{
    public function actionEveryBody()
    {
        return $this->render('every-body');
    }

}
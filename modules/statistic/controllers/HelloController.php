<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 03/07/2019
 * Time: 20:42
 */

namespace app\modules\statistic\controllers;

use yii\web\Controller;

class HelloController extends Controller
{
    public function actionWorld()
    {
        return $this->render('world');
    }
}
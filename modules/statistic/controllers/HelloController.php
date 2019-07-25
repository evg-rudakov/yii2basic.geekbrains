<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 03/07/2019
 * Time: 20:42
 */

namespace app\modules\statistic\controllers;

use yii\helpers\Url;
use yii\web\Controller;

class HelloController extends Controller
{
    public function actionWorld()
    {
        $result[] = Url::to(['']);
        $result[] = Url::to(['create']);
        $result[] = Url::to(['good-buy/update', 'id'=>12, 'param1'=>13, 'param2'=>14, 'param3'=>15, 'param4'=>16, ]);
        $result[] = Url::to(['dynamic/good-buy/create']);
        $result[] = Url::to(['/dynamic/good-buy/create']);
        $result[] = Url::home();
        $result[] = Url::base();
        $result[] = Url::canonical();

        return $this->render('world', ['result' => $result]);
    }
}
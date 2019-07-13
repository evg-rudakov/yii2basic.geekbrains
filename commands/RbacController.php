<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 13/07/2019
 * Time: 15:11
 */

namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $role = Yii::$app->authManager->createRole('admin');
        $role->description = 'Администратор';
        Yii::$app->authManager->add($role);
        $role = Yii::$app->authManager->createRole('simple');
        $role->description = 'Пользователь';
        Yii::$app->authManager->add($role);
    }
}
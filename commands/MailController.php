<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 20/07/2019
 * Time: 14:55
 */

namespace app\commands;

use app\models\Activity;
use yii\console\Controller;

class MailController extends Controller
{
    public $message;
    public $user;

    public function options($actionID)
    {
        $parentOptions = parent::options($actionID);
        $options = [
            '-m' => 'message',
            '-u' => 'user'
        ];

        return array_merge($parentOptions, $options);
    }

    public function actionTest($param1, $param2) {
        echo "param1:".$param1."\r\n";
        echo "param2:".$param2."\r\n";
        echo $this->message. ' '. $this->user."\r\n";
    }

    public function actionSendOut()
    {
        $activities = Activity::find()
            ->all();

        var_dump(count($activities));

        foreach ($activities as $activity) {

            foreach ($activity->users as $user) {
                \Yii::$app->mailer
                    ->compose(
                        'activity/notification-html', [
                            'activity' => $activity
                        ]
                    )
                    ->setFrom('noreply@geekbrains.yii2basic.ru')
                    ->setSubject('Ваши планы на сегодня')
                    ->setTo($user->email)
                    ->setCharset('UTF-8')
                    ->send();
            }
        }

    }
}
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

    public $debug = YII_ENV_DEV ? true : false;

    public function options($actionID)
    {
        $parentOptions = parent::options($actionID);
        $options = [
            '-m' => 'message',
            '-u' => 'user',
            '-d' => 'debug'
        ];

        return array_merge($parentOptions, $options);
    }

    public function actionTest($param1, $param2) {
        $this->alert("param1:".$param1);
        $this->alert("param2:".$param2);
        $this->alert($this->message. ' '. $this->user);
    }

    public function alert($message)
    {
        if ($this->debug === true) {
            echo $message . "\r\n";
        }

    }

    public function actionSendOut($userEmail = null)
    {

        if (isset ($userEmail)){
            $activities = Activity::find()->joinWith('users')->andWhere(['user.email'=>$userEmail])->all();
        } else {
            $activities = Activity::find()
                ->all();
        }



        foreach ($activities as $activity) {

            foreach ($activity->users as $user) {

                $mailer = \Yii::$app->mailer
                    ->compose(
                        'activity/notification-html', [
                            'activity' => $activity
                        ]
                    )
                    ->setFrom('noreply@geekbrains.yii2basic.ru')
                    ->setSubject('Ваши планы на сегодня')
                    ->setTo($user->email)
                    ->setCharset('UTF-8');

                    if ($mailer->send()) {
                        $this->alert($user->email.' получил письмо'."\r\n");
                    } else {
                        $this->alert($user->email.' получил не письмо'."\r\n");
                    }
            }
        }

    }
}
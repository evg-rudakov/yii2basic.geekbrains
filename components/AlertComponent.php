<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 03/08/2019
 * Time: 14:49
 */

namespace app\components;
use yii\base\Component;

class AlertComponent extends Component
{

    public $message;


    public function init()
    {
        parent::init();
        $this->message = "Текст сообщения";
    }


    public function display($userMessage)
    {
        $this->message = $userMessage;
        return $this->message;
    }

}
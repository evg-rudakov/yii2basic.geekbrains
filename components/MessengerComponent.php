<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 03/07/2019
 * Time: 20:51
 */

namespace app\components;

use yii\base\Component;

class MessengerComponent extends Component
{

    public $message;

    public function init()
    {
        parent::init();
        $this->message = 'Text';
    }

    public function display($message)
    {
        return mb_strtoupper($message);
    }

}
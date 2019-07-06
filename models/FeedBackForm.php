<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 06/07/2019
 * Time: 14:14
 */

namespace app\models;

use yii\base\Model;

class FeedBackForm extends Model
{
    public $email;
    public $username;
    public $messageText;

    public function rules(){
        return [
            [['email', 'username', 'messageText'], 'required'],
            [['username'], 'string', 'max'=>55, 'min'=>3],
            [['messageText'], 'string', 'max' => 255, 'min'=>15],
            [['email'], 'string', 'max' => 255, 'min'=>4],
            [['email'], 'email'],
        ];
    }

}
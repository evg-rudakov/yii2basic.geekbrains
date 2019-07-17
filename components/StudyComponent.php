<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 03/07/2019
 * Time: 20:51
 */

namespace app\components;

use yii\base\Component;

/**
 * Class StudyComponent
 * @package app\components
 */
class StudyComponent extends Component
{

    public $message;


    /**
     * Метод получения прошлой страницы, на которой был пользователь
     * @return string
     */
    public function getPrevPage()
    {
        //получим прошлую страницу
        $prevPath = \Yii::$app->session->get('currentPage', null);

        //если мы зашли первый раз, то прошлую страницы нет.
        if (!isset($prevPath)) {
            $prevPath = 'Предыдущей страницы нет';
        }

        //сохраним в сессию текущую страницу, чтобы когда мы перешли на следующую страницу, получить ее как прошлую
        \Yii::$app->session->set('currentPage', $_SERVER['REQUEST_URI']);

        //вернем прошлую страницу
        return $prevPath;
    }

    public function getCurrentPage()
    {
        return $_SERVER['REQUEST_URI'];
    }



}
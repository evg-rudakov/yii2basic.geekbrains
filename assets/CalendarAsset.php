<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 24/07/2019
 * Time: 21:39
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

class CalendarAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/site.css',
    ];

    public $jsOptions = ['position'=>View::POS_END];

    public $js = [
        'js/new.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
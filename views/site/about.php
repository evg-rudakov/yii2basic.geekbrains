<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>

<br/>
<?=\yii\helpers\Url::to(['/get-records', 'id'=>123, 'start'=>123123, 'end'=>32323])?> <br/>
<?=\yii\helpers\Url::to(['/calendar/get-records', 'id'=>123, 'start'=>123123, 'end'=>32323])?><br/>
<?=\yii\helpers\Url::to(['/calendar/get-records/index', 'id'=>123, 'start'=>123123, 'end'=>32323])?><br/>
<?=\yii\helpers\Url::to(['', 'id'=>123, 'start'=>123123, 'end'=>32323])?><br/>
<hr/>
<?=\yii\helpers\Url::home()?><br/>
<?=\yii\helpers\Url::base()?><br/>
<?=\yii\helpers\Url::canonical()?><br/>
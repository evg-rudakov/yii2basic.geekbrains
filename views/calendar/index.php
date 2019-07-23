<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calendars';
$this->params['breadcrumbs'][] = $this->title;
echo time();
?>
<div class="calendar-index">

    <?= edofre\fullcalendar\Fullcalendar::widget([
        'events' => \yii\helpers\Url::to(['calendar/events', 'id' => uniqid()]),
    ]); ?>


</div>

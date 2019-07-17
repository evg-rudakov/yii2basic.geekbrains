<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Activities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="activity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'body',
            [
                'attribute'=>'start_date',
                'label'=>'Дата начала активности',
                'value'=>function($model) {
                    return Yii::$app->formatter->asDatetime($model->start_date);
                }
            ],
            'end_date:datetime',
            [
                'label'=>'Повторяется',
                'value'=>function($model){
                    return Yii::$app->formatter->asBoolean($model->cycle);
                }
            ],
            'main:boolean',
        ],
    ]) ?>

</div>

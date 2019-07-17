<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Activity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="activity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea() ?>

    <?= $form->field($model, 'start_date')->widget(\kartik\date\DatePicker::class, [
        'options' => [
            'placeholder' => 'Дата начала',
            'value' => !$model->isNewRecord ? Yii::$app->formatter->asDate($model->end_date, 'php:d.m.Y') : null,
        ],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd.mm.yyyy',
        ]
    ]); ?>


    <?= $form->field($model, 'end_date')->widget(\kartik\date\DatePicker::class, [
        'options' => [
            'placeholder' => 'Дата окончания',
            'value' => !$model->isNewRecord ? Yii::$app->formatter->asDate($model->end_date, 'php:d.m.Y') : null,
        ],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd.mm.yyyy',
        ]
    ]); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'cycle')->checkbox() ?>

    <?= $form->field($model, 'main')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

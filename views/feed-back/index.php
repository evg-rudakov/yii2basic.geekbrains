<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FeedBackForm */
/* @var $form ActiveForm */
?>
<div class="site-feedback">

    <?php $form = ActiveForm::begin([
        'action' => \yii\helpers\Url::to(['feed-back/submit']),
        'enableClientValidation' => false,
        'method' => 'post']);
    ?>
    <?=$form->field($model, 'username')->textInput()->label('Имя пользователя')?>
    <?=$form->field($model, 'email')->textInput()->label('Email пользователя')?>
    <?=$form->field($model, 'messageText')->textarea()->label('Текст сообщения')?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-feedback -->

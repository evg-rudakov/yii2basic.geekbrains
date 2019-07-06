<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 06/07/2019
 * Time: 13:42
 */
$name = 'Суперстатья';
?>

<?php
    $options = [
        'class' => 'heading-name',
        'id'=>'id',
        'data-id'=>'qwe',
    ];
?> <?= \yii\helpers\Html::a(
    'Link',
    \yii\helpers\Url::to(['view' , 'id'=>'1']),
    $options);

//
//<a id="id" class="heading-name" href="/activity/view?id=1" data-id="qwe">Link</a>
?>


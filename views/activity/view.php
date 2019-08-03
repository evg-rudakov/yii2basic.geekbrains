<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 03/08/2019
 * Time: 13:46
 */

/** @var \app\models\Activity $model */

var_dump($model->id);
var_dump($model['id']);
foreach ($model as $attribute => $value){
    echo $model->getAttributeLabel($attribute).":".$value. "<br/>";
}
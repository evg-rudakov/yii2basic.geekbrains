<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 03/07/2019
 * Time: 20:01
 */

/** @var \app\models\Activity $model */
/** @var array $testArray */
?>

<h1>Активность: <?=$model->title?> </h1>
<h1><?=$model->getAttributeLabel('title')?> : <?=$model->title?></h1>
<?=$this->context->renderPartial('_data', ['model'=>$model, 'testArray'=>$testArray])?>

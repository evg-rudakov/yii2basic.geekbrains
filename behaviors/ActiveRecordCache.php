<?php
/**
 * Created by PhpStorm.
 * User: evg
 * Date: 20/07/2019
 * Time: 15:57
 */

namespace app\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;

class ActiveRecordCache extends Behavior
{
    public $cacheKeyName;


    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'deleteCache',
            ActiveRecord::EVENT_AFTER_UPDATE => 'deleteCache',
            ActiveRecord::EVENT_AFTER_DELETE => 'deleteCache',
        ];
    }

    public function deleteCache()
    {
        \Yii::$app->cache->delete($this->cacheKeyName . "_" . $this->owner->getPrimaryKey());
        \Yii::info('кеш был удален', 'cache');

    }
}
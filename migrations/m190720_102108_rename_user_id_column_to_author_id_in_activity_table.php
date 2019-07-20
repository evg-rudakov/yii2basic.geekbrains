<?php

use yii\db\Migration;

/**
 * Class m190720_102108_rename_user_id_column_to_author_id_in_activity_table
 */
class m190720_102108_rename_user_id_column_to_author_id_in_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('activity', 'user_id', 'author_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('activity', 'author_id', 'user_id');
    }

}

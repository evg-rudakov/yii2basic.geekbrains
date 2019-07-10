<?php

use yii\db\Migration;

/**
 * Handles dropping test from table `{{%activity}}`.
 */
class m190710_170325_drop_test_column_from_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('activity', 'test');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo 'Это была тестовая колонка, возращать ее не нужно';
        return false;
    }
}

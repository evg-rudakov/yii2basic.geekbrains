<?php

use yii\db\Migration;

/**
 * Class m190710_165927_add_test_column_activity_table
 */
class m190710_165927_add_test_column_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity',
            'test',
            $this->string()
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity',
            'test'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190710_165927_add_test_column_activity_table cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m190710_165440_alter_title_column_in_activity_table
 */
class m190710_165440_alter_title_column_in_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('activity', 'title', 'varchar(255)');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('activity', 'title', $this->string(55));

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190710_165440_alter_title_column_in_activity_table cannot be reverted.\n";

        return false;
    }
    */
}

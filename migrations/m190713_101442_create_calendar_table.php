<?php

use yii\db\Migration;

/**
 * Class m190713_101442_user_activity_table
 */
class m190713_101442_create_calendar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('calendar', [
            'id'=>$this->primaryKey(),
            'user_id'=>$this->integer()->notNull(),
            'activity_id'=>$this->integer()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'fk_calendar_user_id',
            'calendar',
            'user_id',
            'user',
            'id');

        $this->addForeignKey(
            'fk_calendar_activity_id',
            'calendar',
            'activity_id',
            'activity',
            'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_calendar_user_id', 'calendar');
        $this->dropForeignKey('fk_calendar_activity_id', 'calendar');
        $this->dropTable('calendar');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190713_101442_user_activity_table cannot be reverted.\n";

        return false;
    }
    */
}

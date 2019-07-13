<?php

use yii\db\Migration;

/**
 * Class m190713_102350_add_fk_to_activity_table
 */
class m190713_102350_add_fk_to_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_activity_user_id',
            'activity',
            'user_id',
            'user',
            'id'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_activity_user_id', 'activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190713_102350_add_fk_to_activity_table cannot be reverted.\n";

        return false;
    }
    */
}

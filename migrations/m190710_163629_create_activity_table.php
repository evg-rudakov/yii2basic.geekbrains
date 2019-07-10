<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%activity}}`.
 */
class m190710_163629_create_activity_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%activity}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(55)->notNull(),
            'body'=>$this->string(255)->notNull(),
            'start_date'=>$this->integer()->notNull(),
            'end_date'=>$this->integer()->notNull(),
            'user_id'=>$this->integer(),
            'cycle'=>$this->boolean()->defaultValue(false),
            'main'=>$this->boolean()->defaultValue(false),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%activity}}');
    }
}

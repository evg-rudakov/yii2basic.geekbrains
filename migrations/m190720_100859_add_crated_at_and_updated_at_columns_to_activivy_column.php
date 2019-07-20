<?php

use yii\db\Migration;

/**
 * Class m190720_100859_add_crated_at_and_updated_at_columns_to_activivy_column
 */
class m190720_100859_add_crated_at_and_updated_at_columns_to_activivy_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity', 'created_at', $this->integer()->notNull());
        $this->addColumn('activity', 'updated_at', $this->integer()->notNull());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('activity', 'created_at');
        $this->dropColumn('activity', 'updated_at');

    }

}

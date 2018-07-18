<?php

use yii\db\Migration;

/**
 * Class m180718_142349_update_comment_table
 */
class m180718_142349_update_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('comment', 'left_key', $this->integer());
        $this->addColumn('comment', 'right_key', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180718_142349_update_comment_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180718_142349_update_comment_table cannot be reverted.\n";

        return false;
    }
    */
}

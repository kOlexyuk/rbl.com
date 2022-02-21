<?php

use yii\db\Migration;

/**
 * Class m220221_184228_user_region_add_c_radius
 */
class m220221_184228_user_region_add_c_radius extends Migration
{
    /**
     * {@inheritdoc}
     */
//    public function safeUp()
//    {
//
//    }

    /**
     * {@inheritdoc}
     */
//    public function safeDown()
//    {
////        echo "m220221_184228_user_region_add_c_radius cannot be reverted.\n";
////
////        return false;
//    }

    /* */
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
      $this->addColumn('user_region','radius', $this->integer(5));
    }

    public function down()
    {
        $this->dropColumn('user_region','radius');
    }

}

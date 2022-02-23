<?php

use yii\db\Migration;

/**
 * Class m220222_184558_alter_user_region_radius
 */
class m220222_184558_alter_user_region_radius extends Migration
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
//        echo "m220222_184558_alter_user_region_radius cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->execute('update `user_region` 
                  set `radius`= 10;');
          $this->execute('ALTER TABLE `user_region` 
                  MODIFY COLUMN `radius` int(5) UNSIGNED NOT NULL DEFAULT 10 AFTER `region_id`;');
    }

    public function down()
    {
//        echo "m220222_184558_alter_user_region_radius cannot be reverted.\n";
//
//        return false;
    }
  /*  */
}

<?php

use yii\db\Migration;

/**
 * Class m220105_085905_tuser_profile_add_column_lang_web
 */
class m220105_085905_tuser_profile_add_column_lang_web extends Migration
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
//        echo "m220105_085905_tuser_profile_add_column_lang_web cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
//       $this->addColumn('user_profile', 'language' , 'varchar(255)');
//       $this->addColumn('user_profile', 'web' , 'varchar(255)');
    }

    public function down()
    {
//        $this->dropColumn('user_profile', 'language');
//        $this->dropColumn('user_profile', 'web');
    }

}

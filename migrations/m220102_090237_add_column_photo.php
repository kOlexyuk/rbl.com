<?php

use yii\db\Migration;

/**
 * Class m220102_090237_add_column_photo
 */
class m220102_090237_add_column_photo extends Migration
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
//        echo "m220102_090237_add_column_photo cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
//        $this->addColumn('service' ,'photo','varchar(255)');
//        $this->addColumn('service_area' ,'photo', 'varchar(255)');
    }

    public function down()
    {
//        $this->dropColumn('service' ,'photo');
//        $this->dropColumn('service_area' ,'photo');
    }

}

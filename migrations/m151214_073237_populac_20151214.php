<?php

use yii\db\Schema;
use yii\db\Migration;

class m151214_073237_populac_20151214 extends Migration
{
    public function up()
    {

    }

    public function down()
    {
        echo "m151214_073237_populac_20151214 cannot be reverted.\n";
        //并不是所有迁移都是可恢复的。例如，如果 up() 方法删除了表中的一行数据，这将无法通过 down() 方法来恢复这条数据。
        //有时候，你也许只是懒得去执行 down() 方法了，因为它在恢复数据库迁移方面并不是那么的通用。
        //在这种情况下，你应当在 down() 方法中返回 false 来表明这个 migration 是无法恢复的。

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

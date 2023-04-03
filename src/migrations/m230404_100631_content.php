<?php

use yii\db\Schema;
use yii\db\Migration;
use portalium\content\Module;
use portalium\user\Module as UserModule;

class m230404_100631_content extends Migration
{

    public function safeUp()
    {
        //add column 'layout'=> $this->string(255)->notNull(),
                //'access'=> $this->smallInteger(6)->notNull(),
        
        $this->addColumn('{{%' . Module::$tablePrefix . 'content}}', 'layout', $this->string(255));
        $this->addColumn('{{%' . Module::$tablePrefix . 'content}}', 'access', $this->smallInteger(6));
    }

    public function safeDown()
    {
        $this->dropColumn('{{%' . Module::$tablePrefix . 'content}}', 'layout');
        $this->dropColumn('{{%' . Module::$tablePrefix . 'content}}', 'access');
    }
}

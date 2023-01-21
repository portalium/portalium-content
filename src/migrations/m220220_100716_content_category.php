<?php

use yii\db\Schema;
use yii\db\Migration;
use portalium\content\Module;

class m220220_100716_content_category extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%' . Module::$tablePrefix . 'category}}',
            [
                'id_category'=> $this->primaryKey(),
                'name'=> $this->string(255)->notNull(),
                'slug'=> $this->string(255)->notNull(),
                'date_create'=> $this->datetime()->notNull()->defaultExpression("CURRENT_TIMESTAMP"),
                'date_update'=> $this->datetime()->notNull()->defaultExpression("CURRENT_TIMESTAMP"),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%' . Module::$tablePrefix . 'category}}');
    }
}

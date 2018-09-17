<?php

use yii\db\Schema;
use yii\db\Migration;

class m180907_194824_organization_unit extends Migration
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
            '{{%organization_unit}}',
            [
                'id'=> $this->primaryKey(11),
                'name'=> $this->string(200)->notNull(),
                'short_name'=> $this->string(20)->notNull(),
                'unit_code'=> $this->string(10)->notNull(),
                'report_to'=> $this->integer(11),
                'status'=> $this->integer(11)->notNull()->defaultValue(1),
                'created_at'=> $this->integer(11)->notNull(),
                'updated_at'=> $this->integer(11)->notNull(),
                'created_by'=> $this->integer(11)->notNull(),
                'updated_by'=> $this->integer(11)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('unique_code','{{%organization_unit}}',['unit_code'],true);

    }

    public function safeDown()
    {
        $this->dropIndex('unique_code', '{{%organization_unit}}');
        $this->dropTable('{{%organization_unit}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `unit_type`.
 */
class m180917_043624_create_unit_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';
        $this->createTable(
            '{{%unit_type%}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(),
                'status'=> $this->integer(11)->notNull()->defaultValue(1),
                'created_at'=> $this->integer(11)->notNull(),
                'updated_at'=> $this->integer(11)->notNull(),
                'created_by'=> $this->integer(11)->notNull(),
                'updated_by'=> $this->integer(11)->notNull(),
            ]
        );

        $this->addColumn(
            '{{%organization_unit%}}',
            'unit_type_id',
            $this->integer()->after('unit_code')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%organization_unit%}}', 'unit_type_id');
        $this->dropTable('{{%unit_type%}}');
    }
}

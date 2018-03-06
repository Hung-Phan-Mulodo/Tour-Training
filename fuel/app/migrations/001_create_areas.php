<?php

namespace Fuel\Migrations;

class Create_areas
{
    public function up()
    {
        \DBUtil::create_table('areas', array(
            'id' => array(
                'constraint' => 11,
                'type' => 'int',
                'auto_increment' => true,
                'unsigned' => true
            ),
            'code' => array('constraint' => 50, 'type' => 'varchar'),
            'name' => array('constraint' => 50, 'type' => 'varchar'),
            'created_at' => array(
                'constraint' => 11,
                'type' => 'int',
                'null' => true
            ),
            'updated_at' => array(
                'constraint' => 11,
                'type' => 'int',
                'null' => true
            ),

        ), array('id'));
    }

    public function down()
    {
        \DBUtil::drop_table('areas');
    }
}
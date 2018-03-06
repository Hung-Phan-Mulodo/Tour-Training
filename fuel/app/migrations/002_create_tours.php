<?php

namespace Fuel\Migrations;

class Create_tours
{
	public function up()
	{
		\DBUtil::create_table('tours', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'code' => array('constraint' => 50, 'type' => 'varchar'),
			'image' => array('constraint' => 50, 'type' => 'varchar'),
			'title' => array('constraint' => 50, 'type' => 'varchar'),
			'gross_min' => array('constraint' => 11, 'type' => 'int'),
			'gross_max' => array('constraint' => 11, 'type' => 'int'),
			'area_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tours');
	}
}
<?php

namespace Fuel\Migrations;

class Create_areas
{
	public function up()
	{
		\DBUtil::create_table('areas', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'code' => array('type' => 'text'),
			'name' => array('type' => 'text'),
			'country' => array('type' => 'text'),
			'country_name' => array('type' => 'text'),
			'city' => array('type' => 'text'),
			'city_name' => array('type' => 'text'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('areas');
	}
}
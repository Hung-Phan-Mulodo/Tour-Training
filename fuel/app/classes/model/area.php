<?php

class Model_Area extends \Orm\Model
{
    protected static $_properties
        = array(
            'id',
            'code',
            'name',
            'created_at',
            'updated_at',
        );

    protected static $_observers
        = array(
            'Orm\Observer_CreatedAt' => array(
                'events' => array('before_insert'),
                'mysql_timestamp' => false,
            ),
            'Orm\Observer_UpdatedAt' => array(
                'events' => array('before_update'),
                'mysql_timestamp' => false,
            ),
        );

    protected static $_table_name = 'areas';

    public static function getAllArea(){
        return Model_Area::find('all');
    }

    public static function getAreaById($area_id){
        return Model_Area::find($area_id);
    }

}

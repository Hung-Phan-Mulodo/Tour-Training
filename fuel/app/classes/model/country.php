<?php

class Model_Country extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'code',
        'name',
        'area_id',
        'created_at',
        'updated_at',
    );

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_update'),
            'mysql_timestamp' => false,
        ),
    );

    protected static $_table_name = 'countries';

    public function getCountryByAreaId($area_id)
    {
        $country = Model_Country::query()->where('area_id', '=', $area_id)->get();
        return $country;
    }

}

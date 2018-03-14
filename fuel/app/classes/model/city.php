<?php

class Model_City extends \Orm\Model
{
    protected static $_properties = array(
        'id',
        'code',
        'name',
        'country_id',
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

    protected static $_table_name = 'cities';

    public function getCityByCountryId($country_id){
        $city = Model_City::query()->where('country_id', '=', $country_id)->get();
        return $city;
    }

}

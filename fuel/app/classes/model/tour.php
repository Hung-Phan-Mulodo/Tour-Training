<?php

class Model_Tour extends \Orm\Model
{
    protected static $_properties
        = array(
            'id',
            'code',
            'image',
            'title',
            'gross_min',
            'gross_max',
            'area_id',
            'city_id',
            'country_id',
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

    protected static $_table_name = 'tours';

    public function searchTour($requests){
        $query = DB::select('tours.*',
            array('countries.name','country_name'), array('countries.code', 'country_code'),
            array('cities.name','city_name'), array('cities.code', 'city_code'),
            array('areas.name','area_name'), array('areas.code', 'area_code'))
            ->from('tours')
            ->join('countries', 'LEFT')->on('tours.country_id', '=', 'countries.id')
            ->join('cities', 'LEFT')->on('tours.city_id', '=', 'cities.id')
            ->join('areas', 'LEFT')->on('tours.area_id', '=', 'areas.id');

        foreach ($requests as $key => $value) {
            if ($key == 'tour_code') {
                $query->where('tours.code', 'like', "%$value%");
            } else {
                $query->where('tours.'. $key .'_id', '=', $value);
            }
        }

        $results = $query->execute();

        return $results->as_array();
    }

}

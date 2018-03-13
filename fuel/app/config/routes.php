<?php
return array(
	'_root_'  => 'tour/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
//	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),

    'country' => array('country/index', 'name' => 'country'),
    'country/create' => array('country/create', 'name' => 'country_create'),
    'country/add' => array('country/add', 'name' => 'country_add'),
    'country/edit?id=(:id)' => array('country/edit', 'name' => 'country_edit'),
    'country/update?id=(:id)' => array('country/update', 'name' => 'country_update'),
    'country/delete?id=(:id)' => array('country/delete', 'name' => 'country_delete'),

    'city' => array('city/index', 'name' => 'city'),
    'city/create' => array('city/create', 'name' => 'city_create'),
    'city/add' => array('city/add', 'name' => 'city_add'),
    'city/edit?id=(:id)' => array('city/edit', 'name' => 'city_edit'),
    'city/update?id=(:id)' => array('city/update', 'name' => 'city_update'),
    'city/delete?id=(:id)' => array('city/delete', 'name' => 'city_delete'),

    'area' => array('area/index', 'name' => 'area'),
    'area/create' => array('area/create', 'name' => 'area_create'),
    'area/add' => array('area/add', 'name' => 'area_add'),
    'area/edit?id=(:id)' => array('area/edit', 'name' => 'area_edit'),
    'area/update?id=(:id)' => array('area/update', 'name' => 'area_update'),
    'area/delete?id=(:id)' => array('area/delete', 'name' => 'area_delete'),

    'tour' => array('tour/index', 'name' => 'tour'),
    'tour/create' => array('tour/create', 'name' => 'tour_create'),
    'tour/add' => array('tour/add', 'name' => 'tour_add'),
    'tour/edit?id=(:id)' => array('tour/edit', 'name' => 'tour_edit'),
    'tour/update?id=(:id)' => array('tour/update', 'name' => 'tour_update'),
    'tour/delete?id=(:id)' => array('tour/delete', 'name' => 'tour_delete'),

    'api/internal/country' => array('tourapi/country', 'name' => 'api_country'),
    'api/internal/city' => array('tourapi/city', 'name' => 'api_city'),
    'api/internal/tour' => array('tourapi/tour', 'name' => 'api_tour'),
    'api/internal/search' => array('tourapi/search', 'name' => 'api_search'),
);
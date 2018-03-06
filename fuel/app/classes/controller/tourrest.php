<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2014 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_TourRest extends Controller_Rest
{

    /**
     * The basic welcome message
     *
     * @access  public
     * @return  Response
     */

    public function action_country(){
        $this->format = 'json';
        $country = Model_Country::query()->where('area_id', '=', $_GET['area_id'])->get();
        return $this->response(array(
            'status' => true,
            'data' => $country,
        ));
    }

    public function action_city(){
        $this->format = 'json';
        $city = Model_City::query()->where('country_id', '=', $_GET['country_id'])->get();
        return $this->response(array(
            'status' => true,
            'data' => $city,
        ));
    }
}

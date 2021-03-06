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
class Controller_TourApi extends Controller_Rest
{
    protected $format = 'json';
    /**
     * The basic welcome message
     *
     * @access  public
     * @return  Response
     */

    public function action_country()
    {
        $data = Model_Country::getCountryByAreaId($_GET['area_id']);
        return $this->response(array(
            'errcd' => 0,
            'data' => $data,
        ));
    }

    public function action_city()
    {
        $data = Model_City::getCityByCountryId($_GET['country_id']);
        return $this->response(array(
            'errcd' => 0,
            'data' => $data,
        ));
    }

    public function action_tour()
    {
        foreach ($_POST as $key => $value) {
            if ($key == 'tour_code') {
                if ($value == '') {
                    unset($_POST[$key]);
                }
            } else {
                if ($value == '0') {
                    unset($_POST[$key]);
                }
            }
        }
        $ch = curl_init(Router::get('api_search'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);

        $response = curl_exec($ch);

        curl_close($ch);

        return $this->response(array(
            'errcd' => 0,
            'data' => json_decode($response),
        ));
    }

    public function action_search()
    {
        $data = Model_Tour::searchTour($_POST);

        return $data;
    }
}

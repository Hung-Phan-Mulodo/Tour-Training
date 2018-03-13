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

    /**
     * The basic welcome message
     *
     * @access  public
     * @return  Response
     */

    public function action_country()
    {
        $this->format = 'json';
        $country = Model_Country::query()->where('area_id', '=', $_GET['area_id'])->get();
        return $this->response(array(
            'errcd' => 0,
            'data' => $country,
        ));
    }

    public function action_city()
    {
        $this->format = 'json';
        $city = Model_City::query()->where('country_id', '=', $_GET['country_id'])->get();
        return $this->response(array(
            'errcd' => 0,
            'data' => $city,
        ));
    }

    public function action_tour()
    {
        $this->format = 'json';

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
        $this->format = 'json';

        $query = DB::select('*')->from('tours');

        foreach ($_POST as $key => $value) {
            if ($key == 'tour_code') {
                $query->where('code', 'like', "%$value%");
            } else {
                $query->where($key . '_id', '=', $value);
            }
        }

        $results = $query->execute();

        return $results->as_array();
    }
}

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
class Controller_City extends Controller
{

    /**
     * The basic welcome message
     *
     * @access  public
     * @return  Response
     */
    public function action_index()
    {
        // variables view
        $data = array();

        $data['cities'] = Model_City::getAllCity();
        $view = $this->assign_view();
        $view->content = View::forge('admin/city/index.tpl', $data);
        return $view;
    }

    public function action_create()
    {
        // variables view
        $countries = Model_Country::getAllCountry();

        $data = array();
        $data['countries'] = $countries;
        $view = $this->assign_view();
        $view->content = View::forge('admin/city/create.tpl', $data);
        return $view;
    }

    public function action_add()
    {
        if (Input::method() == 'POST') {
            $val = Validation::forge();
            $val->add('code', 'Code')->add_rule('required');
            $val->add('name', 'Name')->add_rule('required');
            $val->add('country_id', 'Country')->add_rule('required');
            $val->set_message('required', 'Please enter a value');
            if ($val->run()) {
                $city = new Model_City();
                $city->code = $_POST['code'];
                $city->name = $_POST['name'];
                $city->country_id = $_POST['country_id'];

                if ($city->save()) {
                    Session::set_flash('success', 'Add success');
                    Response::redirect('city');
                }
            } else {
                Session::set_flash('danger', $val->get_message('required', null));
                Response::redirect_back();
            }
        }
    }

    public function action_edit()
    {
        $data = array();
        $city = Model_City::getCityById($_GET['id']);
        if(!$city){
            $view = $this->assign_error();
            $view->error = 404;
            $view->content = View::forge('admin/errors/404');
            return $view;
        }
        $countries = Model_Country::getAllCountry();

        $data['city'] = $city;
        $data['countries'] = $countries;

        $view = $this->assign_view();
        $view->content = View::forge('admin/city/edit.tpl', $data);
        return $view;
    }

    public function action_update()
    {
        if (Input::method() == 'POST') {
            $city = Model_City::getCityById($_GET['id']);
            $city->code = $_POST['code'];
            $city->name = $_POST['name'];
            $city->country_id = $_POST['country_id'];

            if ($city->save()) {
                Session::set_flash('success', 'Update success');
                Response::redirect_back();
            }
        }
    }

    public function action_delete()
    {
        $city = Model_City::getCityById($_GET['id']);
        if(!$city){
            $view = $this->assign_error();
            $view->error = 404;
            $view->content = View::forge('admin/errors/404');
            return $view;
        }
        if ($city->delete()) {
            Session::set_flash('success', 'Delete success');
            Response::redirect_back();
        }
    }

    public function assign_view()
    {
        // add other folder assets
        Asset::add_path('assets/global/', 'global');
        Asset::add_path('assets/layouts/', 'layouts');
        Asset::add_path('assets/pages/', 'pages');

        // create view
        $view = View::forge('admin/layout');

        // assign view
        $view->head = View::forge('admin/patials/head');
        $view->header = View::forge('admin/patials/header');
        $view->sidebar = View::forge('admin/patials/sidebar');
        $view->footer = View::forge('admin/patials/footer');
        $view->foot = View::forge('admin/patials/foot');

        return $view;
    }

    public function assign_error()
    {
        // add other folder assets
        Asset::add_path('assets/global/', 'global');
        Asset::add_path('assets/layouts/', 'layouts');
        Asset::add_path('assets/pages/', 'pages');

        // create view
        $view = View::forge('admin/errors/layout');

        // assign view
        $view->head = View::forge('admin/patials/head');
        $view->foot = View::forge('admin/patials/foot');

        return $view;
    }
}

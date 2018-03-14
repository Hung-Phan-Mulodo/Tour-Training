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
class Controller_Country extends Controller
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

        $data['countries'] = Model_Country::getAllCountry();
        $view = $this->assign_view();
        $view->content = View::forge('admin/country/index.tpl', $data);
        return $view;
    }

    public function action_create()
    {
        // variables view
        $areas = Model_Area::getAllArea();

        $data = array();
        $data['areas'] = $areas;
        $view = $this->assign_view();
        $view->content = View::forge('admin/country/create.tpl', $data);
        return $view;
    }

    public function action_add()
    {
        if (Input::method() == 'POST') {
            $val = Validation::forge();
            $val->add('code', 'Code')->add_rule('required');
            $val->add('name', 'Name')->add_rule('required');
            $val->add('area_id', 'Area')->add_rule('required');
            $val->set_message('required', 'Please enter a value');
            if ($val->run()) {
                $country = new Model_Country();
                $country->code = $_POST['code'];
                $country->name = $_POST['name'];
                $country->area_id = $_POST['area_id'];

                if ($country->save()) {
                    Session::set_flash('success', 'Add success');
                    Response::redirect('country');
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
        $country = Model_Country::getCountryById($_GET['id']);
        if(!$country){
            $view = $this->assign_error();
            $view->error = 404;
            $view->content = View::forge('admin/errors/404');
            return $view;
        }
        $areas = Model_Area::getAllArea();

        $data['areas'] = $areas;
        $data['country'] = $country;

        $view = $this->assign_view();
        $view->content = View::forge('admin/country/edit.tpl', $data);
        return $view;
    }

    public function action_update()
    {
        if (Input::method() == 'POST') {
            $country = Model_Country::getCountryById($_GET['id']);
            $country->code = $_POST['code'];
            $country->name = $_POST['name'];
            $country->area_id = $_POST['area_id'];

            if ($country->save()) {
                Session::set_flash('success', 'Update success');
                Response::redirect_back();
            }
        }
    }

    public function action_delete()
    {
        $country = Model_Country::getCountryById($_GET['id']);
        if(!$country){
            $view = $this->assign_error();
            $view->error = 404;
            $view->content = View::forge('admin/errors/404');
            return $view;
        }
        if ($country->delete()) {
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

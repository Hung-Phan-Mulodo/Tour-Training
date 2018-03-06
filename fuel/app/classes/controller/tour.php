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
class Controller_Tour extends Controller
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
        $data['tours'] = Model_Tour::find('all');
        $view = $this->assign_view();
        $view->content = View::forge('admin/tour/index', $data);
        return $view;
    }

    public function action_create()
    {
        // variables view
        $areas = Model_Area::find('all');
        $cities = Model_City::find('all');
        $countries = Model_Country::find('all');

        $data = array();
        $data['areas'] = $areas;
        $data['cities'] = $cities;
        $data['countries'] = $countries;
        $view = $this->assign_view();
        $view->content = View::forge('admin/tour/create', $data);
        return $view;
    }

    public function action_add()
    {
        if (Input::method() == 'POST') {
            $val = Validation::forge();
            $val->add('code', 'Code')->add_rule('required');
            $val->add('title', 'Title')->add_rule('required');
            $val->add('gross_min', 'Gross min')->add_rule('required');
            $val->add('gross_max', 'Gross max')->add_rule('required');
            $val->set_message('required', 'Please enter a value');
            if ($val->run()) {
                $tour = new Model_Tour();
                $tour->code = $_POST['code'];
                $tour->title = $_POST['title'];
                $tour->gross_min = $_POST['gross_min'];
                $tour->gross_max = $_POST['gross_max'];
                $tour->area_id = $_POST['area_id'];
                $tour->city_id = $_POST['city_id'];
                $tour->country_id = $_POST['country_id'];

                $config = array(
                    'path' => DOCROOT . 'assets/img',
                    'randomize' => true,
                    'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
                );

                Upload::process($config);

                if (Upload::is_valid()) {
                    Upload::save();

                    $value = Upload::get_files();
                    $tour->image = $value[0]['saved_as'];
                }

                if ($tour->save()) {
                    Session::set_flash('success', 'Add success');
                    Response::redirect('tour');
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
        $tour = Model_Tour::find($_GET['id']);
        if(!$tour){
            $view = $this->assign_error();
            $view->error = 404;
            $view->content = View::forge('admin/errors/404');
            return $view;
        }
        $areas = Model_Area::find('all');
        $cities = Model_City::find('all');
        $countries = Model_Country::find('all');

        $data['areas'] = $areas;
        $data['cities'] = $cities;
        $data['countries'] = $countries;
        $data['tour'] = $tour;

        $view = $this->assign_view();
        $view->content = View::forge('admin/tour/edit', $data);
        return $view;
    }

    public function action_update()
    {
        if (Input::method() == 'POST') {
            $tour = Model_Tour::find($_GET['id']);
            $tour->code = $_POST['code'];
            $tour->title = $_POST['title'];
            $tour->gross_min = $_POST['gross_min'];
            $tour->gross_max = $_POST['gross_max'];
            $tour->area_id = $_POST['area_id'];
            $tour->city_id = $_POST['city_id'];
            $tour->country_id = $_POST['country_id'];

            $config = array(
                'path' => DOCROOT . 'assets/img',
                'randomize' => true,
                'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
            );

            Upload::process($config);

            if (Upload::is_valid()) {
                Upload::save();

                $value = Upload::get_files();
                $tour->image = $value[0]['saved_as'];
            }

            if ($tour->save()) {
                Session::set_flash('success', 'Update success');
                Response::redirect_back();
            }
        }
    }

    public function action_delete()
    {
        $tour = Model_Tour::find($_GET['id']);
        if(!$tour){
            $view = $this->assign_error();
            $view->error = 404;
            $view->content = View::forge('admin/errors/404');
            return $view;
        }
        if ($tour->delete()) {
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

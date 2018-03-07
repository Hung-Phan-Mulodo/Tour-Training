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
class Controller_Home extends Controller
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
        $data['name'] = 'Franky';
        $view = $this->assign_view();
        $view->content = View::forge('admin/home/index', $data);
        return $view;
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
}

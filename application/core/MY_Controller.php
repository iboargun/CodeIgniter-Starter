<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * @author    : Mhd Zaher Ghaibeh
 * @company   : IRWork Canada
 * @link      : http://www.IRWork
 * @email     : info@IRWork
 * @date      : Dec 4, 2011
 * @copyright :	Copyright (c) 2011 , IRWork Canada, Inc.
 * @version   :	Version 1.0
 * @filename  : MY_Controller.php
 */

class MY_Controller extends CI_Controller {

    protected $theme;
    protected $debug;
    protected $clean_output;

    public $user = FALSE;
    public $admin = FALSE;

    public function __construct($isAdminArea = false) {
        parent::__construct();

        // set theme depend on admin or frontend area
        $this->theme = ($isAdminArea) ? config_item('app_admin_theme') : config_item('app_theme');

        // config debug item
        $this->debug = config_item('app_debug');
        
        // config clean output item
        $this->clean_output = config_item('app_clean_output');

        // check if we are in backend area and assign users to core
        if ($isAdminArea)
            $this->admin = ($this->session->userdata('admin_id')) ? Admin::find_by_id($this->session->userdata('admin_id')) : FALSE;

        // is debug?
        if ($this->debug) {
            $this->load->spark('Debug-Toolbar/1.0.7');
            $this->load->library('console');
            $this->output->enable_profiler(true);
        }

        // set the layout directory
        $this->layout->set_layout_dir('views/themes/' . $this->theme . '/layouts/');
        
        // check if there is ajax call and set layout file
        $layout_file = (!$this->input->get('ajax') && !$this->input->post('ajax')) ? 'layout' : 'ajax' ;
        $this->layout->set_layout($layout_file);

        // clean output ?
        if(!$this->clean_output){
            $this->layout->disable_clean_output();
        }

    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends MY_Controller {

    function __construct() {
        
        parent::__construct(true);
    }

    /**
     * login method
     *
     * @return void
     * @author Ibrahim Argun
     **/
    public function login() {
        
        if($this->admin)
            redirect('admin/products', 'refresh');

        $this->data['title'] = "Login";

        if($this->input->post()){

            // validate form input
            $this->form_validation->set_rules('username', 'Benutzername', 'required');
            $this->form_validation->set_rules('password', 'Passwort', 'required');

            if ($this->form_validation->run() == true) { //check to see if the user is logging in

                $admin = Admin::validate_login($this->input->post('username'), $this->input->post('password'));

                if($admin) { // if user is validated succesfully

                    //redirect him to store front
                    redirect('admin/products', 'refresh');
                }else{
                    //set the flash data error message if there is one
                    $this->data['message'] = 'Wir konnten diesen Code leider nicht finden.';
                }

            } else {  //the user is not logging in so display the login page
                //set the flash data error message if there is one
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            }
        }

        $this->load->view('themes/' . $this->theme . '/auth/login', $this->data);
    }

    /**
     * logout method
     *
     * @return void
     * @author Ibrahim Argun
     **/
    public function logout() {
        
        $this->data['title'] = "Logout";

        // log the user out
        $logout = Admin::logout();

        // redirect them back to the page they came from
        redirect('admin/login', 'refresh');
    }

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends ActiveRecord\Model {

	/**
	 * login function
	 *
	 * @return void
	 * @author Ibrahim Argun
	 **/
	public static function validate_login($username, $password)
	{
		$admin = Admin::find_by_username($username);

		if($admin->password == $password){
			Admin::login($admin->id);
			
			return $admin;
		}else{
			return FALSE;
		}
	}

	/**
	 * login function
	 *
	 * @return void
	 * @author Ibrahim Argun
	 **/
	public static function login($admin_id)
	{
		$CI =& get_instance();
		$CI->session->set_userdata('admin_id', $admin_id);
	}

	/**
	 * logout function
	 *
	 * @return void
	 * @author Ibrahim Argun
	 **/
	public static function logout()
	{
		$CI =& get_instance();
		$CI->session->sess_destroy();
	}

}

/* End of file Admin.php */
/* Location: ./application/models/Admin.php */
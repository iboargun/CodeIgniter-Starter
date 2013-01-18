<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends ActiveRecord\Model {

	static $has_one = array(
		array('product')
	);

	static $validates_presence_of = array(
 		array('firstname', 'lastname', 'street', 'streetno', 'zip', 'city')
	);

	/**
	 * login function
	 *
	 * @return void
	 * @author Ibrahim Argun
	 **/
	public static function validate_login($code)
	{
		$user = User::find_by_code($code);

		if($user){
			User::login($user->id);
			
			return $user;
		}else{
			return FALSE;
		}
	}

	/**
	 * method to get user anrede function
	 *
	 * @return void
	 * @author Ibrahim Argun
	 **/
	public function get_anrede()
	{

		if($this->read_attribute('dutzen')){
			return $this->read_attribute('firstname') . ' '. $this->read_attribute('lastname');
		
		}else{

			if($this->read_attribute('gender') == 'male')
				return "Herr ".$this->read_attribute('lastname');
			else
				return "Frau ".$this->read_attribute('lastname');
		}

		return false;
	}

	/**
	 * method to get user Du oder Sie
	 *
	 * @return void
	 * @author Ibrahim Argun
	 **/
	public function get_you()
	{
		return ($this->read_attribute('dutzen')) ? "Du" : "Sie";
	}

	/**
	 * method to get user Dir oder Ihnen
	 *
	 * @return void
	 * @author Ibrahim Argun
	 **/
	public function get_your()
	{
		return ($this->read_attribute('dutzen')) ? "Dir" : "Ihnen";
	}

	/**
	 * method to get user Deiner oder Ihrer
	 *
	 * @return void
	 * @author Ibrahim Argun
	 **/
	public function get_yours()
	{
		return ($this->read_attribute('dutzen')) ? "Deiner" : "Ihrer";
	}

	/**
	 * method to get user Deine oder Ihre
	 *
	 * @return void
	 * @author Ibrahim Argun
	 **/
	public function get_yours2()
	{
		return ($this->read_attribute('dutzen')) ? "Deine" : "Ihre";
	}

	/**
	 * login function
	 *
	 * @return void
	 * @author Ibrahim Argun
	 **/
	public static function login($user_id)
	{
		$CI =& get_instance();
		$CI->session->set_userdata('user_id', $user_id);
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

/* End of file User.php */
/* Location: ./application/models/User.php */
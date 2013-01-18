<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends ActiveRecord\Model {
	
	static $has_many = array(
		array('users')
	);

	static $validates_presence_of = array(
		array('name'),
		array('short_description'),
		array('long_description')
 	);
}

/* End of file Product.php */
/* Location: ./application/models/Product.php */
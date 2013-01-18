<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct(true);

		if(!$this->admin){
			$this->session->set_flashdata('message', 'Du bist nicht berechtigt für diesen Bereich');
			redirect('admin/login');
		}
	}

	/**
	 * product list for admin users
	 *
	 * @return void
	 * @author Ibrahim Argun
	 **/
	public function index()
	{
		$this->data['users'] = User::all(array('order' => 'id asc'));
		$this->load->view('themes/' . $this->theme . '/users/index', $this->data);
	}

	/**
     * new page function
     *
     * @return void
     * @author Ibrahim Argun
     **/
    public function create($save = FALSE)
    {
    	$this->edit($save);
    }

    /**
	 * edit function
	 *
	 * @return void
	 * @author 
	 **/
	public function edit($id = FALSE)
	{

		// create empty page object
		$oUser = ($id) ? User::find_by_id($id) : new User;

		// process if form is submitted
		if($this->input->post())
		{	
			// redirect on save
			$oUser->code = $this->input->post('code');
			$oUser->email = $this->input->post('email');

			$oUser->gender = $this->input->post('gender');
			$oUser->firstname = $this->input->post('firstname');
			$oUser->lastname = $this->input->post('lastname');
			$oUser->company = $this->input->post('company');
			$oUser->street = $this->input->post('street');
			$oUser->streetno = $this->input->post('streetno');
			$oUser->zip = $this->input->post('zip');
			$oUser->city = $this->input->post('city');
			$oUser->code = $this->input->post('code');
			$oUser->dutzen = $this->input->post('dutzen');

			$oUser->special_answer = $this->input->post('special_answer');
			$oUser->product_id = $this->input->post('product_id');


			if($oUser->save())
			{
				$this->session->set_flashdata( 'success', 'Der Benutzer wurde erfolgreich gespeichert.');
				
				// if(!$id)
				// 	redirect('admin/products/'.$oProduct->id.'/edit');
			}else{
				$this->data['error'] = 'Der Benutzer konnte nicht gespeichert werden.';
			}
		}

		$this->data['products'] = array(0 => '--');
		$products = Product::all();
		foreach($products as $product){
			$this->data['products'][$product->id] = $product->name;
		}


		// assign object to view data
		$this->data['user'] = $oUser;
		$this->data['id'] = $id;

		// send data to view
		$this->load->view('themes/' . $this->theme . '/users/form', $this->data);
	}

	/**
	 * delete entry function
	 *
	 * @return void
	 * @author Ibrahim Argun
	 **/
	public function delete($id)
	{
		$oUser = User::find($id);
			
		if($oUser){
			if($oUser->delete()){
				$this->session->set_flashdata( 'success', 'Der Benutzer wurde erfolgreich entfernt.');
			}
		}

		redirect('admin/users');
	}


}

/* End of file users.php */
/* Location: ./application/controllers/admin/users.php */

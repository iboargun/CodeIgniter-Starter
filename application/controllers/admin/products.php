<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller {

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
		$this->data['products'] = Product::all(array('order' => 'sort asc'));
		$this->load->view('themes/' . $this->theme . '/products/index', $this->data);
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
		$oProduct = ($id) ? Product::find_by_id($id) : new Product;

		// process if form is submitted
		if($this->input->post())
		{	
			// redirect on save
			$oProduct->sort = $this->input->post('sort');
			$oProduct->name = $this->input->post('name');
			$oProduct->short_description = $this->input->post('short_description');
			$oProduct->long_description = $this->input->post('long_description');
			$oProduct->special = $this->input->post('special');

   			// check and perform thumbnail upload
    		$thumbnail = $this->upload_thumbnail();
    		if(!empty($thumbnail['file_name']))
    			$oProduct->thumbnail = $thumbnail['file_name'];

    		// check and perform zoom upload
    		$zoom = $this->upload_zoom();
    		if(!empty($zoom['file_name']))
    			$oProduct->zoom = $zoom['file_name'];


			if($oProduct->save())
			{
				$this->session->set_flashdata( 'success', 'Das Produkt wurde erfolgreich gespeichert.');
				
				// if(!$id)
				// 	redirect('admin/products/'.$oProduct->id.'/edit');
			}else{
				$this->data['error'] = 'Das Produkt konnte nicht gespeichert werden.';
			}
		}

		// assign object to view data
		$this->data['product'] = $oProduct;
		$this->data['id'] = $id;

		// send data to view
		$this->load->view('themes/' . $this->theme . '/products/form', $this->data);
	}

	/**
	 * delete entry function
	 *
	 * @return void
	 * @author Ibrahim Argun
	 **/
	public function delete($id)
	{
		$oProduct = Product::find($id);
			
		if($oProduct){
			if($oProduct->delete()){
				$this->session->set_flashdata( 'success', 'Das Produkt wurde erfolgreich entfernt.');
			}
		}

		redirect('admin/products');
	}

	/**
	 * upload thumbnail
	 *
	 * @return void
	 * @author Ibrahim Argun
	 **/
	private function upload_thumbnail()
	{

		if (isset($_FILES['thumbnail']) && !empty($_FILES['thumbnail']['name']))
      	{
			$config['upload_path'] = '././assets/images/kolibo/thumbnails/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '2024';
			$config['max_width']  = '500';
			$config['max_height']  = '500';

			$this->load->library('upload', $config);

			// Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class:
			$this->upload->initialize($config);
			
			if(!$this->upload->do_upload('thumbnail')){
				$this->session->flashdata('error', explode('', $this->upload->display_errors()));
				return FALSE;
			}else{
				return $this->upload->data();
			}
		}
	}


	/**
	 * upload zoom
	 *
	 * @return void
	 * @author Ibrahim Argun
	 **/
	private function upload_zoom()
	{

		if (isset($_FILES['zoom']) && !empty($_FILES['zoom']['name']))
      	{
			$config['upload_path'] = '././assets/images/kolibo/zoom/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '2024';
			$config['max_width']  = '1024';
			$config['max_height']  = '1024';

			$this->load->library('upload', $config);

			// Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class:
			$this->upload->initialize($config);
			
			if(!$this->upload->do_upload('zoom')){
				$this->session->flashdata('error', explode('', $this->upload->display_errors()));
				return FALSE;
			}else{
				return $this->upload->data();
			}
		}
	}

}

/* End of file products.php */
/* Location: ./application/controllers/admin/products.php */

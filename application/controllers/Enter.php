<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//define the entry point

class Enter extends CI_Controller {

	public function index()
	{
		redirect("admin/dashboard");	
	}
}

/* End of file Enter.php */
/* Location: ./application/controllers/admin/Enter.php */
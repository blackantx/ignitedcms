<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {
	public function __construct()
	{
		  parent::__construct();
		  {
			  	if($this->session->userdata('isloggedin')=='1')
			  	{
			  		//allow access
			  	}
			  	else
			  	{
			  		redirect('installer','refresh');
			  	}
		  }
	}


	public function index()
	{
		
	}

	 /**
	  *  @Description: save smtp email settings to db
	  *       @Params: _POST $protocol; 
	  *				  $smtp_host;
	  *				  $smtp_port;
	  *				  $smtp_user;
	  *				  $smtp_pass;
	  *
	  *  	 @returns: nothing
	  */
	public function save_email_settings()
	{
		//get the _POST data and save to database
		$protocol  = $this->input->post('protocol');
		$smtp_host  = $this->input->post('smtp_host');
		$smtp_port  = $this->input->post('smtp_port');
		$smtp_user  = $this->input->post('smtp_user');
		$smtp_pass  = $this->input->post('smtp_pass');

		$object = array(
			'protocol' => $protocol, 
			'smtp_host' => $smtp_host,
			'smtp_port' => $smtp_port,
			'smtp_user' => $smtp_user,
			'smtp_pass' => $smtp_pass

			);
		$this->db->where('id', '1');
		$this->db->update('email', $object);

		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', '<strong>Success</strong> ');
		redirect("dashboard/site_settings", "refresh");
	}

	 /**
	  *  @Description: send a test email
	  *       @Params: _POST, email
	  *
	  *  	 @returns: success or fail
	  */
	public function test_email()
	{
		$this->load->model('Stuff_email');

		$email  = $this->input->post('email');

		$this->Stuff_email->my_email($email,'To','Test from IgnitedCMS',"Congratulations");

		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', '<strong>Please check your email.</strong>');

		redirect("dashboard/site_settings", "refresh");


	}



}

/* End of file email.php */
/* Location: ./application/controllers/email.php */
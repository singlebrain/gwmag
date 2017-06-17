<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('admin_mod');
        $this->load->library('session');
    }
    public function index()
    {
    	$this->load->view('adminlogin');
    }
    public function loadhome()
    {
    	echo $this->session->userdata('aid');
    	//$this->load->view('adminlogin');
    }
    public function checklogin()
	{
		$username= $this->input->post('username');	
		$this->form_validation->set_rules('username','User ID','required');
		$this->form_validation->set_rules('password','password','callback_verifyuser|required');
		if($this->form_validation->run()==false)
		{
			$this->load->view('adminlogin');
		}
		else
		{	
			$aid=$this->admin_mod->getaid($username);
			$this->session->set_userdata('aid',$aid);
			
			redirect(base_url().'index.php/admin/loadhome');	
		}

	}
	public function verifyuser()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->admin_mod->logincheck($username,$password)==true)
		{
			return true;
		}
		
		else
		{
			$this->form_validation->set_message('verifyuser','incorrect password or username');
			return false;
		}
		

	}
}
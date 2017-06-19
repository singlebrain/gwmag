<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('home_mod');
        $this->load->library('session');
    }
	public function checklogin()
	{
		$username= $this->input->post('userid');	
		$this->form_validation->set_rules('userid','User ID','required');
		$this->form_validation->set_rules('password','password','callback_verifyuser|required');
		if($this->form_validation->run()==false)
		{
			$this->load->view('log_in');
		}
		else
		{	
			$uid=$this->home_mod->getuid($this->input->post('userid'));
			$this->session->set_userdata('uid',$uid);
			echo "id".$this->session->userdata('uid');
			redirect(base_url().'index.php/welcome/loadhome');	
		}
	}
	public function verifyuser()
	{

		$uid = $this->input->post('userid');
		$password = $this->input->post('password');
		
		
		
		if($this->home_mod->logincheck($uid,$password)==true)
		{
			return true;
				//$this->load->view('welcome_message');
		}
		
		else
		{
			$this->form_validation->set_message('verifyuser','incorrect password or username');
			return false;
		}
		

	}
	public function create_user()
	{
		

		$this->form_validation->set_rules('fname','first name','required');
		$this->form_validation->set_rules('lname','last name','required');
		$this->form_validation->set_rules('mobile','mobile number','required');
		$this->form_validation->set_rules('pass1',' New password','required');
		$this->form_validation->set_rules('pass2','Re-type password','required|callback_passmatch');
		$this->form_validation->set_rules('email','E-mail id','required|valid_email');
		$this->form_validation->set_rules('username','username','required|callback_available');
		if($this->form_validation->run()==false)
		{
			$this->load->view('signup');


		}
		else
		{	
			$pass1 = $this->input->post('pass1');
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$rollnum = $this->input->post('rollnum');
			$dept = $this->input->post('dept');
			$data = array(
				'f_name'=>$this->input->post('fname'),
				'l_name'=>$this->input->post('lname'),
				'u_id' => $this->input->post('username'),				
				'pass' => $this->input->post('pass1'),
				'email' => $this->input->post('email'),
				'class'=>$this->input->post('class'),
				'school'=>$this->input->post('school'),
				'phone' => $this->input->post('mobile'),
				);
			
			$this->home_mod->createuser($data);
			
			$this->load->view('log_in');	

		}

	}
	public function passmatch()
	{
		$pass1 = $this->input->post('pass1');
		$pass2 = $this->input->post('pass2');
		if($pass1 == $pass2)
		{	
			return true;
		}
		else
		{
			$this->form_validation->set_message('passmatch','password doesn\'t match');
			return false;
		}
	}
	public function available()
	{
		if($this->home_mod->available($this->input->post('username')))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('available','user name not available');
			return false;
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'index.php/welcome/loadhome');
	}
	public function index()
	{
		//redirect(base_url().'index.php/login_cont/loginview');
		$this->load->view('basic_form');
	}
	public function loadview()
	{
		$this->load->view('basic_form');
	}
	public function loadloginpage()
	{
		$this->load->view('log_in');
	}
	public function loadsignup()
	{
		$this->load->view('signup');
	}
	public function loadhome()
	{
		$this->load->view('home');
	}
	public function userhome()
	{
		//echo $this->session->userdata('username');
		$this->load->view('home');
	}
public function loadabout()
	{
		$this->load->view('about');
	}	
public function loadcontact()
	{
		$this->load->view('contact');
	}	
public function loadsayso()
	{
		$this->load->view('sayso');
	}
public function loadfaq()
	{
		$this->load->view('faq');
	}	
public function loaduslogin()
	{
		$this->load->view('uslogin');
	}
public function loadgift()
	{
		$this->load->view('gift');
	}		
public function loadjoinus()
	{
		$this->load->view('joinus');
	}		
public function loadsample()
	{
		$index = 01;
		$this->session->set_userdata('index',$index);
		$this->load->view('sample');
	}	
	public function nextpage()
	{
		$index = $this->session->userdata('index');
		$index=$index+1;
		$this->session->set_userdata('index',$index);
		$this->load->view('sample');
	}	
	public function prevpage()
	{
		$index = $this->session->userdata('index');
		$index=$index-1;
		$this->session->set_userdata('index',$index);
		$this->load->view('sample');
	}

}

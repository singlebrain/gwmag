<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Home_mod');
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
			$uid=$this->Home_mod->getuid($this->input->post('userid'));
			$this->session->set_userdata('uid',$uid);
			
			redirect(base_url().'index.php/welcome/loadhome');	
		}
	}
	public function verifyuser()
	{

		$uid = $this->input->post('userid');
		$password = $this->input->post('password');
		
		
		
		if($this->Home_mod->logincheck($uid,$password)==true)
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
	public function subscribe()
	{
		if(!$this->session->has_userdata('uid'))
		{
			redirect(base_url().'index.php/welcome/loadloginpage');
		}
		$this->load->view('subscribe');
	}
	public function checkgift()
	{
		
		$this->form_validation->set_rules('fname','first name','required');
		$this->form_validation->set_rules('lname','last name','required');
		$this->form_validation->set_rules('mobile','mobile number','required');
		$this->form_validation->set_rules('pass1',' New password','required');
		$this->form_validation->set_rules('pass2','Re-type password','required|callback_passmatch');
		$this->form_validation->set_rules('email','E-mail id','required|valid_email');
		$this->form_validation->set_rules('username','username','required|callback_available');
			
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
			
		


		$this->form_validation->set_rules('add1','address line 1','required');
		$this->form_validation->set_rules('add2','address line 2','required');
		$this->form_validation->set_rules('city','city','required');
		$this->form_validation->set_rules('pin','pin code','required|numeric|exact_length[6]');
		$this->form_validation->set_rules('country','country','required');
		if($this->form_validation->run()==false)
		{
			$this->load->view('subscribe');


		}
		else
		{	
			$period = $this->input->post('period');
			$year= (int)date('y')+intval($period);
			$data1 = array(
				'add1'=>$this->input->post('add1'),
				'add2'=>$this->input->post('add2'),
				'city' => $this->input->post('city'),				
				'pincode' => $this->input->post('pin'),
				'country' => $this->input->post('country'),
				'pay_mode'=>'pay_u',
				'sub_start_date'=>date('m-y'),
				'sub_exp_date'=>date('m').'-'.$year,
				'bill_date'=>date('y-m-d'),
				'u_id'=>$this->session->userdata('uid'),
				'tosent'=>intval($period)*10,
				'life'=>intval($period)*10
				);
			
			$this->Home_mod->createsubscription($data1);
			$this->Home_mod->createuser($data);
			//echo date('y');
			redirect(base_url().'index.php/welcome/loadhome');	
		}
	}

	public function subscribe_check()
	{
		if(!$this->session->has_userdata('uid'))
		{
			redirect(base_url().'index.php/welcome/loadloginpage');
		}


		$this->form_validation->set_rules('add1','address line 1','required');
		$this->form_validation->set_rules('add2','address line 2','required');
		$this->form_validation->set_rules('city','city','required');
		$this->form_validation->set_rules('pin','pin code','required|numeric|exact_length[6]');
		$this->form_validation->set_rules('country','country','required');
		if($this->form_validation->run()==false)
		{
			$this->load->view('subscribe');


		}
		else
		{	
			$period = $this->input->post('period');
			$year= (int)date('y')+intval($period);
			$data = array(
				'add1'=>$this->input->post('add1'),
				'add2'=>$this->input->post('add2'),
				'city' => $this->input->post('city'),				
				'pincode' => $this->input->post('pin'),
				'country' => $this->input->post('country'),
				'pay_mode'=>'pay_u',
				'sub_start_date'=>date('m-y'),
				'sub_exp_date'=>date('m').'-'.$year,
				'bill_date'=>date('y-m-d'),
				'u_id'=>$this->session->userdata('uid'),
				'tosent'=>intval($period)*10,
				'life'=>intval($period)*10
				);
			
			$this->Home_mod->createsubscription($data);
			//echo date('y');
			redirect(base_url().'index.php/welcome/loadhome');	
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
			
			$this->Home_mod->createuser($data);
			
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
		if($this->Home_mod->available($this->input->post('username')))
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
public function loadtrial()
	{
		$this->load->view('trial');
	}		
public function loadraja()
	{
		$this->load->view('raja');
	}	
	public function loaduser()
	{
		$this->load->view('user');
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
			public function sendfeedback()
	{
		$name=$this->input->post('Name');
        $email=$this->input->post('Email');
        $feedback=$this->input->post('feedback');
        require 'PHPMailer/PHPMailerAutoload.php';

			$mail = new PHPMailer;
$mail->isSMTP();                                   // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                            // Enable SMTP authentication
			$mail->Username = 'giantwheelmagazine@gmail.com';          // SMTP username
			$mail->Password = '8b140b20e7'; // SMTP password
			$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                 // TCP port to connect to

			$mail->setFrom('giantwheelmagazine@gmail.com', 'james');
			$mail->addReplyTo('giantwheelmagazine@gmail.com', 'james');
			$mail->addAddress('giantwheelmagazine@gmail.com');   // Add a recipient
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			$mail->isHTML(true);  // Set email format to HTML
			$mail->Subject = 'feedback';
			$mail->Body    = $name.'<br>'.$email.'<br>'.$feedback;
			echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded');
			$mail->send();
			$this->load->view('home');
	}

		public function loadthankyou()
	{
		$this->load->view('thankyou');
	}

}

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
    public function sentmail()
    {
    	if(!$this->session->has_userdata('aid'))
		{
			redirect(base_url().'index.php/admin');
		}
    	$this->load->view('sentmail');
    }
    public function sentmail_check()
    {

    	$sub = $this->input->post('subject');
    	$bodyContent = $this->input->post('body');
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
			$mail->addAddress('ashik.alias@gmail.com');   // Add a recipient
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			$mail->isHTML(true);  // Set email format to HTML

			//$bodyContent = '<h1>Welcome to giant wheel</h1>';
			//$bodyContent .= '<p>your login details are <br>username : <b>'.$username.'</b><br>password : <b>'.$password.'</b></p>';

			$mail->Subject = $sub;
			$mail->Body    = $bodyContent;
			echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded');
			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			}
			else {
			    echo 'Message has been sent';
			}
    }
    public function loadhome()
    {
    	echo $this->session->userdata('aid');
    	$this->load->view('adminhome');
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_mod extends CI_Model
{
	function __construct() 
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        
    }
     public function getaid($uid)
	{
		$query = $this->db->query('SELECT id,username FROM admin');

		foreach ($query->result() as $row)
		{     	  
      	  if($row->username==$uid)
      	  {
      	  	return $row->id;
      	  }
		}
	}
     public function logincheck($uid, $password)
	{
		# code...
		$query = $this->db->query('SELECT username, password FROM admin');

		foreach ($query->result() as $row)
		{
      	  
      	  if($row->username==$uid)
      	  {
      	  	if($row->password==$password)
      	  	{
      	  		return true;
      	  	}
      	  }
		}

			return false;	
	}
}
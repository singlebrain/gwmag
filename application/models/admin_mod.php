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
  public function update_shipment()
  {
    $query = $this->db->query('SELECT id,tosent,u_id FROM subscription');
    $email  = array('0' =>'nelluvely96@gmail.com' ,'1' =>'nelluvely96@gmail.com' ,'2' =>'nelluvely96@gmail.com' ,'3' =>'nelluvely96@gmail.com'  );
    foreach ($query->result() as $row)
    {         
          if($row->tosent>0)
          {
            $num = intval($row->tosent)-1;
            $this->db->query('UPDATE subscription SET tosent= '.$num.' WHERE id =\''.$row->id.'\'');
            if($num<4)
            {
              $mid = $this->db->query('SELECT id,email FROM user_detail WHERE id =\''.$row->u_id.'\'');
              foreach ($mid->result() as $mlid)
              {
                $email[$num].=','.$mlid->email;
              }
            }
          }
    }
    return $email;
  }
   public function getmailid()
  {
    $query = $this->db->query('SELECT id,u_id,email FROM user_detail');

    return $query->result();
   
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
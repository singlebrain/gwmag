<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_mod extends CI_Model
{
	function __construct() 
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        
    }
    public function createuser($data)
   {
     $this->db->insert('user_detail', $data);

   }

    public function logincheck($uid, $password)
	{
		# code...
		$query = $this->db->query('SELECT u_id, pass FROM user_detail');

		foreach ($query->result() as $row)
		{
      	  
      	  if($row->u_id==$uid)
      	  {
      	  	if($row->pass==$password)
      	  	{
      	  		return true;
      	  	}
      	  }
		}

			return false;	
	}
	 public function available($uid)
  {
    # code...
    $query = $this->db->query('SELECT u_id FROM user_detail');

    foreach ($query->result() as $row)
    {
          
          if($row->u_id==$uid)
          {
              return false;
           
          }
    }

      return true; 
  }
  
	
}
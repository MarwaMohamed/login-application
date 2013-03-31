<?php

class Membership_Model extends CI_Model{
	
	
	function Membership_Autho()
	{
		$this->db->where('usr_name',$this->input->post('username'));
		$this->db->where('usr_pass',md5($this->input->post('password')));
		$data=$this->db->get('logintable');
		if($data->num_rows ==1)
		{
			
			return true;
		}
		
	}
	function Create_account()
	{
		$new_member_insert_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email_address' => $this->input->post('email_address'),			
			'usr_name' => $this->input->post('username'),
			'usr_pass' => md5($this->input->post('password'))						
		);
		
		$insert = $this->db->insert('logintable', $new_member_insert_data);
		return $insert;
		
	}
}


?>
<?php
class login extends CI_Controller
{

function  index()
{
	$data["main_content"]="login_form";
	$this->load->view("includes/template",$data);
}	

function  validate_content()
{
	$this->load->model('Membership_Model');
	
   $return_value=$this->Membership_Model->Membership_Autho();
   if($return_value==true)
   {
   	 $data=array('username'=>$this->input->post('username'),
      'is_logged_in'=>true);
	  $this->session->set_userdata($data);
	  //if use credinational is correct redired the user to member area
     redirect('Member_area/members_area');
	
   }
   
   else {
   	$this->index();
   }
}

function sign_up()
{
	$data['main_content']='sign_up';
$this->load->view("includes/template",$data);
}	

function create_member()
{
	// field name, error message, validation rules
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
	if($this->form_validation->run()==true)
	{
		$this->load->model('Membership_Model');
		$query=$this->Membership_Model->Create_account();
		if($query)
		{
			$data['main_content']='signup_successful';
			$this->load->view("includes/template",$data);
			
		}
else
	{      
			$this->sign_up();		
	}
	}
else {		$this->sign_up();				}
	
	
}

} 
?>
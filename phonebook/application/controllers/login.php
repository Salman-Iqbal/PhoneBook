<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function SingIn()
	{
	   $email = $this->input->post("email");
	   $pass  = $this->input->post('password');
	 
	  $result = $this->HomeModel->check_login($email,$pass);
	  
	  if ($result) 
	  {
	  	 $userid = $result->userid;
	  	 $email  = $result->email;
	  	 $name   = $result->FullName;

	    $session_data = array('userid'   =>$userid ,
	    					  'email'    =>$email,
	    					  'FullName' =>$name );	
	    $this->session->set_userdata('Logged_In',$session_data); 					    	
	    redirect('home');
	  }
	  else
	  {
	  	echo "sorry invalid ";
	    return;
	  }
	}
	public function logout()
	{
		$this->session->unset_userdata('Logged_In');
	    $this->index();
	}
}
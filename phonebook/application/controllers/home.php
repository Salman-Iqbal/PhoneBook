<?php 
if(!defined('BASEPATH')) exit('No dicrected script is allowed');


class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$srh = $this->input->post("srh");
		$info['data'] =$this->session->userdata('Logged_In');
	    $id = $info['data']['userid'];
	    $info['details']=$this->HomeModel->get_all('users','userid',$id);
	    $info['all'] = $this->HomeModel->get_all_contacts($id,$srh);
		if (!$info['data']) 
		{
			redirect('login/index');
		}
	   $this->load->view('profile',$info);

	}
	public function Register()
	{
		$this->load->view('register');
	}
	public function SingUp()
	{
		$post = $this->input->post();
		if ($post) 
		{
			$fname = $this->input->post('Fname');
			$lname = $this->input->post('Lname');
			$email = $this->input->post('Email');
			$user  = $this->input->post('user');
			$pass  = $this->input->post('pass');
			$encrypt = $this->encrypt->sha1($pass);
			$array = array('Fname'      =>$fname,
						   'Lname'      =>$lname,
						   'FullName'   =>$fname." ".$lname,
						   'email'      =>$email,
						   'username'   =>$user,
						   'password'   =>$encrypt,
						   'DateCreated'=>date('Y-m-d')
						   );
			$query= $this->HomeModel->InsertRecord('users',$array);
			if ($query) 
			{
				echo "OK::Record Inserted Successfully::success";
			}
			else
			{
				echo"Failed::There are some error::error";
			}
	    }
	    // $this->output->enable_profiler(TRUE);
	}			
				
		// function for cheaking email

	public function verify_email()
	{
	  $email = $this->input->post("email");
	  $result= $this->HomeModel->check_row($email);
	  if ($result > 0) 
	  {
	  	echo "Failed::Sorry this is email is Already Exits Please Try Another::error ";
	  	return;
	  }
	}

	// function for insert profile
	public function add_profile()
	{
		$dob  = $this->input->post('dob');
		$addrs= $this->input->post('address');

		$data = array('dob' =>$dob,'address'=>$addrs );

		$info = $this->session->userdata("Logged_In");

	    $userID = $info['userid'];
	    $where = array('userid' =>$userID);
	    $query=  $this->HomeModel->UpdateRecordWhere('users',$data,$where);
		if ($query) 
		{
			echo "OK::Record Updated::success";
			return;
		}
		else
		{
			echo "fail::con't Updated::error";
			return;
		}
	}
	public function update_picture()
	{
		if ($_FILES['userfile']) {
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name']  = $_FILES['userfile']['name'];
		// $config['max_size']	= '100';
		// $config['max_width']  = '1024';
		// $config['max_height']  = '8768';

		$this->load->library('upload',$config);
		$this->upload->initialize($config);



		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			// var_dump($error);

			$msg = "Sorry Picture Doesn't Upload";
			$this->session->set_flashdata("error",$msg);
			redirect("home");
			return;
		}
		else
		{
			$login_info = $this->session->userdata('Logged_In');
			$info = $login_info['userid'];

			$file_name = $config['file_name'];
			$table='users';
			$img_data=array('image'=>$file_name);
			$where =array('userid'=>$info);
			$this->HomeModel->UpdateRecordWhere($table,$img_data,$where);
			$data = array('upload_data' => $this->upload->data());

		    $msg = "Picture Successfully Uploaded";
			$this->session->set_flashdata("success",$msg);
			redirect("home");
		     return;
		}
	  }
	
	}
	// function for insertin contacts

	public function insert_contacts()
	{
	   $name =	$this->input->post('name');
	  $number=	$this->input->post('mynum');
	   $email=	$this->input->post('email');
	   $address=	$this->input->post('address');

	  $result= $this->HomeModel->save_contacts($name,$number,$email,$address);
	  if ($result) 
	  {
	  	echo "OK::Your Data Is Successfully Inserted::success";
	  	return;
	  }
	  else
	  {
	  	echo "fail::Contact Saved To fail::error";
	  	return;
	  }

	}
	public function load_all_contacts()
	{
	   $srh = $this->input->post("search");
	   $info['data'] = $this->session->userdata['Logged_In'];
	   $id = $info['data']['userid'];
	   $data = $this->HomeModel->get_all_contacts($id,$srh);	
	   $result = json_encode($data);
	   print_r($result);
	   return;
	}
	public function load_contact_info()
	{
		$id = $this->input->post('id');
	   $data = $this->HomeModel->load_contacts_info($id);	
		echo json_encode($data);
		return;
	}
	
}
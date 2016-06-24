<?php if(!defined('BASEPATH')) exit('No direct access allowed'); 


class HomeModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function InsertRecord($table,$data)
	{
	 $result = $this->db->insert($table,$data);
		 return $result;
	}
	public function UpdateRecordWhere($table,$data,$where)
	{
		$this->db->where($where);
	    $result = $this->db->update($table,$data);
		 return $result;
	}

	public function check_login($email,$pass)
	{

		$this->db->select('userid,FullName,email')
		         ->from('users')
		         ->where('email',$email)
		         ->where('password',sha1($pass));
		$query = $this->db->get();
		if ($query) 
		{
			return $query->row();
		}
	}
	public function check_row($email)
	{
		$this->db->select('email')
		         ->from('users')
		         ->where('email',$email);
		$query = $this->db->get();
		if ($query)
		{
		 	return $query->num_rows();
		 } 
	}
	public function get_all($table,$field,$id)
	{
	    $this->db->select('*')
	         ->from($table)
	         ->where($field,$id)
	         ;
	    $result = $this->db->get();
	    if ($result->num_rows()>0) 
	    {
	     	return $result->row();
	    } 
	}
	public function get_all_contacts($id,$filter = NUll)
	{
		if (!empty($filter)) 
		{
		   
		   $this->db->select("CT.ph_id,CT.name,CT.email,group_concat(NB.number) as number,CT.address as ad")->from('contacts CT')
		      ->join('numbers NB','NB.ph_id=CT.ph_id')
		      ->where('CT.userid',$id)
		      ->group_by('NB.ph_id')
		      ->like('CT.name',$filter);
	           $query = $this->db->get();
	                  
	            return $query->result();
		}
		
		$this->db->select("CT.ph_id,CT.name,CT.email,group_concat(NB.number) as number,CT.address as ad")->from('contacts CT')
		->join('numbers NB','NB.ph_id=CT.ph_id')
		->where('CT.userid',$id)
		->group_by('NB.ph_id');
	      $query = $this->db->get();
	                  
	      return $query->result();
	}
	public function save_contacts($name,$number,$email,$address)
	{
		// code for transaction
		$this->db->trans_begin();

		$session_data = $this->session->userdata('Logged_In');
		$userID = $session_data['userid'];
		$date   = date("Y-m-d");
		$contact_data = array('name'=>$name,'email'=>$email,'userid'=>$userID,'DateCreated'=>$date,'address'=>$address);
		$query =  $this->db->insert('contacts',$contact_data);

		// For last insert id in contact table

		$contacID = $this->db->insert_id();

		foreach ($number as $num)
		 {
			$number_data = array('number'=>$num,'ph_id'=>$contacID);
			$query = $this->db->insert('numbers',$number_data);

		 }
		if ($this->db->trans_status() === FALSE)
		{
		        $this->db->trans_rollback();
		}
		else
		{
		        $this->db->trans_commit();
		        return $query;
		}

	}
	public function load_contacts_info($id,$filter = NUll)
	{
		
		$this->db->select("CT.ph_id,CT.name,CT.email,group_concat(NB.number) as number,CT.address as ad")->from('contacts CT')
		->join('numbers NB','NB.ph_id=CT.ph_id')
		->where('CT.ph_id',$id)
		->group_by('NB.ph_id');
	      $query = $this->db->get();
	                  
	      return $query->row();
	}
}
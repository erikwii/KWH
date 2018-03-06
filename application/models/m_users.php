<?php
/*Model for CRUD users(👦) table*/
class M_users extends CI_Model{
	
	public function tambah_akun($role=null, $data_users, $data_role)
	{
		$this->db->insert('users',$data_users);
		
		if ($role == null || $role == 'buyer') {
			$this->db->insert('buyer',$data_role);
		} else {
			$this->db->insert($role, $data_users);
		}
	}
	
	public function get_users_login($email, $password)
	{
		$query = $this->db->get_where('users', array('email' => $email, 'password' => $password));
		
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}
	}
}
<?php  

	/**
	 * 
	 */
	class Admin_model extends CI_model
	{
		
		public function getUsers(){
			$this->db->select('first_name, middle_name, last_name');
			$this->db->from('users');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function addUser($first_name, $middle_name, $last_name, $user_type, $username, $password){
			$data = array(
				'first_name' => $first_name,
				'middle_name' => $middle_name,
				'last_name' => $last_name,
				'user_type' => $user_type,
				'username' => $username,
				'password' => $password
			);

			if ($this->db->insert('users', $data)) {
				return true;
			}else{
				return false;
			}
		}	

	}

?>
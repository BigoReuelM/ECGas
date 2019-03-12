<?php  

	/**
	 * 
	 */
	class Admin_model extends CI_model
	{
		
		public function getActiveUsers(){
			$this->db->select('user_id, first_name, middle_name, last_name, contact, status');
			$this->db->from('users');
			$this->db->where('status', 'active');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getInactiveUsers(){
			$this->db->select('user_id, first_name, middle_name, last_name, contact, status');
			$this->db->from('users');
			$this->db->where('status', 'inactive');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getUserDetails($user_id){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('user_id', $user_id);

			$result = $this->db->get();

			return $result->row_array();
		}

		public function getNumberOfUsers(){
			$this->db->select('count(user_id) as user_count');
			$this->db->from('users');

			$result = $this->db->get();

			return $result->row();
		}

		public function getNumberOfAdminUsers(){
			$this->db->select('count(user_id) as user_count');
			$this->db->where('user_type', 'admin');
			$this->db->from('users');

			$result = $this->db->get();

			return $result->row();
		}

		public function getNumberOfEmployeeUsers(){
			$this->db->select('count(user_id) as user_count');
			$this->db->where('user_type', 'employee');
			$this->db->from('users');

			$result = $this->db->get();

			return $result->row();
		}

		public function getNumberOfActiveUsers(){
			$this->db->select('count(user_id) as user_count');
			$this->db->where('status', 'active');
			$this->db->from('users');

			$result = $this->db->get();

			return $result->row();
		}

		public function getNumberOfInactiveUsers(){
			$this->db->select('count(user_id) as user_count');
			$this->db->where('status', 'inactive');
			$this->db->from('users');

			$result = $this->db->get();

			return $result->row();
		}

		public function addUser($first_name, $middle_name, $last_name, $user_type, $gender, $contact, $address, $username, $password){
			$data = array(
				'first_name' => $first_name,
				'middle_name' => $middle_name,
				'last_name' => $last_name,
				'user_type' => $user_type,
				'gender' => $gender,
				'contact' => $contact,
				'address' => $address,
				'username' => $username,
				'password' => $password
			);

			if ($this->db->insert('users', $data)) {
				return true;
			}else{
				return false;
			}
		}

		/*
		
		Delete User 
		 */	
		
		public function deleteUser($user_id){
			$this->db->where('user_id', $user_id);
			if ($this->db->delete('users')) {
				return true;
			}else{
				return false;
			}
		}

		/*
		
		Update user status
		 */
		
		public function activateUserAccount($user_id){
			$data = array(
				'status' => 'active'
			);

			$this->db->where('user_id', $user_id);
			$this->db->update('users', $data);
		}

		public function deactivateUserAccount($user_id){
			$data = array(
				'status' => 'inactive'
			);

			$this->db->where('user_id', $user_id);
			$this->db->update('users', $data);
		}

		/*
		
		Update user details

		 */
		
		public function updateUserDetails($user_id, $colomn_name, $value){
			$data = array(
				$colomn_name => $value
			);

			$this->db->where('user_id', $user_id);
			$this->db->update('users', $data);
		}

		//////////////////////
		// settings quiries //
		//////////////////////
		
		public function getProductCategories(){
			$result = $this->db->get('product_categories');
			return $result->result_array();
		}

		public function getPaymentMethods(){
			$result = $this->db->get('payment_methods');
			return $result->result_array();
		}

		public function getIssues(){
			$result = $this->db->get('issues');
			return $result->result_array();
		}

		public function addProductCategory($product_category){
			$data = array(
				'product_category' => $product_category
			);

			$this->db->insert('product_categories', $data);
		}

		public function addPaymentMethod($payment_method){
			$data = array(
				'payment_method' => $payment_method
			);

			$this->db->insert('payment_methods', $data);
		}

		public function addIssue($issue){
			$data = array(
				'issue' => $issue
			);

			$this->db->insert('issues', $data);
		}

		public function deleteProductCategory($product_category_id){
			$this->db->where('product_category_id', $product_category_id);

			if ($this->db->delete('product_categories')) {
				return true;
			}else{
				return false;
			}
		}

		public function deletePaymentMethod($payment_method_id){
			$this->db->where('payment_method_id', $payment_method_id);

			if ($this->db->delete('payment_methods')) {
				return true;
			}else{
				return false;
			}
		}

		public function deleteIssue($issue_id){
			$this->db->where('issue_id', $issue_id);

			if ($this->db->delete('issues')) {
				return true;
			}else{
				return false;
			}
		}

	}

?>
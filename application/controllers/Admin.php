<?php  
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class Admin extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('form', 'url');
			$this->load->model('admin_model');
			$this->load->model('pages_model');
			$this->load->library('form_validation');

		}



		public function users(){

			$data['page_title'] = 'Admin | Users';
			$data['users'] = $this->admin_model->getUsers();
			$data['user_count'] = $this->admin_model->getNumberOfUsers()->user_count;
			$data['admin_users_count'] = $this->admin_model->getNumberOfAdminUsers()->user_count;
			$data['employee_users_count'] = $this->admin_model->getNumberOfEmployeeUsers()->user_count;
			$data['active_users'] = $this->admin_model->getNumberOfActiveUsers()->user_count;
			$data['inactive_users'] = $this->admin_model->getNumberOfInactiveUsers()->user_count;
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('users_view');
			$this->load->view('fragments/footer');
		}

		/////////////////////////
		//settings controllers //
		/////////////////////////


		public function settings(){
			$data['page_title'] = 'Admin | Settings';
			$data['product_categories'] = $this->admin_model->getProductCategories();
			$data['payment_methods'] = $this->admin_model->getPaymentMethods();
			$data['issues'] = $this->admin_model->getIssues();
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('admin_settings');
			$this->load->view('fragments/footer');
		}

		public function addProductCategory(){
			$product_category = ucwords(htmlspecialchars(trim($this->input->post('product_category'))));

			$this->admin_model->addProductCategory($product_category);
		}

		public function addPaymentMethod(){
			$payment_method = ucwords(htmlspecialchars(trim($this->input->post('payment_method'))));

			$this->admin_model->addPaymentMethod($payment_method);
		}

		public function addIssue(){
			$issue = ucwords(htmlspecialchars(trim($this->input->post('issue'))));

			$this->admin_model->addIssue($issue);
		}

		public function deleteProductCategory(){
			$data['success'] = false;
			$product_category_id = htmlspecialchars(trim($this->input->post('product_category_id')));

			if ($this->admin_model->deleteProductCategory($product_category_id)) {
				$data['success'] = true;
			}

			echo json_encode($data);
		}

		public function deletePaymentMethod(){
			$data['success'] = false;
			$payment_method_id = htmlspecialchars(trim($this->input->post('payment_method_id')));

			if ($this->admin_model->deletePaymentMethod($payment_method_id)) {
				$data['success'] = true;
			}

			echo json_encode($data);
		}

		public function deleteIssue(){
			$data['success'] = false;
			$issue_id = htmlspecialchars(trim($this->input->post('issue_id')));

			if ($this->admin_model->deleteIssue($issue_id)) {
				$data['success'] = true;
			}

			echo json_encode($data);
		}

		////////
		//end //
		////////


		public function addUser(){

			$data = array('success' => true, 'unique_username' => true);

			$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');

			if ($this->form_validation->run()) {
				$first_name = ucwords(htmlspecialchars(trim($this->input->post('first_name'))));
				$middle_name = ucwords(htmlspecialchars(trim($this->input->post('middle_name'))));
				$last_name = ucwords(htmlspecialchars(trim($this->input->post('last_name'))));
				$user_type = htmlspecialchars(trim($this->input->post('user_type')));
				$gender = htmlspecialchars(trim($this->input->post('gender')));
				$contact = htmlspecialchars(trim($this->input->post('contact')));
				$username = htmlspecialchars(trim($this->input->post('username')));
				$address = ucwords(htmlspecialchars(trim($this->input->post('address'))));

				$password = $this->input->post('password');

				if ($this->admin_model->addUser($first_name, $middle_name, $last_name, $user_type, $gender, $contact, $address, $username, $password)) {
					$data['success'] = true;	
				}
			}else{
				$data['success'] = false;
				$data['unique_username'] = false;
			}

			echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
		}

		public function deleteUser(){
			$data = array('success' => false);

			$user_id = $this->input->post('user_id');

			if ($this->admin_model->deleteUser($user_id)) {
				$data['success'] = true;
				$data['user_id'] = $user_id;
			}

			echo json_encode($data);
		}

		public function updateUserStatus(){
			$user_id = htmlspecialchars(trim($this->input->post('status_user_id')));
			$action = htmlspecialchars(trim($this->input->post('update_action')));

			if ($action == 'deactivate') {
				$this->admin_model->deactivateUserAccount($user_id);
			}else{
				$this->admin_model->activateUserAccount($user_id);
			}

			redirect('admin/users');
		}

		public function setSelectedUserId(){
			$user_id = htmlspecialchars(trim($this->input->post('user_id')));

			$this->session->set_userdata('selected_user_id', $user_id);

			redirect('admin/userDetails');
		}

		public function userDetails(){
			$data['page_title'] = 'Admin | User Details';
			$data['user_details'] = $this->admin_model->getUserDetails($this->session->userdata('selected_user_id'));
			$data['user_sales'] = $this->pages_model->getUserSales($this->session->userdata('selected_user_id'));
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('user_details');
			$this->load->view('fragments/footer');
		}

		public function updateUserDetails(){
			$user_id = htmlspecialchars(trim($this->input->post('user_id')));
			foreach ($_POST as $key => $value) {
				$v = htmlspecialchars(trim($value));
				if ($key != 'user_id') {
					$this->admin_model->updateUserDetails($user_id, $key, $v);
				}
			}

			redirect('admin/userDetails');
		}


	}


?>
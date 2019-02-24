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
			$this->load->library('form_validation');

		}

		public function products(){

			$data['page_title'] = 'Admin | Products';

			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('products_view_admin');
			$this->load->view('fragments/footer');
		}

		public function clients(){

			$data['page_title'] = 'Admin | Clients';

			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('clients_view_admin');
			$this->load->view('fragments/footer');
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

		public function addUser(){

			$data = array('success' => true, 'unique_username' => true);

			$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');

			if ($this->form_validation->run()) {
				$first_name = htmlspecialchars(trim($this->input->post('first_name')));
				$middle_name = htmlspecialchars(trim($this->input->post('middle_name')));
				$last_name = htmlspecialchars(trim($this->input->post('last_name')));
				$user_type = htmlspecialchars(trim($this->input->post('user_type')));
				$gender = htmlspecialchars(trim($this->input->post('gender')));
				$contact = htmlspecialchars(trim($this->input->post('contact')));
				$username = htmlspecialchars(trim($this->input->post('username')));
				$address = htmlspecialchars(trim($this->input->post('address')));

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
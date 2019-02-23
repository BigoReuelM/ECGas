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
			$this->load->view('products_view');
			$this->load->view('fragments/footer');
		}

		public function clients(){

			$data['page_title'] = 'Admin | Clients';

			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('clients_view');
			$this->load->view('fragments/footer');
		}

		public function users(){

			$data['page_title'] = 'Admin | Users';
			$data['users'] = $this->admin_model->getUsers();
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
				$username = htmlspecialchars(trim($this->input->post('username')));

				$password = 'password';

				if ($this->admin_model->addUser($first_name, $middle_name, $last_name, $user_type, $username, $password)) {
					$data['success'] = true;	
				}
			}else{
				$data['success'] = false;
				$data['unique_username'] = false;
			}

			echo json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
		}


	}


?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//$this->load->helper('form');
		//$this->load->library('form_validation');
		$this->load->model('user_model');
	}

	public function index(){
		$this->load->view('login');
	}


	public function login(){

		$data = array('success' => false);
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($this->user_model->login($username, $password)) {
			$user_details = $this->user_model->login($username, $password);

			$this->session->set_userdata('user_details', $user_details);

			//control the side bar 1 not toggled, 0 if toggled
			$this->session->set_userdata('sidebarControl', 1);
			$data['success'] = true;
		}

		echo json_encode($data);

	}

	
}

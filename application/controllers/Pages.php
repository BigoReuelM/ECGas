<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
	class Pages extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');

		}

		public function index(){
			$data['page_title'] = 'Dashboard';
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('index');
			$this->load->view('fragments/footer');
		}

		
		public function sidebarToggle(){
			$sidebarControl = $this->session->userdata('sidebarControl');

			if ($sidebarControl == 1) {
				$this->session->set_userdata('sidebarControl', 0);
			}else{
				$this->session->set_userdata('sidebarControl', 1);
			}
		}
	}

?>
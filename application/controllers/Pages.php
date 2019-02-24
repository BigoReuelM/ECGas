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

		public function pointOfSale(){
			$data['page_title'] = 'Point of Sale';
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('point_of_sale');
			$this->load->view('fragments/footer');
		}

		public function allProducts(){
			$data['page_title'] = 'All Products';
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('products_view');
			$this->load->view('fragments/footer');
		}

		public function addProduct(){
			$data['page_title'] = 'Add Products';
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('add_product');
			$this->load->view('fragments/footer');
		}

		public function inventory(){
			$data['page_title'] = 'Inventory';
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('inventory_view');
			$this->load->view('fragments/footer');
		}

		public function clients(){
			$data['page_title'] = 'Clients';
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('clients_view');
			$this->load->view('fragments/footer');
		}
	}

?>
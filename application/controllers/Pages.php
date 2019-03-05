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
			$this->load->model('pages_model');
			$this->load->library('form_validation');

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
		//////////////POINT OF SALES FUNCTIONS

		public function pointOfSale(){
			$data['page_title'] = 'Point of Sale';
			$data['products'] = $this->pages_model->getActiveProducts();
			$data['clients'] = $this->pages_model->getClients();
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('point_of_sales');
			$this->load->view('fragments/footer');
		}

		public function addSales(){

			$data['success'] = false;

			$other_info = $this->input->post('other_info');
			$cart = $this->input->post('cart');
			///separate data
			$total = $other_info['total'];
			$discount = $other_info['discount'];
			$total_payable = $other_info['total_payable'];
			$client_id = $other_info['client'];
			if (empty($client_id) || $client_id == "") {
				$client_id = null;
			}
			$payment_method = $other_info['payment_method'];
			$paid_amount = $other_info['paid_amount'];
			$change = $other_info['change'];
			$total_items = $other_info['total_items'];
			$user_id = $this->session->userdata('user_details')['user_id'];

			// record sales
			$sales_id = $this->pages_model->addSales($client_id, $user_id, $total, $discount, $total_payable, $paid_amount, $change, $payment_method, $total_items);
			
			if ($sales_id) {

				// record product sales

				foreach ($cart as $item) {
					$product_cost = $this->pages_model->getProductCost($item['product_id'])->product_cost;
					$product_total_amount = $item['count'] * $item['product_price'];

					$this->pages_model->recordProductSales($item['product_id'], $sales_id, $item['count'], $product_total_amount, $product_cost, $item['product_price']);
				}

				$data['success'] = true;
				
			}
				
			echo json_encode($data);

		}

		////////// END OF POINT OF SALES FUNCTIONS
		///
		//////
		/// //
		//////

		////////////////////////////////
		/////// for sales reports etc //
		////////////////////////////////

		public function sales(){
			$date = date('Y-m-d');
			$data['page_title'] = 'Sales';
			$data['sales'] = $this->pages_model->getSales($date);
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('sales');
			$this->load->view('fragments/footer');
		}

		public function getSaleDetails(){

			$sales_id = htmlspecialchars(trim($this->input->get('sales_id')));

			$data['sales_details'] = $this->pages_model->getSaleDetails($sales_id);
			$data['sales_products'] = $this->pages_model->getSaleProducts($sales_id);

			echo json_encode($data);
		}

		////

		public function allProducts(){
			$data['page_title'] = 'All Products';
			$data['products'] = $this->pages_model->getProducts();
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


		public function insertNewProduct(){

			$data = array('success' => false, 'name_unique' => true);

			$this->form_validation->set_rules('product_title', 'Product_title', 'is_unique[products.product_title]');

			if ($this->form_validation->run()) {
				$config['upload_path']="./uploads/products";
		        $config['allowed_types']='gif|jpg|png';
		        $config['encrypt_name'] = TRUE;
		         
		        $this->load->library('upload',$config);
		        $this->upload->do_upload("file");

	            $upload_data = array('upload_data' => $this->upload->data());
	 
	            $product_title = htmlspecialchars(trim($this->input->post('product_title')));
	            $product_description = htmlspecialchars(trim($this->input->post('product_description')));
	            $product_price = htmlspecialchars(trim($this->input->post('product_price')));
	            $product_cost = htmlspecialchars(trim($this->input->post('product_cost')));
	            $product_sku = htmlspecialchars(trim($this->input->post('product_sku')));
	            $product_quantity = htmlspecialchars(trim($this->input->post('product_quantity')));


	            $product_image_url= base_url() . 'uploads/products/' . $upload_data['upload_data']['file_name']; 
	            $result= $this->pages_model->insertNewProduct($product_title, $product_description, $product_price, $product_cost, $product_sku, $product_quantity, $product_image_url); 
	            if ($result != false) {
	            	$this->session->set_userdata('product_id', $result);
	            	$this->session->set_userdata('prev_view', 'products');
	            	$data['success'] = true;
	            }
			}else{
				$data['name_unique'] = false;
			}

            echo json_encode($data);
		}

		public function productDetails(){
			$data['page_title'] = 'Product Details';
			$product_id = $this->session->userdata('product_id');
			$data['product_details'] = $this->pages_model->getProductDetails($product_id);
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('product_details');
			$this->load->view('fragments/footer');
		}

		public function setProductID(){
			$product_id = htmlspecialchars(trim($this->input->post('product_id')));
			$prev_view = htmlspecialchars(trim($this->input->post('prev_view')));

			$this->session->set_userdata('product_id', $product_id);
			$this->session->set_userdata('prev_view', $prev_view);

			redirect('pages/productDetails');
		}

		public function updateProductDetails(){
			$product_id = htmlspecialchars(trim($this->input->post('product_id')));
			$config['upload_path']="./uploads/products";
	        $config['allowed_types']='gif|jpg|png';
	        $config['encrypt_name'] = TRUE;
	        $this->load->library('upload',$config);

	        if ($this->upload->do_upload("file")) {
	        	$upload_data = array('upload_data' => $this->upload->data());
	            $product_image_url= base_url() . 'uploads/products/' . $upload_data['upload_data']['file_name'];

	            $old_image_url = $this->pages_model->getProductImageUrl($product_id)->product_image_url;
	            $path = realpath($_SERVER['DOCUMENT_ROOT'] . parse_url( $old_image_url, PHP_URL_PATH ));
	            unlink($path);

	            $this->pages_model->updateProductDetails($product_id, 'product_image_url', $product_image_url);
	        }
	         
	        
			foreach ($_POST as $key => $value) {
				$v = htmlspecialchars(trim($value));
				if ($key != 'product_id' || $key != 'file') {
					$this->pages_model->updateProductDetails($product_id, $key, $v);
				}
			}

			redirect('pages/productDetails');
		}

		public function deleteProduct(){

			$data['success'] = false;

			$product_id = htmlspecialchars(trim($this->input->post('product_id')));

			if ($this->pages_model->deleteProduct($product_id)) {
				$data['success'] = true;
			}

			echo json_encode($data);
		}

		public function inventory(){
			$data['page_title'] = 'Inventory';
			$data['products'] = $this->pages_model->getProducts();
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('inventory_view');
			$this->load->view('fragments/footer');
		}

		public function updateProductInventory(){
			$data['success'] = false;

			$product_id = htmlspecialchars(trim($this->input->post('product_id')));
			$update_action = htmlspecialchars(trim($this->input->post('update_action')));
			$current_inventory = htmlspecialchars(trim($this->input->post('current_inventory')));
			$no_unit = htmlspecialchars(trim($this->input->post('no_unit')));

			$final_inventory = 0;

			if ($update_action == 'add') {
				$final_inventory = $current_inventory + $no_unit;
			}else{
				$final_inventory = $no_unit;
			}

			if ($this->pages_model->updateProductInventory($product_id, $final_inventory)) {
				$data['success'] = true;
				$data['final_inventory'] = $final_inventory;
			}

			echo json_encode($data);

		}

		public function updateProductStatus(){
			$product_id = htmlspecialchars(trim($this->input->post('status_product_id')));
			$action = htmlspecialchars(trim($this->input->post('update_action')));

			if ($action == 'deactivate') {
				$this->pages_model->updateProductStatus($product_id, 'inactive');
			}else{
				$this->pages_model->updateProductStatus($product_id, 'active');
			}

			redirect('pages/inventory');
		}

		public function issues(){
			$data['page_title'] = 'Issues';
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('issues');
			$this->load->view('fragments/footer');	
		}

		public function clients(){
			$data['page_title'] = 'Clients';
			$data['clients'] = $this->pages_model->getClients();
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('clients_view');
			$this->load->view('fragments/footer');
		}

		public function setCustomerID(){
			$client_id = htmlspecialchars(trim($this->input->post('client_id')));

			$this->session->set_userdata('client_id', $client_id);

			redirect('pages/clientDetails');
		}

		public function clientDetails(){
			$data['page_title'] = 'Client Details';
			$client_id = $this->session->userdata('client_id');
			$data['client_details'] = $this->pages_model->getClientDetails($client_id);
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('client_details');
			$this->load->view('fragments/footer');
		}

		public function updateClientDetails(){
			$client_id = htmlspecialchars(trim($this->input->post('client_id')));
			foreach ($_POST as $key => $value) {
				$v = htmlspecialchars(trim($value));
				if ($key != 'client_id') {
					$this->pages_model->updateClientDetails($client_id, $key, $v);
				}
			}

			redirect('pages/clientDetails');
		}

		public function addClient(){
			$data = array('success' => false);
			$client_first_name = htmlspecialchars(trim($this->input->post('client_first_name')));
			$client_middle_name = htmlspecialchars(trim($this->input->post('client_middle_name')));
			$client_last_name = htmlspecialchars(trim($this->input->post('client_last_name')));
			$client_contact = htmlspecialchars(trim($this->input->post('client_contact')));
			$client_address = htmlspecialchars(trim($this->input->post('client_address')));

			if ($this->pages_model->addClient($client_first_name, $client_middle_name, $client_last_name, $client_contact, $client_address)) {
				$data['success'] = true;
			}

			echo json_encode($data);
		}

		public function deleteClient(){
			$data = array('success' => false);
			$client_id = htmlspecialchars(trim($this->input->post('client_id')));

			if ($this->pages_model->deleteClient($client_id)) {
				$data['success'] = true;
			}

			echo json_encode($data);
		}
	}

?>
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
			$this->load->model('admin_model');
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
			$data['date'] = $date;
			$data['page_title'] = 'Sales';
			$data['sales'] = $this->pages_model->getSales($date, null);
			$data['overall_total'] = number_format($this->pages_model->getOverallTotal($date, null)->sales_total_amount, 2);
			$data['total_cost'] = number_format($this->pages_model->getTotalCost($date, null)->sales_total_cost, 2);
			$data['total_discount'] = number_format($this->pages_model->getTotalDiscount($date, null)->sales_discount, 2);
			$data['total_amount_paid'] = number_format($this->pages_model->getTotalAmountPaid($date, null)->sales_total_payable, 2);
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

		public function getFilteredSales(){
			$from_date = htmlspecialchars(trim($this->input->get('from_date')));
			$to_date = htmlspecialchars(trim($this->input->get('to_date')));

			$data['sales'] = $this->pages_model->getSales($from_date, $to_date);
			$data['overall_total'] = number_format($this->pages_model->getOverallTotal($from_date, $to_date)->sales_total_amount, 2);
			$data['total_cost'] = number_format($this->pages_model->getTotalCost($from_date, $to_date)->sales_total_cost, 2);
			$data['total_discount'] = number_format($this->pages_model->getTotalDiscount($from_date, $to_date)->sales_discount, 2);
			$data['total_amount_paid'] = number_format($this->pages_model->getTotalAmountPaid($from_date, $to_date)->sales_total_payable, 2);

			echo json_encode($data);
		}

		////
		//////////////////////////
		///Products controllers //
		//////////////////////////


		public function allProducts(){
			$data['page_title'] = 'All Products';
			$data['active_products'] = $this->pages_model->getActiveProducts();
			$data['inactive_products'] = $this->pages_model->getInactiveProducts();
			$data['product_count'] = $this->pages_model->getNumberOfProducts()->product_count;
			$data['active_products_count'] = $this->pages_model->getNumberOfActiveProducts()->product_count;
			$data['inactive_products_count'] = $this->pages_model->getNumberOfInactiveProducts()->product_count;
			$data['newest_product'] = $this->pages_model->getNewestProduct()->product_title;
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('products_view');
			$this->load->view('fragments/footer');
		}

		public function addProduct(){
			$data['page_title'] = 'Add Products';
			$data['product_categories'] = $this->admin_model->getProductCategories();
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
	 
	            $product_title = ucfirst(htmlspecialchars(trim($this->input->post('product_title'))));
	            $product_category = htmlspecialchars(trim($this->input->post('product_category')));
	            $product_description = ucfirst(htmlspecialchars(trim($this->input->post('product_description'))));
	            $product_price = htmlspecialchars(trim($this->input->post('product_price')));
	            $product_cost = htmlspecialchars(trim($this->input->post('product_cost')));
	            $product_sku = htmlspecialchars(trim($this->input->post('product_sku')));
	            $product_quantity = htmlspecialchars(trim($this->input->post('product_quantity')));


	            $product_image_url= base_url() . 'uploads/products/' . $upload_data['upload_data']['file_name']; 
	            $result= $this->pages_model->insertNewProduct($product_title, $product_category, $product_description, $product_price, $product_cost, $product_sku, $product_quantity, $product_image_url); 
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
			$data['product_categories'] = $this->admin_model->getProductCategories();
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
			$old_image_url = $this->pages_model->getProductImageUrl($product_id)->product_image_url;

			if ($this->pages_model->deleteProduct($product_id)) {
	            $path = realpath($_SERVER['DOCUMENT_ROOT'] . parse_url( $old_image_url, PHP_URL_PATH ));
	            unlink($path);
				$data['success'] = true;
			}

			echo json_encode($data);
		}

		public function inventory(){
			if ($this->session->userdata('product_filters')) {
				$product_category_id = $this->session->userdata('product_filters')['product_category_id'];
			}else{
				$product_category_id = null;
			}
			$data['page_title'] = 'Inventory';
			$data['products'] = $this->pages_model->getProducts($product_category_id);
			$data['product_categories'] = $this->admin_model->getProductCategories();
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('inventory_view');
			$this->load->view('fragments/footer');
		}

		public function getFilteredProducts(){
			// get values of filter elements from get request
			if (isset($_GET['product_category_id'])) {
				$product_category_id = htmlspecialchars(trim($this->input->get('product_category_id')));
			}else{
				$product_category_id = null;
			}
			////////////////////////////////////
			// set filter elements on session //
			////////////////////////////////////
			$data = array(
				'product_category_id' => $product_category_id
			);

			$this->session->set_userdata('product_filters', $data);

			redirect('pages/inventory');
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

			redirect('pages/allProducts');
		}

		///////////////////////
		//issues controllers //
		///////////////////////


		public function issues(){
			$data['page_title'] = 'Issues';
			$data['products'] = $this->pages_model->getProductNames();
			$data['clients'] = $this->pages_model->getClientsName();
			$data['issues'] = $this->pages_model->getIssues();
			$data['issue_records'] = $this->pages_model->getIssueRecords();
 			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('issues');
			$this->load->view('fragments/footer');	
		}

		public function recordIssue(){
			$user_id = $this->session->userdata('user_details')['user_id'];
			$product_id = htmlspecialchars(trim($this->input->post('product')));
			$client_id = htmlspecialchars(trim($this->input->post('client')));
			$issue_id = htmlspecialchars(trim($this->input->post('issue')));
			//$other_issue = htmlspecialchars(trim($this->input->post('other_issue')));

			$this->pages_model->recordIssue($product_id, $client_id, $issue_id, $user_id);

		}

		///////////////////////////
		//end issues controllers //
		///////////////////////////

		////////////////////////////
		//product allert settings //
		////////////////////////////


		public function productAlertSettings(){
			$data['page_title'] = 'Alert Settings';
			$data['active_clients'] = $this->pages_model->getActiveClients();
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('product_alert_settings');
			$this->load->view('fragments/footer');
		}

		public function getCustomerAlertCOnfigs(){
			
		}

		///////////////////////
		//end alert settings //
		///////////////////////

		////////////////////
		//Clients controllers //
		////////////////////


		public function clients(){
			$data['page_title'] = 'Clients';
			$data['active_clients'] = $this->pages_model->getActiveClients();
			$data['inactive_clients'] = $this->pages_model->getInactiveClients();
			$data['clients_count'] = $this->pages_model->getNumberOfClients()->clients_count;
			$data['active_clients_count'] = $this->pages_model->getNumberOfActiveClients()->clients_count;
			$data['inactive_clients_count'] = $this->pages_model->getNumberOfInactiveClients()->clients_count;
			$data['newest_client'] = $this->pages_model->getNewestClient()->name;
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
			$data['client_sales'] = $this->pages_model->getClientSales($client_id);
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('client_details');
			$this->load->view('fragments/footer');
		}

		public function updateClientDetails(){
			$client_id = htmlspecialchars(trim($this->input->post('client_id')));
			foreach ($_POST as $key => $value) {
				$v = ucwords(htmlspecialchars(trim($value)));
				if ($key != 'client_id') {
					$this->pages_model->updateClientDetails($client_id, $key, $v);
				}
			}

			redirect('pages/clientDetails');
		}

		public function addClient(){
			$data = array('success' => false);
			$client_first_name = ucwords(htmlspecialchars(trim($this->input->post('client_first_name'))));
			$client_middle_name = ucwords(htmlspecialchars(trim($this->input->post('client_middle_name'))));
			$client_last_name = ucwords(htmlspecialchars(trim($this->input->post('client_last_name'))));
			$client_contact = htmlspecialchars(trim($this->input->post('client_contact')));
			$client_address = ucwords(htmlspecialchars(trim($this->input->post('client_address'))));

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

		public function updateClientStatus(){
			$client_id = htmlspecialchars(trim($this->input->post('status_client_id')));
			$action = htmlspecialchars(trim($this->input->post('update_action')));

			if ($action == 'deactivate') {
				$this->pages_model->updateClientStatus($client_id, 'inactive');
			}else{
				$this->pages_model->updateClientStatus($client_id, 'active');
			}

			redirect('pages/clients');
		}



		///
	}

?>
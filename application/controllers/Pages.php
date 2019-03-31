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
			$date = date('Y-m-d');
			$year = date('Y');
			$month = date('m');
			$week = date('W');
			//total
			$data['overall_total'] = number_format($this->pages_model->getOverallTotal($date, null, null)->sales_total_amount, 2);
			$data['overall_total_year'] = number_format($this->pages_model->getOverallTotalYear($year)->sales_total_amount, 2);
			$data['overall_total_month'] = number_format($this->pages_model->getOverallTotalMonth($month)->sales_total_amount, 2);
			$data['overall_total_week'] = number_format($this->pages_model->getOverallTotalWeek($week)->sales_total_amount, 2);
			$data['overall_total_yesterday'] = number_format($this->pages_model->getOverallTotalYesterday($date)->sales_total_amount, 2);
			//discount
			$data['total_discount'] = number_format($this->pages_model->getTotalDiscount($date, null, null)->sales_discount, 2);
			$data['total_discount_year'] = number_format($this->pages_model->getTotalDiscountYear($year)->sales_discount, 2);
			$data['total_discount_month'] = number_format($this->pages_model->getTotalDiscountMonth($month)->sales_discount, 2);
			$data['total_discount_week'] = number_format($this->pages_model->getTotalDiscountWeek($week)->sales_discount, 2);
			$data['total_discount_yesterday'] = number_format($this->pages_model->getTotalDiscountYesterday($date)->sales_discount, 2);
			//amount payable
			$data['total_amount_payable'] = number_format($this->pages_model->getTotalAmountPayable($date, null, null)->sales_total_payable, 2);
			$data['total_amount_payable_year'] = number_format($this->pages_model->getTotalAmountPayableYear($year)->sales_total_payable, 2);
			$data['total_amount_payable_month'] = number_format($this->pages_model->getTotalAmountPayableMonth($month)->sales_total_payable, 2);
			$data['total_amount_payable_week'] = number_format($this->pages_model->getTotalAmountPayableWeek($week)->sales_total_payable, 2);
			$data['total_amount_payable_yesterday'] = number_format($this->pages_model->getTotalAmountPayableYesterday($date)->sales_total_payable, 2);
			//amount paid
			$data['total_amount_paid'] = number_format($this->pages_model->getTotalAmountPaid($date, null, null)->sales_paid_amount, 2);
			$data['total_amount_paid_year'] = number_format($this->pages_model->getTotalAmountPaidYear($year)->sales_paid_amount, 2);
			$data['total_amount_paid_month'] = number_format($this->pages_model->getTotalAmountPaidMonth($month)->sales_paid_amount, 2);
			$data['total_amount_paid_week'] = number_format($this->pages_model->getTotalAmountPaidWeek($week)->sales_paid_amount, 2);
			$data['total_amount_paid_yesterday'] = number_format($this->pages_model->getTotalAmountPaidYesterday($date)->sales_paid_amount, 2);
			//amount receivable
			$data['total_amount_receivable'] = number_format($this->pages_model->getTotalAmountReceivables($date, null, null)->sales_balance, 2);
			$data['total_amount_receivable_year'] = number_format($this->pages_model->getTotalAmountReceivablesYear($year)->sales_balance, 2);
			$data['total_amount_receivable_month'] = number_format($this->pages_model->getTotalAmountReceivablesMonth($month)->sales_balance, 2);
			$data['total_amount_receivable_week'] = number_format($this->pages_model->getTotalAmountReceivablesWeek($week)->sales_balance, 2);
			$data['total_amount_receivable_yesterday'] = number_format($this->pages_model->getTotalAmountReceivablesYesterday($date)->sales_balance, 2);
			$data['products_low_sku'] = $this->pages_model->getProductsWithLowSKU();
			$data['possible_product_orders'] = $this->pages_model->getPossibleProductOrders();
			$data['clients_count'] = $this->pages_model->getNumberOfClients()->clients_count;
			$data['newest_client'] = $this->pages_model->getNewestClient()->name;
			$data['active_clients_count'] = $this->pages_model->getNumberOfActiveClients()->clients_count;
			$data['inactive_clients_count'] = $this->pages_model->getNumberOfInactiveClients()->clients_count;
			$data['product_count'] = $this->pages_model->getNumberOfProducts()->product_count;
			$data['newest_product'] = $this->pages_model->getNewestProduct()->product_title;
			$data['active_products_count'] = $this->pages_model->getNumberOfActiveProducts()->product_count;
			$data['inactive_products_count'] = $this->pages_model->getNumberOfInactiveProducts()->product_count;
			$data['issues'] = $this->pages_model->getLatestIssues();
			$data['total_amount_receivable'] = number_format($this->pages_model->getTotalAmountReceivablesDashboard()->sales_balance, 2);
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('index');
			$this->load->view('fragments/footer');
		}

		//////////////////////////////////////////////////////////////////////
		//function to be called by ajax ti get number of alerts return json //
		//////////////////////////////////////////////////////////////////////

		public function getAlertCounts(){
			$low_sku_count = $this->pages_model->getProductsWithLowSKUCount()->low_sku_count;
			$alert_count = $this->pages_model->getPossibleProductOrdersCount()->alert_count;

			$total_count = $low_sku_count + $alert_count;

			$data['low_sku_count'] = $low_sku_count;
			$data['alert_count'] = $alert_count;
			$data['total_count'] = $total_count;

			echo json_encode($data);
		}

		//////////////////////////////////////////////////////////////////////////
		//sets and controls the side bar toggle for our site navigation sidebar //
		//////////////////////////////////////////////////////////////////////////
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
			$data['products'] = $this->pages_model->getActiveProductsForPos();
			$data['clients'] = $this->pages_model->getActiveClients();
			$data['payment_methods'] = $this->admin_model->getPaymentMethods();
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
			if (empty($payment_method) || $payment_method == "") {
				$payment_method = null;
			}
			$amount_tendered = $other_info['amount_tendered'];
			$total_items = $other_info['total_items'];
			$change = $other_info['change'];
			$user_id = $this->session->userdata('user_details')['user_id'];

			// get paid_amount, sales_balance and sales_status using total_payable and amount tendered

			$paid_amount = 0;
			$sales_balance = 0;
			$sales_status = "fullyPaid";
			if (!empty($amount_tendered) || $amount_tendered != "") {
				if ($amount_tendered < $total_payable) {
					$paid_amount = $amount_tendered;
				 	$sales_balance = $total_payable - $amount_tendered;
				 	$sales_status = "partialyPaid";
				}else{
					$paid_amount = $total_payable;
				}
			}else{
				$sales_balance = $total_payable;
				$sales_status = "credit";
			}

			

			// record sales
			$sales_id = $this->pages_model->addSales($client_id, $user_id, $total, $discount, $total_payable, $amount_tendered, $paid_amount, $sales_balance, $change, $payment_method, $total_items, $sales_status);

			//record payment logs
			 
			if ($paid_amount > 0) {
				$this->pages_model->addPaymentLog($sales_id, $this->session->userdata('user_details')['user_id'], $paid_amount);
			}

			// record products per sale
			
			if ($sales_id) {

				// record product sales

				foreach ($cart as $item) {
					$product_cost = $this->pages_model->getProductCost($item['product_id'])->product_cost;
					$product_total_amount = $item['count'] * $item['product_price'];

					$current_inventory = $this->pages_model->getProductInventory($item['product_id'])->product_quantity;
					$final_inventory = $current_inventory - $item['count'];
					$this->pages_model->updateProductInventory($item['product_id'], $final_inventory);

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
			$data['date'] = $date;
			$data['sales'] = $this->pages_model->getSales($date, null, null);
			//total
			$data['overall_total'] = number_format($this->pages_model->getOverallTotal($date, null, null)->sales_total_amount, 2);
			//discount
			$data['total_discount'] = number_format($this->pages_model->getTotalDiscount($date, null, null)->sales_discount, 2);
			//amount payable
			$data['total_amount_payable'] = number_format($this->pages_model->getTotalAmountPayable($date, null, null)->sales_total_payable, 2);
			//amount paid
			$data['total_amount_paid'] = number_format($this->pages_model->getTotalAmountPaid($date, null, null)->sales_paid_amount, 2);
			//amount receivable
			$data['total_amount_receivable'] = number_format($this->pages_model->getTotalAmountReceivables($date, null, null)->sales_balance, 2);
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('sales');
			$this->load->view('fragments/footer');
		}

		public function setCurrentSaleID(){
			$sales_id = htmlspecialchars(trim($this->input->get('sales_id')));

			$this->session->set_userdata('current_sale_id', $sales_id);

			redirect('pages/saleDetails');
		}

		public function saleDetails(){


			$data['page_title'] = 'Sales Details';

			$sales_id = $this->session->userdata('current_sale_id');

			$data['sales_details'] = $this->pages_model->getSaleDetails($sales_id);
			$data['sales_products'] = $this->pages_model->getSaleProducts($sales_id);
			$data['payment_logs'] = $this->pages_model->getPaymentLogs($sales_id);
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('sales_details');
			$this->load->view('fragments/footer');
		}

		public function getFilteredSales(){
			$from_date = htmlspecialchars(trim($this->input->get('from_date')));
			$to_date = htmlspecialchars(trim($this->input->get('to_date')));
			$sales_status = htmlspecialchars(trim($this->input->get('sale_status_filter')));

			$data['sales'] = $this->pages_model->getSales($from_date, $to_date, $sales_status);
			$data['overall_total'] = number_format($this->pages_model->getOverallTotal($from_date, $to_date, $sales_status)->sales_total_amount, 2);
			$data['total_discount'] = number_format($this->pages_model->getTotalDiscount($from_date, $to_date, $sales_status)->sales_discount, 2);
			$data['total_amount_paid'] = number_format($this->pages_model->getTotalAmountPaid($from_date, $to_date, $sales_status)->sales_paid_amount, 2);
			$data['total_amount_receivable'] = number_format($this->pages_model->getTotalAmountReceivables($from_date, $to_date, $sales_status)->sales_balance, 2);
			$data['total_amount_payable'] = number_format($this->pages_model->getTotalAmountPayable($from_date, $to_date, $sales_status)->sales_total_payable, 2);

			echo json_encode($data);
		}

		public function addSalesPayment(){
			$paid_amount = htmlspecialchars(trim($this->input->post('amount_paid')));
			$sales_id = htmlspecialchars(trim($this->input->post('sales_id')));

			$current_paid_amount = $this->pages_model->getSalePaidAmountAndBalance($sales_id)->sales_paid_amount;
			$current_balance = $this->pages_model->getSalePaidAmountAndBalance($sales_id)->sales_balance;

			$new_paid_amount =  $paid_amount + $current_paid_amount;
			$new_balance = $current_balance - $paid_amount;

			if ($new_balance == 0) {
				$status = 'fullyPaid';
			}else{
				$status = 'partialyPaid';
			}

			$this->pages_model->updateSalePaidAmountBalanceAndStatus($sales_id, $new_paid_amount, $new_balance, $status);

			$this->pages_model->addPaymentLog($sales_id, $this->session->userdata('user_details')['user_id'], $paid_amount);

		}

		public function getSaleDetails(){
			$sales_id = htmlspecialchars(trim($this->input->get('sales_id')));

			$data['sales_details'] = $this->pages_model->getSaleDetails($sales_id);
			$data['sales_products'] = $this->pages_model->getSaleProducts($sales_id);
			$data['payment_logs'] = $this->pages_model->getPaymentLogs($sales_id);

			echo json_encode($data);
		}

		public function getMonthlySales(){
			$data['jan'] = $this->pages_model->getOverallTotalMonth(1)->sales_total_amount;
			$data['feb'] = $this->pages_model->getOverallTotalMonth(2)->sales_total_amount;
			$data['mar'] = $this->pages_model->getOverallTotalMonth(3)->sales_total_amount;
			$data['apr'] = $this->pages_model->getOverallTotalMonth(4)->sales_total_amount;
			$data['may'] = $this->pages_model->getOverallTotalMonth(5)->sales_total_amount;
			$data['jun'] = $this->pages_model->getOverallTotalMonth(6)->sales_total_amount;
			$data['jul'] = $this->pages_model->getOverallTotalMonth(7)->sales_total_amount;
			$data['aug'] = $this->pages_model->getOverallTotalMonth(8)->sales_total_amount;
			$data['sep'] = $this->pages_model->getOverallTotalMonth(9)->sales_total_amount;
			$data['oct'] = $this->pages_model->getOverallTotalMonth(10)->sales_total_amount;
			$data['nov'] = $this->pages_model->getOverallTotalMonth(11)->sales_total_amount;
			$data['dec'] = $this->pages_model->getOverallTotalMonth(12)->sales_total_amount;
			echo json_encode($data);
		}

		public function getMonthlySalesCount(){
			$data['jan'] = $this->pages_model->getSalesCountMonth(1)->sales_count;
			$data['feb'] = $this->pages_model->getSalesCountMonth(2)->sales_count;
			$data['mar'] = $this->pages_model->getSalesCountMonth(3)->sales_count;
			$data['apr'] = $this->pages_model->getSalesCountMonth(4)->sales_count;
			$data['may'] = $this->pages_model->getSalesCountMonth(5)->sales_count;
			$data['jun'] = $this->pages_model->getSalesCountMonth(6)->sales_count;
			$data['jul'] = $this->pages_model->getSalesCountMonth(7)->sales_count;
			$data['aug'] = $this->pages_model->getSalesCountMonth(8)->sales_count;
			$data['sep'] = $this->pages_model->getSalesCountMonth(9)->sales_count;
			$data['oct'] = $this->pages_model->getSalesCountMonth(10)->sales_count;
			$data['nov'] = $this->pages_model->getSalesCountMonth(11)->sales_count;
			$data['dec'] = $this->pages_model->getSalesCountMonth(12)->sales_count;
			echo json_encode($data);
		}



		//////////////////////////
		//sale refund or return //
		//////////////////////////

		public function saleReturnOrRefund(){
			$data['page_title'] = 'Return/Refund';
			$sales_id = $this->session->userdata('current_sale_id');

			$data['sales_details'] = $this->pages_model->getSaleDetails($sales_id);
			$data['sales_products'] = $this->pages_model->getSaleProducts($sales_id);
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('return_refund');
			$this->load->view('fragments/footer');
		}

		/////////////////////////////
		//for expenses reports etc //
		/////////////////////////////

		public function expenses(){
			$data['page_title'] = 'Expenses';
			$date = date('Y-m-d');
			$year = date('Y');
			$month = date('m');
			$week = date('W');
			$data['date'] = $date;
			$data['total_year_expenses'] = number_format($this->pages_model->getTotalExpensesYear($year)->expense_amount, 2);
			$data['total_month_expenses'] = number_format($this->pages_model->getTotalExpensesMonth($month)->expense_amount, 2);
			$data['total_week_expenses'] = number_format($this->pages_model->getTotalExpensesWeek($week)->expense_amount, 2);
			$data['total_yesterday_expenses'] = number_format($this->pages_model->getTotalExpensesYesterday($date)->expense_amount, 2);
			$data['total_expenses_range'] = number_format($this->pages_model->totalExpensesFromRange($date, null)->expense_amount, 2);
			$data['expenses'] = $this->pages_model->getExpense($date, null);
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('expenses');
			$this->load->view('fragments/footer');
		}

		public function getFilteredExpenses(){

			$from_date = htmlspecialchars(trim($this->input->get('from_date')));
			$to_date = htmlspecialchars(trim($this->input->get('to_date')));

			$data['total_expenses_range'] = number_format($this->pages_model->totalExpensesFromRange($from_date, $to_date)->expense_amount, 2);
			$data['expenses'] = $this->pages_model->getExpense($from_date, $to_date);

			echo json_encode($data);
		}

		public function addExpenses(){

			$user_id = $this->session->userdata('user_details')['user_id'];
			$expense_name = ucwords(htmlspecialchars(trim($this->input->post('expense_name'))));
			$expense_description = ucfirst(htmlspecialchars(trim($this->input->post('expense_description'))));
			$expense_amount = htmlspecialchars(trim($this->input->post('expense_amount')));
			$expense_date = htmlspecialchars(trim($this->input->post('expense_date')));

			$this->pages_model->addExpenses($expense_name, $expense_description, $expense_amount, $expense_date, $user_id);

		}

		////////////////////////////////////////
		//for refunds and returns reports etc //
		////////////////////////////////////////

		public function refundsAndReturns(){
			$data['page_title'] = 'Refund/Returns';
			$this->load->view('fragments/head', $data);
			$this->load->view('fragments/navigation');
			$this->load->view('returns_refund');
			$this->load->view('fragments/footer');
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
			$data['total_units_sold'] = $this->pages_model->getProductTotalUnitsSold($product_id)->total_units;
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


		public function getCustomerAlertSettings(){
			$client_id = htmlspecialchars(trim($this->input->get('client_id')));

			$data['alerts'] = $this->pages_model->getCustomerAlertSettings($client_id);		

			echo json_encode($data);
		}

		public function addProductAlert(){
			$client_id = htmlspecialchars(trim($this->input->post('client_id')));
			$product_id = htmlspecialchars(trim($this->input->post('product_id')));
			$days_of_ussage = htmlspecialchars(trim($this->input->post('days_of_ussage')));

			$result = $this->pages_model->checkAlertRecord($client_id, $product_id);

			if ($result) {
				$this->pages_model->updateProductAlert($result->alert_id, $days_of_ussage);
			}else{
				$this->pages_model->addProductAlert($client_id, $product_id, $days_of_ussage);
			}

			
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
			$data['active_products'] = $this->pages_model->getActiveProducts();
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
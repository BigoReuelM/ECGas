<?php  


	/**
	 * 
	 */
	class Pages_model extends CI_model
	{

		/////////////////////
		// clients queries //
		/////////////////////

		
		public function getActiveClients(){
			$this->db->select('*, concat(client_first_name, " ", client_middle_name, " ", client_last_name) as name');
			$this->db->from('clients');
			$this->db->where('client_status', 'active');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getInactiveClients(){
			$this->db->select('*, concat(client_first_name, " ", client_middle_name, " ", client_last_name) as name');
			$this->db->from('clients');
			$this->db->where('client_status', 'inactive');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getNumberOfClients(){
			$this->db->select('count(client_id) as clients_count');
			$this->db->from('clients');

			$result = $this->db->get();

			return $result->row();
		}

		public function getNumberOfActiveClients(){
			$this->db->select('count(client_id) as clients_count');
			$this->db->where('client_status', 'active');
			$this->db->from('clients');

			$result = $this->db->get();

			return $result->row();
		}

		public function getNumberOfInactiveClients(){
			$this->db->select('count(client_id) as clients_count');
			$this->db->where('client_status', 'inactive');
			$this->db->from('clients');

			$result = $this->db->get();

			return $result->row();
		}

		public function getNewestClient(){
			$this->db->select('concat(client_first_name, " ", client_middle_name, " ", client_last_name) as name');
			$this->db->from('clients');
			$this->db->order_by('client_id', 'desc');
			$this->db->limit(1);

			$result = $this->db->get();

			return $result->row();
		}

		public function getClientDetails($client_id){
			$this->db->select('*, DATE_FORMAT(registration_date, "%W %D %M %Y %r") as formated_registration_date');
			$this->db->from('clients');
			$this->db->where('client_id', $client_id);

			$result = $this->db->get();

			return $result->row_array();
		}

		
		public function updateClientDetails($client_id, $colomn_name, $value){
			$data = array(
				$colomn_name => $value
			);

			$this->db->where('client_id', $client_id);
			$this->db->update('clients', $data);
		}

		public function addClient($client_first_name, $client_middle_name, $client_last_name, $client_contact, $client_address){
			$data = array(
				'client_first_name' => $client_first_name,
				'client_middle_name' => $client_middle_name,
				'client_last_name' => $client_last_name,
				'client_contact' => $client_contact,
				'client_address' => $client_address
			);

			if ($this->db->insert('clients', $data)) {
				return true;
			}else{
				return false;
			}
		}

		public function deleteClient($client_id){
			$this->db->where('client_id', $client_id);
			if ($this->db->delete('clients')) {
				return true;
			}else{
				return false;
			}
		}

		public function updateClientStatus($client_id, $status){
			$data = array(
				'client_status' => $status
			);

			$this->db->where('client_id', $client_id);
			$this->db->update('clients', $data);
		}


		/*
		products
		 */
		
		public function getActiveProducts(){
			$this->db->select('product_id, product_title,  product_category, product_description, FORMAT(product_price, 2) as product_price, FORMAT(product_cost, 2) as product_cost, product_sku, product_quantity, product_image_url, product_status');
			$this->db->from('products');
			$this->db->join('product_categories', 'products.product_category_id = product_categories.product_category_id');
			$this->db->where('product_status', 'active');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getActiveProductsForPos(){
			$this->db->select('product_id, product_title,  product_category, product_description, product_price, product_cost, product_sku, product_quantity, product_image_url, product_status');
			$this->db->from('products');
			$this->db->join('product_categories', 'products.product_category_id = product_categories.product_category_id');
			$this->db->where('product_status', 'active');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getInactiveProducts(){
			$this->db->select('product_id, product_title,  product_category, product_description, FORMAT(product_price, 2) as product_price, FORMAT(product_cost, 2) as product_cost, product_sku, product_quantity, product_image_url, product_status');
			$this->db->from('products');
			$this->db->join('product_categories', 'products.product_category_id = product_categories.product_category_id');
			$this->db->where('product_status', 'inactive');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getNumberOfProducts(){
			$this->db->select('count(product_id) as product_count');
			$this->db->from('products');

			$result = $this->db->get();

			return $result->row();
		}

		public function getNumberOfActiveProducts(){
			$this->db->select('count(product_id) as product_count');
			$this->db->where('product_status', 'active');
			$this->db->from('products');

			$result = $this->db->get();

			return $result->row();
		}

		public function getNumberOfInactiveProducts(){
			$this->db->select('count(product_id) as product_count');
			$this->db->where('product_status', 'inactive');
			$this->db->from('products');

			$result = $this->db->get();

			return $result->row();
		}

		public function getNewestProduct(){
			$this->db->select('product_title');
			$this->db->from('products');
			$this->db->order_by('product_id', 'desc');
			$this->db->limit(1);

			$result = $this->db->get();

			return $result->row();
		}
		
		public function getProducts($product_category_id){
			$this->db->select('product_id, product_title,  product_category, product_description, FORMAT(product_price, 2) as product_price, FORMAT(product_cost, 2) as product_cost, product_sku, product_quantity, product_image_url, product_status');
			$this->db->from('products');
			$this->db->join('product_categories', 'products.product_category_id = product_categories.product_category_id');
			$this->db->where('product_status', 'active');
			// initialize where when product category id is not null
			if ($product_category_id != null) {
				$this->db->where('products.product_category_id', $product_category_id);
			}

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getProductDetails($product_id){
			$this->db->select('product_id, product_title,  product_category, product_description, FORMAT(product_price, 2) as product_price, FORMAT(product_cost, 2) as product_cost, product_sku, product_quantity, product_image_url, DATE_FORMAT(product_date_added, "%W %D %M %Y %r") as date_product_added');
			$this->db->from('products');
			$this->db->join('product_categories', 'products.product_category_id = product_categories.product_category_id');
			$this->db->where('product_id', $product_id);

			$result = $this->db->get();

			return $result->row_array();
		}

		public function getProductImageUrl($product_id){
			$this->db->select('product_image_url');
			$this->db->from('products');
			$this->db->where('product_id', $product_id);

			$result = $this->db->get();

			return $result->row();
		}

		public function getProductInventory($product_id){
			$this->db->select('product_quantity');
			$this->db->from('products');
			$this->db->where('product_id', $product_id);

			$result = $this->db->get();

			return $result->row();
		}
		
		public function insertNewProduct($product_title, $product_category, $product_description, $product_price, $product_cost, $product_sku, $product_quantity, $product_image_url){
			$data = array(
				'product_title' => $product_title,
				'product_category_id' => $product_category,
				'product_description' => $product_description,
				'product_price' => $product_price,
				'product_cost' => $product_cost,
				'product_sku' => $product_sku,
				'product_quantity' => $product_quantity,
				'product_image_url' => $product_image_url
			);

			if ($this->db->insert('products', $data)) {
				return $this->db->insert_id();
			}else{
				return false;
			}
		}

		public function updateProductDetails($product_id, $colomn_name, $value){
			$data = array(
				$colomn_name => $value
			);

			$this->db->where('product_id', $product_id);
			$this->db->update('products', $data);
		}

		public function deleteProduct($product_id){
			$this->db->where('product_id', $product_id);
			if ($this->db->delete('products')) {
				return true;
			}else{
				return false;
			}
		}

		public function updateProductInventory($product_id, $no_units){
			$data = array(
				'product_quantity' => $no_units
			);

			$this->db->where('product_id', $product_id);
			if ($this->db->update('products', $data)) {
				return true;
			}else{
				return false;
			}
		}

		public function updateProductStatus($product_id, $status){
			$data = array(
				'product_status' => $status
			);

			$this->db->where('product_id', $product_id);
			$this->db->update('products', $data);
		}

		public function getProductTotalUnitsSold($product_id){
			$this->db->select('sum(product_count) as total_units');
			$this->db->from('product_sales');
			$this->db->where('product_id', $product_id);

			$result = $this->db->get();

			return $result->row();
		}


		//POS queries

		public function getProductCost($product_id){
			$this->db->select('product_cost');
			$this->db->from('products');
			$this->db->where('product_id', $product_id);

			$result = $this->db->get();

			return $result->row();
		}

		public function addSales($client_id, $user_id, $total, $discount, $total_payable, $amount_tendered, $paid_amount, $sales_balance, $change, $payment_method, $total_items, $sales_status){
			$data = array(
				'client_id' => $client_id,
				'user_id' => $user_id,
				'sales_total_amount' => $total,
				'sales_discount' => $discount,
				'sales_total_payable' => $total_payable,
				'sales_amount_tendered' => $amount_tendered,
				'sales_paid_amount' => $paid_amount,
				'sales_balance' => $sales_balance,
				'sales_change' => $change,
				'payment_method_id' => $payment_method,
				'sales_total_items' => $total_items,
				'sales_status' => $sales_status
			);

			if ($this->db->insert('sales', $data)) {
				return $this->db->insert_id();
			}else{
				return false;
			}
		}

		public function recordProductSales($product_id, $sales_id, $product_count, $product_total_amount, $product_cost, $product_price){
			$data = array(
				'product_id' => $product_id,
				'sales_id' => $sales_id,
				'product_count' => $product_count,
				'product_total_amount' => $product_total_amount,
				'product_cost' => $product_cost,
				'product_price' => $product_price
			);

			$this->db->insert('product_sales', $data);
		}

		public function addPaymentLog($sales_id, $user_id, $paid_amount){
			$data = array(
				'sales_id' => $sales_id,
				'user_id' => $user_id,
				'amount' => $paid_amount
			);

			$this->db->insert('payment_logs', $data);
		}


		///////////////////
		///Sales queries //
		///////////////////

		public function getSales($from_date, $to_date, $sales_status){
			$this->db->select('sales_id, DATE_FORMAT(sales_date, "%b %d %Y %r") as date, FORMAT(sales_total_amount, 2) as sales_total_amount, FORMAT(sales_discount, 2) as sales_discount, FORMAT(sales_total_payable, 2) as sales_total_payable, FORMAT(sales_paid_amount, 2) as sales_paid_amount, FORMAT(sales_balance, 2) as sales_balance, concat(users.first_name, " ", users.last_name) as user, concat(clients.client_first_name, " ", clients.client_last_name) as client, sales_status');
			$this->db->from('sales');
			$this->db->join('clients', 'sales.client_id = clients.client_id', 'left');
			$this->db->join('users', 'sales.user_id = users.user_id');
			if ($from_date != "" || $from_date != null) {
				if ($to_date == "" || $to_date == null) {
					$this->db->where('DATE(sales_date)', $from_date);
				}else{
					$this->db->where('DATE(sales_date) >=', $from_date);
					$this->db->where('DATE(sales_date) <=', $to_date);
				}
			}
			if ($sales_status != "" || $sales_status != null) {
				$this->db->where('sales_status', $sales_status);
			}

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getOverallTotal($from_date, $to_date, $sales_status){
			$this->db->select_sum('sales_total_amount');
			$this->db->from('sales');
			if ($to_date == "" || $to_date == null) {
				$this->db->where('DATE(sales_date)', $from_date);
			}else{
				$this->db->where('DATE(sales_date) >=', $from_date);
				$this->db->where('DATE(sales_date) <=', $to_date);
			}
			if ($sales_status != "" || $sales_status != null) {
				$this->db->where('sales_status', $sales_status);
			}
			if ($sales_status != "" || $sales_status != null) {
				$this->db->where('sales_status', $sales_status);
			}

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalCost($from_date, $to_date, $sales_status){
			$this->db->select('SUM(product_count * product_cost) as "sales_total_cost"');
			$this->db->from('product_sales');
			$this->db->join('sales', 'product_sales.sales_id = sales.sales_id');
			if ($to_date == "" || $to_date == null) {
				$this->db->where('DATE(sales_date)', $from_date);
			}else{
				$this->db->where('DATE(sales_date) >=', $from_date);
				$this->db->where('DATE(sales_date) <=', $to_date);
			}
			if ($sales_status != "" || $sales_status != null) {
				$this->db->where('sales_status', $sales_status);
			}

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalDiscount($from_date, $to_date, $sales_status){
			$this->db->select_sum('sales_discount');
			$this->db->from('sales');
			if ($to_date == "" || $to_date == null) {
				$this->db->where('DATE(sales_date)', $from_date);
			}else{
				$this->db->where('DATE(sales_date) >=', $from_date);
				$this->db->where('DATE(sales_date) <=', $to_date);
			}
			if ($sales_status != "" || $sales_status != null) {
				$this->db->where('sales_status', $sales_status);
			}

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalAmountPaid($from_date, $to_date, $sales_status){
			$this->db->select_sum('sales_paid_amount');
			$this->db->from('sales');
			if ($to_date == "" || $to_date == null) {
				$this->db->where('DATE(sales_date)', $from_date);
			}else{
				$this->db->where('DATE(sales_date) >=', $from_date);
				$this->db->where('DATE(sales_date) <=', $to_date);
			}
			if ($sales_status != "" || $sales_status != null) {
				$this->db->where('sales_status', $sales_status);
			}

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalAmountReceivables($from_date, $to_date, $sales_status){
			$this->db->select_sum('sales_balance');
			$this->db->from('sales');
			if ($to_date == "" || $to_date == null) {
				$this->db->where('DATE(sales_date)', $from_date);
			}else{
				$this->db->where('DATE(sales_date) >=', $from_date);
				$this->db->where('DATE(sales_date) <=', $to_date);
			}
			if ($sales_status != "" || $sales_status != null) {
				$this->db->where('sales_status', $sales_status);
			}

			$result = $this->db->get();

			return $result->row();
		}


		public function getTotalAmountPayable($from_date, $to_date, $sales_status){
			$this->db->select_sum('sales_total_payable');
			$this->db->from('sales');
			if ($to_date == "" || $to_date == null) {
				$this->db->where('DATE(sales_date)', $from_date);
			}else{
				$this->db->where('DATE(sales_date) >=', $from_date);
				$this->db->where('DATE(sales_date) <=', $to_date);
			}
			if ($sales_status != "" || $sales_status != null) {
				$this->db->where('sales_status', $sales_status);
			}

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalAmountReturned($from_date, $to_date, $sales_status){
			$this->db->select_sum('sales_refund_amount');
			$this->db->from('sales');
			if ($to_date == "" || $to_date == null) {
				$this->db->where('DATE(sales_date)', $from_date);
			}else{
				$this->db->where('DATE(sales_date) >=', $from_date);
				$this->db->where('DATE(sales_date) <=', $to_date);
			}
			if ($sales_status != "" || $sales_status != null) {
				$this->db->where('sales_status', $sales_status);
			}

			$result = $this->db->get();

			return $result->row();
		}


		///////////////////////////////////////////////////////
		//OVERALL TOTAL YEAR, MONTH, WEEK, Yesterday queries //
		///////////////////////////////////////////////////////

		public function getOverallTotalYear($year){
			$this->db->select_sum('sales_total_amount');
			$this->db->from('sales');
			$this->db->where('YEAR(sales_date)', $year);

			$result = $this->db->get();

			return $result->row();
		}

		public function getOverallTotalMonth($month){
			$this->db->select_sum('sales_total_amount');
			$this->db->from('sales');
			$this->db->where('MONTH(sales_date)', $month);

			$result = $this->db->get();

			return $result->row();
		}

		public function getOverallTotalWeek($week){
			$this->db->select_sum('sales_total_amount');
			$this->db->from('sales');
			$this->db->where('WEEKOFYEAR(sales_date)', $week);

			$result = $this->db->get();

			return $result->row();
		}

		public function getOverallTotalYesterday($date){
			$this->db->select_sum('sales_total_amount');
			$this->db->from('sales');
			$this->db->where('DATE_ADD(DATE(sales_date), INTERVAL 1 DAY) =', $date);

			$result = $this->db->get();

			return $result->row();
		}

		///////////////////////////////////////////////////////
		//OVERALL TOTAL Discount YEAR, MONTH, WEEK, Yesterday queries //
		///////////////////////////////////////////////////////

		public function getTotalDiscountYear($year){
			$this->db->select_sum('sales_discount');
			$this->db->from('sales');
			$this->db->where('YEAR(sales_date)', $year);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalDiscountMonth($month){
			$this->db->select_sum('sales_discount');
			$this->db->from('sales');
			$this->db->where('MONTH(sales_date)', $month);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalDiscountWeek($week){
			$this->db->select_sum('sales_discount');
			$this->db->from('sales');
			$this->db->where('WEEKOFYEAR(sales_date)', $week);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalDiscountYesterday($date){
			$this->db->select_sum('sales_discount');
			$this->db->from('sales');
			$this->db->where('DATE_ADD(DATE(sales_date), INTERVAL 1 DAY) =', $date);

			$result = $this->db->get();

			return $result->row();
		}
		///////////////////////////////////////////////////////
		//OVERALL TOTAL payable YEAR, MONTH, WEEK, Yesterday queries //
		///////////////////////////////////////////////////////

		public function getTotalAmountPayableYear($year){
			$this->db->select_sum('sales_total_payable');
			$this->db->from('sales');
			$this->db->where('YEAR(sales_date)', $year);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalAmountPayableMonth($month){
			$this->db->select_sum('sales_total_payable');
			$this->db->from('sales');
			$this->db->where('MONTH(sales_date)', $month);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalAmountPayableWeek($week){
			$this->db->select_sum('sales_total_payable');
			$this->db->from('sales');
			$this->db->where('WEEKOFYEAR(sales_date)', $week);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalAmountPayableYesterday($date){
			$this->db->select_sum('sales_total_payable');
			$this->db->from('sales');
			$this->db->where('DATE_ADD(DATE(sales_date), INTERVAL 1 DAY) =', $date);

			$result = $this->db->get();

			return $result->row();
		}
		///////////////////////////////////////////////////////
		//OVERALL TOTAL paid YEAR, MONTH, WEEK, Yesterday queries //
		///////////////////////////////////////////////////////

		public function getTotalAmountPaidYear($year){
			$this->db->select_sum('sales_paid_amount');
			$this->db->from('sales');
			$this->db->where('YEAR(sales_date)', $year);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalAmountPaidMonth($month){
			$this->db->select_sum('sales_paid_amount');
			$this->db->from('sales');
			$this->db->where('MONTH(sales_date)', $month);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalAmountPaidWeek($week){
			$this->db->select_sum('sales_paid_amount');
			$this->db->from('sales');
			$this->db->where('WEEKOFYEAR(sales_date)', $week);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalAmountPaidYesterday($date){
			$this->db->select_sum('sales_paid_amount');
			$this->db->from('sales');
			$this->db->where('DATE_ADD(DATE(sales_date), INTERVAL 1 DAY) =', $date);

			$result = $this->db->get();

			return $result->row();
		}

		///////////////////////////////////////////////////////
		//OVERALL TOTAL receivable YEAR, MONTH, WEEK, Yesterday queries //
		///////////////////////////////////////////////////////

		public function getTotalAmountReceivablesYear($year){
			$this->db->select_sum('sales_balance');
			$this->db->from('sales');
			$this->db->where('YEAR(sales_date)', $year);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalAmountReceivablesMonth($month){
			$this->db->select_sum('sales_balance');
			$this->db->from('sales');
			$this->db->where('MONTH(sales_date)', $month);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalAmountReceivablesWeek($week){
			$this->db->select_sum('sales_balance');
			$this->db->from('sales');
			$this->db->where('WEEKOFYEAR(sales_date)', $week);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalAmountReceivablesYesterday($date){
			$this->db->select_sum('sales_balance');
			$this->db->from('sales');
			$this->db->where('DATE_ADD(DATE(sales_date), INTERVAL 1 DAY) =', $date);

			$result = $this->db->get();

			return $result->row();
		}

		///////////////////////////////////////////////////////
		//OVERALL TOTAL refund YEAR, MONTH, WEEK, Yesterday queries //
		///////////////////////////////////////////////////////

		public function getTotalAmountReturnedYear($year){
			$this->db->select_sum('sales_refund_amount');
			$this->db->from('sales');
			$this->db->where('YEAR(sales_date)', $year);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalAmountReturnedMonth($month){
			$this->db->select_sum('sales_refund_amount');
			$this->db->from('sales');
			$this->db->where('MONTH(sales_date)', $month);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalAmountReturnedWeek($week){
			$this->db->select_sum('sales_refund_amount');
			$this->db->from('sales');
			$this->db->where('WEEKOFYEAR(sales_date)', $week);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalAmountReturnedYesterday($date){
			$this->db->select_sum('sales_refund_amount');
			$this->db->from('sales');
			$this->db->where('DATE_ADD(DATE(sales_date), INTERVAL 1 DAY) =', $date);

			$result = $this->db->get();

			return $result->row();
		}

		//////////////////////////////
		//get sales count per month //
		//////////////////////////////

		public function getSalesCountMonth($month){
			$this->db->select('count(sales_id) as sales_count');
			$this->db->from('sales');
			$this->db->where('MONTH(sales_date)', $month);

			$result = $this->db->get();

			return $result->row();
		}

		//////////////////
		//sales details //
		//////////////////
		public function getSaleDetails($sales_id){
			$this->db->select('sales_id, DATE_FORMAT(sales_date, "%b %d %Y %r") as date, FORMAT(sales_total_amount, 2) as sales_total_amount, FORMAT(sales_discount, 2) as sales_discount, FORMAT(sales_total_payable, 2) as sales_total_payable, FORMAT(sales_paid_amount, 2) as sales_paid_amount, sales_paid_amount as total_paid_amount, FORMAT(sales_balance, 2) as sales_balance, sales_balance as balance, FORMAT(sales_refund_amount, 2) as sales_refund_amount, concat(users.first_name, " ", users.last_name) as user, concat(clients.client_first_name, " ", clients.client_last_name) as client, sales_status, sales_total_items');
			$this->db->from('sales');
			$this->db->join('clients', 'sales.client_id = clients.client_id', 'left');
			$this->db->join('users', 'sales.user_id = users.user_id');
			$this->db->where('sales_id', $sales_id);

			$result = $this->db->get();

			return $result->row_array();
		}

		public function getSaleProducts($sales_id){
			$this->db->select('(product_count - returned_product_count) as product_count, FORMAT(product_sales.product_price, 2) as product_price, FORMAT(product_sales.product_cost, 2) as product_cost, FORMAT(product_total_amount, 2) as product_total_amount, product_title, products.product_id, product_image_url');
			$this->db->from('product_sales');
			$this->db->join('products', 'products.product_id = product_sales.product_id');
			$this->db->where('sales_id', $sales_id);
			$this->db->where('product_sales.product_count > product_sales.returned_product_count');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getReturnAndRefundLogs($sales_id){
			$this->db->select('rr_id, rr_reason, DATE_FORMAT(rr_date, "%b %d %Y %r") as rr_date, FORMAT(rr_amount, 2) as rr_amount, rr_reason, concat(users.first_name, " ", users.last_name) as user');
			$this->db->from('returns_refunds');
			$this->db->join('users', 'returns_refunds.user_id = users.user_id');
			$this->db->where('returns_refunds.sales_id', $sales_id);

			$result = $this->db->get();

			return $result->result_array();

		}

		public function getPaymentLogs($sales_id){
			$this->db->select('concat(users.first_name, " ", users.last_name) as user, DATE_FORMAT(time_of_payment, "%b %d %Y %r") as date, FORMAT(amount, 2) as amount');
			$this->db->from('payment_logs');
			$this->db->join('sales', 'sales.sales_id = payment_logs.sales_id');
			$this->db->join('users', 'users.user_id = payment_logs.user_id');
			$this->db->where('payment_logs.sales_id', $sales_id);

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getClientSales($client_id){
			$this->db->select('sales_id, DATE_FORMAT(sales_date, "%b %d %Y %r") as date, FORMAT(sales_total_amount, 2) as sales_total_amount, FORMAT(sales_discount, 2) as sales_discount, FORMAT(sales_total_payable, 2) as sales_total_payable, FORMAT(sales_paid_amount, 2) as sales_paid_amount, FORMAT(sales_change, 2) as sales_change, concat(users.first_name, " ", users.last_name) as user, concat(clients.client_first_name, " ", clients.client_last_name) as client');
			$this->db->from('sales');
			$this->db->join('clients', 'sales.client_id = clients.client_id', 'left');
			$this->db->join('users', 'sales.user_id = users.user_id');
			$this->db->where('sales.client_id', $client_id);

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getUserSales($user_id){
			$this->db->select('sales_id, DATE_FORMAT(sales_date, "%b %d %Y %r") as date, FORMAT(sales_total_amount, 2) as sales_total_amount, FORMAT(sales_discount, 2) as sales_discount, FORMAT(sales_total_payable, 2) as sales_total_payable, FORMAT(sales_paid_amount, 2) as sales_paid_amount, FORMAT(sales_change, 2) as sales_change, concat(users.first_name, " ", users.last_name) as user, concat(clients.client_first_name, " ", clients.client_last_name) as client');
			$this->db->from('sales');
			$this->db->join('clients', 'sales.client_id = clients.client_id', 'left');
			$this->db->join('users', 'sales.user_id = users.user_id');
			$this->db->where('sales.user_id', $user_id);

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getSalePaidAmountAndBalance($sales_id){
			$this->db->select('sales_paid_amount, sales_balance');
			$this->db->from('sales');
			$this->db->where('sales_id', $sales_id);

			$result = $this->db->get();

			return $result->row();
		}

		public function updateSalePaidAmountBalanceAndStatus($sales_id, $paid_amount, $balance, $status){
			$data = array(
				'sales_paid_amount' => $paid_amount,
				'sales_balance' => $balance,
				'sales_status' => $status
			);

			$this->db->where('sales_id', $sales_id);
			$this->db->update('sales', $data);
		}

		public function getProductReturns($sales_id, $rr_id){
			$this->db->select('product_title, product_image_url, product_returned_count');
			$this->db->from('product_return');
			$this->db->join('returns_refunds', 'product_return.rr_id = returns_refunds.rr_id');
			$this->db->join('products', 'product_return.product_id = products.product_id');
			if ($sales_id != null) {
				$this->db->where('returns_refunds.sales_id', $sales_id);
			}
			$this->db->where('returns_refunds.rr_id', $rr_id);

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getSalesReturnProductCount($sales_id){
			$this->db->select_sum('product_returned_count');
			$this->db->from('product_return');
			$this->db->join('returns_refunds', 'product_return.rr_id = returns_refunds.rr_id');
			$this->db->where('returns_refunds.sales_id', $sales_id);

			$result = $this->db->get();

			return $result->row();

		}

		/////////////////////
		//expenses queries //
		/////////////////////

		public function getExpense($from_date, $to_date){
			$this->db->select('concat(first_name, " ", middle_name, " ", last_name) as recorder, expense_description, expense_name, DATE_FORMAT(expense_date, "%b %d %Y") as expense_date, FORMAT(expense_amount, 2) as expense_amount');
			$this->db->from('expenses');
			$this->db->join('users', 'expenses.user_id = users.user_id');
			if ($from_date != "" || $from_date != null) {
				if ($to_date == "" || $to_date == null) {
					$this->db->where('DATE(expense_date)', $from_date);
				}else{
					$this->db->where('DATE(expense_date) >=', $from_date);
					$this->db->where('DATE(expense_date) <=', $to_date);
				}
			}

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getTotalExpensesYear($year){
			$this->db->select_sum('expense_amount');
			$this->db->from('expenses');
			$this->db->where('YEAR(expense_date)', $year);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalExpensesMonth($month){
			$this->db->select_sum('expense_amount');
			$this->db->from('expenses');
			$this->db->where('MONTH(expense_date)', $month);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalExpensesWeek($week){
			$this->db->select_sum('expense_amount');
			$this->db->from('expenses');
			$this->db->where('WEEKOFYEAR(expense_date)', $week);

			$result = $this->db->get();

			return $result->row();
		}

		public function getTotalExpensesYesterday($date){
			$this->db->select_sum('expense_amount');
			$this->db->from('expenses');
			$this->db->where('DATE_ADD(expense_date, INTERVAL 1 DAY) =', $date);

			$result = $this->db->get();

			return $result->row();
		}

		public function totalExpensesFromRange($from_date, $to_date){
			$this->db->select_sum('expense_amount');
			$this->db->from('expenses');
			if ($from_date != "" || $from_date != null) {
				if ($to_date == "" || $to_date == null) {
					$this->db->where('DATE(expense_date)', $from_date);
				}else{
					$this->db->where('DATE(expense_date) >=', $from_date);
					$this->db->where('DATE(expense_date) <=', $to_date);
				}
			}

			$result = $this->db->get();

			return $result->row();
		}

		public function addExpenses($expense_name, $expense_description, $expense_amount, $expense_date, $user_id){

			$data = array(
				'expense_name' => $expense_name,
				'expense_description' => $expense_description,
				'expense_amount' => $expense_amount,
				'expense_date' => $expense_date,
				'user_id' => $user_id
			);

			$this->db->insert('expenses', $data);
		}

		///////////
		//issues //
		///////////

		public function getIssueRecords(){
			$this->db->select('issue, product_title, concat(client_first_name, " ", client_last_name) as client_name, concat(first_name, " ", middle_name, " ", last_name) as recorder, DATE_FORMAT(date_recorded, "%b %d %Y %r") as date_recorded');
			$this->db->from('issue_records');
			$this->db->join('products', 'issue_records.product_id = products.product_id');
			$this->db->join('issues', 'issue_records.issue_id = issues.issue_id');
			$this->db->join('clients', 'issue_records.client_id = clients.client_id');
			$this->db->join('users', 'issue_records.user_id = users.user_id');
			$this->db->order_by('issue_record_id', 'ASC');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getProductNames(){
		 	$this->db->select('product_id, product_title');
		 	$this->db->from('products');
		 	$this->db->where('product_status', 'active');

		 	$result = $this->db->get();

		 	return $result->result_array();
		}

		public function getClientsName(){
			$this->db->select('client_id, concat(client_first_name, " ", client_last_name) as name');
			$this->db->from('clients');
			$this->db->where('client_status', 'active');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getIssues(){
			$this->db->select('issue_id, issue');
			$this->db->from('issues');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function recordIssue($product_id, $client_id, $issue_id, $user_id){
			$data = array(
				'product_id' => $product_id,
				'client_id' => $client_id,
				'issue_id' => $issue_id,
				'user_id' => $user_id
			);

			$this->db->insert('issue_records', $data);
		}

		public function getLatestIssues(){
			$this->db->select('concat(first_name, " ", middle_name, " ", last_name) as user_name, concat(client_first_name, " ", client_middle_name, " ", client_last_name) as client_name, product_title, issue, DATE_FORMAT(date_recorded, "%b %d %Y %r") as date_recorded');
			$this->db->from('issue_records');
			$this->db->join('products', 'products.product_id = issue_records.product_id');
			$this->db->join('clients', 'issue_records.client_id = clients.client_id');
			$this->db->join('users', 'issue_records.user_id = users.user_id');
			$this->db->join('issues', 'issue_records.issue_id = issues.issue_id');
			$this->db->limit(5);
			$this->db->order_by('issue_record_id', 'desc');

			$result = $this->db->get();

			return $result->result_array();
		}

		//////////////////////////
		//product alert queries //
		//////////////////////////

		public function checkAlertRecord($client_id, $product_id){
			$this->db->select('alert_id');
			$this->db->from('product_customer_alert');
			$this->db->where('client_id', $client_id);
			$this->db->where('product_id', $product_id);

			$result = $this->db->get();
			if (sizeof($result) > 0) {
				

				return $result->row();
			}else{
				return false;
			}		
		}

		public function addProductAlert($client_id, $product_id, $days_of_ussage){
			$data = array(
				'client_id' => $client_id,
				'product_id' => $product_id,
				'days_of_ussage' => $days_of_ussage
			);

			$this->db->insert('product_customer_alert', $data);
		}

		public function updateProductAlert($alert_id, $days_of_ussage){
			$data = array(
				'days_of_ussage' => $days_of_ussage
			);

			$this->db->where('alert_id', $alert_id);
			$this->db->update('product_customer_alert', $data);
		}

		public function getCustomerAlertSettings($client_id){
			$this->db->select('product_title, days_of_ussage');
			$this->db->from('product_customer_alert');
			$this->db->join('products', 'product_customer_alert.product_id = products.product_id');
			$this->db->where('client_id', $client_id);
			$result = $this->db->get();

			return $result->result_array();
		}


		//////////////////////
		//queries for alarm //
		//////////////////////

		public function getProductsWithLowSKU(){
			$this->db->select('*');
			$this->db->from('products');
			$this->db->where('product_sku >= product_quantity');
			$this->db->where('product_status', 'active');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getPossibleProductOrders(){
			$this->db->select('concat(client_first_name, " ", client_middle_name, " ", client_last_name) as client_name, product_title, days_of_ussage, DATE_FORMAT(sales_date, "%b %d %Y %r") as sales_date');
			$this->db->from('clients');
			$this->db->join('product_customer_alert', 'clients.client_id = product_customer_alert.client_id');
			$this->db->join('products', 'product_customer_alert.product_id = products.product_id');
			$this->db->join('sales', 'sales.client_id = clients.client_id');
			$this->db->join('product_sales', 'sales.sales_id = product_sales.sales_id and product_customer_alert.product_id = product_sales.product_id');
			$this->db->where('days_of_ussage >= DATEDIFF(CURDATE(), sales_date)', null);
			$this->db->where('days_of_ussage <= (DATEDIFF(CURDATE(), sales_date)) + 5', null);
			
			$result = $this->db->get();

			return $result->result_array();
		}

		public function getProductsWithLowSKUCount(){
			$this->db->select('count(product_id) as low_sku_count');
			$this->db->from('products');
			$this->db->where('product_sku >= product_quantity');
			$this->db->where('product_status', 'active');

			$result = $this->db->get();

			return $result->row();
		}

		public function getPossibleProductOrdersCount(){
			$this->db->select('count(alert_id) as alert_count');
			$this->db->from('clients');
			$this->db->join('product_customer_alert', 'clients.client_id = product_customer_alert.client_id');
			$this->db->join('products', 'product_customer_alert.product_id = products.product_id');
			$this->db->join('sales', 'sales.client_id = clients.client_id');
			$this->db->join('product_sales', 'sales.sales_id = product_sales.sales_id and product_customer_alert.product_id = product_sales.product_id');
			$this->db->where('days_of_ussage >= DATEDIFF(CURDATE(), sales_date)', null);
			$this->db->where('days_of_ussage <= (DATEDIFF(CURDATE(), sales_date)) + 5', null);

			$result = $this->db->get();

			return $result->row();
		}

		////////////////////////////
		//return / refund queries //
		////////////////////////////

		public function recordReturnRefund($user_id, $sales_id, $rr_reason, $rr_amount){
			$data = array(
				'user_id' => $user_id,
				'sales_id' => $sales_id,
				'rr_reason' => $rr_reason,
				'rr_amount' => $rr_amount
			);

			$this->db->insert('returns_refunds', $data);

			return $this->db->insert_id();
		}

		public function recordReturnProducts($rr_id, $product_id, $product_returned_count){
			$data = array(
				'rr_id' => $rr_id,
				'product_id' => $product_id,
				'product_returned_count' => $product_returned_count
			);

			$this->db->insert('product_return', $data);
		}

		public function getReturned_product_count($sales_id, $product_id){
			$this->db->select('returned_product_count');
			$this->db->from('product_sales');
			$this->db->where('sales_id', $sales_id);
			$this->db->where('product_id', $product_id);

			$result = $this->db->get();

			return $result->row();
		}

		public function getSaleRefundAmount($sales_id){
			$this->db->select('sales_refund_amount');
			$this->db->from('sales');
			$this->db->where('sales_id', $sales_id);

			$result = $this->db->get();

			return $result->row();
		}

		public function updateReturnProductCount($sales_id, $product_id, $new_returned_product_count){
			$data = array(
				'returned_product_count' => $new_returned_product_count
			);

			$this->db->where('sales_id', $sales_id);
			$this->db->where('product_id', $product_id);
			$this->db->update('product_sales', $data);
		}

		public function updateSalesRefundAmount($sales_id, $sales_refund_amount){
			$data = array(
				'sales_refund_amount' => $sales_refund_amount
			);

			$this->db->where('sales_id', $sales_id);
			$this->db->update('sales', $data);
		}

		public function getAllReturnAndRefundLogs(){
			$this->db->select('rr_id, rr_reason, DATE_FORMAT(rr_date, "%b %d %Y %r") as rr_date, FORMAT(rr_amount, 2) as rr_amount, rr_reason, concat(users.first_name, " ", users.last_name) as user');
			$this->db->from('returns_refunds');
			$this->db->join('users', 'returns_refunds.user_id = users.user_id');

			$result = $this->db->get();

			return $result->result_array();

		}


	}


?>
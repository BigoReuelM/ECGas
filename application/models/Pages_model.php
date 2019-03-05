<?php  


	/**
	 * 
	 */
	class Pages_model extends CI_model
	{
		
		public function getClients(){
			$this->db->select('*, concat(client_first_name, " ", client_middle_name, " ", client_last_name) as name');
			$this->db->from('clients');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getClientDetails($client_id){
			$this->db->select('*, DATE_FORMAT(registration_date, "%W %D %M %Y %r") as formated_registration_date');
			$this->db->from('clients');
			$this->db->where('client_id', $client_id);

			$result = $this->db->get();

			return $result->row_array();
		}

		/*
		
		Update user details

		 */
		
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


		/*
		products
		 */
		
		public function getProducts(){
			$this->db->select('*');
			$this->db->from('products');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getActiveProducts(){
			$this->db->select('*');
			$this->db->from('products');
			$this->db->where('product_status', 'active');

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getProductDetails($product_id){
			$this->db->select('*, DATE_FORMAT(product_date_added, "%W %D %M %Y %r") as date_product_added');
			$this->db->from('products');
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
		
		public function insertNewProduct($product_title, $product_description, $product_price, $product_cost, $product_sku, $product_quantity, $product_image_url){
			$data = array(
				'product_title' => $product_title,
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


		//POS queries

		public function getProductCost($product_id){
			$this->db->select('product_cost');
			$this->db->from('products');
			$this->db->where('product_id', $product_id);

			$result = $this->db->get();

			return $result->row();
		}

		public function addSales($client_id, $user_id, $total, $discount, $total_payable, $paid_amount, $change, $payment_method, $total_items){
			$data = array(
				'client_id' => $client_id,
				'user_id' => $user_id,
				'sales_total_amount' => $total,
				'sales_discount' => $discount,
				'sales_total_payable' => $total_payable,
				'sales_paid_amount' => $paid_amount,
				'sales_change' => $change,
				'sales_payment_method' => $payment_method,
				'sales_total_items' => $total_items
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


		///////////////////
		///Sales queries //
		///////////////////

		public function getSales($date){
			$this->db->select('sales_id, DATE_FORMAT(sales_date, "%b %d %Y %r") as date, FORMAT(sales_total_amount, 2) as sales_total_amount, FORMAT(sales_discount, 2) as sales_discount, FORMAT(sales_total_payable, 2) as sales_total_payable, FORMAT(sales_paid_amount, 2) as sales_paid_amount, FORMAT(sales_change, 2) as sales_change, concat(users.first_name, " ", users.last_name) as user, concat(clients.client_first_name, " ", clients.client_last_name) as client');
			$this->db->from('sales');
			$this->db->join('clients', 'sales.client_id = clients.client_id', 'left');
			$this->db->join('users', 'sales.user_id = users.user_id');
			$this->db->where('DATE(sales_date)', $date);

			$result = $this->db->get();

			return $result->result_array();
		}

		public function getSaleDetails($sales_id){
			$this->db->select('sales_id, DATE_FORMAT(sales_date, "%b %d %Y %r") as date, FORMAT(sales_total_amount, 2) as sales_total_amount, FORMAT(sales_discount, 2) as sales_discount, FORMAT(sales_total_payable, 2) as sales_total_payable, FORMAT(sales_paid_amount, 2) as sales_paid_amount, FORMAT(sales_change, 2) as sales_change, sales_total_items, concat(users.first_name, " ", users.last_name) as user, concat(clients.client_first_name, " ", clients.client_last_name) as client');
			$this->db->from('sales');
			$this->db->join('clients', 'sales.client_id = clients.client_id', 'left');
			$this->db->join('users', 'sales.user_id = users.user_id');
			$this->db->where('sales_id', $sales_id);

			$result = $this->db->get();

			return $result->row_array();
		}

		public function getSaleProducts($sales_id){
			$this->db->select('product_count, FORMAT(product_sales.product_price, 2) as product_price, FORMAT(product_sales.product_cost, 2) as product_cost, FORMAT(product_total_amount, 2) as product_total_amount, product_title');
			$this->db->from('product_sales');
			$this->db->join('products', 'products.product_id = product_sales.product_id');
			$this->db->where('sales_id', $sales_id);

			$result = $this->db->get();

			return $result->result_array();
		}
	}


?>
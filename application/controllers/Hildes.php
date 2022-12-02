<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hildes extends CI_Controller {

	public function __construct()
	{
	        parent::__construct();
	        error_reporting(0);
	        $this->load->database();
	        $this->load->model('Model_functions','model');
	        $this->load->helper(array('form', 'url'));
	        $this->load->library('session');
	}

	public function template($page = '', $data = '')
	{
		$data['setting'] = $this->model->setting(1); 
		$data['super_cat'] = $this->model->super_cats('active');
		$this->load->view('header',$data);
		$this->load->view($page,$data);
		$this->load->view('footer',$data);
	}
	/**
	*
	*	login/logout process startRs from here
	*
	*/


	public function login($arg = '')
	{
		if ($_SESSION['customer']) {
			redirect('index');
		}
		$data['title'] = 'Login';
		$data['meta_key'] = 'Login';
		$data['meta_desc'] = 'Login';
		$this->template('login', $data);
	}
	public function signup($arg = '')
	{
		if ($_SESSION['customer']) {
			redirect('index');
		}
		$data['title'] = 'Signup';
		$data['meta_key'] = 'Signup';
		$data['meta_desc'] = 'Signup';
		$this->template('signup', $data);
	}
	public function check_login()
	{

		if(isset($_SESSION['customer']) && $_SESSION['customer']!= "" )
		{
			$customer = unserialize($_SESSION['customer']);
			
			$phone = $customer['phone'];
			$password = $customer['password'];

			$resp = $this->model->get_row("SELECT * FROM `customer` WHERE `phone` = '$phone' AND `password` =  '$password'");
			if ($resp)
			{
				$_SESSION['customer'] = serialize($resp);
				return $customer;
			}
			else
			{
				redirect('index');
			}
		}
		else
		{
			redirect('index');
		}
	}

	public function logout()
	{
		unset($_SESSION['customer']);
		redirect("index");
	}
	/**
	@Login Ajax
	*/
	public function process_login()
	{
		$data = array();
		parse_str($_POST['data'],$data);
		$_POST = $data;
		if ($_POST)
		{
			$phone = $_POST['phone'];
			$password = md5($_POST['password']);

			$resp = $this->model->get_row("SELECT * FROM `customer` WHERE `phone` = '$phone' AND `password` =  '$password';");

			if ($resp)
			{
				$_SESSION['customer'] = serialize($resp);
				$html = '<div class="alert alert-success text-white alert-bg alert-rounded">Successfully Logged In</div>';
				echo json_encode(array('status' => true, 'html'=>$html));
				return;
			}
			else
			{
				$html = '<div class="alert alert-error text-white alert-bg alert-rounded">Phone Or Password not matched </div>';
				echo json_encode(array('status' => false, 'html'=>$html));
				return;
			}
		}
		else
		{
			$html = '<div class="alert alert-error text-white alert-bg alert-rounded">Phone Or Password not matched </div>';
				echo json_encode(array('status' => false, 'html'=>$html));
		}
	}
	public function process_signup()
	{
		$data = array();
		parse_str($_POST['data'],$data);
		$_POST = $data;
		if ($this->model->check_email_phone($_POST['phone'], $_POST['email'])) {
			$html = '<div class="alert alert-error text-white alert-bg alert-rounded">User Already Exists </div>';
		 			echo json_encode(array('status' => false, 'html'=>$html));
			 		return;
			return;
		}else{
			$_POST['password'] = md5($_POST['password']);
		 	if ($this->db->insert('customer', $_POST)) {
		 		$resp = $this->model->get_row("SELECT * FROM `customer` WHERE `phone` = '".$_POST['phone']."' AND `password` =  '".$_POST['password']."';");
		 		if ($resp) {
			 		$_SESSION['customer'] = serialize($resp);
			 		$html = '<div class="alert alert-success text-white alert-bg alert-rounded">Successfully Signed Up </div>';
		 			echo json_encode(array('status' => true, 'html'=>$html));
			 		return;
		 		}else{
		 			$html = '<div class="alert alert-error text-white alert-bg alert-rounded">Something Went Wrong. </div>';
		 			echo json_encode(array('status' => false, 'html'=>$html));
		 		}
		 	}else{
		 		$html = '<div class="alert alert-error text-white alert-bg alert-rounded">Something Went Wrong. </div>';
		 		echo json_encode(array('status' => false, 'html'=>$html));
		 	}
		}
	}

	public function index()
	{
		$data['title'] = APP_TITLE;
		$data['page'] = 'index';
		$data['active'] = 'home';
		$data['slider'] = $this->model->slider();
		$data['blog'] = $this->model->blog();
		$data['new_products'] = $this->model->new_products_home();
		$data['top_products'] = $this->model->top_products_home();
		$data['feature_products'] = $this->model->feature_products_home();
		$data['ads'] = $this->model->ads();
		
		$data['sub_category_home'] = $this->model->sub_category_home();

		$this->template('index', $data);
	}
	public function blog()
	{
		$data['title'] = APP_TITLE;
		$data['active'] = 'blog';
		$data['blog'] = $this->model->blog();		
		$this->template('blog', $data);
	}
	public function blog_detail($slug)
	{
		$data['blog'] = $this->model->blog();		
		$data['active'] = 'blog';
		$data['q'] = $this->model->get_blog_by_slug($slug);		
		$data['title'] = $data['q']['meta_title'];
		$data['meta_key'] = $data['q']['meta_key'];
		$data['meta_desc'] = $data['q']['meta_desc'];
		$this->template('blog_detail', $data);
	}
	public function about_us()
	{
		$data['active'] = 'about_us';
		$data['review'] = $this->model->reviews();
		$data['page'] = $this->model->get_page_byid(2);		
		$data['title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];

		$this->template('page', $data);
	}
	public function privacy_policy()
	{
		$data['active'] = 'privacy_policy';
		$data['page'] = $this->model->get_page_byid(3);		
		$data['title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$this->template('page', $data);
	}
	public function return_policy()
	{
		$data['active'] = 'return_policy';
		$data['page'] = $this->model->get_page_byid(4);		
		$data['title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$this->template('page', $data);
	}
	public function terms_and_conditions()
	{
		$data['active'] = 'terms_and_conditions';
		$data['page'] = $this->model->get_page_byid(6);		
		$data['title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$this->template('page', $data);
	}
	public function help()
	{
		$data['active'] = 'help';
		$data['page'] = $this->model->get_page_byid(7);		
		$data['title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$this->template('page', $data);
	}
	public function faq()
	{
		$data['active'] = 'faq';
		$data['page'] = $this->model->get_page_byid(8);
		$data['title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$this->template('faq', $data);
	}
	public function contact_us()
	{
		$data['active'] = 'contact_us';
		$data['page'] = $this->model->get_page_byid(5);
		$data['title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];		
		$this->template('contact_us', $data);
	}
	public function submit_contact_form()
	{
		$data = array();
		parse_str($_POST['data'],$data);
		$_POST = $data;
		if ($this->db->insert('contact_form', $_POST)) {
			$html = '<div class="alert alert-success text-white alert-bg alert-rounded">Thank you We will Contact you soon</div>';
			echo json_encode(array('status' => true, 'html'=>$html));
		}else{
			$html = '<div class="alert alert-error text-white alert-bg alert-rounded">Something Went Wrong</div>';
			echo json_encode(array('status' => false, 'html'=>$html));
		}
	}
	public function submit_newsletter_form()
	{
		$data = array();
		parse_str($_POST['data'],$data);
		$_POST = $data;
		if ($this->model->check_email($_POST['email'], 'newsletter')) {
			$html = '<span class="text-white badge">Email already exists</span>';
			echo json_encode(array('status' => false, 'html'=>$html));
		}else{
			if ($this->db->insert('newsletter', $_POST)) {
				$html = '<span class="text-white badge">Thank You for Subscription</span>';
				echo json_encode(array('status' => true, 'html'=>$html));
			}else{
				$html = '<span class="text-white badge">Try again Later</span>';
				echo json_encode(array('status' => false, 'html'=>$html));
			}
		}
	}
	public function shop()
	{
		$data['title'] = APP_TITLE;
		$data['active'] = 'shop';
		
		$this->template('shop', $data);
	}
	public function main($arg)
	{
		$data['active'] = 'main';
		$data['super'] = $this->model->get_cat_byslug($arg);
		$data['title'] = $data['super']['meta_title'];
		$data['meta_key'] = $data['super']['meta_key'];
		$data['meta_desc'] = $data['super']['meta_desc'];
		if ($data['super']) {
			$data['cat'] = $this->model->cats($data['super']['super_category_id'], 'active');
		}else{
			redirect('shop');
		}
		$this->template('main', $data);
	}
	public function explore($arg)
	{
		$data['active'] = 'explore';
		$data['cat'] = $this->model->get_cat_by_catslug($arg);
		$data['title'] = $data['cat']['meta_title'];
		$data['meta_key'] = $data['cat']['meta_key'];
		$data['meta_desc'] = $data['cat']['meta_desc'];
		if ($data['cat']) {
			$data['sub_cat'] = $this->model->sub_cats($data['cat']['category_id'], 'active');
		}else{
			redirect('shop');
		}

		$this->template('explore', $data);
	}
	public function listing($arg)
	{
		$data['active'] = 'listing';
		$data['sub_cat'] = $this->model->get_sub_cat_by_subcat_slug($arg);
		$data['title'] = $data['sub_cat']['meta_title'];
		$data['meta_key'] = $data['sub_cat']['meta_key'];
		$data['meta_desc'] = $data['sub_cat']['meta_desc'];
		if ($data['sub_cat']) {
			$data['products'] = $this->model->get_products_by_subcat_id($data['sub_cat']['sub_category_id']);
			$size = $this->model->check_cat_filter_option($data['sub_cat']['parent'], 'size');
			if ($size) {
				$data['sizes'] = $this->model->get_sizes($data['sub_cat']['parent']);
			}
			$color = $this->model->check_cat_filter_option($data['sub_cat']['parent'], 'color');
			if ($color) {
				$data['colors'] = $this->model->get_colors($data['sub_cat']['parent']);
			}
		}else{
			redirect('shop');
		}
		$this->template('listing', $data);
	}
	public function product($slug)
	{
		$data['q'] = $this->model->get_product_byslug($slug); 
		$data['sub_cat'] = $this->model->get_sub_cat_by_subcat_id($data['q']['sub_category_id']); 
		$data['photos'] = $this->model->get_photos($data['q']['product_id']);

		$data['other_products'] = $this->model->get_products_by_subcat_id_expact($data['q']['sub_category_id'], $data['q']['product_id']);
		
		$data['title'] = $data['q']['meta_title'];
		$data['meta_key'] = $data['q']['meta_key'];
		$data['meta_desc'] = $data['q']['meta_desc'];

		$this->template('product', $data);
	}


	public function add_to_cart()
	{
		if ($_POST) {
			$product = $this->model->get_product_byid($_POST['product_id']);
			if ($_POST['qty'] <= $product['qty']) {
				$product['price'] = $product['price'] - $product['discount'];
				$_POST['gross_price'] = $product['price'] * $_POST['qty'];
				$_POST['price'] = $product['price'];
				$_POST['name'] = $product['title'];
				$_POST['slug'] = $product['slug'];
				$_POST['main_img'] = $product['image'];
				if ($_POST) {
					if ($_SESSION['cart']) {
						$_POST['item_number'] = count($_SESSION['cart']) + 1;
					}
					else{
						$_POST['item_number'] = 1;
					}
					$_SESSION['cart'][] = $_POST;
					$dat = $this->model->add_item_to_list($_POST);
					echo json_encode(array("status" => true, "count"=>count($_SESSION['cart']), "data"=>$dat, "post"=>$_POST));
				}
				else{
					err('Error Found');
				}
			}else{
				echo json_encode(array("status" => false));
			}
		}else{
			echo json_encode(array("status" => false));
		}
	}
	public function ajax_edit_qty()
	{
		$count = 0;
		if ($_POST && $_SESSION['cart']) {
			foreach ($_SESSION['cart'] as $key => $v) {
				$product = $this->model->get_product_byid($v['product_id']);
				if ($v['item_number'] == $_POST['item'] && $product['qty'] >= $_POST['qty']) {
					$_SESSION['cart'][$key]['qty'] = $_POST['qty'];
					$_SESSION['cart'][$key]['gross_price'] = $_POST['qty'] * $_POST['price'];
					$count = 1;
				}
			}
			if ($count == 1) {
				echo json_encode(array("status"=>true));
			}else{
				echo json_encode(array("status"=>false));
			}
		}
		else{
			err('Error Found');
		}
	}
	public function ajax_item_remove()
	{
		if ($_POST && $_SESSION['cart']) {
			foreach ($_SESSION['cart'] as $key => $v) {
				if ($v['item_number'] == $_POST['item']) {
					unset($_SESSION['cart'][$key]);
					echo json_encode(array("status"=>true));
				}
			}
		}
		else{
			err('Error Found');
		}
	}	
	public function clear_cart()
	{
		if ($_SESSION['cart']) {
			unset($_SESSION['cart']);
			redirect('cart');
		}
		else{
			err('Error Found');
		}
	}


	/*LOGIN REQUIRE FUNCTIONS*/

	public function my_account()
	{
		$customer = $this->check_login();
		$data['customer'] = $customer;
		$data['title'] = $customer['fname']. ' Dashboard';
		$data['meta_key'] = $customer['fname']. ' Dashboard';
		$data['meta_desc'] = $customer['fname']. ' Dashboard';
		$data['order'] = $this->model->get_order_by_customerID($customer['customer_id']);
		$this->template('my_account', $data);
	}
	public function change_account_password(){
		$customer = $this->check_login();
		$data = array();
		parse_str($_POST['data'],$data);
		$_POST = $data;

		if (md5($_POST['password']) == $customer['password']) {

			if ($_POST['new-password'] == $_POST['confirm-password']) {
				unset($_POST['password']);
 				$_POST['password'] = md5($_POST['new-password']);
				unset($_POST['new-password']);
				unset($_POST['confirm-password']);
				if ($this->db->update('customer', $_POST, array('customer_id' => $customer['customer_id']))) {
					$html = '<div class="alert alert-success text-white alert-bg alert-rounded">Successfully Changed Password</div>';
					echo json_encode(array('status' => true, 'html'=>$html));
				}else{
					$html = '<div class="alert alert-error text-white alert-bg alert-rounded">Passowrd Not Matched</div>';
					echo json_encode(array('status' => false, 'html'=>$html));
				}
			}else{
				$html = '<div class="alert alert-error text-white alert-bg alert-rounded">New and confirm password Not Matched</div>';
				echo json_encode(array('status' => false, 'html'=>$html));
			}
		}else{
			$html = '<div class="alert alert-error text-white alert-bg alert-rounded">Old Password Not Matched</div>';
			echo json_encode(array('status' => false, 'html'=>$html));
		}
	}
	public function change_account_setting(){
		$customer = $this->check_login();
		$data = array();
		parse_str($_POST['data'],$data);
		$_POST = $data;

		if ($this->db->update('customer', $_POST, array('customer_id' => $customer['customer_id']))) {
			$html = '<div class="alert alert-success text-white alert-bg alert-rounded">Successfully Changed</div>';
			echo json_encode(array('status' => true, 'html'=>$html));
		}else{
			$html = '<div class="alert alert-error text-white alert-bg alert-rounded">Something Went Wrong. Try Again Later</div>';
			echo json_encode(array('status' => false, 'html'=>$html));
		}
	}

	public function cart()
	{
		$data['title'] = APP_TITLE.' - Cart';
		$data['meta_key'] = APP_TITLE.' - Cart';
		$data['meta_desc'] = APP_TITLE.' - Cart';
		$this->template('cart', $data);
	}
	public function checkout()
	{
		if ($_SESSION['cart']) {
			$data['title'] = APP_TITLE.' - Checkout';
			$data['meta_key'] = APP_TITLE.' - Checkout';
			$data['meta_desc'] = APP_TITLE.' - Checkout'; 
			$data['customer'] = unserialize($_SESSION['customer']); 
			$this->template('checkout', $data);
		}
		else{
			redirect('index');
		}
	}
	public function submit_order()
	{
		$customer = $this->check_login();
		if ($_SESSION['customer']) {
			$_POST['customer_id'] = $customer['customer_id'];
			$phone = trim($_POST['mobile']);
			$mobile = str_replace('+', '', $phone);
			$mobile = preg_replace('/-/', '', $mobile, 1);
			$mobile = preg_replace('/=/', '', $mobile, 1);
			$mobile = preg_replace('/00/', '', $mobile, 2);
			$mobile = preg_replace('/92/', '0', $mobile, 1);

			if ($_SESSION['cart'] && $_SESSION['customer'] && $_POST) {
				$_POST['sub_total'] = $_POST['total'];
				$_POST['total'] = $_POST['sub_total'];

				$order['customer_id'] = $customer['customer_id'];
				$order['total'] = $_POST['total'];
				$order['items'] = $_POST['items'];
				$order['fname'] = $_POST['fname'];
				$order['lname'] = $_POST['lname'];
				$order['email'] = $_POST['email'];
				$order['note'] = $_POST['note'];
				$order['mobile'] = $mobile;
				$order['zip_code'] = $_POST['zip_code'];
				$order['address'] = $_POST['address'];
				$order['city'] = $_POST['city'];
				$lastid = 0;
				if ($this->db->insert("order", $_POST)) {
					$lastid = $this->db->insert_id();
					$_SESSION['lastOrder'] = $lastid;
					foreach ($_SESSION['cart'] as $key => $v) {
						unset($v['slug']);
						$v['order_id'] = $lastid;
						$this->db->insert("order_detail", $v);
						$ProductID = $v['product_id'];
						$Qty = $v['qty'];
						$this->db->query("UPDATE `product` SET `qty`=`qty`-$Qty WHERE `product_id` = '$ProductID'");
					}
				}else{
					redirect('checkout');
				}
				unset($_SESSION['cart']);
				$data['title'] = APP_TITLE.' - Order Completion';
				$data['meta_key'] = APP_TITLE.' - Order Completion';
				$data['meta_desc'] = APP_TITLE.' - Order Completion'; 
				$data['order'] = $this->model->get_order_byid($lastid);
                $data['detail'] = $this->model->get_order_detail($data['order']['order_id']);
				$this->template('order_complete', $data);
			}
			else{
				redirect('index');
			}
		}
		else{
			redirect('login');
		}
	}
	public function quick_view()
	{
		if ($_POST['product_id'] == '') {
			echo json_encode(array('status'=>false));
			return;
		}
		$pro = $this->model->get_product_byid($_POST['product_id']);
		$photos = $this->model->get_photos($_POST['product_id']);
		if ($pro) {
			$html = $this->model->single_product_html($pro, $photos);
			echo json_encode(array('status'=>true, 'data'=>$html));
		}else{
			echo json_encode(array('status'=>false));
		}
	}
	public function order($id = '')
	{
		if ($id == '') {
			redirect('my-account');
		}
		$customer = $this->check_login();
		$data['title'] = APP_TITLE.' - Order Detail';
		$data['meta_key'] = APP_TITLE.' - Order Detail';
		$data['meta_desc'] = APP_TITLE.' - Order Detail'; 
		$data['order'] = $this->model->get_order_byid($id);
        $data['detail'] = $this->model->get_order_detail($data['order']['order_id']);
		$this->template('order_complete', $data);
	}

}
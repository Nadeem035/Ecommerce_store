<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
	        parent::__construct();
	        error_reporting(0);
	        $this->load->database();
	        $this->load->model('Model_functions','model');
	        $this->load->helper(array('form', 'url'));
	        $this->load->library('session');
	}

	/**
	*

		@HATH NA LAIE

	*
	*/
	public function template($page = '', $data = '')
	{
		if (isset($_SESSION['warehouse']))
		{
			$data['user'] = unserialize($_SESSION['warehouse']);
			$data['login'] = true;
		}
		else
		{
			$data['login'] = false;
		}
		$this->load->view('warehouse/header',$data);
		$this->load->view($page,$data);
		$this->load->view('warehouse/footer',$data);
	}
	public function login_template($page = '', $data = '')
	{
		if (isset($_SESSION['warehouse']))
		{
			$data['user'] = unserialize($_SESSION['warehouse']);
			$data['login'] = true;
		}
		else
		{
			$data['login'] = false;
		}
		$this->load->view('warehouse/new_login_header',$data);
		$this->load->view($page,$data);
		$this->load->view('warehouse/new_login_footer',$data);

	}




	/**
	
	@Login Randi-Rona

	*/
	
	public function login()
	{
		if (isset($_SESSION['warehouse']))
		{
			redirect('warehouse/index');
			return;
		}
		$data['title'] = 'Login';
		$this->login_template('warehouse/signin', $data);
	}
	public function check_login()
	{
		if(isset($_SESSION['warehouse']) && $_SESSION['warehouse']!= "")
		{
			$user = unserialize($_SESSION['warehouse']);
			$phone = $user['phone'];
			$password = $user['password'];
			$resp = $this->model->get_row("SELECT * FROM `warehouse` WHERE `phone` = '$phone'  AND `password` =  '$password'");
			if ($resp)
			{
				return $user;
			}
			else
			{
				redirect('warehouse/login');
			}
		}
		else 
		{
			redirect('warehouse/login');
		}
	}
	public function change_password()
	{
		$user = $this->check_login();
		$data['signin'] = FALSE;
		$phone = $user['phone'];
		if (isset($_POST['password']) && strlen($_POST['password']) > 0 && isset($_POST['re_password']) && strlen($_POST['re_password']) > 0) 
		{
			$ptext = $_POST['password'];
			$password = md5($_POST['password']);
			$re_password = md5($_POST['re_password']);
			if ($password === $re_password) 
			{
				if ($this->db->update('warehouse', array("password"=>$password,"ptext"=>$ptext), array("phone"=>$phone))) 
				{
					redirect("warehouse/logout");
				}
				else{
					redirect("warehouse/change_password?error=1&msg=something wrong :(");
				}
			}
			else
			{
				redirect("warehouse/change_password?error=1&msg='Your Provided Passwords are not matched, please try with correct password'");
			}
		}
		$data['username'] = $username;
		$this->template("warehouse/change_password", $data);
	}

	public function logout()
	{
		unset($_SESSION['warehouse']);
		redirect("warehouse/login");
	}
	/**
	@Login Ajax
	*/
	public function process_login()
	{
		if ($_POST)
		{
			$phone = $_POST['phone'];
			$password = md5($_POST['password']);

			$resp = $this->model->get_row("SELECT * FROM `warehouse` WHERE `phone` = '$phone'  AND `password` =  '$password';");
			if ($resp)
			{
				$_SESSION['warehouse'] = serialize($resp);
				redirect('warehouse/index');
				return;
			}
			else
			{
				redirect('warehouse/login');
				return;
			}
		}
		else
		{
			redirect('warehouse/index');
		}
	}
	/**
	@ADMIN Login Ajax
	*/
	public function admin_land()
	{
		if (isset($_SESSION['admin']))
		{
			$resp = $this->model->get_row("SELECT * FROM `warehouse` WHERE `warehouse_id` = '".$_GET['id']."';");
			if ($resp)
			{
				$_SESSION['warehouse'] = serialize($resp);
				redirect('warehouse/index');
			}
			else
			{
				redirect('admin/logout');
			}
		}
		else
		{
			redirect('admin/logout');
		}
	}

	/***************************************
	*	callling main index function here 
	****************************************/
	public function dashboard()
	{
		$this->index();
	}
	public function index()
	{
		$user = $this->check_login();
		$data['title'] = "Warehouse Panel";
		$data['page_title'] = 'Dashboard';
		$data['menu'] = $status.'dashboard';
		$data['active_count'] = $this->model->get_row("SELECT COUNT(`product_id`) AS 'total' FROM `product` WHERE `user_id` = '".$user['user_id']."' AND `status` = 'active';");
		$data['inactive_count'] = $this->model->get_row("SELECT COUNT(`product_id`) AS 'total' FROM `product` WHERE `user_id` = '".$user['user_id']."' AND `status` = 'inactive';");
		$this->template('warehouse/dashboard', $data);
	}
	public function suppliers($status = 'all')
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = $status.' suppliers';
		$data['menu'] = $status.'_suppliers';
		$data['suppliers'] = $this->model->suppliers($status);
		$this->template('warehouse/suppliers', $data);
	}
	public function supply()
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = $status.'All Supplies';
		$data['menu'] = 'all_supply';
		$data['suppliers'] = $this->model->supply();
		$this->template('warehouse/supply', $data);
	}
	
	/**********************************************
	*	starting Add functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo
	***********************************************/
	public function add_supplier()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Supplier';
		$data['menu'] = 'add_supplier';
		$this->template('warehouse/add_supplier', $data);
	}
	public function add_supply()
	{
		$user = $this->check_login();
		$data['title'] = "Warehouse Panel";
		$data['page_title'] = 'Add Supply';
		$data['menu'] = 'add_supply';
		$data['products'] = $this->model->get_results("SELECT `product_id`,`title` FROM `product` ORDER BY `title` ASC;");
		$data['suppliers'] = $this->model->suppliers('active');
		$this->template('warehouse/add_supply', $data);
	}

	/**********************************************
	*	starting insert functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo
	************************************************/
	public function post_supplier()
	{
		$user = $this->check_login();
		$_POST['warehouse_id'] = $user['warehouse_id'];
		$resp = $this->db->insert("supplier", $_POST);
		redirect("warehouse/suppliers/".$_POST['status']."/?msg=Supplier Added!");
	}
	public function post_supply()
	{
		$user = $this->check_login();
		$_POST['warehouse_id'] = $user['warehouse_id'];
		$resp = $this->db->insert("supply", $_POST);
		if ($resp) {
			$product = $this->model->get_row("SELECT `qty` FROM `product` WHERE `product_id` = '".$_POST['product_id']."';");
			$update['qty'] = $_POST['qty']+$product['qty'];
			$this->db->where('product_id',$_POST['product_id']);
			$this->db->update('product',$update);
			redirect("warehouse/add-supply/?msg=Supply Added!");
		}
		else{

			redirect("warehouse/add-supply/?error=1&msg=Supply not added :(");
		}
	}

	/**********************************************
	*	starting edit functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo
	************************************************/
	public function edit_supplier()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo ("Wrong Supplier ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_supplier_byid($new_id);
			$data['page_title'] = "Edit: Supplier";
			$data['mode'] = "edit";
			$data['menu'] = 'all_supplier';
			$this->template('warehouse/add_supplier', $data);
		}
	}
	/**********************************************
	*	starting update functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo
	************************************************/
	public function update_supplier()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$_POST['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where("supplier_id",$aid);
		$data = $this->db->update("supplier", $_POST);
		if($data)
		{
			redirect("warehouse/suppliers/".$_POST['status']."/?msg=Edited Supplier");
		}
		else
		{
			redirect("warehouse/suppliers/".$_POST['status']."/?error=1&msg=Error occured while Editing Supplier");
		}
	}
	

	/**********************************************
	*	starting delete functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo 	
	************************************************/
	public function delete_supplier()
	{
		$user = $this->check_login();
		$this->db->where('supplier_id', $_GET['id']);
		$resp = $this->db->delete('supplier');
		if($resp)
		{
			redirect("warehouse/suppliers/all/?msg=Supplier has Deleted");
		}
		else
		{
			redirect("warehouse/suppliers/all/?error=1&msg=Supplier has failed to delete. Try Again!");
		}
	}

	/**
	*

	@AJAX PHOTO
		
	*
	*/
	public function post_photo_ajax()
	{
		$user = $this->check_login();
		if ($_FILES){
			$config['upload_path'] = 'uploads/';
        	$config['allowed_types'] = 'gif|jpeg|jpg|png|PNG|JPEG|JPG|GIF';
        	$config['encrypt_name'] = TRUE;
        	$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
			$new_name = md5(time().$_FILES['img']['name']).'.'.$ext;
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
        	if ($this->upload->do_upload('img'))
        	{
	        	$img = $this->upload->data()['file_name'];
	        	echo json_encode(array("status"=>true,"data"=>$img));
        	}
        	else{
        		#error
	        	echo json_encode(array("status"=>false));
        	}

		}
		else{
			redirect('warehouse/logout');
		}
	}
	/**
	*

	@AJAX
		
	*
	*/
	public function change_supplier_status()
	{
		if ($_POST) {
			$user = $this->check_login();
			$this->db->where('supplier_id',$_POST['id']);
			$resp  = $this->db->update('supplier',array("status"=>$_POST['status']));
			if ($resp) {
				echo json_encode(array("msg"=>"Saved"));
			}
			else{
				echo json_encode(array("msg"=>"Not Saved"));
			}
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		if (isset($_SESSION['admin']))
		{
			$data['admin'] = unserialize($_SESSION['admin']);
			$data['login'] = true;
		}
		else
		{
			$data['login'] = false;
		}
		$this->load->view('admin/header',$data);
		$this->load->view($page,$data);
		$this->load->view('admin/footer',$data);
	}
	public function login_template($page = '', $data = '')
	{
		if (isset($_SESSION['admin']))
		{
			$data['admin'] = unserialize($_SESSION['admin']);
			$data['login'] = true;
		}
		else
		{
			$data['login'] = false;
		}
		$this->load->view('admin/new_login_header',$data);
		$this->load->view($page,$data);
		$this->load->view('admin/new_login_footer',$data);

	}




	/**
	
	@Login Randi-Rona

	*/
	
	public function login()
	{
		if (isset($_SESSION['admin']))
		{
			redirect('admin/index');
			return;
		}
		$data['title'] = 'Login';
		$this->login_template('admin/signin', $data);
	}
	public function check_login()
	{
		if(isset($_SESSION['admin']) && $_SESSION['admin']!= "")
		{
			$user = unserialize($_SESSION['admin']);
			$username = $user['username'];
			$password = $user['password'];
			$resp = $this->model->get_row("SELECT * FROM `admin` WHERE `username` = '$username'  AND `password` =  '$password'");
			if ($resp)
			{
				return $user;
			}
			else
			{
				redirect('admin/login');
			}
		}
		else 
		{
			redirect('admin/login');
		}
	}
	public function change_password()
	{
		$user = $this->check_login();
		$data['signin'] = FALSE;
		$username = $user['username'];
		if (isset($_POST['password']) && strlen($_POST['password']) > 0 && isset($_POST['re_password']) && strlen($_POST['re_password']) > 0) 
		{
			$password = md5($_POST['password']);
			$re_password = md5($_POST['re_password']);
			if ($password === $re_password) 
			{
				if ($this->db->update('admin', array("password"=>$password), array("username"=>$username))) 
				{
					redirect("admin/logout");
				}
			}
			else
			{
				redirect("admin/change_password?error=1&msg='Your Provided Passwords are not matched, please try with correct password'");
			}
		}
		$data['username'] = $username;
		$this->template("admin/change_password", $data);
	}

	public function logout()
	{
		unset($_SESSION['admin']);
		redirect("admin/login");
	}
	/**
	@Login Ajax
	*/
	public function process_login()
	{
		if ($_POST)
		{
			$username = $_POST['username'];
			$password = md5($_POST['password']);

			$resp = $this->model->get_row("SELECT * FROM `admin` WHERE `username` = '$username'  AND `password` =  '$password';");
			if ($resp)
			{
				$_SESSION['admin'] = serialize($resp);
				redirect('admin/index');
				return;
			}
			else
			{
				redirect('admin/login');
				return;
			}
		}
		else
		{
			redirect('admin');
		}
	}
	

	/***************************************
	*	callling main index function here 
	****************************************/
	public function index()
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['signin'] = FALSE;
		$data['page_title'] = 'Dashboard';
		$data['menu'] = $status.'dashboard';
		$this->template('admin/dashboard', $data);
	}
	public function super_cats($status = 'all')
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = $status.' super categories';
		$data['menu'] = $status.'_super_cats';
		$data['cats'] = $this->model->super_cats($status);
		$this->template('admin/super_cats', $data);
	}
	public function cats($super = 0, $status = 'all')
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		if ($super > 0) {
			$data['super'] = $this->model->get_super_cat_byid($super);
			$data['page_title'] = $data['super']['title']."'s Categories";
		}
		else{
			$data['page_title'] = $status.' categories';
		}
		$data['menu'] = $status.'_cats';
		$data['cats'] = $this->model->cats($super,$status);
		$data['super_cats'] = $this->model->super_cats('active');
		$this->template('admin/cats', $data);
	}
	public function sub_cats($cat, $status = 'all')
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		if ($cat > 0) {
			$data['cat'] = $this->model->get_cat_byid($cat);
			$data['page_title'] = $data['cat']['title']."'s Categories";
		}
		else{
			redirect('admin/logout');
		}
		$data['menu'] = $status.'_sub_cats';
		$data['sub_cats'] = $this->model->sub_cats($cat,$status);
		$this->template('admin/sub_cats', $data);
	}
	public function sliders()
	{
		$user = $this->check_login();
		$data['page_title'] = "Slider";
		$data['photos'] = $this->model->slider();
		$data['menu'] = 'sliders';
		$this->template('admin/sliders',$data);
	}
	public function users($status = 'all')
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = $status.' users';
		$data['menu'] = $status.'_users';
		$data['users'] = $this->model->users($status);
		$this->template('admin/users', $data);
	}
	public function warehouses($status = 'all')
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = $status.' warehouses';
		$data['menu'] = $status.'_warehouses';
		$data['warehouses'] = $this->model->warehouses($status);
		$this->template('admin/warehouses', $data);
	}
	public function ads()
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = 'Advertisements';
		$data['menu'] = 'ads';
		$data['ads'] = $this->model->ads();
		$this->template('admin/ads', $data);
	}
	public function pages()
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = 'All Pages';
		$data['menu'] = 'pages';
		$data['pages'] = $this->model->pages();
		$this->template('admin/pages', $data);
	}
	
	public function setting()
	{
		$user = $this->check_login();
		$data['q'] = $this->model->setting(1);
		$data['page_title'] = "Edit: Setting";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = 'setting';
		$this->template('admin/setting', $data);
	}
	public function blog()
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = 'All Posts';
		$data['menu'] = 'blog';
		$data['blog'] = $this->model->blog();
		$this->template('admin/blog', $data);
	}
	public function reviews()
	{
		$user = $this->check_login();
		$data['data'] = $this->model->reviews();
		$data['page_title'] = "Testimonials";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = 'reviews';
		$this->template('admin/reviews', $data);
	}
	public function contact_forms($status = 'all')
	{
		$user = $this->check_login();
		$data['data'] = $this->model->contact_form($status);
		$data['page_title'] = $status." contact forms";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = $status.'_form';
		$this->template('admin/contact_forms', $data);
	}
	public function newsletters()
	{
		$user = $this->check_login();
		$data['data'] = $this->model->newsletters();
		$data['page_title'] = "Newsletters";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = 'newsletters';
		$this->template('admin/newsletters', $data);
	}
	public function order($status = 'all')
	{
		$user = $this->check_login();
		$data['order'] = $this->model->get_orders($status);
		$data['page_title'] = "order";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = $status.'_orders';
		$this->template('admin/order', $data);
	}
	/**********************************************
	*	starting Add functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo
	***********************************************/
	public function add_super_cat()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Super Category';
		$data['menu'] = 'add_super_cat';
		$this->template('admin/add_super_cat', $data);
	}
	public function add_user()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add User';
		$data['menu'] = 'add_user';
		$this->template('admin/add_user', $data);
	}
	public function add_warehouse()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Warehouse';
		$data['menu'] = 'add_warehouse';
		$this->template('admin/add_warehouse', $data);
	}
	public function add_blog()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Blog Post';
		$data['menu'] = 'blog';
		$this->template('admin/add_blog', $data);
	}

	/**********************************************
	*	starting insert functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo
	************************************************/
	public function post_super_cat()
	{
		$user = $this->check_login();
		$resp = $this->db->insert("super_category", $_POST);
		redirect("admin/super-cats/all/?msg=Super Category Added!");
	}
	public function post_cat()
	{
		$user = $this->check_login();
		parse_str($_POST['data'],$post);
		$resp = $this->db->insert("category", $post);
		if ($resp) {
			echo json_encode(array("status"=>true,"msg"=>"Category Added"));
		}
		else{
			echo json_encode(array("status"=>true,"msg"=>"Category not added, please try again or reload your webpage."));
		}
	}
	public function post_sub_cat()
	{
		$user = $this->check_login();
		parse_str($_POST['data'],$post);
		$resp = $this->db->insert("sub_category", $post);
		if ($resp) {
			echo json_encode(array("status"=>true,"msg"=>"Sub Category Added"));
		}
		else{
			echo json_encode(array("status"=>true,"msg"=>"Sub Category not added, please try again or reload your webpage."));
		}
	}
	public function post_user()
	{
		$user = $this->check_login();
		$_POST['password'] = md5($_POST['ptext']);
		$resp = $this->db->insert("user", $_POST);
		redirect("admin/users/all/?msg=User Added!");
	}
	public function post_warehouse()
	{
		$user = $this->check_login();
		$_POST['password'] = md5($_POST['ptext']);
		$resp = $this->db->insert("warehouse", $_POST);
		redirect("admin/warehouses/all/?msg=Warehouse Added!");
	}
	public function post_blog()
	{
		$user = $this->check_login();
		$resp = $this->db->insert("blog", $_POST);
		redirect("admin/blog/?msg=Blog Post Added!");
	}
	public function post_sliders()
	{
		$user = $this->check_login();
		foreach($_FILES["image"]["tmp_name"] as $key => $img) {

			$_FILES['file']['name']       = $_FILES['image']['name'][$key];
            $_FILES['file']['type']       = $_FILES['image']['type'][$key];
            $_FILES['file']['tmp_name']   = $_FILES['image']['tmp_name'][$key];
            $_FILES['file']['error']      = $_FILES['image']['error'][$key];
            $_FILES['file']['size']       = $_FILES['image']['size'][$key];

			$config['upload_path'] = 'uploads/';
	    	$config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG';
	    	$config['encrypt_name'] = TRUE;
	    	$ext = pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);
			$new_name = md5(time().$_FILES["file"]['name']).'.'.$ext;
			$config['file_name'] = $new_name;
	    	$resp = $this->load->library('upload', $config);
	    	if ($resp) {
	        	$this->upload->do_upload('file');
				$insert['image'] = $this->upload->data()['file_name'];
				$this->db->insert("slider", $insert);
	    	}
		}
		redirect("admin/sliders/?msg=Slider Added!");
	}
	public function post_review()
	{
		$user = $this->check_login();
		$resp = $this->db->insert("review", $_POST);
		redirect("admin/reviews/?msg=Testimonial Added!");
	}

	/**********************************************
	*	starting edit functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo
	************************************************/
	public function edit_super_cat()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo ("Wrong Super Category ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_super_cat_byid($new_id);
			$data['page_title'] = "Edit: Super Category";
			$data['mode'] = "edit";
			$data['menu'] = 'all_super_cats';
			$this->template('admin/add_super_cat', $data);
		}
	}
	public function edit_user()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo ("Wrong User ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_user_byid($new_id);
			$data['page_title'] = "Edit: User";
			$data['mode'] = "edit";
			$data['menu'] = 'all_user';
			$this->template('admin/add_user', $data);
		}
	}
	public function edit_warehouse()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo ("Wrong Warehouse ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_warehouse_byid($new_id);
			$data['page_title'] = "Edit: Warehouse";
			$data['mode'] = "edit";
			$data['menu'] = 'all_warehouse';
			$this->template('admin/add_warehouse', $data);
		}
	}
	public function edit_blog()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo ("Wrong Blog ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_blog_byid($new_id);
			$data['page_title'] = "Edit: Blog Post";
			$data['mode'] = "edit";
			$data['menu'] = 'blog';
			$this->template('admin/add_blog', $data);
		}
	}
	public function edit_page()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo ("Wrong Page ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_page_byid($new_id);
			$data['page_title'] = "Edit: Page";
			$data['mode'] = "edit";
			$data['signin'] = FALSE;
			$data['menu'] = 'pages';
			$this->template('admin/add_page', $data);
		}
	}
	
	/**********************************************
	*	starting update functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo
	************************************************/
	public function update_super_cat()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$_POST['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where("super_category_id",$aid);
		$data = $this->db->update("super_category", $_POST);
		if($data)
		{
			redirect("admin/super-cats/".$_POST['status']."/?msg=Edited Super Category");
		}
		else
		{
			redirect("admin/super-cats/".$_POST['status']."/?error=1&msg=Error occured while Editing Super Category");
		}
	}
	public function update_cat()
	{
		$user = $this->check_login();
		parse_str($_POST['data'],$post);
		$aid = $post['id'];unset($post['id']);
		$_POST['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where("category_id",$aid);
		$data = $this->db->update("category", $post);
		if($data)
		{
			echo json_encode(array("status"=>true,"msg"=>"Edited Category :)"));
		}
		else
		{
			echo json_encode(array("status"=>false,"msg"=>"Category not edited :("));
		}
	}
	public function update_sub_cat()
	{
		$user = $this->check_login();
		parse_str($_POST['data'],$post);
		$aid = $post['id'];unset($post['id']);
		$_POST['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where("sub_category_id",$aid);
		$data = $this->db->update("sub_category", $post);
		if($data)
		{
			echo json_encode(array("status"=>true,"msg"=>"Edited Sub Category :)"));
		}
		else
		{
			echo json_encode(array("status"=>false,"msg"=>"Sub Category not edited :("));
		}
	}
	public function update_user()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$_POST['updated_at'] = date('Y-m-d H:i:s');
		$_POST['password'] = md5($_POST['ptext']);
		$this->db->where("user_id",$aid);
		$data = $this->db->update("user", $_POST);
		if($data)
		{
			redirect("admin/users/".$_POST['status']."/?msg=Edited User");
		}
		else
		{
			redirect("admin/users/".$_POST['status']."/?error=1&msg=Error occured while Editing User");
		}
	}
	public function update_warehouse()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$_POST['updated_at'] = date('Y-m-d H:i:s');
		$_POST['password'] = md5($_POST['ptext']);
		$this->db->where("warehouse_id",$aid);
		$data = $this->db->update("warehouse", $_POST);
		if($data)
		{
			redirect("admin/warehouses/".$_POST['status']."/?msg=Edited Warehouse");
		}
		else
		{
			redirect("admin/warehouses/".$_POST['status']."/?error=1&msg=Error occured while Editing Warehouse");
		}
	}
	public function update_blog()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$_POST['updated_by'] = $user['admin_id'];
		$_POST['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where("blog_id",$aid);
		$data = $this->db->update("blog", $_POST);
		if($data)
		{
			redirect("admin/blog/?msg=Edited Blog Post");
		}
		else
		{
			redirect("admin/blog/?error=1&msg=Error occured while Editing Blog Post");
		}
	}
	public function update_page()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$this->db->where("page_id",$aid);
		$data = $this->db->update("page", $_POST);
		if($data)
		{
			redirect("admin/pages/?msg=Edited Page");
		}
		else
		{
			redirect("admin/pages/?error=1&msg=Error occured while Editing Page");
		}
	}
	public function update_setting()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$this->db->where("setting_id",1);
		$data = $this->db->update("setting", $_POST);
		if($data)
		{
			redirect("admin/setting/?msg=Edited Setting");
		}
		else
		{
			redirect("admin/setting/?error=1&msg=Error occured while Editing Setting");
		}
	}
	

	/**********************************************
	*	starting delete functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo 	
	************************************************/
	public function delete_user()
	{
		$user = $this->check_login();
		$this->db->where('user_id', $_GET['id']);
		$resp = $this->db->delete('user');
		if($resp)
		{
			redirect("admin/users/all/?msg=User has Deleted");
		}
		else
		{
			redirect("admin/users/all/?error=1&msg=User has failed to delete. Try Again!");
		}
	}
	public function delete_warehouse()
	{
		$user = $this->check_login();
		$this->db->where('user_id', $_GET['id']);
		$resp = $this->db->delete('warehouse');
		if($resp)
		{
			redirect("admin/warehouses/all/?msg=Warehouse has Deleted");
		}
		else
		{
			redirect("admin/warehouses/all/?error=1&msg=Warehouse has failed to delete. Try Again!");
		}
	}
	public function delete_slider()
	{
		$user = $this->check_login();
		$slider = $this->model->get_row("SELECT `image` FROM `slider` WHERE `slider_id` = '".$_GET['id']."';");
		$this->db->where('slider_id', $_GET['id']);
		$resp = $this->db->delete('slider');
		if($resp)
		{
			unlink('uploads/'.$slider['image']);
			redirect("admin/sliders/?msg=Slider has Deleted");
		}
		else
		{
			redirect("admin/sliders/?error=1&msg=Slider has failed to delete. Try Again!");
		}
	}
	public function delete_blog()
	{
		$user = $this->check_login();
		$this->db->where('blog_id', $_GET['id']);
		$resp = $this->db->delete('blog');
		if($resp)
		{
			redirect("admin/blog/?msg=News has Deleted");
		}
		else
		{
			redirect("admin/blog/?error=1&msg=News has failed to delete. Try Again!");
		}
	}
	public function delete_review()
	{
		$user = $this->check_login();
		$this->db->where('review_id', $_GET['id']);
		$resp = $this->db->delete('review');
		if($resp)
		{
			redirect("admin/reviews/?msg=Testimonial has Deleted");
		}
		else
		{
			redirect("admin/reviews/?error=1&msg=Testimonial has failed to delete. Try Again!");
		}
	}
	public function delete_form()
	{
		$user = $this->check_login();
		$this->db->where('contact_form_id', $_GET['id']);
		$resp = $this->db->delete('contact_form');
		if($resp)
		{
			redirect("admin/contact-forms/?msg=Contact Form has Deleted");
		}
		else
		{
			redirect("admin/contact-forms/?error=1&msg=Contact Form has failed to delete. Try Again!");
		}
	}
	public function delete_newsletter()
	{
		$user = $this->check_login();
		$this->db->where('newsletter_id', $_GET['id']);
		$resp = $this->db->delete('newsletter');
		if($resp)
		{
			redirect("admin/newsletters/?msg=Email has Deleted");
		}
		else
		{
			redirect("admin/newsletters/?error=1&msg=Email has failed to delete. Try Again!");
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
			redirect('admin/logout');
		}
	}
	/**
	*

	@AJAX
		
	*
	*/
	public function change_super_cat_status()
	{
		if ($_POST) {
			$user = $this->check_login();
			$this->db->where('super_category_id',$_POST['id']);
			$resp  = $this->db->update('super_category',array("status"=>$_POST['status']));
			if ($resp) {
				echo json_encode(array("msg"=>"Saved"));
			}
			else{
				echo json_encode(array("msg"=>"Not Saved"));
			}
		}
	}
	public function change_cat_status()
	{
		if ($_POST) {
			$user = $this->check_login();
			$this->db->where('category_id',$_POST['id']);
			$resp  = $this->db->update('category',array("status"=>$_POST['status']));
			if ($resp) {
				echo json_encode(array("msg"=>"Saved"));
			}
			else{
				echo json_encode(array("msg"=>"Not Saved"));
			}
		}
	}
	public function change_sub_cat_status()
	{
		if ($_POST) {
			$user = $this->check_login();
			$this->db->where('sub_category_id',$_POST['id']);
			$resp  = $this->db->update('sub_category',array("status"=>$_POST['status']));
			if ($resp) {
				echo json_encode(array("msg"=>"Saved"));
			}
			else{
				echo json_encode(array("msg"=>"Not Saved"));
			}
		}
	}
	public function change_sub_cat_show_home()
	{
		if ($_POST) {
			$user = $this->check_login();
			$this->db->where('sub_category_id',$_POST['id']);
			$resp  = $this->db->update('sub_category',array("show_home"=>$_POST['show_home']));
			if ($resp) {
				echo json_encode(array("msg"=>"Saved"));
			}
			else{
				echo json_encode(array("msg"=>"Not Saved"));
			}
		}
	}
	public function change_user_status()
	{
		if ($_POST) {
			$user = $this->check_login();
			$this->db->where('user_id',$_POST['id']);
			$resp  = $this->db->update('user',array("status"=>$_POST['status']));
			if ($resp) {
				echo json_encode(array("msg"=>"Saved"));
			}
			else{
				echo json_encode(array("msg"=>"Not Saved"));
			}
		}
	}
	public function change_warehouse_status()
	{
		if ($_POST) {
			$user = $this->check_login();
			$this->db->where('warehouse_id',$_POST['id']);
			$resp  = $this->db->update('warehouse',array("status"=>$_POST['status']));
			if ($resp) {
				echo json_encode(array("msg"=>"Saved"));
			}
			else{
				echo json_encode(array("msg"=>"Not Saved"));
			}
		}
	}
	public function change_form_status()
	{
		if ($_POST) {
			$user = $this->check_login();
			$this->db->where('contact_form_id',$_POST['id']);
			$resp  = $this->db->update('contact_form',array("status"=>$_POST['status']));
			if ($resp) {
				echo json_encode(array("msg"=>"Saved"));
			}
			else{
				echo json_encode(array("msg"=>"Not Saved"));
			}
		}
	}
	public function get_cat_ajax()
	{
		$resp = $this->model->get_cat_byid($_POST['id']);
		if ($resp) {
			echo json_encode(array("status"=>true,"cat"=>$resp));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"nothing found."));
		}
	}
	public function get_sub_cat_ajax()
	{
		$resp = $this->model->get_sub_cat_byid($_POST['id']);
		if ($resp) {
			echo json_encode(array("status"=>true,"cat"=>$resp));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"nothing found."));
		}
	}
	public function update_ad_ajax()
	{
		parse_str($_POST['data'],$q);
		$id = $q['id'];unset($q['id']);
		$this->db->where('ad_id',$id);
		$resp = $this->db->update('ad',$q);
		if ($resp) {
			$q = $this->model->get_row("SELECT * FROM `ad` WHERE `ad_id` = '$id';");
			$html = '<td>'.$q['type'].'</td>';
		    $html .= '<td>'.$q['order'].'</td>';
		    $html .= '<td><img src="'.UPLOADS.$q['image'].'" width="200"></td>';
		    $html .= '<td><a href="'.$q['link'].'" target="_blank">'.$q['link'].'</a></td>';
		    $html .= '<td class="actions"><a href="javascript://" data-id="'.$q['ad_id'].'" data-image="'.$q['image'].'" data-order="'.$q['order'].'" data-type="'.$q['type'].'" data-link="'.$q['link'].'"  class="edit-ad btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Edit"><i class="icon md-edit" aria-hidden="true"></i></a></td>';
		    $rowId = '#row-'.$id;
		    echo json_encode(array("status"=>true,"html"=>$html,"rowId"=>$rowId,"msg"=>"updated :)"));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"not updated :( please try again or reload your webpage"));
		}
	}
	/* SIZE */
	public function get_cat_sizes_ajax()
	{
		$cat = $this->model->get_row("SELECT `size` FROM `category` WHERE `category_id` = '".$_POST['id']."';");
		if ($cat) {
			$sizes = $this->model->get_sizes($_POST['id']);
			$html = "";
			if ($sizes) {
				foreach ($sizes as $key => $size) {
					$html .= '<tr>
                            <td>'.$size['name'].'</td>
                            <td>'.$size['full_name'].'</td>
                            <td>
                                <a href="javascript://" data-id="'.$size['size_id'].'" data-name="'.$size['name'].'" data-full-name="'.$size['full_name'].'" class="edit-size"><i class="icon md-edit" style="color:grey;"></i></a>&nbsp;&nbsp;
                                <a href="javascript://" data-id="'.$size['size_id'].'" class="delete-size"><i class="fa fa-trash" style="color:red;"></i></a>
                            </td>
                        </tr>';
				}
			}
			echo json_encode(array("status"=>true,"size"=>$cat['size'],"html"=>$html));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"nothing found :( please try again or reload your webpage."));
		}
	}
	public function update_size_status()
	{
		parse_str($_POST['data'],$post);
		$this->db->where('category_id',$post['category_id']);unset($post['category_id']);
		$resp = $this->db->update('category',$post);
		if ($resp) {
			echo json_encode(array("status"=>true,"msg"=>"updated :)"));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"not updated :( please try again or reload your webpage."));
		}
	}
	public function post_size_ajax()
	{
		parse_str($_POST['data'],$post);
		$resp = $this->db->insert('size',$post);
		if ($resp) {
			$sizes = $this->model->get_sizes($post['category_id']);
			$html = "";
			if ($sizes) {
				foreach ($sizes as $key => $size) {
					$html .= '<tr>
                            <td>'.$size['name'].'</td>
                            <td>'.$size['full_name'].'</td>
                            <td>
                                <a href="javascript://" data-id="'.$size['size_id'].'" data-name="'.$size['name'].'" data-full-name="'.$size['full_name'].'" class="edit-size"><i class="icon md-edit" style="color:grey;"></i></a>&nbsp;&nbsp;
                                <a href="javascript://" data-id="'.$size['size_id'].'" class="delete-size"><i class="fa fa-trash" style="color:red;"></i></a>
                            </td>
                        </tr>';
				}
			}
			echo json_encode(array("status"=>true,"html"=>$html));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"size not added :( please try again or reload your webpage."));
		}
	}
	public function update_size_ajax()
	{
		parse_str($_POST['data'],$post);
		$this->db->where('size_id',$post['size_id']);unset($post['size_id']);
		$resp = $this->db->update('size',$post);
		if ($resp) {
			$sizes = $this->model->get_sizes($post['category_id']);
			$html = "";
			if ($sizes) {
				foreach ($sizes as $key => $size) {
					$html .= '<tr>
                            <td>'.$size['name'].'</td>
                            <td>'.$size['full_name'].'</td>
                            <td>
                                <a href="javascript://" data-id="'.$size['size_id'].'" data-name="'.$size['name'].'" data-full-name="'.$size['full_name'].'" class="edit-size"><i class="icon md-edit" style="color:grey;"></i></a>&nbsp;&nbsp;
                                <a href="javascript://" data-id="'.$size['size_id'].'" class="delete-size"><i class="fa fa-trash" style="color:red;"></i></a>
                            </td>
                        </tr>';
				}
			}
			echo json_encode(array("status"=>true,"html"=>$html));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"size not added :( please try again or reload your webpage."));
		}
	}
	public function delete_size_ajax()
	{
		$this->db->where('size_id',$_POST['id']);
		$resp = $this->db->delete('size');
		if ($resp) {
			echo json_encode(array("status"=>true));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"size not deleted :( please try again or reload your webpage."));	
		}
	}
	/* COLOR */
	public function get_cat_colors_ajax()
	{
		$cat = $this->model->get_row("SELECT `color` FROM `category` WHERE `category_id` = '".$_POST['id']."';");
		if ($cat) {
			$colors = $this->model->get_colors($_POST['id']);
			$html = "";
			if ($colors) {
				foreach ($colors as $key => $color) {
					$html .= '<tr>
                            <td>'.$color['name'].'</td>
                            <td>'.$color['full_name'].'</td>
                            <td>
                                <a href="javascript://" data-id="'.$color['color_id'].'" data-name="'.$color['name'].'" data-full-name="'.$color['full_name'].'" class="edit-color"><i class="icon md-edit" style="color:grey;"></i></a>&nbsp;&nbsp;
                                <a href="javascript://" data-id="'.$color['color_id'].'" class="delete-color"><i class="fa fa-trash" style="color:red;"></i></a>
                            </td>
                        </tr>';
				}
			}
			echo json_encode(array("status"=>true,"color"=>$cat['color'],"html"=>$html));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"nothing found :( please try again or reload your webpage."));
		}
	}
	public function update_color_status()
	{
		parse_str($_POST['data'],$post);
		$this->db->where('category_id',$post['category_id']);unset($post['category_id']);
		$resp = $this->db->update('category',$post);
		if ($resp) {
			echo json_encode(array("status"=>true,"msg"=>"updated :)"));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"not updated :( please try again or reload your webpage."));
		}
	}
	public function post_color_ajax()
	{
		parse_str($_POST['data'],$post);
		$resp = $this->db->insert('color',$post);
		if ($resp) {
			$colors = $this->model->get_colors($post['category_id']);
			$html = "";
			if ($colors) {
				foreach ($colors as $key => $color) {
					$html .= '<tr>
                            <td>'.$color['name'].'</td>
                            <td>'.$color['full_name'].'</td>
                            <td>
                                <a href="javascript://" data-id="'.$color['color_id'].'" data-name="'.$color['name'].'" data-full-name="'.$color['full_name'].'" class="edit-color"><i class="icon md-edit" style="color:grey;"></i></a>&nbsp;&nbsp;
                                <a href="javascript://" data-id="'.$color['color_id'].'" class="delete-color"><i class="fa fa-trash" style="color:red;"></i></a>
                            </td>
                        </tr>';
				}
			}
			echo json_encode(array("status"=>true,"html"=>$html));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"color not added :( please try again or reload your webpage."));
		}
	}
	public function update_color_ajax()
	{
		parse_str($_POST['data'],$post);
		$this->db->where('color_id',$post['color_id']);unset($post['color_id']);
		$resp = $this->db->update('color',$post);
		if ($resp) {
			$colors = $this->model->get_colors($post['category_id']);
			$html = "";
			if ($colors) {
				foreach ($colors as $key => $color) {
					$html .= '<tr>
                            <td>'.$color['name'].'</td>
                            <td>'.$color['full_name'].'</td>
                            <td>
                                <a href="javascript://" data-id="'.$color['color_id'].'" data-name="'.$color['name'].'" data-full-name="'.$color['full_name'].'" class="edit-color"><i class="icon md-edit" style="color:grey;"></i></a>&nbsp;&nbsp;
                                <a href="javascript://" data-id="'.$color['color_id'].'" class="delete-color"><i class="fa fa-trash" style="color:red;"></i></a>
                            </td>
                        </tr>';
				}
			}
			echo json_encode(array("status"=>true,"html"=>$html));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"color not added :( please try again or reload your webpage."));
		}
	}
	public function delete_color_ajax()
	{
		$this->db->where('color_id',$_POST['id']);
		$resp = $this->db->delete('color');
		if ($resp) {
			echo json_encode(array("status"=>true));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"color not deleted :( please try again or reload your webpage."));	
		}
	}
	/**
	* 
	* 
	* 
	*	USER CATS 
	* 
	* 
	**/
	public function get_user_cats()
	{
		$cats = $this->model->get_all_sub_cats();
		$userCats = explode(',', $_POST['cats']);
		$html = "<label>Categories</label>";
		$html .= "<input type='hidden' name='user_id' value='".$_POST['id']."'>";
		foreach ($cats as $key => $cat) {
			if (in_array($cat['sub_category_id'], $userCats)) {
				$html .= '<br><input type="checkbox" name="cat[]" value="'.$cat['sub_category_id'].'" checked> '.$cat['title'].' ('.$cat['status'].')';
			}
			else{
				$html .= '<br><input type="checkbox" name="cat[]" value="'.$cat['sub_category_id'].'"> '.$cat['title'].' ('.$cat['status'].')';
			}
		}
		$html .= '<br><br><button type="submit" class="btn btn-success">Save</button>';
		echo json_encode(array("status"=>true,"html"=>$html));
	}
	public function post_user_cats_ajax()
	{
		parse_str($_POST['data'],$post);
		$update['cats'] = implode(',', $post['cat']);
		$this->db->where('user_id',$post['user_id']);
		$this->db->update('user',$update);
		echo json_encode(array("status"=>true,"msg"=>"categories saved."));
	}
	public function get_order_detail()
	{
		$user = $this->check_login();
		if ($_POST)
		{
			$id = $_POST['id'];
			$data = $this->model->get_results("
					SELECT o.*, p.slug, u.fname, u.lname
					FROM `order_detail` AS o 
					INNER JOIN `product` AS p ON o.product_id = p.product_id 
					INNER JOIN `user` AS u ON u.user_id = p.user_id 
					WHERE order_id = '$id';
				");
			$data = $this->get_order_detail_listing($data);
			if ($data)
			{
				echo json_encode(array("status"=>true,"data"=>$data));
			}
			else
			{
				echo json_encode(array("status"=>false));
			}
		}
		else
		{
			echo json_encode(array("status"=>false));
		}
	}
	public function change_order_status()
	{
		$user = $this->check_login();
		if ($_POST)
		{
			$record = $this->db->update("order", array("status"=>$_POST['status']), array("order_id"=>$_POST['id']));
			if ($record)
			{
				echo json_encode(array("status"=>true));
			}
			else
			{
				echo json_encode(array("status"=>false));
			}
		}
		else
		{
			echo json_encode(array("status"=>false));
		}
	}	
	private function get_order_detail_listing($data){
		$resp = '';
		foreach ($data as $key => $v) {
			$resp .= '<tr>
	                <td style="vertical-align: middle;">'.$v['fname'].' '.$v['lname'].'</td>
	                <td style="vertical-align: middle;"><div class="img"><img src="'.UPLOADS.$v['main_img'].'" width="100"></div></td>
	                <td style="vertical-align: middle;">';
	                	if($v['status'] == 'new'){
	                		$resp .= '<span class="badge badge-primary">New</span>';
	                	}elseif ($v['status'] == 'done'){
	                		$resp .= '<span class="badge badge-success">Done</span>';
	                	}else{
	                		$resp .= '<span class="badge badge-danger">Reject</span>';
	                	}
	                $resp .='</td>
	                <td style="vertical-align: middle;">'.$v['name'].'</td>
	                <td style="vertical-align: middle;">'.$v['price'].'</td>
	                <td style="vertical-align: middle;">'.$v['qty'].'</td>
	                <td style="vertical-align: middle;">'.$v['qty'] * $v['price'].'</td>
	                <td style="vertical-align: middle;"><a href="'.BASEURL.'product/'.$v['slug'].'" target="_blank">View Product</a></td>
	            </tr>';
		}
		return $resp;
	}
}

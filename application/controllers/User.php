<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		if (isset($_SESSION['user']))
		{
			$data['user'] = unserialize($_SESSION['user']);
			$data['login'] = true;
		}
		else
		{
			$data['login'] = false;
		}
		$this->load->view('user/header',$data);
		$this->load->view($page,$data);
		$this->load->view('user/footer',$data);
	}
	public function login_template($page = '', $data = '')
	{
		if (isset($_SESSION['user']))
		{
			$data['user'] = unserialize($_SESSION['user']);
			$data['login'] = true;
		}
		else
		{
			$data['login'] = false;
		}
		$this->load->view('user/new_login_header',$data);
		$this->load->view($page,$data);
		$this->load->view('user/new_login_footer',$data);

	}




	/**
	
	@Login Randi-Rona

	*/
	
	public function login()
	{
		if (isset($_SESSION['user']))
		{
			redirect('user/index');
			return;
		}
		$data['title'] = 'Login';
		$this->login_template('user/signin', $data);
	}
	public function check_login()
	{
		if(isset($_SESSION['user']) && $_SESSION['user']!= "")
		{
			$user = unserialize($_SESSION['user']);
			$phone = $user['phone'];
			$password = $user['password'];
			$resp = $this->model->get_row("SELECT * FROM `user` WHERE `phone` = '$phone'  AND `password` =  '$password'");
			if ($resp)
			{
				return $user;
			}
			else
			{
				redirect('user/login');
			}
		}
		else 
		{
			redirect('user/login');
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
				if ($this->db->update('user', array("password"=>$password,"ptext"=>$ptext), array("phone"=>$phone))) 
				{
					redirect("user/logout");
				}
				else{
					redirect("user/change_password?error=1&msg=something wrong :(");
				}
			}
			else
			{
				redirect("user/change_password?error=1&msg='Your Provided Passwords are not matched, please try with correct password'");
			}
		}
		$data['username'] = $username;
		$this->template("user/change_password", $data);
	}

	public function logout()
	{
		unset($_SESSION['user']);
		redirect("user/login");
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

			$resp = $this->model->get_row("SELECT * FROM `user` WHERE `phone` = '$phone'  AND `password` =  '$password';");
			if ($resp)
			{
				$_SESSION['user'] = serialize($resp);
				redirect('user/index');
				return;
			}
			else
			{
				redirect('user/login');
				return;
			}
		}
		else
		{
			redirect('user/index');
		}
	}
	/**
	@ADMIN Login Ajax
	*/
	public function admin_land()
	{
		if (isset($_SESSION['admin']))
		{
			$resp = $this->model->get_row("SELECT * FROM `user` WHERE `user_id` = '".$_GET['id']."';");
			if ($resp)
			{
				$_SESSION['user'] = serialize($resp);
				redirect('user/index');
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
		$data['title'] = "User Panel";
		$data['signin'] = FALSE;
		$data['page_title'] = 'Dashboard';
		$data['menu'] = $status.'dashboard';
		$data['active_count'] = $this->model->get_row("SELECT COUNT(`product_id`) AS 'total' FROM `product` WHERE `user_id` = '".$user['user_id']."' AND `status` = 'active';");
		$data['inactive_count'] = $this->model->get_row("SELECT COUNT(`product_id`) AS 'total' FROM `product` WHERE `user_id` = '".$user['user_id']."' AND `status` = 'inactive';");
		$this->template('user/dashboard', $data);
	}
	public function super_cats($status = 'all')
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = $status.' super categories';
		$data['menu'] = $status.'_super_cats';
		$data['cats'] = $this->model->super_cats($status);
		$this->template('user/super_cats', $data);
	}
	public function cats($status = 'all')
	{
		$user = $this->check_login();
		$data['title'] = "User Panel";
		$data['menu'] = $status.'_cats';
		$data['page_title'] = $status.' categories';
		$data['cats'] = $this->model->get_user_cats($status);
		$data['super_cats'] = $this->model->super_cats('active');
		$this->template('user/cats', $data);
	}
	public function products($status = 'all', $cat)
	{
		$user = $this->check_login();
		$data['title'] = "User Panel";
		$data['cat'] = $this->model->get_sub_cat_byid($cat);
		$data['menu'] = 'all_cats';
		$data['page_title'] = $data['cat']['title'].' -> '.$status.' products';
		$data['products'] = $this->model->products($status,$cat,$user['user_id']);
		$this->template('user/products', $data);
	}
	public function sliders()
	{
		$user = $this->check_login();
		$data['page_title'] = "Slider";
		$data['photos'] = $this->model->slider();
		$data['menu'] = 'sliders';
		$this->template('user/sliders',$data);
	}
	public function users($status = 'all')
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = $status.' users';
		$data['menu'] = $status.'_users';
		$data['users'] = $this->model->users($status);
		$this->template('user/users', $data);
	}
	public function pages()
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['signin'] = FALSE;
		$data['page_title'] = 'All Pages';
		$data['menu'] = 'pages';
		$data['username'] = $user['username'];
		$data['password'] = $user['password'];
		$data['pages'] = $this->model->pages();
		$data['msg_code'] = isset($_GET['msg']) && $_GET['msg'] != '' ? $_GET['msg'] : FALSE;
		$data['error'] = isset($_GET['error']) && $_GET['error'] != '' ? 'error' : 'correct';
		$this->template('user/pages', $data);
	}
	
	public function setting()
	{
		$user = $this->check_login();
		$data['q'] = $this->model->setting(1);
		$data['page_title'] = "Edit: Setting";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = 'setting';
		$this->template('user/setting', $data);
	}
	public function blog()
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = 'All Posts';
		$data['menu'] = 'blog';
		$data['blog'] = $this->model->blog();
		$this->template('user/blog', $data);
	}
	public function reviews()
	{
		$user = $this->check_login();
		$data['data'] = $this->model->reviews();
		$data['page_title'] = "Testimonials";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = 'reviews';
		$this->template('user/reviews', $data);
	}
	public function contact_forms($status = 'all')
	{
		$user = $this->check_login();
		$data['data'] = $this->model->contact_form($status);
		$data['page_title'] = $status." contact forms";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = $status.'_form';
		$this->template('user/contact_forms', $data);
	}
	public function newsletters()
	{
		$user = $this->check_login();
		$data['data'] = $this->model->newsletters();
		$data['page_title'] = "Newsletters";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = 'newsletters';
		$this->template('user/newsletters', $data);
	}
	public function order($status = 'all')
	{
		$user = $this->check_login();
		$data['order'] = $this->model->get_user_orders($user['user_id'], $status);
		$data['page_title'] = "Order";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = $status.'_orders';
		$this->template('user/order', $data);
	}
	/**********************************************
	*	starting Add functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo
	***********************************************/
	public function add_product($cat)
	{
		$user = $this->check_login();
		$data['cat'] = $this->model->get_sub_cat_byid($cat);
		if ($data['cat']['size'] == 'yes') {
			$data['sizes'] = $this->model->get_sizes($data['cat']['parent']);
		}
		if ($data['cat']['color'] == 'yes') {
			$data['colors'] = $this->model->get_colors($data['cat']['parent']);
		}
		$data['menu'] = 'all_cats';
		$data['page_title'] = 'Add product -> '.$data['cat']['title'];
		$this->template('user/add_product', $data);
	}
	public function add_blog()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Blog Post';
		$data['menu'] = 'blog';
		$this->template('user/add_blog', $data);
	}

	/**********************************************
	*	starting insert functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo
	************************************************/
	public function post_product()
	{
		$user = $this->check_login();
		$_POST['user_id'] = $user['user_id'];
		$_POST['sizes'] = implode(',', $_POST['size']);unset($_POST['size']);
		$_POST['colors'] = implode(',', $_POST['color']);unset($_POST['color']);
		if ($_POST['sizes'] == null) {
			$_POST['sizes'] = 0;
		}
		if ($_POST['colors'] == null) {
			$_POST['colors'] = 0;
		}
		$resp = $this->db->insert("product", $_POST);
		redirect("user/products/".$_POST['status']."/".$_POST['sub_category_id']."/?msg=Product Added!");
	}
	public function post_blog()
	{
		$user = $this->check_login();
		$resp = $this->db->insert("blog", $_POST);
		redirect("user/blog/?msg=Blog Post Added!");
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
		redirect("user/sliders/?msg=Slider Added!");
	}
	public function post_review()
	{
		$user = $this->check_login();
		$resp = $this->db->insert("review", $_POST);
		redirect("user/reviews/?msg=Testimonial Added!");
	}

	/**********************************************
	*	starting edit functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo
	************************************************/
	public function edit_product()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo ("Wrong User ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_product_byid($new_id);
			if ($data['q']['user_id'] != $user['user_id']) {
				redirect("user/logout");
			}
			$data['cat'] = $this->model->get_sub_cat_byid($data['q']['sub_category_id']);
			if ($data['cat']['size'] == 'yes') {
				$data['sizes'] = $this->model->get_sizes($data['cat']['parent']);
			}
			if ($data['cat']['color'] == 'yes') {
				$data['colors'] = $this->model->get_colors($data['cat']['parent']);
			}
			$data['menu'] = 'all_cats';
			$data['page_title'] = 'Edit -> '.$data['q']['title'];

			$data['mode'] = "edit";
			$this->template('user/add_product', $data);
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
			$this->template('user/add_blog', $data);
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
			$this->template('user/add_page', $data);
		}
	}
	
	/**********************************************
	*	starting update functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo
	************************************************/
	public function update_product()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$_POST['updated_at'] = date('Y-m-d H:i:s');
		$_POST['sizes'] = implode(',', $_POST['size']);unset($_POST['size']);
		$_POST['colors'] = implode(',', $_POST['color']);unset($_POST['color']);
		if ($_POST['sizes'] == null) {
			$_POST['sizes'] = 0;
		}
		if ($_POST['colors'] == null) {
			$_POST['colors'] = 0;
		}
		$this->db->where("product_id",$aid);
		$data = $this->db->update("product", $_POST);
		if($data)
		{
			redirect("user/products/".$_POST['status']."/".$_POST['sub_category_id']."/?msg=Edited Product");
		}
		else
		{
			redirect("user/products/".$_POST['status']."/".$_POST['sub_category_id']."/?error=1&msg=Error occured while Editing Product");
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
			redirect("user/blog/?msg=Edited Blog Post");
		}
		else
		{
			redirect("user/blog/?error=1&msg=Error occured while Editing Blog Post");
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
			redirect("user/pages/?msg=Edited Page");
		}
		else
		{
			redirect("user/pages/?error=1&msg=Error occured while Editing Page");
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
			redirect("user/setting/?msg=Edited Setting");
		}
		else
		{
			redirect("user/setting/?error=1&msg=Error occured while Editing Setting");
		}
	}
	

	/**********************************************
	*	starting delete functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo 	
	************************************************/
	public function delete_product()
	{
		$user = $this->check_login();
		$product = $this->model->get_product_byid($_GET['id']);
		$this->db->where('product_id', $_GET['id']);
		$resp = $this->db->delete('product');
		if($resp)
		{
			unlink('uploads/'.$product['image']);
			$photos = $this->model->get_photos($_GET['id']);
			foreach ($photos as $key => $photo) {
				unlink('uploads/'.$photo['image']);
			}
			$this->db->where('product_id',$_GET['id']);
			$this->db->delete('photo');
			redirect("user/products/".$product['status']."/".$product['sub_category_id']."?msg=Product has Deleted");
		}
		else
		{
			redirect("admin/products/all/?error=1&msg=Product has failed to delete. Try Again!");
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
			redirect("user/sliders/?msg=Slider has Deleted");
		}
		else
		{
			redirect("user/sliders/?error=1&msg=Slider has failed to delete. Try Again!");
		}
	}
	public function delete_blog()
	{
		$user = $this->check_login();
		$this->db->where('blog_id', $_GET['id']);
		$resp = $this->db->delete('blog');
		if($resp)
		{
			redirect("user/blog/?msg=News has Deleted");
		}
		else
		{
			redirect("user/blog/?error=1&msg=News has failed to delete. Try Again!");
		}
	}
	public function delete_review()
	{
		$user = $this->check_login();
		$this->db->where('review_id', $_GET['id']);
		$resp = $this->db->delete('review');
		if($resp)
		{
			redirect("user/reviews/?msg=Testimonial has Deleted");
		}
		else
		{
			redirect("user/reviews/?error=1&msg=Testimonial has failed to delete. Try Again!");
		}
	}
	public function delete_form()
	{
		$user = $this->check_login();
		$this->db->where('contact_form_id', $_GET['id']);
		$resp = $this->db->delete('contact_form');
		if($resp)
		{
			redirect("user/contact-forms/?msg=Contact Form has Deleted");
		}
		else
		{
			redirect("user/contact-forms/?error=1&msg=Contact Form has failed to delete. Try Again!");
		}
	}
	public function delete_newsletter()
	{
		$user = $this->check_login();
		$this->db->where('newsletter_id', $_GET['id']);
		$resp = $this->db->delete('newsletter');
		if($resp)
		{
			redirect("user/newsletters/?msg=Email has Deleted");
		}
		else
		{
			redirect("user/newsletters/?error=1&msg=Email has failed to delete. Try Again!");
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
			redirect('user/logout');
		}
	}
	public function post_product_photos_ajax($productId)
	{
		$user = $this->check_login();
		$post['product_id'] = $productId;
		if ($_FILES){
			for ($i=0; $i < count($_FILES); $i++) { 
				$config['upload_path'] = 'uploads/';
	        	$config['allowed_types'] = 'gif|jpg|png|PNG|JPEG|JPG';
	        	$config['encrypt_name'] = TRUE;
	        	$ext = pathinfo($_FILES['img'.$i]['name'], PATHINFO_EXTENSION);
				$new_name = md5(time().$_FILES['img'.$i]['name']).'.'.$ext;
				$config['file_name'] = $new_name;

	        	$this->load->library('upload', $config);
	        	if ($this->upload->do_upload('img'.$i))
	        	{
		        	$post['image'] = $this->upload->data()['file_name'];
		        	$this->db->insert('photo',$post);
	        	}
			}
			$resp = $this->model->get_photos($productId);
			if ($resp) {
				$html = '';
				foreach ($resp as $key => $q) {
					$html .= '<tr>
                        <td><img src="'.UPLOADS.$q['image'].'" width="300"></td>
                        <td><a href="javascript://" class="on-default remove-row delete-pro-photo" data-id="'.$q['photo_id'].'"><i class="icon md-delete" aria-hidden="true"></i></a></td>
                    </tr>';
				}
				echo json_encode(array("status"=>true,"data"=>$html));
			}
			else {
				echo json_encode(array("status"=>false,"data"=>'Images not uploaded, please try again or reload your webpage or check your internet connection'));
			}
		}
		else{
			redirect('logout');
		}
	}
	/**
	*

	@AJAX
		
	*
	*/
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
	public function get_pro_photos()
	{
		$user = $this->check_login();
		$resp = $this->model->get_photos($_POST['id']);
		$html = '';
		foreach ($resp as $key => $q) {
			$html .= '<tr>
                <td><img src="'.UPLOADS.$q['image'].'" width="300"></td>
                <td><a href="javascript://" class="on-default remove-row delete-pro-photo" data-id="'.$q['photo_id'].'"><i class="icon md-delete" aria-hidden="true"></i></a></td>
            </tr>';
		}
		echo json_encode(array("status"=>true,"data"=>$html));
	}
	public function delete_pro_photo_ajax()
	{
		$user = $this->check_login();
		$photo = $this->model->get_row("SELECT `image` FROM `photo` WHERE `photo_id` = '".$_POST['id']."';");
		$this->db->where('photo_id', $_POST['id']);
		$resp = $this->db->delete('photo');
		if($resp)
		{
			unlink('uploads/'.$photo['image']);
			echo json_encode(array("status"=>true,"msg"=>"true"));
		}
		else
		{
			echo json_encode(array("status"=>false,"msg"=>"false"));
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
	/**
	* 
	* 
	* 
	*	PRODUCT IMAGES 
	* 
	* 
	**/
	public function change_order_status()
	{
		$user = $this->check_login();
		if ($_POST)
		{
			if ($_POST['status'] == 'reject') {
				$res = $this->model->get_order_detail_byid($_POST['id']);
				var_dump($res);
				die;
			}
			$record = $this->db->update("order_detail", array("status"=>$_POST['status']), array("order_detail_id"=>$_POST['id']));
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
}


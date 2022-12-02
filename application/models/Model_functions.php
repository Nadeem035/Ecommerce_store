<?php
class Model_functions extends CI_Model {

	public function get_results($sql){
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0)
		{
			return $res->result_array();
		}
		else
		{
			return false;
		}
	}
	public function get_row($sql){
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0)
		{
			$resp = $res->result_array();
			return $resp[0];
		}
		else
		{
			return false;
		}
	}
	public function check_email($email = '', $type = '')
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			if(is_string($email))
			{
				return (bool)$this->get_row("SELECT * FROM `$type` WHERE `email` = '$email' LIMIT 1");
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}
	public function check_email_phone($phone = '', $email = '')
	{
		return (bool)$this->get_row("SELECT * FROM `customer` WHERE `email` = '$email' OR `phone` = '$phone' LIMIT 1");
	}
	
	public function login($username, $password, $check = FALSE)
	{
		$username = $this->db->escape(strtolower($username));
		if(!$check){$password = md5($this->db->escape($password));}
		return $this->db->get_row("SELECT * FROM `user` WHERE `username` = \"$username\" AND `password` = \"$password\";");
	}
	public function setting($id)
	{
		return $this->get_row("SELECT * FROM `setting` WHERE `setting_id` = '$id';");
	}

	/**
	*
	*
	*	@CATEGORIES
	*
	*
	*/
	public function super_cats($status)
	{
		if ($status == 'all') {
			return $this->get_results("SELECT * FROM `super_category` ORDER BY `title` ASC;");
		}
		else{
			return $this->get_results("SELECT * FROM `super_category` WHERE `status` = '$status' ORDER BY `title` ASC;");
		}
	}
	public function get_super_cat_byid($id)
	{
		return $this->get_row("SELECT * FROM `super_category` WHERE `super_category_id` = '$id';");
	}
	public function get_cat_byslug($slug)
	{
		return $this->get_row("SELECT * FROM `super_category` WHERE `slug` = '$slug';");
	}
	public function get_cat_by_catslug($slug)
	{
		return $this->get_row("SELECT * FROM `category` WHERE `slug` = '$slug';");
	}
	public function cats($super, $status)
	{
		$where = 'WHERE 1=1';
		if ($super > 0) {
			$where .= " AND c.parent = '".$super."'";
		}
		if ($status != 'all') {
			$where .= " AND c.status = '".$status."'";
		}
		return $this->get_results("
			SELECT c.*, s.title AS superCatTitle 
			FROM `category` AS c 
			INNER JOIN `super_category` AS s ON s.super_category_id = c.parent 
			$where 
			ORDER BY c.title ASC
		;");
	}
	public function get_cat_byid($id)
	{
		return $this->get_row("
			SELECT c.*, s.title AS superCatTitle 
			FROM `category` AS c 
			INNER JOIN `super_category` AS s ON s.super_category_id = c.parent 
			WHERE c.category_id = '$id' 
			ORDER BY c.title ASC
		;");
	}
	public function check_cat_filter_option($cat_id, $type)
	{
		return $this->get_row("SELECT `$type` AS `type` FROM `category` WHERE `$type` = 'yes';");
	}
	public function get_sub_cat_by_subcat_slug($slug)
	{
		return $this->get_row("SELECT * FROM `sub_category` WHERE `slug` = '$slug';");
	}
	public function get_sub_cat_by_subcat_id($id)
	{
		return $this->get_row("SELECT * FROM `sub_category` WHERE `sub_category_id` = '$id';");
	}
	public function sub_cats($cat, $status)
	{
		$where = 'WHERE 1=1';
		if ($cat > 0) {
			$where .= " AND sc.parent = '".$cat."'";
		}
		if ($status != 'all') {
			$where .= " AND sc.status = '".$status."'";
		}
		return $this->get_results("
			SELECT sc.*, c.title AS catTitle 
			FROM `sub_category` AS sc 
			INNER JOIN `category` AS c ON c.category_id = sc.parent 
			$where 
			ORDER BY c.title ASC
		;");
	}
	public function get_all_sub_cats()
	{
		return $this->get_results("SELECT `sub_category_id`,`title`,`status` FROM `sub_category` ORDER BY `title` ASC;");
	}
	public function get_sub_cat_byid($id)
	{
		return $this->get_row("
			SELECT sc.*, c.size, c.color, c.title AS catTitle, s.title AS superCatTitle 
			FROM `sub_category` AS sc 
			INNER JOIN `category` AS c ON sc.parent = c.category_id 
			INNER JOIN `super_category` AS s ON s.super_category_id = sc.super_category_id 
			WHERE sc.sub_category_id = '$id' 
			ORDER BY sc.title ASC
		;");
	}
	public function sub_category_home()
	{
		return $this->get_results("SELECT `sub_category_id`, `title`, `slug`, `home_ad`  FROM `sub_category` WHERE `show_home` = 'yes' AND `status` = 'active' ORDER BY `sub_category_id` ASC;");
	}

	public function get_user_cats($status)
	{
		$where = 'WHERE 1=1';
		if ($status != 'all') {
			$where .= " AND sc.status = ".$status;
		}
		return $this->get_results("
			SELECT sc.*, c.title AS catTitle, c.size, c.color, s.title AS superCat 
			FROM `sub_category` AS sc 
			INNER JOIN `category` AS c ON c.category_id = sc.parent 
			INNER JOIN `super_category` AS s ON s.super_category_id = c.parent 
			$where 
			ORDER BY c.title ASC
		;");
	}
	public function get_user_cats_2($cats,$status)
	{
		$where = "WHERE sc.sub_category_id IN(".$cats.") ";
		if ($status != 'all') {
			$where .= " AND sc.status = ".$status;
		}
		return $this->get_results("
			SELECT sc.*, c.title AS catTitle, c.size, c.color, s.title AS superCat 
			FROM `sub_category` AS sc 
			INNER JOIN `category` AS c ON c.category_id = sc.parent 
			INNER JOIN `super_category` AS s ON s.super_category_id = c.parent 
			$where 
			ORDER BY c.title ASC
		;");
	}

	/*
	*
	* 
	* 
	*	FILTERS
	* 
	* 
	* 
	*/
	public function get_sizes($catID)
	{
		return $this->get_results("SELECT `size_id`,`name`,`full_name` FROM `size` WHERE `category_id` = '$catID';");
	}
	public function get_colors($catID)
	{
		return $this->get_results("SELECT `color_id`,`name`,`full_name` FROM `color` WHERE `category_id` = '$catID';");
	}
	public function get_size_byid($sizeID)
	{
		return $this->get_row("SELECT `size_id`,`name`,`full_name` FROM `size` WHERE `size_id` = '$sizeID';");
	}
	public function get_color_byid($colorID)
	{
		return $this->get_row("SELECT `color_id`,`name`,`full_name` FROM `color` WHERE `color_id` = '$colorID';");
	}
	/*
	*
	* 
	* 
	*	PRODUCTS
	* 
	* 
	* 
	*/
	public function products($status,$cat,$user)
	{
		$where = 'WHERE 1=1';
		if ($status != 'all') {
			$where .= " AND `status` = '".$status."'";
		}
		return $this->get_results("SELECT * FROM `product` $where AND `sub_category_id` = '$cat' AND `user_id` = '$user' ORDER BY `product_id` DESC;");
	}
	public function get_products_by_subcat_id($cat)
	{
		return $this->get_results("SELECT * FROM `product` WHERE `status` = 'active' AND `sub_category_id` = '$cat' ORDER BY `product_id` DESC;");
	}
	public function get_products_by_subcat_id_expact($cat, $p_id)
	{
		return $this->get_results("SELECT * FROM `product` WHERE `status` = 'active' AND `sub_category_id` = '$cat' AND `product_id` != '$p_id' ORDER BY `product_id` DESC LIMIT 8;");
	}
	public function get_product_byid($id)
	{
		return $this->get_row("SELECT * FROM `product` WHERE `product_id` = '$id';");
	}
	public function get_product_byslug($slug)
	{
		return $this->get_row("SELECT * FROM `product` WHERE `slug` = '$slug';");
	}
	public function get_photos($productId)
	{
		return $this->get_results("SELECT * FROM `photo` WHERE `product_id` = '$productId' ORDER BY `photo_id` ASC;");
	}
	public function feature_products_home()
	{
		return $this->get_results("SELECT * FROM `product` WHERE `featured` = 'yes' AND `status` = 'active' ORDER BY `product_id` ASC LIMIT 8;");
	}
	public function new_products_home()
	{
		return $this->get_results("SELECT * FROM `product` WHERE `new` = 'yes' AND `status` = 'active' ORDER BY `product_id` ASC LIMIT 8;");
	}	
	public function top_products_home()
	{
		return $this->get_results("SELECT * FROM `product` WHERE `new` = 'yes' AND `status` = 'active' ORDER BY `product_id` ASC LIMIT 8;");
	}
	/*
	*
	* 
	* 
	*	USERS
	* 
	* 
	* 
	*/
	public function users($status)
	{
		$where = 'WHERE 1=1';
		if ($status != 'all') {
			$where .= " AND `status` = '".$status."'";
		}
		return $this->get_results("SELECT * FROM `user` $where ORDER BY `user_id` ASC;");
	}
	public function get_user_byid($id)
	{
		return $this->get_row("SELECT * FROM `user` WHERE `user_id` = '$id';");
	}

	public function pages()
	{
		return $this->get_results("SELECT * FROM `page` ORDER BY `title` ASC;");
	}
	public function get_page_byid($id)
	{
		return $this->get_row("SELECT * FROM `page` WHERE `page_id` = '$id';");
	}
	public function slider()
	{
		return $this->get_results("SELECT * FROM `slider` ORDER BY `slider_id` ASC;");
	}
	public function reviews()
	{
		return $this->get_results("SELECT * FROM `review` ORDER BY `name` ASC;");
	}
	public function get_review_byid($id)
	{
		return $this->get_row("SELECT * FROM `review` WHERE `review_id` = '$id';");
	}
	public function contact_form($status)
	{
		if ($status == 'all') {
			return $this->get_results("SELECT * FROM `contact_form` ORDER BY `at` DESC;");
		}
		else {
			return $this->get_results("SELECT * FROM `contact_form` WHERE `status` = '$status' ORDER BY `at` DESC;");
		}
	}
	public function newsletters()
	{
		return $this->get_results("SELECT * FROM `newsletter` ORDER BY `at` DESC;");
	}
	public function blog()
	{
		return $this->get_results("SELECT * FROM `blog` ORDER BY `updated_at` DESC;");
	}
	public function get_blog_byid($id)
	{
		return $this->get_row("SELECT * FROM `blog` WHERE `blog_id` = '$id';");
	}
	public function get_blog_by_slug($slug)
	{
		return $this->get_row("SELECT * FROM `blog` WHERE `slug` = '$slug';");
	}
	/*-------- ADs*/
	public function ads()
	{
		return $this->get_results("SELECT * FROM `ad` ORDER BY `order` ASC;");
	}
	/**
	* 
	* 
	* @WAREHOUSES
	* 
	* 
	* **/
	public function warehouses($status)
	{
		$where = 'WHERE 1=1';
		if ($status != 'all') {
			$where .= " AND `status` = '".$status."'";
		}
		return $this->get_results("SELECT * FROM `warehouse` $where ORDER BY `warehouse_id` ASC;");
	}
	public function get_warehouse_byid($id)
	{
		return $this->get_row("SELECT * FROM `warehouse` WHERE `warehouse_id` = '$id';");
	}
	/**
	* 
	* 
	* @SUPPLIERS
	* 
	* 
	* **/
	public function suppliers($status)
	{
		$where = 'WHERE 1=1';
		if ($status != 'all') {
			$where .= " AND `status` = '".$status."'";
		}
		return $this->get_results("SELECT * FROM `supplier` $where ORDER BY `supplier_id` ASC;");
	}
	public function get_supplier_byid($id)
	{
		return $this->get_row("SELECT * FROM `supplier` WHERE `supplier_id` = '$id';");
	}
	public function supply()
	{
		return $this->get_results("
			SELECT supply.*, s.company, p.title AS 'product' 
			FROM `supply` AS supply 
			INNER JOIN `supplier` AS s ON supply.supplier_id = s.supplier_id 
			INNER JOIN `product` AS p ON supply.product_id = p.product_id 
			ORDER BY `at` DESC;
		;");
	}





	// ADD TO CART
	public function single_product_html($q, $photos)
	{
		$html = '';
		    $html = '<div class="row gutter-lg">
		            <div class="col-md-6 mb-4 mb-md-0">
		                <div class="product-gallery product-gallery-sticky">
		                    <div class="swiper-container product-single-swiper swiper-theme nav-inner">
		                        <div class="swiper-wrapper row cols-1 gutter-no">
		                        	<div class="swiper-slide">
                                        <figure class="product-image">
                                            <img src="'.UPLOADS.$q['image'].'"
                                                data-zoom-image="'.UPLOADS.$q['image'].'"
                                                alt="'.$q['title'].'" width="800" height="900">
                                        </figure>
                                    </div>';
                                    foreach ($photos as $key => $photo){
                                        $html .='<div class="swiper-slide">
	                                            <figure class="product-image">
	                                                <img src="'.UPLOADS.$photo['image'].'"
	                                                    data-zoom-image="'.UPLOADS.$photo['image'].'"
	                                                    alt="'.$q['title'].'" width="800" height="900">
	                                            </figure>
	                                        </div>';
                                    }
		                        $html .='</div>
		                        <button class="swiper-button-next"></button>
		                        <button class="swiper-button-prev"></button>
		                    </div>
		                    <div class="product-thumbs-wrap swiper-container" 
		                    data-swiper-options="{
		                        "navigation": {
		                            "nextEl": ".swiper-button-next",
		                            "prevEl": ".swiper-button-prev"
		                        }
	                    	}">
		                        <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
		                            <div class="product-thumb swiper-slide">
                                        <img src="'.UPLOADS.$q['image'].'"
                                            alt="'.$q['title'].'" width="800" height="900">
                                    </div>';
                                    if ($photos){
                                        foreach ($photos as $key => $photo){
                                            $html .='<div class="product-thumb swiper-slide">
                                                <img src="'.UPLOADS.$photo['image'].'"
                                                    alt="'.$q['title'].'" width="800" height="900">
                                            </div>';
                                        }
                                    }
		                        $html .='</div>
		                        <button class="swiper-button-next"></button>
		                        <button class="swiper-button-prev"></button>
		                    </div>
		                </div>
		            </div>
		            <div class="col-md-6 overflow-hidden p-relative">
		                <div class="product-details scrollable pl-0">
		                    <h2 class="product-title">'.$q['title'].'</h2>
		                    <div class="product-bm-wrapper">
		                        <div class="product-categories">
	                                Category:
	                                <span class="product-category">
	                                    <a href="'.BASEURL.'explore/'.$sub_cat['title'].'">'.$sub_cat['title'].'</a>
	                                </span>
	                            </div>
		                    </div>

		                    <hr class="product-divider">

		                    <div class="product-price">';
		                    	if ($q['discount'] > 0){
                                    $html .='<ins class="new-price">$'.$q['price'] - $q['discount'].'</ins>
                                    <del class="old-price">$'.$q['price'].'</del>';
		                    	}else{
                                    $html .='<ins class="new-price">$'.$q['price'].'</ins>';

		                    	}
		                    $html .='</div>

		                    <div class="product-short-desc">
		                        '.$q['short_desc'].'
		                    </div>

		                    <hr class="product-divider">';

		                    if ($q['colors']){

                                $html .='<div class="product-form product-variation-form product-size-swatch">
                                    <label>Color:</label>
                                    <div class="flex-wrap d-flex align-items-center product-variations">';
                                        $colors = explode(',', $q['colors']); 
                                        foreach ($colors as $key => $color){
                                            $c = $this->model->get_color_byid($color);
                                            if ($key == 0){
                                                $html .='<div>   
                                                    <input class="checkbox-tools" type="radio" name="color" id="'.$c['name'].'-'.$c['color_id'].'" value="'.$c['color_id'].'" checked required>
                                                    <label for="'.$c['name'].'-'.$c['color_id'].'">'.$c['full_name'].'</label>
                                                </div>';
                                            }else{
                                                $html .='<div>   
                                                    <input class="checkbox-tools" type="radio" name="color" id="'.$c['name'].'-'.$c['color_id'].'" value="'.$c['color_id'].'" required>
                                                    <label for="'.$c['name'].'-'.$c['color_id'].'">'.$c['full_name'].'</label>
                                                </div>';
                                            }
                                        }
                                    $html .='</div>
                                </div>';
		                    }
                            if ($q['sizes']){

                                $html .='<div class="product-form product-variation-form product-size-swatch mb-4">
                                    <label class="mb-1">Size:</label>
                                    <div class="flex-wrap d-flex align-items-center product-variations">';
                                        $sizes = explode(',', $q['sizes']); 
                                        foreach ($sizes as $key => $size){
                                            $s = $this->model->get_size_byid($size);
                                            if ($key == 0){
                                                $html .='<div>   
	                                                <input class="checkbox-tools" type="radio" name="size" id="'.$s['name'].'-'.$s['size_id'].'" value="'.$s['size_id'].'" checked required>
	                                                <label for="'.$s['name'].'-'.$s['size_id'].'">'.$s['full_name'].'</label>
	                                            </div>';
                                            }else{
                                                $html .='<div>   
                                                    <input class="checkbox-tools" type="radio" name="size" id="'.$s['name'].'-'.$s['size_id'].'" value="'.$s['size_id'].'" required>
                                                    <label for="'.$s['name'].'-'.$s['size_id'].'">'.$s['full_name'].'</label>
                                                </div>';
                                            }
                                        }
                                    $html .='</div>
                                </div>';
                            }

		                    $html .='
		                    <br>
		                    <div class="product-form">
		                        <div class="product-qty-form">
		                            <div class="input-group">
		                                <input class="quantity form-control" type="number" min="1" max="10000000">
		                                <button class="quantity-plus w-icon-plus"></button>
		                                <button class="quantity-minus w-icon-minus"></button>
		                            </div>
		                        </div>
		                        <button class="btn btn-primary btn-cart">
		                            <i class="w-icon-cart"></i>
		                            <span>Add to Cart</span>
		                        </button>
		                    </div>

		                </div>
		            </div>
		        </div>';
		return $html;
	}
	public function add_item_to_list($cart)
	{
		return 	'<div class="product product-cart single-cart-box cart-sidebar-item-'.$cart['item_number'].'"  data-target-item="'.$cart['item_number'].'">
		            <input type="hidden" id="final-price-'.$cart['item_number'].'" name="final_price" value="'.$cart['gross_price'].'">
		            <input type="hidden" id="price-'.$cart['item_number'].'" name="price" value="'.$cart['price'].'">
		            <div class="product-detail">
		                <a href="'.BASEURL."product/".$cart['slug'].'" class="product-name">'.$cart["name"].'</a>
		                <div class="price-box">
		                    <span class="product-quantity">'.$cart['qty'].'</span>
		                    <span class="product-price">$ '.$cart["gross_price"].'</span>
		                </div>
		            </div>
		            <figure class="product-media">
		                <a href="'.BASEURL."product/".$cart['slug'].'">
		                    <img src="'.UPLOADS.$cart["main_img"].'" alt="product" height="84"
		                        width="94" />
		                </a>
		            </figure>
		            <button id="item-remove-'.$cart['item_number'].'" data-item-remove="'.$cart['item_number'].'" title="Remove This Item" class="btn btn-link btn-close" aria-label="button">
		                <i class="fas fa-times"></i>
		            </button>
		        </div>';
	}

	// ORDER
	public function get_orders($arg = 'all')
	{
		if ($arg == 'all') {
			return $this->model->get_results("SELECT * FROM `order` ORDER BY order_id DESC;");
		}else{
			return $this->model->get_results("SELECT * FROM `order` WHERE `status` = '$arg' ORDER BY order_id DESC;");
		}
	}
	public function get_user_orders($id, $arg = 'all')
	{
		if ($arg == 'all') {
			return $this->model->get_results("
				SELECT od.*,p.slug,o.at,s.name AS size,c.name AS color FROM `order` AS o 
				INNER JOIN order_detail AS od ON o.order_id = od.order_id 
				INNER JOIN product AS p ON p.product_id = od.product_id 
				LEFT JOIN size AS s ON s.size_id = od.size 
				LEFT JOIN color AS c ON c.color_id = od.color 
				WHERE p.user_id = '$id' 
				GROUP BY od.order_detail_id
				ORDER BY od.order_detail_id DESC;
			");
		}else{
			return $this->model->get_results("
				SELECT od.*,p.slug,o.at,s.name AS size,c.name AS color FROM `order` AS o 
				INNER JOIN order_detail AS od ON o.order_id = od.order_id 
				INNER JOIN product AS p ON p.product_id = od.product_id 
				LEFT JOIN size AS s ON s.size_id = od.size 
				LEFT JOIN color AS c ON c.color_id = od.color 
				WHERE p.user_id = '$id' AND od.status = '$arg' 
				GROUP BY od.order_detail_id
				ORDER BY od.order_detail_id DESC;
			");
		}
	}
	public function get_order_byid($id)
	{
		return $this->model->get_row("SELECT * FROM `order` WHERE `order_id` = '$id';");
	}
	public function get_order_by_customerID($id, $arg = '')
	{
		if ($arg == '') {
			return $this->model->get_results("SELECT * FROM `order` WHERE `customer_id` = '$id' ORDER BY order_id DESC;");
		}else{
			return $this->model->get_results("SELECT * FROM `order` WHERE `customer_id` = '$id' AND `status` = '$arg' ORDER BY order_id DESC;");
		}
	}

	public function get_order_detail_byid($id)
	{
		return $this->model->get_row("SELECT * FROM `order_detail` WHERE `order_detail_id` = '$id';");
	}
	public function get_order_detail($id)
	{
		return $this->model->get_results("SELECT o.*, p.slug FROM order_detail AS o INNER JOIN product AS p ON p.product_id = o.product_id  WHERE o.order_id = '$id' ORDER BY o.order_detail_id DESC;");
	}


}
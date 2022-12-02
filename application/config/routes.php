<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'hildes';
$controller_exceptions = array('admin','user');

$route['index'] = 'Hildes/index';

$route['signup'] = 'Hildes/signup';
$route['login'] = 'Hildes/login';

$route['process-signup'] = 'Hildes/process_signup';
$route['process-login'] = 'Hildes/process_login';
$route['logout'] = 'Hildes/logout';
$route['my-account'] = 'Hildes/my_account';
$route['change-account-password'] = 'Hildes/change_account_password';
$route['change-account-setting'] = 'Hildes/change_account_setting';


$route['quick-view'] = 'Hildes/quick_view';
$route['add-to-cart'] = 'Hildes/add_to_cart';
$route['ajax-item-remove'] = 'Hildes/ajax_item_remove';
$route['ajax-edit-qty'] = 'Hildes/ajax_edit_qty';
$route['clear-cart'] = 'Hildes/clear_cart';

$route['cart'] = 'Hildes/cart';
$route['checkout'] = 'Hildes/checkout';
$route['submit-order'] = 'Hildes/submit_order';
$route["order/(.*)"] = 'Hildes/order/$1';



$route['about-us'] = 'Hildes/about_us';
$route['faq'] = 'Hildes/faq';
$route['help'] = 'Hildes/help';
$route['privacy-policy'] = 'Hildes/privacy_policy';
$route['return-policy'] = 'Hildes/return_policy';
$route['terms-and-conditions'] = 'Hildes/terms_and_conditions';

// SHOP LISTING WITH SUPER CAT TO SUB CAT
$route['shop'] = 'Hildes/shop';
$route['main/(.*)'] = 'Hildes/main/$1';
$route['explore/(.*)'] = 'Hildes/explore/$1';

// SHOP LISTING WITH SUPER CAT TO SUB CAT

$route['listing/(.*)'] = 'Hildes/listing/$1';

$route['product/(.*)'] = 'Hildes/product/$1';

$route['contact-us'] = 'Hildes/contact_us';
$route['submit-contact-form'] = 'Hildes/submit_contact_form';
$route['submit-newsletter-form'] = 'Hildes/submit_newsletter_form';

$route['blog'] = 'Hildes/blog';
$route["blog/(.*)"] = 'Hildes/blog_detail/$1';



$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

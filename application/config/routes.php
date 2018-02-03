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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['lienhe.html'] 			= 'welcome/contact';
$route['insertContact'] 		= 'welcome/insertContact';

$route['tintuc.html'] 			= 'news';
$route['tintuc/(:num)'] 		= 'news/tinTucById/$1';
$route['tintucAdmin.html'] 		= 'news/tintucAdmin';
$route['addNews'] 				= 'news/themTintuc';
$route['editNews'] 				= 'news/suaTintuc';
$route['deleteNews'] 			= 'news/xoaTintuc';


$route['benhvien.html'] 		= 'benhvien';
$route['benhvien/(:num)'] 		= 'benhvien/benhVienById/$1';


$route['bacsi.html'] 			= 'BacSi';
$route['bacsi/(:num)'] 			= 'BacSi/bacSiById/$1';

$route['thuoc.html'] 			= 'thuoc';
$route['thuocByIdLoai/(:num)'] 	= 'thuoc/thuocByIdLoai/$1';
$route['thuoc/(:num)'] 			= 'thuoc/thuocById/$1';
$route['chitietthuoc/(:num)'] 	= 'thuoc/thongTinThuocById/$1';

$route['benh.html'] 			= 'benh';
$route['benhByIdLoai'] 			= 'benh/benhByIdLoai';
$route['benh/(:num)'] 			= 'benh/benhById/$1';

//login
$route['pageLogin'] 		= 'Login';
$route['pageRegister'] 		= 'Login/pageRegister';
$route['loginUser'] 		= 'Login/loginUser';
$route['logout'] 			= 'Login/logout';
$route['account'] 			= 'Login/account';
$route['editUser'] 			= 'Login/editUser';
$route['deleteUser'] 		= 'Login/deleteUser';
$route['insertUser'] 		= 'Login/insertUser';
$route['forgotPassword'] 	= 'Login/forgotPassword';
$route['activeUser/(:any)/(:any)'] 		= 'Login/activeUser/$1/$2';
$route['checkPass'] 		= 'Login/checkPassword';
$route['editPass'] 			= 'Login/editPassword';

$route['loginFb'] 			= 'Login/LoginFacebook';
$route['callbackFB'] 		= 'Login/callback';

$route['loginGoogle'] 		= 'Login/LoginGoogle';
$route['gcallback'] 		= 'Login/gcallback';


//page hồ sơ
$route['account.html'] 		= 'Hoso';
$route['hoso.html'] 		= 'Hoso/pageHoso';
$route['form.html/(:num)'] 	= 'Hoso/formChiso/$1';
$route['thongke.html'] 			= 'Hoso/thongke';
$route['pageChiSo.html'] 	= 'Hoso/pageChiSo';
$route['admin.html'] 		= 'Hoso/pageAdmin';
$route['chisoAdmin.html'] 	= 'Hoso/formChisoAdmin';
$route['loadHoso'] 			= 'Hoso/loadHoso';
$route['locChiSo'] 			= 'Hoso/locChiso';


$route['addHoso'] 			= 'Hoso/addHoso';
$route['addFile'] 			= 'Hoso/addFile';
$route['loadImage'] 		= 'Hoso/loadImage';
$route['addChiSo'] 			= 'Hoso/addChiSo';

$route['loadThongbao'] 		= 'Hoso/loadThongbao';
$route['activeFile'] 		= 'Hoso/activeFile';

$route['crawl.html'] 		= 'Crawl';

$route['load_data'] 		= 'Welcome/loadData';
$route['timkiem.html'] 		= 'Welcome/pageSearch';
$route['timkiemchitiet.html'] 		= 'Welcome/pageSearchChitiet';
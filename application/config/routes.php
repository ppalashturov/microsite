<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = "site";
$route['admin'] = "admin/index";
$route['login'] = "login";
$route['login/(:any)'] = "login/$1";
$route['dashboard'] = "dashboard";
$route['dashboard/(:any)'] = "dashboard/$1";
$route['admin/(:any)'] = "admin/$1";

$route['admin2'] = "admin2/index";
$route['login2'] = "login2";
$route['login2/(:any)'] = "login2/$1";
$route['dashboard2'] = "dashboard2";
$route['dashboard2/(:any)'] = "dashboard2/$1";
$route['admin2/(:any)'] = "admin2/$1";

$route['новини.html'] = "blog/index";
$route['контакт.html'] = "contact";
$route['новина-(:any).html'] = "blog/viewBlog/$1";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
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

$route['default_controller'] = "index";
$route['404_override'] = '';

/* == User == */
// Event
$route['user/(:any)/event'] = 'user/event/index/$1';
// Following
$route['user/(:any)/following'] = 'user/following/index/$1';
$route['user/(:any)/following/user'] = 'user/following/user/$1';
$route['user/(:any)/following/band'] = 'user/following/band/$1';
// Follower
$route['user/(:any)/follower'] = 'user/follower/index/$1';
// Index
$route['user/(:any)'] = 'user/event/index/$1';


//$route['user/(:any)/event'] = 'user/event/$1';
//$route['band'] = 'band/band';

// Band
// $route['band/create'] = 'band/band/create';
// $route['band/edit'] = 'band/band/edit';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
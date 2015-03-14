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

// Default comes like this and is followed heirarchacly from top to bottom, so if there are two similar options the first one will be followed
$route['default_controller'] = "welcome"; 	// what is shown when root is requested, www.thespecialmiami.com '/controller/welcome.php, class Welcome, func index()'
$route['404_override'] = ''; 				// what page is sent in the case of a 404 error, by default /application/errors/error_404.php is sent
// Default ends
*/
$route['default_controller'] = 'site';
$route['404_override'] = '';
// $route[':any'] = 'site/choice';

/*
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = "pages/view";
*/


/* End of file routes.php */
/* Location: ./application/config/routes.php */
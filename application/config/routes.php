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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/* SET ROUTERS */
$route['admin/add-employees'] = 'Admin/addEmployees';
$route['admin/employees-list'] = 'Admin/employeesList';
$route['admin/employees-details'] = 'Admin/showEmployeeInfo';
$route['employee-score-edit'] = 'Admin/showEmployeeScores';
$route['admin/add-departments'] = 'Admin/addDepartments';
$route['admin/departments-list'] = 'Admin/departmentsList';
$route['admin/add-designation'] = 'Admin/addDesignation';
$route['admin/designation-list'] = 'Admin/designationList';
$route['admin/add-employees-performance'] = 'Admin/addEmployeesPerformance';
$route['admin/employees-performance-result-list'] = 'Admin/employeesPerformanceResultList';
$route['admin/print-employee-details'] = 'Admin/printEmpDetails';

$route['home/index'] = 'Login/index';
$route['home/admin-login'] = 'Login/adminLogin';
$route['home/employee-login'] = 'Login/employeeLogin';

// employee controller
$route['employee/employee-details-page'] = 'Employee/empDetailsPage';
$route['employee/set-employees-performance'] = 'Employee/setEmpPerformance';
$route['employee/show-employees-performance'] = 'Employee/showEmpPerformance';
$route['employee/evaluated-employee-list'] = 'Employee/getEvaluatedEmployee';
$route['employee/re-evaluate-details'] = 'Employee/ReEvaluateForm';
$route['employee/check-update'] = 'Employee/checkAndUpdate';


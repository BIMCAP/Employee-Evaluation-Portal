<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	function __construct() {
        parent::__construct();
		if( ! $this->session->userdata('emp_login_id'))
		return redirect('Login/employeeLogin');
        $this->load->model('Login_model','lm');
        $this->load->model('Admin_model','am');
		$this->load->model('Employee_model','em');
		$this->load->library('pagination');
    }

	public function empLogout(){
		$this->session->unset_userdata('emp_login_id');
		return redirect('Login/employeeLogin');
	}

    public function index(){
       $empID = $this->session->userdata('emp_login_id');
       $data['empinfo'] = $this->em->getEmpInfo($empID);
       $this->load->view('employee/include/header');
       $this->load->view('employee/include/menu', $data);
       $this->load->view('employee/index', $data);
       $this->load->view('employee/include/footer');

   }

   public function empDetailsPage(){
    $empID = $this->session->userdata('emp_login_id');
    $menu['empinfo'] = $this->em->getEmpInfo($empID);

    $data['empdata'] = $this->am->getEmpDetails($empID);
    $data['departments'] = $this->am->getEmpDepartment();
    $data['empinfo'] = $this->am->getEmployeesPerformanceInfo($empID);

    $ManagerSignature = $this->am->getManagerSignature($empID);

    if($ManagerSignature){
        $data['signature_img'] = $this->am->getManagerSignature($empID);
    }else{
        $data['signature_img'] = 0;
    }

    $this->load->view('employee/include/header');
    $this->load->view('employee/include/menu', $menu);
    $this->load->view('employee/employee-details-page', $data);
    $this->load->view('employee/include/footer');
   }

   public function setEmpPerformance(){
        $empID = $this->session->userdata('emp_login_id');
        $menu['empinfo'] = $this->em->getEmpInfo($empID);

        $this->load->view('employee/include/header');
        $this->load->view('employee/include/menu', $menu);
        $this->load->view('employee/set-employees-performance');
        $this->load->view('employee/include/footer');
   }

   public function showEmpPerformance(){
        $empID = $this->session->userdata('emp_login_id');
        $menu['empinfo'] = $this->em->getEmpInfo($empID);

        $this->load->view('employee/include/header');
        $this->load->view('employee/include/menu', $menu);
        $this->load->view('employee/show-employees-performance');
        $this->load->view('employee/include/footer');
   }

}
?>
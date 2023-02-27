<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Login_model','lm');
    }
    
        public function index(){
            $this->load->view('home/include/header');
            $this->load->view('home/index');
            $this->load->view('home/include/footer');
        }


        public function adminLogin(){
            $this->load->view('home/include/header');
            $this->load->view('home/admin-login');
            $this->load->view('home/include/footer');
        }


    public function authLogin(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $loginId = $this->lm->checkauthLogin($username, $password);
        if($loginId){
            $this->session->set_userdata('login_id', $loginId);
            return redirect('Admin/index');
        }else{
            $this->session->set_flashdata('login_failed', 'Invalid Username/Password');
            return redirect('Login/adminLogin');
        }

    }

    // employee login

    public function employeeLogin(){
            $this->load->view('home/include/header');
            $this->load->view('home/employee-login');
            $this->load->view('home/include/footer');
    }

    public function empLoginAuth(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $empId = $this->lm->checkEmpAuthLogin($email, $password);

        if($empId){
            $this->session->set_userdata('emp_login_id', $empId);
            return redirect('Employee/index');
        }else{
            $this->session->set_flashdata('login_failed', 'Invalid Username/Password');
            return redirect('Login/employeeLogin');
        }

    }

}
?>
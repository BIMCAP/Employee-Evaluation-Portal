<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
		if( ! $this->session->userdata('login_id'))
		return redirect('Login/adminLogin');
        $this->load->model('Login_model','lm');
		$this->load->model('Admin_model','am');
		$this->load->library('pagination');
    }

	public function logout(){
		$this->session->unset_userdata('login_id');
		return redirect('Login/adminLogin');
	}

	public function index(){

	 	$data['emptotal'] = $this->am->getTotalEmp();
		$data['deptotal'] = $this->am->getTotalDepartment();
		$data['destotal'] = $this->am->getTotalDesignation();
		$data['performancetotal'] = $this->am->getTotalPerformance();

		$data['topper'] = $this->am->getTopPerformance();
		$data['lowper'] = $this->am->getLowPerformance();
		$data['empdata'] = $this->am->PerformanceResultDashboard();

		$data['grateful'] = $this->am->getGratefulPerformance();
		$data['good'] = $this->am->getGoodPerformance();
		$data['average'] = $this->am->getAveragePerformance();
		
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/index', $data);
		$this->load->view('admin/include/footer', $data);

	}
	

	/*--------------------------------------------------------*/


	/**********Add Employee Start **********/

	public function addEmployees(){

		$data['departments'] = $this->am->getEmpDepartment();
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/add-employees', $data);
		$this->load->view('admin/include/footer');
	}

	function fetchDepartmentDrop(){
		if($this->input->post('department_id')){
		 echo $this->am->fetchDepartmentList($this->input->post('department_id'));
		}
	}

	public function postEmployeeData(){

			$config = [
				'upload_path' => './upload',
				'allowed_type' => 'jpg|png|jpeg',
				'quality' => '50%',
				'width' => '1600',
				'height' => '800'
			];

			$data['employee_first_name'] = $this->input->post('employee_first_name');
			$data['employee_last_name'] = $this->input->post('employee_last_name');
			$data['employee_email'] = $this->input->post('employee_email');
			$data['employee_number'] = $this->input->post('employee_number');
			$data['employee_address'] = $this->input->post('employee_address');
			$data['employee_city'] = $this->input->post('employee_city');
			$data['employee_country'] = $this->input->post('employee_country');

			$data['employee_department'] = $this->input->post('employee_department');

			// if($this->input->post('employee_department')){
			// 	$dep['employee_department'] = $this->input->post('employee_department');
			// 	$data['employee_department'] = $this->am->getDepEmp($dep['employee_department']);
			// }

			$data['employee_designation'] = $this->input->post('employee_designation');
			$data['employee_doj'] = $this->input->post('employee_doj');
			$data['employee_dot'] = $this->input->post('employee_dot');

			$data['emp_password'] = $this->input->post('emp_password');
			$data['emp_level'] = $this->input->post('emp_level');

			$data['employee_status'] = $this->input->post('employee_status');

			if((!empty($_FILES['employee_image']['name']))){
				$check = uploadimgfile("employee_image",$folder="upload",$prefix="proimg_");
				$link  = $check['data']['name'];
				$data['employee_image'] = $link;
			}

			$this->load->library('upload', $config);
			$this->upload->do_upload();

			if($this->am->uploadEmpDetails($data)){
				$this->session->set_flashdata('emp_upload_success', 'Employee Uploaded Successfully!!!');
				redirect('Admin/employeesList');
			}else{
				$this->session->set_flashdata('emp_not_uploaded', 'Please Try Again!');
				redirect('Admin/addEmployees');
			}
	}

	public function employeesList(){
		$config=[
			'base_url' => base_url('Admin/employeesList'),
			'per_page' =>10,
			'total_rows' => $this->am->num_rows_employees(),
			'full_tag_open'=>"<ul class='pagination'>",
			'full_tag_close'=>"</ul>",
			'next_tag_open' =>"<li>",
			'next_tag_close' =>"</li>",
			'prev_tag_open' =>"<li>",
			'prev_tag_close' =>"</li>",
			'num_tag_open' =>"<li>",
			'num_tag_close' =>"<li>",
			'cur_tag_open' =>"<li class='active'><a>",
			'cur_tag_close' =>"</a></li>"
		  ];
	
		  $this->pagination->initialize($config);
		  $data['empdata'] = $this->am->employeesListData($config['per_page'],$this->uri->segment(3));

		// $data['departments'] = $this->am->getEmpDepartment();
		  $this->load->view('admin/include/header');
		  $this->load->view('admin/include/menu');
		  $this->load->view('admin/employees-list', $data);
		  $this->load->view('admin/include/footer');
	}

		public function deleteEmpData(){
			$id = $this->input->post('main_employee_id');
			$result = $this->am->deleteEmpDB($id);
			if($result){
				$this->session->set_flashdata('emp_delete_success', 'Employee Detail Deleted Successfully!!!');
				redirect('Admin/employeesList');
			}else{
				$this->session->set_flashdata('emp_not_uploaded', 'Please Try Again!');
				redirect('Admin/employeesList');
			}
		}


		public function editEmpData(){

			$data['employee_first_name'] = $this->input->post('employee_first_name');
			$data['employee_last_name'] = $this->input->post('employee_last_name');
			$data['employee_email'] = $this->input->post('employee_email');
			$data['employee_number'] = $this->input->post('employee_number');
			$data['employee_address'] = $this->input->post('employee_address');
			$data['employee_city'] = $this->input->post('employee_city');


			if($this->input->post('employee_country')){
				$data['employee_country'] = $this->input->post('employee_country');
			}else{
				$data['employee_country'] = $this->input->post('old_country');
			}
			
			if($this->input->post('employee_department')){
				$data['employee_department'] = $this->input->post('employee_department');
			}else{
				$data['employee_department'] = $this->input->post('old_department');
			}

			if($this->input->post('employee_designation')){
				$data['employee_designation'] = $this->input->post('employee_designation');
			}else{
				$data['employee_designation'] = $this->input->post('old_designation');
			}
			
			$data['employee_doj'] = $this->input->post('employee_doj');
			$data['employee_dot'] = $this->input->post('employee_dot');

			$empID = $this->input->post('main_employee_id');

			if(!empty($_FILES['employee_image']['name'])){

			$upload = $this->am->get_empImg_id($empID);

			if(file_exists($upload->employee_image)) {
					if(unlink($upload->employee_image)) {
						$check = uploadimgfile("employee_image",$folder="upload",$prefix="proimg_");
						$link = $check['data']['name'];
						$data['employee_image'] = $link;
					}
				}
			}
			
			if($this->am->updateEmpInfo($data, $empID)){
				$this->session->set_flashdata('emp_update_success', 'Employee Detail Updated Successfully!!!');
				return redirect('Admin/showEmployeeInfo/'.$empID);
			}else{
				$this->session->set_flashdata('emp_not_updated', 'Please Try Again!');
				return redirect('Admin/showEmployeeInfo/'.$empID);
			}
		}

		public function UpdateStatusEmp(){
			$empId = $this->input->post('main_employee_id');
			$employee_status = $this->input->post('employee_status');
		 	$res = $this->am->updateEMPStatus($employee_status, $empId);
			if($res){
				$this->session->set_flashdata('emp_update_status_success', 'Employee Status Updated Successfully!!!');
				return redirect('Admin/employeesList');
			}else{
				$this->session->set_flashdata('emp_update_status_not', 'Please Try Again!');
				return redirect('Admin/employeesList');
			}
		}

	
	/*********Employee Details Page ***********/

	    public function showEmployeeInfo($id){
			$data['empdata'] = $this->am->getEmpDetails($id);
			$data['departments'] = $this->am->getEmpDepartment();
			$data['empinfo'] = $this->am->getEmployeesPerformanceInfo($id);

			$ManagerSignature = $this->am->getManagerSignature($id);

			if($ManagerSignature){
				$data['signature_img'] = $this->am->getManagerSignature($id);
			}else{
				$data['signature_img'] = 0;
			}

			$this->load->view('admin/include/header');
			$this->load->view('admin/include/menu');
			$this->load->view('admin/employee-details', $data);
			$this->load->view('admin/include/footer');
		}



	/*********Update Employee Score Details Page ***********/


	public function showEmployeeScores($id){
		$data['empinfo'] = $this->am->getEmployeesPerformanceInfo($id);

		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/employee-score-edit', $data);
		$this->load->view('admin/include/footer');
	}

	public function submitEditEmpScore(){

		$empId = $this->input->post('main_employee_id');

		/* communication */
		$communication_data['employee_id'] = $this->input->post('main_employee_id');
		$communication_data['communication_proactively_asking'] = $this->input->post('communication_proactively_asking');
		$communication_data['communication_responds_to_messages'] = $this->input->post('communication_responds_to_messages');
		$communication_data['communication_proactively_informing'] = $this->input->post('communication_proactively_informing');
		$communication_data['communication_level_of_english'] = $this->input->post('communication_level_of_english');
		$communication_data['communication_team_client'] = $this->input->post('communication_team_client');
		$communication_data['communication_Informs_the_supervisor'] = $this->input->post('communication_Informs_the_supervisor');

		$communication_data['communication_comments'] = $this->input->post('communication_comments');

		$communicationTotal = $communication_data['communication_proactively_asking'] + $communication_data['communication_responds_to_messages'] + $communication_data['communication_proactively_informing'] + $communication_data['communication_level_of_english'] + $communication_data['communication_team_client'] + $communication_data['communication_Informs_the_supervisor']; 
		$communicationAvgTotal = $communicationTotal / 6;
		$communication_data['communication_emp_avg'] = number_format((float)$communicationAvgTotal, 2, '.', '');

		$this->am->updateEmployeeCommunication($communication_data, $empId);

		/* communication */

		// /* productivity */
		$productivity_data['employee_id'] = $this->input->post('main_employee_id');
		$productivity_data['productivity_speed_of_modelling'] = $this->input->post('productivity_speed_of_modelling');
		$productivity_data['productivity_absence_or_minimum'] = $this->input->post('productivity_absence_or_minimum');
		$productivity_data['productivity_timelines_and_deadlines'] = $this->input->post('productivity_timelines_and_deadlines');

		$productivity_data['productivity_comments'] = $this->input->post('productivity_comments');

		$productivityTotal = $productivity_data['productivity_speed_of_modelling'] + $productivity_data['productivity_absence_or_minimum'] + $productivity_data['productivity_timelines_and_deadlines']; 
		$productivityAvgTotal = $productivityTotal / 3;
		$productivity_data['productivity_emp_avg'] = number_format((float)$productivityAvgTotal, 2, '.', '');

		$this->am->updateEmployeeProductivity($productivity_data, $empId);

		// /* productivity */

		/* quality */
		$quality_data['employee_id'] = $this->input->post('main_employee_id');
		$quality_data['quality_attention_to_details'] = $this->input->post('quality_attention_to_details');
		$quality_data['quality_mistakes_requiring_correction'] = $this->input->post('quality_mistakes_requiring_correction');
		$quality_data['quality_meets_the_expectations'] = $this->input->post('quality_meets_the_expectations');
		$quality_data['quality_conducts_qa_qc'] = $this->input->post('quality_conducts_qa_qc');
		$quality_data['quality_follows_the_correct_workflow_set'] = $this->input->post('quality_follows_the_correct_workflow_set');

		$quality_data['quality_comments'] = $this->input->post('quality_comments');

		$qualityTotal = $quality_data['quality_attention_to_details'] + $quality_data['quality_mistakes_requiring_correction'] + $quality_data['quality_meets_the_expectations'] + $quality_data['quality_conducts_qa_qc'] + $quality_data['quality_follows_the_correct_workflow_set']; 
		$qualityAvgTotal = $qualityTotal / 5;
		$quality_data['quality_emp_avg'] = number_format((float)$productivityAvgTotal, 2, '.', '');

		$this->am->updateEmployeeQuality($quality_data, $empId);

		/* quality */

		/* knowledge */

		$knowledge_data['employee_id'] = $this->input->post('main_employee_id');
		$knowledge_data['knowledge_standards_and_portfolio'] = $this->input->post('knowledge_standards_and_portfolio');
		$knowledge_data['knowledge_bim_project_requirements'] = $this->input->post('knowledge_bim_project_requirements');
		$knowledge_data['knowledge_of_the_construction_industry'] = $this->input->post('knowledge_of_the_construction_industry');
		
		$knowledge_data['knowledge_comments'] = $this->input->post('knowledge_comments');

		$knowledgeTotal = $knowledge_data['knowledge_standards_and_portfolio'] + $knowledge_data['knowledge_bim_project_requirements'] + $knowledge_data['knowledge_of_the_construction_industry']; 
		$knowledgeAvgTotal = $knowledgeTotal / 3;
		$knowledge_data['knowledge_emp_avg'] = number_format((float)$knowledgeAvgTotal, 2, '.', '');

		$this->am->updateEmployeeKnowledge($knowledge_data, $empId);


		/* knowledge */

		/* software */

		$software_data['employee_id'] = $this->input->post('main_employee_id');
		$software_data['software_bitrix_tasks_and_leaves'] = $this->input->post('software_bitrix_tasks_and_leaves');
		$software_data['software_digital_tools_production_communication'] = $this->input->post('software_digital_tools_production_communication');
		
		$software_data['software_comments'] = $this->input->post('software_comments');

		$softwareTotal = $software_data['software_bitrix_tasks_and_leaves'] + $software_data['software_digital_tools_production_communication']; 
		$softwareAvgTotal = $softwareTotal / 2;
		$software_data['software_emp_avg'] = number_format((float)$softwareAvgTotal, 2, '.', '');

		$this->am->updateEmployeeSoftware($software_data, $empId);


		/* software */

		/* dependability */

		$dependability_data['employee_id'] = $this->input->post('main_employee_id');
		$dependability_data['dependability_handle_a_team'] = $this->input->post('dependability_handle_a_team');
		$dependability_data['dependability_handle_a_project'] = $this->input->post('dependability_handle_a_project');
		$dependability_data['dependability_the_set_deadlines'] = $this->input->post('dependability_the_set_deadlines');

		$dependability_data['dependability_comments'] = $this->input->post('dependability_comments');

		$dependabilityTotal = $dependability_data['dependability_handle_a_team'] + $dependability_data['dependability_handle_a_project'] + $dependability_data['dependability_the_set_deadlines']; 
		$dependabilityAvgTotal = $dependabilityTotal / 3;
		$dependability_data['dependability_emp_avg'] = number_format((float)$dependabilityAvgTotal, 2, '.', '');

		$this->am->updateEmployeeDependability($dependability_data, $empId);

		/* dependability */

		/* time management */

		$time_management_data['employee_id'] = $this->input->post('main_employee_id');
		$time_management_data['time_management_scheduled_work_shift'] = $this->input->post('time_management_scheduled_work_shift');
		$time_management_data['time_management_required_working_hours'] = $this->input->post('time_management_required_working_hours');
		$time_management_data['time_management_deadlinesclearly_with_your_teammates'] = $this->input->post('time_management_deadlinesclearly_with_your_teammates');

		$time_management_data['time_management_comments'] = $this->input->post('time_management_comments');

		$time_managementTotal = $time_management_data['time_management_scheduled_work_shift'] + $time_management_data['time_management_required_working_hours'] + $time_management_data['time_management_deadlinesclearly_with_your_teammates']; 
		$time_managementAvgTotal = $time_managementTotal / 3;
		$time_management_data['time_management_emp_avg'] = number_format((float)$time_managementAvgTotal, 2, '.', '');

		$this->am->updateEmployeeTimeManagement($time_management_data, $empId);

		/* time management */

		/* adaptability */

		$adaptability_data['employee_id'] = $this->input->post('main_employee_id');
		$adaptability_data['adaptability_short_amount_of_time'] = $this->input->post('adaptability_short_amount_of_time');
		$adaptability_data['adaptability_ability_to_adjust_depending'] = $this->input->post('adaptability_ability_to_adjust_depending');
		$adaptability_data['adaptability_work_on_multiple_projects'] = $this->input->post('adaptability_work_on_multiple_projects');
		$adaptability_data['adaptability_learn_new_disciplines_software'] = $this->input->post('adaptability_learn_new_disciplines_software');

		$adaptability_data['adaptability_comments'] = $this->input->post('adaptability_comments');

		$adaptabilityTotal = $adaptability_data['adaptability_short_amount_of_time'] + $adaptability_data['adaptability_ability_to_adjust_depending'] + $adaptability_data['adaptability_work_on_multiple_projects'] + $adaptability_data['adaptability_learn_new_disciplines_software']; 
		$adaptabilityAvgTotal = $adaptabilityTotal / 4;
		$adaptability_data['p_adaptability_emp_avg'] = number_format((float)$adaptabilityAvgTotal, 2, '.', '');

		$this->am->updateEmployeeAdaptability($adaptability_data, $empId);

		/* adaptability */

		/* initiative proactive */

		$initiative_proactive_data['employee_id'] = $this->input->post('main_employee_id');
		$initiative_proactive_data['initiative_proactive_ability_to_learn_new_project'] = $this->input->post('initiative_proactive_ability_to_learn_new_project');
		$initiative_proactive_data['initiative_proactive_adjust_depending_on_the_project'] = $this->input->post('initiative_proactive_adjust_depending_on_the_project');
		$initiative_proactive_data['initiative_proactive_work_on_multiple_projects'] = $this->input->post('initiative_proactive_work_on_multiple_projects');
		$initiative_proactive_data['initiative_proactive_learn_new_disciplines_software'] = $this->input->post('initiative_proactive_learn_new_disciplines_software');

		$initiative_proactive_data['initiative_proactive_comments'] = $this->input->post('initiative_proactive_comments');

		$initiative_proactiveTotal = $initiative_proactive_data['initiative_proactive_ability_to_learn_new_project'] + $initiative_proactive_data['initiative_proactive_adjust_depending_on_the_project'] + $initiative_proactive_data['initiative_proactive_work_on_multiple_projects'] + $initiative_proactive_data['initiative_proactive_learn_new_disciplines_software']; 
		$initiative_proactiveAvgTotal = $initiative_proactiveTotal / 4;
		$initiative_proactive_data['p_initiative_proactive_emp_avg'] = number_format((float)$initiative_proactiveAvgTotal, 2, '.', '');

		$this->am->updateEmployeeInitiativeProactive($initiative_proactive_data, $empId);

		/* initiative proactive */

		/* creativity problem solving */

		$creativity_problem_solving_data['employee_id'] = $this->input->post('main_employee_id');
		$creativity_problem_solving_data['creativity_problem_solving_learn_new_project'] = $this->input->post('creativity_problem_solving_learn_new_project');
		$creativity_problem_solving_data['creativity_problem_solving_depending_project_needs'] = $this->input->post('creativity_problem_solving_depending_project_needs');
		$creativity_problem_solving_data['creativity_problem_solving_work_multiple_projects'] = $this->input->post('creativity_problem_solving_work_multiple_projects');
		$creativity_problem_solving_data['creativity_problem_solving_knowledge_to_new_challenges'] = $this->input->post('creativity_problem_solving_knowledge_to_new_challenges');

		$creativity_problem_solving_data['creativity_problem_solving_comments'] = $this->input->post('creativity_problem_solving_comments');

		$creativity_problem_solvingTotal = $creativity_problem_solving_data['creativity_problem_solving_learn_new_project'] + $creativity_problem_solving_data['creativity_problem_solving_depending_project_needs'] + $creativity_problem_solving_data['creativity_problem_solving_work_multiple_projects'] + $creativity_problem_solving_data['creativity_problem_solving_knowledge_to_new_challenges']; 
		$creativity_problem_solvingAvgTotal = $creativity_problem_solvingTotal / 4;
		$creativity_problem_solving_data['p_creativity_problem_solving_emp_avg'] = number_format((float)$creativity_problem_solvingAvgTotal, 2, '.', '');

		$this->am->updateEmployeeCreativityProblemSolving($creativity_problem_solving_data, $empId);

		/* creativity problem solving */

		$sumTotal = $communication_data['communication_emp_avg'] + $productivity_data['productivity_emp_avg'] + $quality_data['quality_emp_avg'] + $knowledge_data['knowledge_emp_avg'] + $software_data['software_emp_avg'] + $dependability_data['dependability_emp_avg'] + $time_management_data['time_management_emp_avg'] + $adaptability_data['p_adaptability_emp_avg'] + $initiative_proactive_data['p_initiative_proactive_emp_avg'] + $creativity_problem_solving_data['p_creativity_problem_solving_emp_avg']; 
		$avgTotal = $sumTotal / 10;
		$data['main_emp_avg'] = number_format((float)$avgTotal, 2, '.', '');

		$res = $this->am->updateEmpMainAvgRating($data, $empId);
		if($res){
			$this->session->set_flashdata('emp_update_score_success', 'Employee Score Updated Successfully!!!');
			return redirect('Admin/showEmployeeInfo/'.$empId);
		}else{
			$this->session->set_flashdata('emp_update_score_not', 'Please Try Again!');
			return redirect('Admin/showEmployeeInfo/'.$empId);
		}

	}


	/*********Departments ***********/

	public function addDepartments(){
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/add-departments');
		$this->load->view('admin/include/footer');
	}

	public function postDepartmentData(){

		$data['department_name'] = $this->input->post('department_name');
		$data['	department_status'] = $this->input->post('department_status');

		if($this->am->uploadDepartment($data)){
			$this->session->set_flashdata('department_upload_success', 'Uploaded Successfully!!!');
			redirect('Admin/addDepartments');
		}else{
			$this->session->set_flashdata('department_not_uploaded', 'Please Try Again!');
			redirect('Admin/addDepartments');
		}
	}

	public function departmentsList(){
		$config=[
			'base_url' => base_url('Admin/departmentsList'),
			'per_page' =>10,
			'total_rows' => $this->am->num_rows_departments(),
			'full_tag_open'=>"<ul class='pagination'>",
			'full_tag_close'=>"</ul>",
			'next_tag_open' =>"<li>",
			'next_tag_close' =>"</li>",
			'prev_tag_open' =>"<li>",
			'prev_tag_close' =>"</li>",
			'num_tag_open' =>"<li>",
			'num_tag_close' =>"<li>",
			'cur_tag_open' =>"<li class='active'><a>",
			'cur_tag_close' =>"</a></li>"
		  ];
	
		  $this->pagination->initialize($config);
		  $data['departmentdata'] = $this->am->departmentsListData($config['per_page'],$this->uri->segment(3));
		  $this->load->view('admin/include/header');
		  $this->load->view('admin/include/menu');
		  $this->load->view('admin/departments-list', $data);
		  $this->load->view('admin/include/footer');
	}

	public function deleteDepartmentData(){
		$id = $this->input->post('department_id');
		$result = $this->am->deleteDepDB($id);
		if($result){
			$this->session->set_flashdata('dep_delete_success', 'Department Detail Deleted Successfully!!!');
			redirect('Admin/departmentsList');
		}else{
			$this->session->set_flashdata('dep_not_deleted', 'Please Try Again!');
			redirect('Admin/departmentsList');
		}
	}

	public function updateDepartmentData(){

		$department_id = $this->input->post('department_id');
		$data = $this->input->post();

		$res = $this->am->updateDepartmentInfo($department_id, $data);
		if($res){
			$this->session->set_flashdata('dep_update_success', 'Department Details Update Successfully!!!');
			redirect('Admin/departmentsList');
		}else{
			$this->session->set_flashdata('dep_update_try_again', 'Please Try Again!');
			redirect('Admin/departmentsList');
		}

	}

	/************************Designation******************/


	public function addDesignation(){


		$data['departments'] = $this->am->getDepartmentsList();
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/add-designation', $data);
		$this->load->view('admin/include/footer');
	}

	public function postDesignationData(){

		$data['designation_name'] = $this->input->post('designation_name');
		$data['designation_name'] = $this->input->post('designation_name');
		$data['f_department_id'] = $this->input->post('f_department_id');

		$data['designation_status'] = $this->input->post('designation_status');

		if($this->am->uploadDesignation($data)){
			$this->session->set_flashdata('designation_upload_success', 'Uploaded Successfully!!!');
			redirect('Admin/addDesignation');
		}else{
			$this->session->set_flashdata('designation_not_uploaded', 'Please Try Again!');
			redirect('Admin/addDesignation');
		}
	}

	public function designationList(){
		$config=[
			'base_url' => base_url('Admin/designationList'),
			'per_page' =>10,
			'total_rows' => $this->am->num_rows_designation(),
			'full_tag_open'=>"<ul class='pagination'>",
			'full_tag_close'=>"</ul>",
			'next_tag_open' =>"<li>",
			'next_tag_close' =>"</li>",
			'prev_tag_open' =>"<li>",
			'prev_tag_close' =>"</li>",
			'num_tag_open' =>"<li>",
			'num_tag_close' =>"<li>",
			'cur_tag_open' =>"<li class='active'><a>",
			'cur_tag_close' =>"</a></li>"
		  ];
	
		  $this->pagination->initialize($config);
		  $data['designationdata'] = $this->am->designationListData($config['per_page'],$this->uri->segment(3));
		  $data['departments'] = $this->am->getEmpDepartment();
		  $this->load->view('admin/include/header');
		  $this->load->view('admin/include/menu');
		  $this->load->view('admin/designation-list', $data);
		  $this->load->view('admin/include/footer');
	}

	public function deleteDesignationData(){

		$id = $this->input->post('designation_id');
		$result = $this->am->deleteDesDB($id);
		if($result){
			$this->session->set_flashdata('des_delete_success', 'Designation Detail Deleted Successfully!!!');
			redirect('Admin/designationList');
		}else{
			$this->session->set_flashdata('des_not_deleted', 'Please Try Again!');
			redirect('Admin/designationList');
		}

	}

	public function updateDesignationData(){

		$Id = $this->input->post('designation_id');
		$data = $this->input->post();

		$res = $this->am->updateDesignationInfo($Id, $data);
		if($res){
			$this->session->set_flashdata('des_update_success', 'Designation Details Update Successfully!!!');
			redirect('Admin/designationList');
		}else{
			$this->session->set_flashdata('des_update_try_again', 'Please Try Again!');
			redirect('Admin/designationList');
		}

	}

	/*********************Employee Performance ***************/

	public function addEmployeesPerformance(){

		$data['emplist'] = $this->am->getEmpNameList();

		$this->load->view('admin/include/header');
		$this->load->view('admin/include/menu');
		$this->load->view('admin/add-employees-performance', $data);
		$this->load->view('admin/include/footer');
	}

	public function fetchDDInput(){
		if($this->input->post('employee_id')){
			echo $this->am->fetchDDList($this->input->post('employee_id'));
		}
	}

	public function fetchDesiInput(){
		if($this->input->post('employee_id')){
			echo $this->am->fetchDesiList($this->input->post('employee_id'));
		}
	}

	public function employeesPerformanceResultList(){
		$config=[
			'base_url' => base_url('Admin/employeesPerformanceResultList'),
			'per_page' =>10,
			'total_rows' => $this->am->num_rows_PerformanceResult(),
			'full_tag_open'=>"<ul class='pagination'>",
			'full_tag_close'=>"</ul>",
			'next_tag_open' =>"<li>",
			'next_tag_close' =>"</li>",
			'prev_tag_open' =>"<li>",
			'prev_tag_close' =>"</li>",
			'num_tag_open' =>"<li>",
			'num_tag_close' =>"<li>",
			'cur_tag_open' =>"<li class='active'><a>",
			'cur_tag_close' =>"</a></li>"
		  ];
	
		  $this->pagination->initialize($config);
		  $data['rerformancedata'] = $this->am->PerformanceResultData($config['per_page'],$this->uri->segment(3));

		//   echo '<pre>';
		//   print_r($data);
		//   echo '</pre>';
		//   exit;

		  $this->load->view('admin/include/header');
		  $this->load->view('admin/include/menu');
		  $this->load->view('admin/employees-performance-result-list', $data);
		  $this->load->view('admin/include/footer');
	}


	// Print Employee Details


	public function printEmpDetails($id){

		$data['empdata'] = $this->am->getEmpDetails($id);
		$data['departments'] = $this->am->getEmpDepartment();
		$data['empinfo'] = $this->am->getEmployeesPerformanceInfo($id);

		$ManagerSignature = $this->am->getManagerSignature($id);

		if($ManagerSignature){
			$data['signature_img'] = $this->am->getManagerSignature($id);
		}else{
			$data['signature_img'] = 0;
		}

		$this->load->view('admin/include/header');
		$this->load->view('admin/print-employee-details', $data);
		$this->load->view('admin/include/footer');
	}

	// Manager Upload Signature

	public function uploadManagerSignature(){

		$id = $this->input->post('employee_id');
		$data['employee_id'] = $this->input->post('employee_id');

		$config = [
			'upload_path' => './upload',
			'allowed_type' => 'jpg|png|jpeg',
			'quality' => '50%',
			'width' => '1600',
			'height' => '800'
		];

		if((!empty($_FILES['p_signature_img']['name']))){
			$check = uploadimgfile("p_signature_img",$folder="upload",$prefix="proimg_");
			$link  = $check['data']['name'];
			$data['p_signature_img'] = $link;
		}

		$this->load->library('upload', $config);
		$this->upload->do_upload();

		$res = $this->am->postManagerSignature($data);

		if($res){
			$this->session->set_flashdata('signature_upload_success', 'Signature Uploaded Successfully!!!');
			redirect('Admin/showEmployeeInfo/'.$id);
		}else{
			$this->session->set_flashdata('signature_not_uploaded', 'Please Try Again!');
			redirect('Admin/showEmployeeInfo/'.$id);
		}
	}

	// public function updateManagerSignature(){

	// 	    $empID = $this->input->post('employee_id');
	// 	    if(!empty($_FILES['p_signature_img']['name'])){

	// 		$upload = $this->am->get_SignatureImg_id($empID);

	// 		if(file_exists($upload->p_signature_img)){
	// 				if(unlink($upload->p_signature_img)) {
	// 					$check = uploadimgfile("p_signature_img",$folder="upload",$prefix="proimg_");
	// 					$link = $check['data']['name'];
	// 					$data['p_signature_img'] = $link;
	// 				}
	// 			}
	// 		}

	// 		if($this->am->editManagerSignature($data, $empID)){
	// 			$this->session->set_flashdata('signature_update_success', 'Employee Detail Updated Successfully!!!');
	// 			return redirect('Admin/showEmployeeInfo/'.$empID);
	// 		}else{
	// 			$this->session->set_flashdata('signature_not_updated', 'Please Try Again!');
	// 			return redirect('Admin/showEmployeeInfo/'.$empID);
	// 		}
	// }

	public function deleteManagerSignature(){
			$id = $this->input->post('employee_id');
			$result = $this->am->deleteSignatureDB($id);
			if($result){
				$this->session->set_flashdata('signature_delete_success', 'Signature Deleted Successfully!!!');
				redirect('Admin/showEmployeeInfo/'.$id);
			}else{
				$this->session->set_flashdata('signature_not_uploaded', 'Please Try Again!');
				redirect('Admin/showEmployeeInfo/'.$id);
			}
	}

	// ----------------------------------------------------------------------------------------


	public function postEmployeePerformance(){


		// $data['data'] = $this->input->post();

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;


		$data['employee_id'] = $this->input->post('main_employee_id');
		$data['emp_performance_start_date'] = $this->input->post('emp_performance_start_date');
		$data['emp_performance_end_date'] = $this->input->post('emp_performance_end_date');



		/* communication */
		$communication_data['employee_id'] = $this->input->post('main_employee_id');
		$communication_data['communication_proactively_asking'] = $this->input->post('communication_proactively_asking');
		$communication_data['communication_responds_to_messages'] = $this->input->post('communication_responds_to_messages');
		$communication_data['communication_proactively_informing'] = $this->input->post('communication_proactively_informing');
		$communication_data['communication_level_of_english'] = $this->input->post('communication_level_of_english');
		$communication_data['communication_team_client'] = $this->input->post('communication_team_client');
		$communication_data['communication_Informs_the_supervisor'] = $this->input->post('communication_Informs_the_supervisor');

		$communication_data['communication_comments'] = $this->input->post('communication_comments');

		$communicationTotal = $communication_data['communication_proactively_asking'] + $communication_data['communication_responds_to_messages'] + $communication_data['communication_proactively_informing'] + $communication_data['communication_level_of_english'] + $communication_data['communication_team_client'] + $communication_data['communication_Informs_the_supervisor']; 
		$communicationAvgTotal = $communicationTotal / 6;
		$communication_data['communication_emp_avg'] = number_format((float)$communicationAvgTotal, 2, '.', '');

		$this->am->postEmployeeCommunication($communication_data);
		
		/* communication */

		
		// echo '<pre>';
		// print_r($communication_data);
		// echo '</pre>';

		// /* productivity */
		$productivity_data['employee_id'] = $this->input->post('main_employee_id');
		$productivity_data['productivity_speed_of_modelling'] = $this->input->post('productivity_speed_of_modelling');
		$productivity_data['productivity_absence_or_minimum'] = $this->input->post('productivity_absence_or_minimum');
		$productivity_data['productivity_timelines_and_deadlines'] = $this->input->post('productivity_timelines_and_deadlines');

		$productivity_data['productivity_comments'] = $this->input->post('productivity_comments');

		$productivityTotal = $productivity_data['productivity_speed_of_modelling'] + $productivity_data['productivity_absence_or_minimum'] + $productivity_data['productivity_timelines_and_deadlines']; 
		$productivityAvgTotal = $productivityTotal / 3;
		$productivity_data['productivity_emp_avg'] = number_format((float)$productivityAvgTotal, 2, '.', '');

		$this->am->postEmployeeProductivity($productivity_data);

		// /* productivity */

		// echo '<pre>';
		// print_r($productivity_data);
		// echo '</pre>';


		/* quality */
		$quality_data['employee_id'] = $this->input->post('main_employee_id');
		$quality_data['quality_attention_to_details'] = $this->input->post('quality_attention_to_details');
		$quality_data['quality_mistakes_requiring_correction'] = $this->input->post('quality_mistakes_requiring_correction');
		$quality_data['quality_meets_the_expectations'] = $this->input->post('quality_meets_the_expectations');
		$quality_data['quality_conducts_qa_qc'] = $this->input->post('quality_conducts_qa_qc');
		$quality_data['quality_follows_the_correct_workflow_set'] = $this->input->post('quality_follows_the_correct_workflow_set');

		$quality_data['quality_comments'] = $this->input->post('quality_comments');

		$qualityTotal = $quality_data['quality_attention_to_details'] + $quality_data['quality_mistakes_requiring_correction'] + $quality_data['quality_meets_the_expectations'] + $quality_data['quality_conducts_qa_qc'] + $quality_data['quality_follows_the_correct_workflow_set']; 
		$qualityAvgTotal = $qualityTotal / 5;
		$quality_data['quality_emp_avg'] = number_format((float)$productivityAvgTotal, 2, '.', '');

		$this->am->postEmployeeQuality($quality_data);

		/* quality */

		// echo '<pre>';
		// print_r($quality_data);
		// echo '</pre>';

		/* knowledge */

		$knowledge_data['employee_id'] = $this->input->post('main_employee_id');
		$knowledge_data['knowledge_standards_and_portfolio'] = $this->input->post('knowledge_standards_and_portfolio');
		$knowledge_data['knowledge_bim_project_requirements'] = $this->input->post('knowledge_bim_project_requirements');
		$knowledge_data['knowledge_of_the_construction_industry'] = $this->input->post('knowledge_of_the_construction_industry');
		
		$knowledge_data['knowledge_comments'] = $this->input->post('knowledge_comments');

		$knowledgeTotal = $knowledge_data['knowledge_standards_and_portfolio'] + $knowledge_data['knowledge_bim_project_requirements'] + $knowledge_data['knowledge_of_the_construction_industry']; 
		$knowledgeAvgTotal = $knowledgeTotal / 3;
		$knowledge_data['knowledge_emp_avg'] = number_format((float)$knowledgeAvgTotal, 2, '.', '');

		$this->am->postEmployeeKnowledge($knowledge_data);


		/* knowledge */

		// echo '<pre>';
		// print_r($knowledge_data);
		// echo '</pre>';

		/* software */

		$software_data['employee_id'] = $this->input->post('main_employee_id');
		$software_data['software_bitrix_tasks_and_leaves'] = $this->input->post('software_bitrix_tasks_and_leaves');
		$software_data['software_digital_tools_production_communication'] = $this->input->post('software_digital_tools_production_communication');
		
		$software_data['software_comments'] = $this->input->post('software_comments');

		$softwareTotal = $software_data['software_bitrix_tasks_and_leaves'] + $software_data['software_digital_tools_production_communication']; 
		$softwareAvgTotal = $softwareTotal / 3;
		$software_data['software_emp_avg'] = number_format((float)$softwareAvgTotal, 2, '.', '');

		$this->am->postEmployeeSoftware($software_data);


		/* software */

		// echo '<pre>';
		// print_r($software_data);
		// echo '</pre>';

		/* dependability */

		$dependability_data['employee_id'] = $this->input->post('main_employee_id');
		$dependability_data['dependability_handle_a_team'] = $this->input->post('dependability_handle_a_team');
		$dependability_data['dependability_handle_a_project'] = $this->input->post('dependability_handle_a_project');
		$dependability_data['dependability_the_set_deadlines'] = $this->input->post('dependability_the_set_deadlines');

		$dependability_data['dependability_comments'] = $this->input->post('dependability_comments');

		$dependabilityTotal = $dependability_data['dependability_handle_a_team'] + $dependability_data['dependability_handle_a_project'] + $dependability_data['dependability_the_set_deadlines']; 
		$dependabilityAvgTotal = $dependabilityTotal / 3;
		$dependability_data['dependability_emp_avg'] = number_format((float)$dependabilityAvgTotal, 2, '.', '');

		$this->am->postEmployeeDependability($dependability_data);

		/* dependability */

		// echo '<pre>';
		// print_r($dependability_data);
		// echo '</pre>';

		/* time management */

		$time_management_data['employee_id'] = $this->input->post('main_employee_id');
		$time_management_data['time_management_scheduled_work_shift'] = $this->input->post('time_management_scheduled_work_shift');
		$time_management_data['time_management_required_working_hours'] = $this->input->post('time_management_required_working_hours');
		$time_management_data['time_management_deadlinesclearly_with_your_teammates'] = $this->input->post('time_management_deadlinesclearly_with_your_teammates');

		$time_management_data['time_management_comments'] = $this->input->post('time_management_comments');

		$time_managementTotal = $time_management_data['time_management_scheduled_work_shift'] + $time_management_data['time_management_required_working_hours'] + $time_management_data['time_management_deadlinesclearly_with_your_teammates']; 
		$time_managementAvgTotal = $time_managementTotal / 3;
		$time_management_data['time_management_emp_avg'] = number_format((float)$time_managementAvgTotal, 2, '.', '');

		$this->am->postEmployeeTimeManagement($time_management_data);

		/* time management */

		// echo '<pre>';
		// print_r($time_management_data);
		// echo '</pre>';

		/* adaptability */

		$adaptability_data['employee_id'] = $this->input->post('main_employee_id');
		$adaptability_data['adaptability_short_amount_of_time'] = $this->input->post('adaptability_short_amount_of_time');
		$adaptability_data['adaptability_ability_to_adjust_depending'] = $this->input->post('adaptability_ability_to_adjust_depending');
		$adaptability_data['adaptability_work_on_multiple_projects'] = $this->input->post('adaptability_work_on_multiple_projects');
		$adaptability_data['adaptability_learn_new_disciplines_software'] = $this->input->post('adaptability_learn_new_disciplines_software');

		$adaptability_data['adaptability_comments'] = $this->input->post('adaptability_comments');

		$adaptabilityTotal = $adaptability_data['adaptability_short_amount_of_time'] + $adaptability_data['adaptability_ability_to_adjust_depending'] + $adaptability_data['adaptability_work_on_multiple_projects'] + $adaptability_data['adaptability_learn_new_disciplines_software']; 
		$adaptabilityAvgTotal = $adaptabilityTotal / 3;
		$adaptability_data['p_adaptability_emp_avg'] = number_format((float)$adaptabilityAvgTotal, 2, '.', '');

		$this->am->postEmployeeAdaptability($adaptability_data);

		/* adaptability */

		// echo '<pre>';
		// print_r($adaptability_data);
		// echo '</pre>';

		/* initiative proactive */

		$initiative_proactive_data['employee_id'] = $this->input->post('main_employee_id');
		$initiative_proactive_data['initiative_proactive_ability_to_learn_new_project'] = $this->input->post('initiative_proactive_ability_to_learn_new_project');
		$initiative_proactive_data['initiative_proactive_adjust_depending_on_the_project'] = $this->input->post('initiative_proactive_adjust_depending_on_the_project');
		$initiative_proactive_data['initiative_proactive_work_on_multiple_projects'] = $this->input->post('initiative_proactive_work_on_multiple_projects');
		$initiative_proactive_data['initiative_proactive_learn_new_disciplines_software'] = $this->input->post('initiative_proactive_learn_new_disciplines_software');

		$initiative_proactive_data['initiative_proactive_comments'] = $this->input->post('initiative_proactive_comments');

		$initiative_proactiveTotal = $initiative_proactive_data['initiative_proactive_ability_to_learn_new_project'] + $initiative_proactive_data['initiative_proactive_adjust_depending_on_the_project'] + $initiative_proactive_data['initiative_proactive_work_on_multiple_projects'] + $initiative_proactive_data['initiative_proactive_learn_new_disciplines_software']; 
		$initiative_proactiveAvgTotal = $initiative_proactiveTotal / 3;
		$initiative_proactive_data['p_initiative_proactive_emp_avg'] = number_format((float)$initiative_proactiveAvgTotal, 2, '.', '');

		$this->am->postEmployeeInitiativeProactive($initiative_proactive_data);

		/* initiative proactive */

		// echo '<pre>';
		// print_r($initiative_proactive_data);
		// echo '</pre>';

		/* creativity problem solving */

		$creativity_problem_solving_data['employee_id'] = $this->input->post('main_employee_id');
		$creativity_problem_solving_data['creativity_problem_solving_learn_new_project'] = $this->input->post('creativity_problem_solving_learn_new_project');
		$creativity_problem_solving_data['creativity_problem_solving_depending_project_needs'] = $this->input->post('creativity_problem_solving_depending_project_needs');
		$creativity_problem_solving_data['creativity_problem_solving_work_multiple_projects'] = $this->input->post('creativity_problem_solving_work_multiple_projects');
		$creativity_problem_solving_data['creativity_problem_solving_knowledge_to_new_challenges'] = $this->input->post('creativity_problem_solving_knowledge_to_new_challenges');

		$creativity_problem_solving_data['creativity_problem_solving_comments'] = $this->input->post('creativity_problem_solving_comments');

		$creativity_problem_solvingTotal = $creativity_problem_solving_data['creativity_problem_solving_learn_new_project'] + $creativity_problem_solving_data['creativity_problem_solving_depending_project_needs'] + $creativity_problem_solving_data['creativity_problem_solving_work_multiple_projects'] + $creativity_problem_solving_data['creativity_problem_solving_knowledge_to_new_challenges']; 
		$creativity_problem_solvingAvgTotal = $creativity_problem_solvingTotal / 3;
		$creativity_problem_solving_data['p_creativity_problem_solving_emp_avg'] = number_format((float)$creativity_problem_solvingAvgTotal, 2, '.', '');

		$this->am->postEmployeeCreativityProblemSolving($creativity_problem_solving_data);

		/* creativity problem solving */


		// echo '<pre>';
		// print_r($creativity_problem_solving_data);
		// echo '</pre>';
		// exit;



		// echo '<pre>';
		// print_r($communication_data);
		// echo '</pre>';
		// exit;


		/*****OLD CODE *******/
		// $data['communication_assessment'] = $this->input->post('communication_assessment');
		// $data['communication_comments'] = $this->input->post('communication_comments');

		// $data['performance_assessment'] = $this->input->post('performance_assessment');
		// $data['performance_comments'] = $this->input->post('performance_comments');

		// $data['quality_assessment'] = $this->input->post('quality_assessment');
		// $data['quality_comments'] = $this->input->post('quality_comments');

		// $sumTotal = $data['communication_assessment'] + $data['performance_assessment'] + $data['quality_assessment'];
		// $avgTotal = $sumTotal / 3;

		// $data['emp_avg'] = number_format((float)$avgTotal, 2, '.', '');

		/*****OLD CODE *******/

		// $sumTotal = $communication_data['communication_proactively_asking'] + $communication_data['communication_responds_to_messages'] + $communication_data['communication_proactively_informing'] + $communication_data['communication_level_of_english'] + $communication_data['communication_team_client'] + $communication_data['communication_Informs_the_supervisor']; 
		// $avgTotal = $sumTotal / 6;


		$sumTotal = $communication_data['communication_emp_avg'] + $productivity_data['productivity_emp_avg'] + $quality_data['quality_emp_avg'] + $knowledge_data['knowledge_emp_avg'] + $software_data['software_emp_avg'] + $dependability_data['dependability_emp_avg'] + $time_management_data['time_management_emp_avg'] + $adaptability_data['p_adaptability_emp_avg'] + $initiative_proactive_data['p_initiative_proactive_emp_avg'] + $creativity_problem_solving_data['p_creativity_problem_solving_emp_avg']; 
		$avgTotal = $sumTotal / 10;
		$data['main_emp_avg'] = number_format((float)$avgTotal, 2, '.', '');




		if($this->am->postEmployeePerformance($data)){
			$this->session->set_flashdata('performance_upload_success', 'Uploaded Successfully!!!');
			redirect('Admin/addEmployeesPerformance');
		}else{
			$this->session->set_flashdata('performance_not_uploaded', 'Please Try Again!');
			redirect('Admin/addEmployeesPerformance');
		}


		// if($this->am->uploadEmployeeCommunication($communication_data)){
		// 	$this->session->set_flashdata('performance_upload_success', 'Uploaded Successfully!!!');
		// }else{
		// 	$this->session->set_flashdata('performance_not_uploaded', 'Please Try Again!');
		// }

		// if($this->am->uploadEmployeeProductivity($productivity_data)){
		// 	$this->session->set_flashdata('performance_upload_success', 'Uploaded Successfully!!!');
		// }else{
		// 	$this->session->set_flashdata('performance_not_uploaded', 'Please Try Again!');
		// }


	}
	


}
?>
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
       $data['check'] = $this->em->getVerifyAdd($empID);

       $data['check2'] = $this->em->checkVerifyAllScores($empID);

    //    echo '<pre>';
    //    print_r($data);
    //    echo '</pre>';
    //    exit;

       $this->load->view('employee/include/header');
       $this->load->view('employee/include/menu', $data);
       $this->load->view('employee/index', $data);
       $this->load->view('employee/include/footer', $data);

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


   public function UpdateEmpData(){
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
        

        $empID = $this->input->post('main_employee_id');

        if(!empty($_FILES['employee_image']['name'])){

        $upload = $this->em->get_empImg_id($empID);

        if(file_exists($upload->employee_image)) {
                if(unlink($upload->employee_image)) {
                    $check = uploadimgfile("employee_image",$folder="upload",$prefix="proimg_");
                    $link = $check['data']['name'];
                    $data['employee_image'] = $link;
                }
            }
        }
        
        if($this->em->selfUpdateEmpInfo($data, $empID)){
            $this->session->set_flashdata('self_emp_update_success', 'Your Detail Updated Successfully!!!');
            return redirect('Employee/empDetailsPage');
        }else{
            $this->session->set_flashdata('self_emp_not_updated', 'Please Try Again!');
            return redirect('Employee/empDetailsPage');
        }
   }

   public function setEmpPerformance(){
        $empID = $this->session->userdata('emp_login_id');
        $menu['empinfo'] = $this->em->getEmpInfo($empID);
        $data['empdata'] = $this->am->getEmpDetails($empID);

        $data['check'] = $this->em->getVerifyAdd($empID);

        $this->load->view('employee/include/header');
        $this->load->view('employee/include/menu', $menu);
        $this->load->view('employee/set-employees-performance', $data);
        $this->load->view('employee/include/footer');
   }

   public function showEmpPerformance(){
        $empID = $this->session->userdata('emp_login_id');
        $menu['empinfo'] = $this->em->getEmpInfo($empID);

        $data['empdata'] = $this->em->getEmpDetails($empID);
        $data['departments'] = $this->em->getEmpDepartment();
        $data['empinfo'] = $this->em->getEmployeesPerformanceInfo($empID);
        $ManagerSignature = $this->em->getManagerSignature($empID);

        if($ManagerSignature){
            $data['signature_img'] = $this->am->getManagerSignature($empID);
        }else{
            $data['signature_img'] = 0;
        }

        $data['check'] = $this->em->getVerifyAdd($empID);
        $data['check2'] = $this->em->checkVerifyAllScores($empID);

        // echo '<pre>';
        // print_r($menu);
        // echo '</pre>';
        // exit;

        $this->load->view('employee/include/header');
        $this->load->view('employee/include/menu', $menu);
        $this->load->view('employee/show-employees-performance', $data);
        $this->load->view('employee/include/footer');
   }

//    Employee Performance

  public function postEmployeePerformance(){

    // $data['data'] = $this->input->post();

    $data['employee_id'] = $this->input->post('main_employee_id');
    $data['emp_performance_start_date'] = $this->input->post('emp_performance_start_date');
    $data['emp_performance_end_date'] = $this->input->post('emp_performance_end_date');

    // echo '<pre>';
    // print_r($data);
    // echo '</pre>';
    // exit;


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

    $this->em->setEmployeeCommunication($communication_data);
    
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

    $this->em->setEmployeeProductivity($productivity_data);

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

    $this->em->setEmployeeQuality($quality_data);

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

    $this->em->setEmployeeKnowledge($knowledge_data);


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
    $softwareAvgTotal = $softwareTotal / 2;
    $software_data['software_emp_avg'] = number_format((float)$softwareAvgTotal, 2, '.', '');

    $this->em->setEmployeeSoftware($software_data);


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

    $this->em->setEmployeeDependability($dependability_data);

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

    $this->em->setEmployeeTimeManagement($time_management_data);

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
    $adaptabilityAvgTotal = $adaptabilityTotal / 4;
    $adaptability_data['p_adaptability_emp_avg'] = number_format((float)$adaptabilityAvgTotal, 2, '.', '');

    $this->em->setEmployeeAdaptability($adaptability_data);

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
    $initiative_proactiveAvgTotal = $initiative_proactiveTotal / 4;
    $initiative_proactive_data['p_initiative_proactive_emp_avg'] = number_format((float)$initiative_proactiveAvgTotal, 2, '.', '');

    $this->em->setEmployeeInitiativeProactive($initiative_proactive_data);

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
    $creativity_problem_solvingAvgTotal = $creativity_problem_solvingTotal / 4;
    $creativity_problem_solving_data['p_creativity_problem_solving_emp_avg'] = number_format((float)$creativity_problem_solvingAvgTotal, 2, '.', '');

    $this->em->setEmployeeCreativityProblemSolving($creativity_problem_solving_data);

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


    if($this->em->setEmpMainAvgRating($data)){
        $this->session->set_flashdata('performance_upload_success', 'Performance Uploaded Successfully!!!');
        redirect('Employee/showEmpPerformance');
    }else{
        $this->session->set_flashdata('performance_not_uploaded', 'Please Try Again!');
        redirect('Employee/showEmpPerformance');
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

    public function displayEmployeeScores($id){

        $empID = $this->session->userdata('emp_login_id');
        $menu['empinfo'] = $this->em->getEmpInfo($empID);

        $data['empinfo'] = $this->em->getEmployeesPerformance($id);
		$this->load->view('employee/include/header');
		$this->load->view('employee/include/menu', $menu);
		$this->load->view('employee/employee-performance-edit', $data);
		$this->load->view('employee/include/footer');
    }

    public function updateEmpPerformance(){

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

		$this->em->updateEmployeeCommunication($communication_data, $empId);

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

		$this->em->updateEmployeeProductivity($productivity_data, $empId);

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
		$quality_data['quality_emp_avg'] = number_format((float)$qualityAvgTotal, 2, '.', '');

		$this->em->updateEmployeeQuality($quality_data, $empId);

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

		$this->em->updateEmployeeKnowledge($knowledge_data, $empId);


		/* knowledge */

		/* software */

		$software_data['employee_id'] = $this->input->post('main_employee_id');
		$software_data['software_bitrix_tasks_and_leaves'] = $this->input->post('software_bitrix_tasks_and_leaves');
		$software_data['software_digital_tools_production_communication'] = $this->input->post('software_digital_tools_production_communication');
		
		$software_data['software_comments'] = $this->input->post('software_comments');

		$softwareTotal = $software_data['software_bitrix_tasks_and_leaves'] + $software_data['software_digital_tools_production_communication']; 
		$softwareAvgTotal = $softwareTotal / 2;
		$software_data['software_emp_avg'] = number_format((float)$softwareAvgTotal, 2, '.', '');

		$this->em->updateEmployeeSoftware($software_data, $empId);


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

		$this->em->updateEmployeeDependability($dependability_data, $empId);

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

		$this->em->updateEmployeeTimeManagement($time_management_data, $empId);

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

		$this->em->updateEmployeeAdaptability($adaptability_data, $empId);

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

		$this->em->updateEmployeeInitiativeProactive($initiative_proactive_data, $empId);

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

		$this->em->updateEmployeeCreativityProblemSolving($creativity_problem_solving_data, $empId);

		/* creativity problem solving */

		$sumTotal = $communication_data['communication_emp_avg'] + $productivity_data['productivity_emp_avg'] + $quality_data['quality_emp_avg'] + $knowledge_data['knowledge_emp_avg'] + $software_data['software_emp_avg'] + $dependability_data['dependability_emp_avg'] + $time_management_data['time_management_emp_avg'] + $adaptability_data['p_adaptability_emp_avg'] + $initiative_proactive_data['p_initiative_proactive_emp_avg'] + $creativity_problem_solving_data['p_creativity_problem_solving_emp_avg']; 
		$avgTotal = $sumTotal / 10;
		$data['main_emp_avg'] = number_format((float)$avgTotal, 2, '.', '');

		$res = $this->em->updateEmpMainAvgRating($data, $empId);

		if($res){
			$this->session->set_flashdata('emp_update_score_success', 'Your Score Updated Successfully!!!');
			return redirect('Employee/showEmpPerformance');
		}else{
			$this->session->set_flashdata('emp_update_score_not', 'Please Try Again!');
			return redirect('Employee/showEmpPerformance');
		}
    }

    public function getEvaluatedEmployee(){
        $config=[
			'base_url' => base_url('Employee/getEvaluatedEmployee'),
			'per_page' =>10,
			'total_rows' => $this->em->num_rows_EvaluatedEmployeeResult(),
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
		  $data['evaluateddata'] = $this->em->EvaluatedEmployeeList($config['per_page'],$this->uri->segment(3));

            $empID = $this->session->userdata('emp_login_id');
            $menu['empinfo'] = $this->em->getEmpInfo($empID);

		  $this->load->view('employee/include/header');
		  $this->load->view('employee/include/menu', $menu);
		  $this->load->view('employee/evaluated-employee-list', $data);
		  $this->load->view('employee/include/footer');

    }

    public function ReEvaluateForm($id){

            $empID = $this->session->userdata('emp_login_id');
            $menu['empinfo'] = $this->em->getEmpInfo($empID);

            $data['empdata'] = $this->em->getEmpDetails($id);
			$data['departments'] = $this->em->getEmpDepartment();
			$data['empinfo'] = $this->em->getEmployeesPerformanceInfo($id);

			$ManagerSignature = $this->em->getManagerSignature($id);

			if($ManagerSignature){
				$data['signature_img'] = $this->em->getManagerSignature($id);
			}else{
				$data['signature_img'] = 0;
			}

			$this->load->view('employee/include/header');
			$this->load->view('employee/include/menu', $menu);
			$this->load->view('employee/re-evaluate-details', $data);
			$this->load->view('employee/include/footer');
    }

    public function updateReEvalution($id){
        $empID = $this->session->userdata('emp_login_id');
        $menu['empinfo'] = $this->em->getEmpInfo($empID);
        $data['empinfo'] = $this->em->getEmployeesPerformanceInfo($id);

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            // exit;

		$this->load->view('employee/include/header');
		$this->load->view('employee/include/menu', $menu);
		$this->load->view('employee/re-evaluate-update', $data);
		$this->load->view('employee/include/footer');
    }


    public function checkAndUpdate(){
        $empID = $this->session->userdata('emp_login_id');
        $menu['empinfo'] = $this->em->getEmpInfo($empID);
        $data['empdata'] = $this->em->getEmpDetails($empID);
        $data['empinfo'] = $this->em->getEmployeesPerformanceInfo($empID);
        $data['check2'] = $this->em->checkVerifyAllScores($empID);
        
		$ManagerSignature = $this->am->getManagerSignature($empID);

		if($ManagerSignature){
			$data['signature_img'] = $this->am->getManagerSignature($empID);
		}else{
			$data['signature_img'] = 0;
		}

            // echo '<pre>';
            // print_r($data);
            // echo '</pre>';
            // exit;

		$this->load->view('employee/include/header');
		$this->load->view('employee/include/menu', $menu);
		$this->load->view('employee/check-update', $data);
		$this->load->view('employee/include/footer');
    }

    public function submitByEmployeePerformance(){
        $empID = $this->session->userdata('emp_login_id');
        $res = $this->em->submitByEmployeeScore($empID);

        if($res){
            $this->session->set_flashdata('emp_submit_score_success', 'You have successfully sent your information!!!');
			return redirect('Employee');
        }else{
            $this->session->set_flashdata('emp_submit_score_not', 'Please Try Again!');
			return redirect('Employee/checkAndUpdate');
        }
    }

    public function submitReEvaluateEmp(){

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

		$this->em->updateEmployeeCommunication($communication_data, $empId);

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

		$this->em->updateEmployeeProductivity($productivity_data, $empId);

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
		$quality_data['quality_emp_avg'] = number_format((float)$qualityAvgTotal, 2, '.', '');

		$this->em->updateEmployeeQuality($quality_data, $empId);

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

		$this->em->updateEmployeeKnowledge($knowledge_data, $empId);


		/* knowledge */

		/* software */

		$software_data['employee_id'] = $this->input->post('main_employee_id');
		$software_data['software_bitrix_tasks_and_leaves'] = $this->input->post('software_bitrix_tasks_and_leaves');
		$software_data['software_digital_tools_production_communication'] = $this->input->post('software_digital_tools_production_communication');
		
		$software_data['software_comments'] = $this->input->post('software_comments');

		$softwareTotal = $software_data['software_bitrix_tasks_and_leaves'] + $software_data['software_digital_tools_production_communication']; 
		$softwareAvgTotal = $softwareTotal / 2;
		$software_data['software_emp_avg'] = number_format((float)$softwareAvgTotal, 2, '.', '');

		$this->em->updateEmployeeSoftware($software_data, $empId);


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

		$this->em->updateEmployeeDependability($dependability_data, $empId);

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

		$this->em->updateEmployeeTimeManagement($time_management_data, $empId);

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

		$this->em->updateEmployeeAdaptability($adaptability_data, $empId);

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

		$this->em->updateEmployeeInitiativeProactive($initiative_proactive_data, $empId);

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

		$this->em->updateEmployeeCreativityProblemSolving($creativity_problem_solving_data, $empId);

		/* creativity problem solving */

		$sumTotal = $communication_data['communication_emp_avg'] + $productivity_data['productivity_emp_avg'] + $quality_data['quality_emp_avg'] + $knowledge_data['knowledge_emp_avg'] + $software_data['software_emp_avg'] + $dependability_data['dependability_emp_avg'] + $time_management_data['time_management_emp_avg'] + $adaptability_data['p_adaptability_emp_avg'] + $initiative_proactive_data['p_initiative_proactive_emp_avg'] + $creativity_problem_solving_data['p_creativity_problem_solving_emp_avg']; 
		$avgTotal = $sumTotal / 10;
		$data['main_emp_avg'] = number_format((float)$avgTotal, 2, '.', '');

        $managerData['manager_id'] = $this->session->userdata('emp_login_id');
        $managerData['manager_name'] = $this->em->getManagerInfo($this->session->userdata('emp_login_id'));
        $managerData['submit_manager_status'] = 2;

        // echo '<pre>';
        // print_r($managerData);
        // echo '</pre>';
        // exit;

        $this->em->submitByManagerScore($empId, $managerData);

		$res = $this->em->updateEmpMainAvgRating($data, $empId);

		if($res){
			$this->session->set_flashdata('emp_update_score_success', 'Employee Score Updated Successfully!!!');
			return redirect('Employee/ReEvaluateForm/'.$empId);
		}else{
			$this->session->set_flashdata('emp_update_score_not', 'Please Try Again!');
			return redirect('Employee/ReEvaluateForm/'.$empId);
		}

    }

}
?>
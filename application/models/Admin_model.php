<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model {

/*************Dashboard*******************/

    public function getTotalEmp(){
        $q = $this->db->select('*')
        ->from('employee_table')
        ->get();
        return $q->num_rows();
    }

    public function getTotalDepartment(){
        $q = $this->db->select('*')
        ->from('departments')
        ->get();
        return $q->num_rows();
    }

    public function getTotalDesignation(){
        $q = $this->db->select('*')
        ->from('designation')
        ->get();
        return $q->num_rows();
    }

    public function getTotalPerformance(){
        $q = $this->db->select('*')
        ->from('employee_performance')
        ->get();
        return $q->num_rows();
    }

    public function getTopPerformance(){
        $query = $this->db->query("SELECT *, MAX(main_emp_avg) AS 'maximum_performance' FROM employee_performance INNER JOIN employee_table ON employee_performance.employee_id = employee_table.main_employee_id GROUP BY(main_emp_avg) DESC LIMIT 5;"); 
        return $query->result();
    }

    public function getLowPerformance(){
        $query = $this->db->query("SELECT *, MIN(main_emp_avg) AS 'maximum_performance' FROM employee_performance INNER JOIN employee_table ON employee_performance.employee_id = employee_table.main_employee_id GROUP BY(main_emp_avg) ASC LIMIT 5;"); 
        return $query->result();
    }

    // Chart 

    public function getGratefulPerformance(){
        $query = $this->db->query(" SELECT * FROM employee_performance WHERE employee_performance.main_emp_avg >= 3 "); 
        return $query->num_rows();
    }

    public function getGoodPerformance(){
        $query = $this->db->query(" SELECT * FROM employee_performance WHERE employee_performance.main_emp_avg > 2 AND employee_performance.main_emp_avg < 3 "); 
        return $query->num_rows();
    }

    public function getAveragePerformance(){
        $query = $this->db->query(" SELECT * FROM employee_performance WHERE employee_performance.main_emp_avg < 2 "); 
        return $query->num_rows();
    }

    public function PerformanceResultDashboard(){

        $q = $this->db->select('main_employee_id, emp_performance_id, employee_first_name, employee_last_name, employee_image,department_name,employee_designation, emp_performance_start_date, emp_performance_end_date, communication_emp_avg, p_adaptability_emp_avg, p_creativity_problem_solving_emp_avg, dependability_emp_avg, p_initiative_proactive_emp_avg, knowledge_emp_avg, productivity_emp_avg, quality_emp_avg, software_emp_avg, time_management_emp_avg')
        ->from('employee_performance')
        ->join('employee_table', 'employee_performance.employee_id = employee_table.main_employee_id')
        ->join('departments', 'employee_table.employee_department = departments.department_id')
        ->join('p_communication_table', 'employee_table.main_employee_id = p_communication_table.employee_id')
        ->join('p_adaptability_table', 'employee_table.main_employee_id = p_adaptability_table.employee_id')
        ->join('p_creativity_problem_solving_table', 'employee_table.main_employee_id = p_creativity_problem_solving_table.employee_id')
        ->join('p_dependability_table', 'employee_table.main_employee_id = p_dependability_table.employee_id')
        ->join('p_initiative_proactive_table', 'employee_table.main_employee_id = p_initiative_proactive_table.employee_id')
        ->join('p_knowledge_table', 'employee_table.main_employee_id = p_knowledge_table.employee_id')
        ->join('p_productivity_table', 'employee_table.main_employee_id = p_productivity_table.employee_id')
        ->join('p_quality_table', 'employee_table.main_employee_id = p_quality_table.employee_id')
        ->join('p_software_table', 'employee_table.main_employee_id = p_software_table.employee_id')
        ->join('p_time_management_table', 'employee_table.main_employee_id = p_time_management_table.employee_id')

        ->limit(5)
        ->order_by('employee_performance.employee_id', "DESC")
        ->group_by('employee_performance.employee_id', "DESC")

        ->get();
        return $q->result();
    }



/********************Emp*********************/
    
    public function getEmpDepartment(){
        $q = $this->db->select('*')
        ->from('departments')
        ->get();
        return $q->result();
    }

    public function fetchDepartmentList($department){
        $this->db->where('f_department_id',$department);
        $this->db->order_by('designation_id', 'ASC');
        $query = $this->db->get('designation');
        $output = '<option value="">Select Designation</option>';
        foreach($query->result() as $row){
          $output .= '<option value="'.$row->designation_name.'">'.$row->designation_name.'</option>';
        }
        return $output;
    }

    public function getDepEmp($dep){
        $q = $this->db->select('department_name')
        ->from('departments')
        ->where('department_id', $dep)
        ->get();
        return $q->row()->department_name;
    }

    public function uploadEmpDetails($data){
        $data['emp_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('employee_table', $data); 
    }

    public function employeesListData($limit, $offset){
        $q = $this->db->select('*')
        ->from('employee_table')
        ->join('departments', 'employee_table.employee_department = departments.department_id')
        ->limit($limit, $offset)
        ->order_by('main_employee_id', "DESC")
        ->get();
        return $q->result();
    }

    public function num_rows_employees(){
        $q = $this->db->select('*')
        ->from('employee_table')
        ->get();
        return $q->num_rows();
    }

    public function deleteEmpDB($id){
        return $this->db->delete('employee_table', ['main_employee_id' => $id]);
    }

    public function get_empImg_id($empID){
        $q = $this->db->select('employee_image')
        ->from('employee_table')
        ->where('main_employee_id', $empID)
        ->get();
        return $q->row();
    }

    public function updateEmpInfo($data, $id){
        $this->db->where('main_employee_id ', $id);
        $this->db->update('employee_table', $data);
        return $this->db->affected_rows();
    }

    public function updateEMPStatus($employee_status, $employee_id){

        $id = array('main_employee_id' => $employee_id);
        $status = array('employee_status' => $employee_status);
        $this->db->where($id);
        $this->db->update('employee_table', $status);
        return $this->db->affected_rows();

    }



/*********************Emp Info***********************/

    public function getEmpDetails($id){

        $q = $this->db->select('*')
        ->from('employee_table')
        ->join('departments', 'employee_table.employee_department = departments.department_id')
        ->where('main_employee_id', $id)
        ->get();
        return $q->row();
        
    }

    public function getEmployeesPerformanceInfo($empId){

        // main_employee_id, emp_performance_id, employee_first_name, employee_last_name, employee_image,department_name,employee_designation, emp_performance_start_date, emp_performance_end_date, communication_emp_avg, p_adaptability_emp_avg, p_creativity_problem_solving_emp_avg, dependability_emp_avg, p_initiative_proactive_emp_avg, knowledge_emp_avg, productivity_emp_avg, quality_emp_avg, software_emp_avg, time_management_emp_avg

        $q = $this->db->select('*')
        ->from('employee_performance')
        ->where('employee_table.main_employee_id', $empId)
        ->join('employee_table', 'employee_performance.employee_id = employee_table.main_employee_id')
        ->join('departments', 'employee_table.employee_department = departments.department_id')
        ->join('p_communication_table', 'employee_table.main_employee_id = p_communication_table.employee_id')
        ->join('p_adaptability_table', 'employee_table.main_employee_id = p_adaptability_table.employee_id')
        ->join('p_creativity_problem_solving_table', 'employee_table.main_employee_id = p_creativity_problem_solving_table.employee_id')
        ->join('p_dependability_table', 'employee_table.main_employee_id = p_dependability_table.employee_id')
        ->join('p_initiative_proactive_table', 'employee_table.main_employee_id = p_initiative_proactive_table.employee_id')
        ->join('p_knowledge_table', 'employee_table.main_employee_id = p_knowledge_table.employee_id')
        ->join('p_productivity_table', 'employee_table.main_employee_id = p_productivity_table.employee_id')
        ->join('p_quality_table', 'employee_table.main_employee_id = p_quality_table.employee_id')
        ->join('p_software_table', 'employee_table.main_employee_id = p_software_table.employee_id')
        ->join('p_time_management_table', 'employee_table.main_employee_id = p_time_management_table.employee_id')
        ->get();
        return $q->row();

    }


/*********************Department***********************/

    public function uploadDepartment($data){
        $data['department_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('departments', $data); 
    }

    public function departmentsListData($limit, $offset){
        $q = $this->db->select('*')
        ->from('departments')
        ->limit($limit, $offset)
        ->order_by('department_id', "DESC")
        ->get();
        return $q->result();
    }

    public function num_rows_departments(){
        $q = $this->db->select('*')
        ->from('departments')
        ->get();
        return $q->num_rows();
    }

    public function deleteDepDB($id){
        return $this->db->delete('departments', ['department_id' => $id]);
    }

    public function updateDepartmentInfo($id, $data){
        $id = array('department_id' => $id);
        $this->db->where($id);
        $this->db->update('departments', $data);
        return $this->db->affected_rows();
    }

 /************************Departments*********************/

    public function getDepartmentsList(){
        $q = $this->db->select('*')
        ->from('departments')
        ->get();
        return $q->result();
    }

    public function uploadDesignation($data){
        $data['designation_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('designation', $data); 
    }

    public function designationListData($limit, $offset){
        $q = $this->db->select('*')
        ->from('designation')
        ->join('departments', 'designation.f_department_id = departments.department_id')
        ->limit($limit, $offset)
        ->order_by('designation_id', "DESC")
        ->get();
        return $q->result();
    }

    public function num_rows_designation(){
        $q = $this->db->select('*')
        ->from('designation')
        ->get();
        return $q->num_rows();
    }

    public function deleteDesDB($id){
        return $this->db->delete('designation', ['designation_id' => $id]);
    }

    public function updateDesignationInfo($id, $data){
        $id = array('designation_id' => $id);
        $this->db->where($id);
        $this->db->update('designation', $data);
        return $this->db->affected_rows();
    }


    /********************Employee Proformance ******************/

    public function getEmpNameList(){
        $q = $this->db->select('*')
        ->from('employee_table')
        ->get();
        return $q->result();
    }

    public function fetchDDList($employeeId){
        $this->db->where('main_employee_id',$employeeId);
        $this->db->join('departments', 'employee_table.employee_department = departments.department_id');
        $this->db->order_by('main_employee_id', 'ASC');
        $query = $this->db->get('employee_table');
        return $query->row()->department_name;
    }

    public function fetchDesiList($employeeId){
        $this->db->where('main_employee_id',$employeeId);
        $this->db->order_by('main_employee_id', 'ASC');
        $query = $this->db->get('employee_table');
        return $query->row()->employee_designation;
    }

    public function postEmployeePerformance($data){
        $data['performance_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('employee_performance', $data); 
    }


    public function PerformanceResultData($limit, $offset){
        $q = $this->db->select('main_employee_id, emp_performance_id, employee_first_name, employee_last_name, employee_image,department_name,employee_designation, emp_performance_start_date, emp_performance_end_date, communication_emp_avg, p_adaptability_emp_avg, p_creativity_problem_solving_emp_avg, dependability_emp_avg, p_initiative_proactive_emp_avg, knowledge_emp_avg, productivity_emp_avg, quality_emp_avg, software_emp_avg, time_management_emp_avg')
        ->from('employee_performance')
        ->join('employee_table', 'employee_performance.employee_id = employee_table.main_employee_id')
        ->join('departments', 'employee_table.employee_department = departments.department_id')
        ->join('p_communication_table', 'employee_table.main_employee_id = p_communication_table.employee_id')
        ->join('p_adaptability_table', 'employee_table.main_employee_id = p_adaptability_table.employee_id')
        ->join('p_creativity_problem_solving_table', 'employee_table.main_employee_id = p_creativity_problem_solving_table.employee_id')
        ->join('p_dependability_table', 'employee_table.main_employee_id = p_dependability_table.employee_id')
        ->join('p_initiative_proactive_table', 'employee_table.main_employee_id = p_initiative_proactive_table.employee_id')
        ->join('p_knowledge_table', 'employee_table.main_employee_id = p_knowledge_table.employee_id')
        ->join('p_productivity_table', 'employee_table.main_employee_id = p_productivity_table.employee_id')
        ->join('p_quality_table', 'employee_table.main_employee_id = p_quality_table.employee_id')
        ->join('p_software_table', 'employee_table.main_employee_id = p_software_table.employee_id')
        ->join('p_time_management_table', 'employee_table.main_employee_id = p_time_management_table.employee_id')

        ->limit($limit, $offset)
        ->order_by('employee_performance.employee_id', "DESC")
        ->group_by('employee_performance.employee_id', "DESC")
        ->get();
        return $q->result();
    }

    public function num_rows_PerformanceResult(){
        $q = $this->db->select('*')
        ->from('employee_performance')
        ->get();
        return $q->num_rows();
    }


    // Start Performance Tables 

    public function postEmployeeCommunication($data){
        $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_communication_table', $data); 
    }

    public function postEmployeeProductivity($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_productivity_table', $data); 
    }

    public function postEmployeeQuality($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_quality_table', $data); 
    }

    public function postEmployeeKnowledge($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_knowledge_table', $data); 
    }

    public function postEmployeeSoftware($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_software_table', $data); 
    }

    public function postEmployeeDependability($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_dependability_table', $data); 
    }

    public function postEmployeeTimeManagement($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_time_management_table', $data); 
    }

    public function postEmployeeAdaptability($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_adaptability_table', $data); 
    }

    public function postEmployeeInitiativeProactive($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_initiative_proactive_table', $data); 
    }

    public function postEmployeeCreativityProblemSolving($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_creativity_problem_solving_table', $data); 
    }

    // End Performance Tables


    // Edit Emp Score Data

    public function updateEmployeeCommunication($data, $employee_id){
        $id = array('employee_id' => $employee_id);
        $this->db->where($id);
        $this->db->update('p_communication_table', $data);
        return $this->db->affected_rows();
    }

    public function updateEmployeeProductivity($data, $employee_id){
        $id = array('employee_id' => $employee_id);
        $this->db->where($id);
        $this->db->update('p_productivity_table', $data);
        return $this->db->affected_rows();
    }

    public function updateEmployeeQuality($data, $employee_id){
        $id = array('employee_id' => $employee_id);
        $this->db->where($id);
        $this->db->update('p_quality_table', $data);
        return $this->db->affected_rows();
    }

    public function updateEmployeeKnowledge($data, $employee_id){ 
        $id = array('employee_id' => $employee_id);
        $this->db->where($id);
        $this->db->update('p_knowledge_table', $data);
        return $this->db->affected_rows();
    }

    public function updateEmployeeSoftware($data, $employee_id){
        $id = array('employee_id' => $employee_id);
        $this->db->where($id);
        $this->db->update('p_software_table', $data);
        return $this->db->affected_rows();
    }

    public function updateEmployeeDependability($data, $employee_id){
        $id = array('employee_id' => $employee_id);
        $this->db->where($id);
        $this->db->update('p_dependability_table', $data);
        return $this->db->affected_rows();
    }

    public function updateEmployeeTimeManagement($data, $employee_id){
        $id = array('employee_id' => $employee_id);
        $this->db->where($id);
        $this->db->update('p_time_management_table', $data);
        return $this->db->affected_rows(); 
    }

    public function updateEmployeeAdaptability($data, $employee_id){
        $id = array('employee_id' => $employee_id);
        $this->db->where($id);
        $this->db->update('p_adaptability_table', $data);
        return $this->db->affected_rows();
    }

    public function updateEmployeeInitiativeProactive($data, $employee_id){
        $id = array('employee_id' => $employee_id);
        $this->db->where($id);
        $this->db->update('p_initiative_proactive_table', $data);
        return $this->db->affected_rows();
    }

    public function updateEmployeeCreativityProblemSolving($data, $employee_id){
        $id = array('employee_id' => $employee_id);
        $this->db->where($id);
        $this->db->update('p_creativity_problem_solving_table', $data);
        return $this->db->affected_rows();
    }

    public function updateEmpMainAvgRating($data, $employee_id){

        $id = array('employee_id' => $employee_id);
        $this->db->where($id);
        $this->db->update('employee_performance', $data);
        return $this->db->affected_rows();

    }

    // Start Signature

    public function postManagerSignature($data){
        $data['p_signature_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_signature', $data); 
    }

    public function getManagerSignature($id){
        $q = $this->db->select('*')
        ->from('p_signature')
        ->where('employee_id', $id)
        ->group_by('p_signature.p_signature_id', "DESC")
        ->get();
        return $q->row();
    }

    // public function get_SignatureImg_id($ID){
    //     $q = $this->db->select('p_signature_img')
    //     ->from('p_signature')
    //     ->where('employee_id', $ID)
    //     ->get();
    //     return $q->row();
    // }

    // public function editManagerSignature($data, $ID){
    //     $signature_img = array('p_signature_img' => $data);
    //     $this->db->where('employee_id', $ID);
    //     $this->db->update('p_signature', $signature_img);
    //     return $this->db->affected_rows();
    // }

    public function deleteSignatureDB($id){
        return $this->db->delete('p_signature', ['employee_id' => $id]);   
    }

    // End Signature

}
?>
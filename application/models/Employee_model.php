
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employee_model extends CI_Model {

/*************Dashboard*******************/

    public function getEmpInfo($ID){
        $q = $this->db->select('*')
        ->from('employee_table')
        ->where('main_employee_id', $ID)
        ->get();
        return $q->row();
    }

    // check valid add aur not

    public function getVerifyAdd($id){
        $q = $this->db->select('*')
        ->from('employee_performance')
        ->where('employee_id', $id)
        ->get();
    
        if($q->row()){
            return 1;
        }else{
            return 0;
        }
    }

    // Employee Proformance

    public function uploadEmployeePerformance($data){
        $data['performance_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('employee_performance', $data); 
    }
    
    // Start Performance Tables 

    public function uploadEmployeeCommunication($data){
        $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_communication_table', $data); 
    }

    public function uploadEmployeeProductivity($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_productivity_table', $data); 
    }

    public function uploadEmployeeQuality($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_quality_table', $data); 
    }

    public function uploadEmployeeKnowledge($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_knowledge_table', $data); 
    }

    public function uploadEmployeeSoftware($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_software_table', $data); 
    }

    public function uploadEmployeeDependability($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_dependability_table', $data); 
    }

    public function uploadEmployeeTimeManagement($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_time_management_table', $data); 
    }

    public function uploadEmployeeAdaptability($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_adaptability_table', $data); 
    }

    public function uploadEmployeeInitiativeProactive($data){
        // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
        return $this->db->insert('p_initiative_proactive_table', $data); 
    }

    public function uploadEmployeeCreativityProblemSolving($data){
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

        public function getEmpDetails($id){

            $q = $this->db->select('*')
            ->from('employee_table')
            ->join('departments', 'employee_table.employee_department = departments.department_id')
            ->where('main_employee_id', $id)
            ->get();
            return $q->row();
            
        }

        public function get_empImg_id($empID){
            $q = $this->db->select('employee_image')
            ->from('employee_table')
            ->where('main_employee_id', $empID)
            ->get();
            return $q->row();
        }

        public function selfUpdateEmpInfo($data, $id){
            $this->db->where('main_employee_id ', $id);
            $this->db->update('employee_table', $data);
            return $this->db->affected_rows();
        }

            // Update Re Evatution
    
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
        public function getEmpDepartment(){
            $q = $this->db->select('*')
            ->from('departments')
            ->get();
            return $q->result();
        }
        public function getManagerSignature($id){
            $q = $this->db->select('*')
            ->from('p_signature')
            ->where('employee_id', $id)
            ->group_by('p_signature.p_signature_id', "DESC")
            ->get();
            return $q->row();
        }

        public function getEmployeesPerformance($id){
            $q = $this->db->select('*')
            ->from('employee_performance')
            ->where('employee_table.main_employee_id', $id)
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

           // Set Add Emp Score Data

        public function setEmployeeCommunication($data){
            $data['p_communication_post_date'] = date("d-m-Y H:i:s");
            return $this->db->insert('p_communication_table', $data); 
        }
    
        public function setEmployeeProductivity($data){
            // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
            return $this->db->insert('p_productivity_table', $data); 
        }
    
        public function setEmployeeQuality($data){
            // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
            return $this->db->insert('p_quality_table', $data); 
        }
    
        public function setEmployeeKnowledge($data){
            // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
            return $this->db->insert('p_knowledge_table', $data); 
        }
    
        public function setEmployeeSoftware($data){
            // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
            return $this->db->insert('p_software_table', $data); 
        }
    
        public function setEmployeeDependability($data){
            // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
            return $this->db->insert('p_dependability_table', $data); 
        }
    
        public function setEmployeeTimeManagement($data){
            // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
            return $this->db->insert('p_time_management_table', $data); 
        }
    
        public function setEmployeeAdaptability($data){
            // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
            return $this->db->insert('p_adaptability_table', $data); 
        }
    
        public function setEmployeeInitiativeProactive($data){
            // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
            return $this->db->insert('p_initiative_proactive_table', $data); 
        }
    
        public function setEmployeeCreativityProblemSolving($data){
            // $data['p_communication_post_date'] = date("d-m-Y H:i:s");
            return $this->db->insert('p_creativity_problem_solving_table', $data); 
        }

        public function setEmpMainAvgRating($data){
            $data['performance_post_date'] = date("d-m-Y H:i:s");
            return $this->db->insert('employee_performance', $data); 
        }
    

    // Get Employee Score List By Manager


    public function EvaluatedEmployeeList($limit, $offset){
        $q = $this->db->select('main_employee_id, emp_performance_id, employee_first_name, employee_last_name, employee_image,department_name,employee_designation, emp_performance_start_date, emp_performance_end_date, communication_emp_avg, p_adaptability_emp_avg, p_creativity_problem_solving_emp_avg, dependability_emp_avg, p_initiative_proactive_emp_avg, knowledge_emp_avg, productivity_emp_avg, quality_emp_avg, software_emp_avg, time_management_emp_avg, submit_employee_status, submit_manager_status, manager_id, manager_name')
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

    public function num_rows_EvaluatedEmployeeResult(){
        $q = $this->db->select('*')
        ->from('employee_performance')
        ->get();
        return $q->num_rows();
    }

    public function checkVerifyAllScores($id){
        $q = $this->db->select('main_emp_avg, communication_emp_avg, p_adaptability_emp_avg, p_creativity_problem_solving_emp_avg, dependability_emp_avg, p_initiative_proactive_emp_avg, knowledge_emp_avg, productivity_emp_avg, quality_emp_avg, software_emp_avg, time_management_emp_avg, submit_employee_status, submit_manager_status, manager_id, manager_name')
        ->from('employee_performance')
        ->where('employee_table.main_employee_id', $id)
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

    public function getManagerInfo($id){
        $q = $this->db->select('employee_first_name')
        ->from('employee_table')
        ->where('main_employee_id', $id)
        ->get();
        return $q->row()->employee_first_name;
    }

    public function submitByEmployeeScore($id){
        $id = array('employee_id' => $id);
        $status = array('submit_employee_status' => 1);
        $this->db->where($id);
        $this->db->update('employee_performance', $status);
        return $this->db->affected_rows();
    }

    public function submitByManagerScore($id, $data){
        $id = array('employee_id' => $id);
        $this->db->where($id);
        $this->db->update('employee_performance', $data);
        return $this->db->affected_rows();
    }

}
?>
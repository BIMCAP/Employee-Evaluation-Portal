
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

}

?>
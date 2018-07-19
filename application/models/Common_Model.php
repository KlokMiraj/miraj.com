<?php
/**
 * Description of Admin_Model
 *
 * @author dines
 */
class Common_Model extends CI_Model {
    
    function get_where($table_name, $order = '', $limit = '', $condition = '') {
        
        if($order != '') {
            $this->db->order_by($order);
        }
        if($limit != '') {
            $this->db->limit($limit);
        }
        if($condition != '')
            $this->db->where($condition);
        
        $q = $this->db->get($table_name);
        $Res = $q->result();
        return $Res ;
    }
    
    function insert($tbl_name, $data) {
        $this->db->insert($tbl_name, $data);
        return $this->db->insert_id();
    }
    
    function query($qry) {
        $q = $this->db->query($qry);
        $Res = $q->result();
        return $Res ;
    }
    
    function get_row($tbl_name, $id_edt) {
        
            $this->db->where($id_edt);
        $q = $this->db->get($tbl_name);
        $Res = $q->result();
        return $Res ;
    }
    
    public function query_test(){
        $this->load->library('unit_test');
/*----------------====================== 
 *----------------Test Case one ---------      */
         $test_case_one=$this->query("Select name from tbl_user where id='5'");
        $this->unit->run($test_case_one,'wasi','1).Query_retrival_function_testing');
        
        /*----------------====================== 
 *----------------Test Case two --------- */
        $test_case_two=$this->query("Select status from user_status where user_id=3");
        $this->unit->run($test_case_two,null,'2).Query_retrival_function_testing');
      /*----------------====================== 
 *----------------Test Case three ---------      
 *--------------=========================*/
        $test_case_three=$this->get_row('user_status','user_id=5');
        $this->unit->run($test_case_three,'is_array','3).Test_Case_three_get_row_function');
        
        /* Test Case four */
        
       $test_case_four=$this->get_where('tbl_user');
       $this->unit->run($test_case_four,'is_string','4).Testing the conditioning wuery function');
       
        $result=$this->unit->report();
        return $result;
    }
}

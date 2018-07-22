<?php
/**
 * Description of Admin_Model
 *
 * @author dumb
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
    function get_all($tbl_name){
        return $this->db->get($tbl_name);
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
//    
//     function product_file_upload($confg, $id, $i, $type) {
//
//        $imageName = str_replace(array("=", "/",")","(", " ", ",", "'", "+", " ", "#", ";", ":", "$", "&"), "-", "product_" . time() . $_FILES['image_file']['name'][$i]);
//        $_FILES['userfile']['name'] = $imageName;
//        $_FILES['userfile']['type'] = $_FILES['image_file']['type'][$i];
//        $_FILES['userfile']['tmp_name'] = $_FILES['image_file']['tmp_name'][$i];
//        $_FILES['userfile']['error'] = $_FILES['image_file']['error'][$i];
//        $_FILES['userfile']['size'] = $_FILES['image_file']['size'][$i];
//        
//        $this->upload->initialize($confg);
//        $this->upload->do_upload();
//
//        if (($_FILES['image_file']['name'][$i]) != NULL) {
//            $imgFileData = array('product_id' => $id, 'media_url' => base_url('assets/product/media/').$imageName, 'type' => $type, 'status' => 1);
//            $this->db->insert('tbl_product_media', $imgFileData);
//        }
//    }
//    
//    function product_video_upload($confg, $id, $i, $type) {
//        
//        $imageName = str_replace(array("=", "/",")","(", " ", ",", "'", "+", " ", "#", ";", ":", "$", "&"), "-", "product_" . time() . $_FILES['video_file']['name'][$i]);
//        $_FILES['userfile']['name'] = $imageName;
//        $_FILES['userfile']['type'] = $_FILES['video_file']['type'][$i];
//        $_FILES['userfile']['tmp_name'] = $_FILES['video_file']['tmp_name'][$i];
//        $_FILES['userfile']['error'] = $_FILES['video_file']['error'][$i];
//        $_FILES['userfile']['size'] = $_FILES['video_file']['size'][$i];
//
//        $this->upload->initialize($confg);
//        $this->upload->do_upload();
//
//        if (($_FILES['video_file']['name'][$i]) != NULL) {
//            $imgFileData = array('product_id' => $id, 'media_url' => base_url('assets/product/media/').$imageName, 'type' => $type, 'status' => 1);
//            $this->db->insert('file_info', $imgFileData);
//        }
//    }
//    function displai_img_upload($productId, $is_update) {
//
//        $imgName = str_replace(array("=", "/", " ",")","(", ",", "'", "+", " ", "#", ";", ":", "$", "&",), "-", "displai_" . time() . $_FILES['media_url_admin']['name']);
//        $config['file_name'] = $imgName;
//        $config['upload_path'] = 'assets/product/image/';
//        $config['allowed_types'] = "gif|jpg|jpeg|png";
//        $this->upload->initialize($config);
//        if ($this->upload->do_upload('media_url_admin')) {
//            if ($is_update == TRUE) {
//                $this->db->where(array('product_id' => $productId));
//                $this->db->update('tbl_product_media_by_admin', array('media_url_admin' => base_url('assets/product/image/').$imgName));
//            } else {
//                $this->db->insert('tbl_product_media_by_admin', array('media_url_admin' => base_url('assets/product/image/').$imgName, 'product_id' => $productId));
//            }
//        } else {
//            echo $this->upload->display_errors();
//            die();
//        }
//    }
//
//    function brand_img_upload($postData, $is_update) {
//        
//        $imgName = str_replace(array("=", "/", " ",")","(", ",", "'", "+", " ", "#", ";", ":", "$", "&", "%",), "-", "displai_" . time() . $_FILES['brand_image']['name']);
//        $postData['brand_image'] = base_url('assets/brand/image/').$imgName;
//        
//        
//        $config['file_name'] = $imgName;
//        $config['upload_path'] = 'assets/brand/image/';
//        $config['allowed_types'] = "gif|jpg|jpeg|png";
//        
//        $this->upload->initialize($config);
//
//        if ($this->upload->do_upload('brand_image')) {
//            if ($is_update == TRUE) {
//                $this->db->where(array('id' => $postData['id']));
//                $this->db->update('tbl_brands', $postData);
//                return TRUE;
//                exit;
//            } else {
//                $this->db->insert('tbl_brands', $postData);
//                return $this->db->insert_id();
//                exit;
//            }
//        } else {
//            return $this->upload->display_errors();
//            exit;
//        }
//    }

}

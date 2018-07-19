<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Profiles extends ADMIN_Controller{
   public function index(){
       $id_edt=$this->session->userdata('id');
       echo $id_edt;
       if(isset($id_edt)){
          $res= $this->Common_Model->query('select * from tbl_user WHERE id='.$id_edt.'');
            if($res){
                $data['res']=$res;
                $data['role_title']=$this->get_role_name();
                $data['title']="Profile";
                $data['main_page']='admin/dashboard/artist/u_profile';
                 $this->load->view(BACKEND,$data);
            }else{
               $this->sesison->set_flashdata("Error opeing page");
            }
       }
      
   }
}
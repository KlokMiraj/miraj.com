<?php

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
   
   public function other_user_profile($id){
           if(isset($id)){
               $condition['id']=$id;
               $res=$this->Common_Model->get_row('tbl_user',$condition);
               
               if($res){
                $data['res']=$res;
                $data['title']="Profile";
                $data['role_title']=$this->get_role_name();
                $data['main_page']='admin/dashboard/artist/u_profile';
                 $this->load->view(BACKEND,$data);
               }
           }
       }
}
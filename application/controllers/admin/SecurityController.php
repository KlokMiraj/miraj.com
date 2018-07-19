<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SecurityController
 *
 * @author miraj
 */
class SecurityController extends CI_Controller {
    
    
    function login() {
        
        if($_POST){
            
            $sql = 'SELECT * '
                    . 'FROM tbl_user '
                    . 'WHERE email = "'.$_POST['email'].'" AND password = "'.$_POST['password'].'"';
            
            $res = $this->Common_Model->query($sql);
            if($res != NULL){
                $this->unset_user_session();
                $sess_data = array(
                    'id'=>$res[0]->id,
                    'name'=>$res[0]->name,
                    'email'=>$res[0]->email,
                    'role'=>$res[0]->role
                );
//                array_push($sess_data,$status);
                $this->session->set_userdata($sess_data);
                redirect(base_url('admin/dashboard/'));
            } else {
                redirect(base_url('admin'));
            }
        }
        $this->load->view('admin/login');
    }
    
    function sign_up() {
        
        $this->unset_user_session();
        if($_POST){
            $data_to_insert = array(
                'name' => $this->input->post('name'),
                'password' => $this->input->post('password'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'role' => $this->input->post('role'),
            );
            
            $check = $this->Common_Model->get_row('tbl_user',array('email'=>$this->input->post('email')));
            if( $check == NULL ){
                $id = $this->Common_Model->insert('tbl_user', $data_to_insert);
                if($id > '0'){
                    redirect(base_url('admin'));
                }
            }
            redirect(base_url());
        }
        $this->load->view('resistration');
    }
    
    function sign_out() {
        $this->unset_user_session();
        redirect(base_url('admin'));
    }
    
    function unset_user_session() {
        
        $sess_data = array( 'id', 'name', 'email', 'role',);
        $this->session->unset_userdata($sess_data);
    }
    
//    Function to save the user status
    public function status(){
        if($this->input->post()){
           
           if($this->Common_Model->insert('user_status',$this->input->post())){
               $this->Session->set_flashdata("sucessfully updated status");
              
               redirect('admin/dashboard');
               
           };
        }
         redirect('admin/dashboard');
    }
    
   
}

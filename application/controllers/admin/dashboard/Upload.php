<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Upload extends ADMIN_Controller{
    public function index(){
        $data['role_title']=$this->get_role_name();
        $data['title']="Upload Center";
        $data['main_page']='admin/dashboard/artist/u_dash';
        $this->load->view(BACKEND,$data);
    }
    
}
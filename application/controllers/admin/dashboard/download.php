<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Download extends ADMIN_Controller{
    public function __construct(){
        parent::__construct();
        }
        
        public function index(){
           
        $data['role_title']=$this->get_role_name();
        $data['title']="Download Center";
        $data['main_page']='admin/dashboard/listener/download';
        $this->load->view(BACKEND,$data);
    
        }
}
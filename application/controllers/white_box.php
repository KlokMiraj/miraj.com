<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class White_box extends CI_Controller{
    
    public function index(){
       echo  $this->Common_Model->query_test();
    }
    
    
}
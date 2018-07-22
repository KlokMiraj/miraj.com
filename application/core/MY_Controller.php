<?php
/**
 * Description of MY_Controller
 *
 * @author dumb
 */
class MY_Controller extends CI_Controller {
    //put your code here
}
class ADMIN_Controller extends CI_Controller {

    function __construct() {
	parent::__construct();
        if(($this->session->userdata('id'))==NULL){
            $this->session->set_flashdata('error','Please login to view this page');
            redirect(base_url('admin'));
        }  	
    }
    
    function get_role_name() {
        
        if(($this->session->userdata('role'))== '1'){
            return 'main admin';
        } elseif (($this->session->userdata('role'))== '2') {
            return 'artist admin';
        } elseif (($this->session->userdata('role'))== '3') {
            return 'listener admin';
        }
    }
    
    
    function get_user_name() {
        
        if(($this->session->userdata('name'))!= NULL){
            return $this->session->userdata('name');
        }
    }

}
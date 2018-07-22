<?php
/**
 * Description of homeController
 *
 * @author dumb
 */
class HomeController extends ADMIN_Controller {
    
    function __construct() {
	parent::__construct();
        if(($this->session->userdata('id'))==NULL){
            redirect(base_url('admin'));
        }  	
    }
    
    function home() {
        $data['role_title'] = $this->get_role_name();
        $data['main_page'] = 'admin/dashboard/home';
        $data['title']="Dashboard";
        $data['page_content'] = $this->get_role_name();
        $this->load->view(BACKEND, $data);
    }
    
}

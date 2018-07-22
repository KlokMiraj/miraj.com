<?php

/**
 * Description of SecurityController
 *
 * @author cumb
 */
class SecurityController extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        $this->load->view('admin/login');
    }
    function login() {

        
            if ($_POST) {
                
                $sql = 'SELECT * '
                        . 'FROM tbl_user '
                        . 'WHERE email = "' . $_POST['email'] . '" AND password = "' . $_POST['password'] . '"';
                $res = $this->Common_Model->query($sql);
                if ($res != NULL) {
                  
                    $this->unset_user_session();
                    $sess_data = array(
                        'id' => $res[0]->id,
                        'name' => $res[0]->name,
                        'email' => $res[0]->email,
                        'role' => $res[0]->role
                    );
                    
                    $this->session->set_userdata($sess_data);
                    $this->session->set_flashdata('success', 'Sucessfully Logged in');
                    redirect(base_url('admin/dashboard/'));
                } else {
                    redirect(base_url('admin'));
                }
            }
            $this->load->view('admin/login');
        
    }

    function sign_up() {

        $this->unset_user_session();
        if ($_POST) {

            $this->form_validation->set_rules('name', 'User Name', 'Required');
            $this->form_validation->set_rules('password', 'Password', 'required|max_length[12]|min_length[8]');
            $this->form_validation->set_rules('phone', 'Phone', 'Numeric|Required');
            $this->form_validation->set_rules('Email', 'Email', 'Required');
            $this->form_validation->set_rules('name', '');

            if ($this->form_validation->run()) {
                $data_to_insert = array(
                    'name' => $this->input->post('name'),
                    'password' => $this->input->post('password'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'role' => $this->input->post('role'),
                );

                $check = $this->Common_Model->get_row('tbl_user', array('email' => $this->input->post('email')));
                if ($check == NULL) {
                    $id = $this->Common_Model->insert('tbl_user', $data_to_insert);
                    if ($id > '0') {
                        $this->session->set_flashdata('success', 'Sucessfully Creteated User');
                        $this->session->set_userdata('name', $this->input->post('name'));
                        redirect(base_url('admin'));
                    }
                }
                redirect(base_url());
            }else{
$this->load->view('resistration');
            }
        }
        $this->load->view('resistration');
    }

    function sign_out() {
        $this->unset_user_session();
        $this->session->set_flashdata('logout', 'Scuessfully logged out and cleared session');
        redirect(base_url('admin'));
    }

    function unset_user_session() {

        $sess_data = array('id', 'name', 'email', 'role',);
        $this->session->unset_userdata($sess_data);
    }

//    Function to save the user status
    public function status() {
        if ($this->input->post()) {
            if ($this->Common_Model->insert('user_status', $this->input->post())) {
                $this->Session->set_flashdata("sucessfully updated status");
                $this->Session->set_flashdata('success', 'Sucessfully Updated status');
                redirect('admin/dashboard');
            };
        }

        redirect('admin/dashboard');
    }

}

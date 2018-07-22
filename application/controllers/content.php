<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Dashboard
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Content extends ADMIN_Controller {

    function index() {

        $status = array(
            'status' => '1',
            'retailer_id' => $this->get_role_name()
        );
        $data['products'] = $this->Common_Model->get_where('file_info', $status);
        $data['title'] = "Uploaded content";
        $data['subtitle'] = "List";
        $data['main_content'] = 'admin/dashboard/artist/file_list';
        $this->load->view(BACKEND, $data);
    }

    public function add($id = '') {
        if ($this->input->post()) {
            $this->form_validation->set_rules('product_name', 'Product Name', 'required');
            $this->form_validation->set_rules('sku', 'SKU', 'required|min_length[2]');
            $this->form_validation->set_rules('price', 'Product Price', 'required|numeric');
            $this->form_validation->set_rules('qty', 'Product Quantity', 'required|numeric');


            if ($this->form_validation->run()) {

                if ($id != NULL) {
                    $condition = $this->where_retailer_id();
                    $condition['id'] = $id;
                    $udateResult = $this->Common_Model->update_product($condition);

                    if ($udateResult == TRUE) {

                        $this->Common_Model->delete('tbl_product_media', array('product_id' => $id, 'type' => 'video_url'));
                        $video_url = $this->input->post('video_url');
                        foreach ($video_url as $videoUrl) {
                            if ($videoUrl != '') {
                                $vData = array('product_id' => $id, 'type' => 'video_url', 'media_url' => $videoUrl, 'status' => '1');
                                $this->Common_Model->insert('tbl_product_media', $vData);
                            }
                        }

                        $this->Common_Model->delete('tbl_product_media', array('product_id' => $id, 'type' => 'iframe_url'));
                        $iframe_url = ($this->input->post('iframe_url'));
                        foreach ($iframe_url as $iframeUrl) {
                            if ($iframeUrl != '') {
                                $iFrmData = array('product_id' => $id, 'type' => 'iframe_url', 'media_url' => $iframeUrl, 'status' => '1');
                                $this->Common_Model->insert('tbl_product_media', $iFrmData);
                            }
                        }

                        $productImages = $this->input->post('image_file');
                        $db_images = $this->Common_Model->get_all('tbl_product_media', array('product_id' => $id, 'type' => 'image_file'));
                        foreach ($db_images as $db_img) {
                            if (!in_array($db_img->media_url, $productImages)) {
                                $filePth1 = str_replace(base_url(), '', $db_img->media_url);
                                unlink($filePth1);
                                $this->Common_Model->delete('tbl_product_media', array('product_id' => $id, 'media_url' => $db_img->media_url, 'type' => 'image_file'));
                            }
                        }
                        if (($_FILES['image_file']['name']) != NULL) {
                            $this->load->library('upload');
                            foreach ($_FILES['image_file']['name'] as $i => $value) {
                                $this->Common_Model->product_file_upload($this->imgConfig(), $id, $i, 'image_file');
                            }
                        }

                        $product_video_file = $this->input->post('video_file');
                        $db_video_file = $this->Common_Model->get_all('tbl_product_media', array('product_id' => $id, 'type' => 'video_file'));
                        foreach ($db_video_file as $db_vdo_file) {
                            if (!in_array($db_vdo_file->media_url, $product_video_file)) {
                                $filePth = str_replace(base_url(), '', $db_vdo_file->media_url);
                                unlink($filePth);
                                $this->Common_Model->delete('tbl_product_media', array('product_id' => $id, 'media_url' => $db_vdo_file->media_url, 'type' => 'video_file'));
                            }
                        }
                        if (($_FILES['video_file']['name']) != NULL) {
                            $this->load->library('upload');
                            foreach ($_FILES['video_file']['name'] as $i => $value) {
                                $this->Common_Model->product_video_upload($this->videoConfig(), $id, $i, 'video_file');
                            }
                        }

                        if ((($_FILES['media_url_admin']['name']) != NULL)) {
                            $is_update = FALSE;
                            if ($this->input->post('old_media_url_admin') != NULL) {
                                $is_update = TRUE;
                                $filePth = str_replace(base_url(), '', $this->input->post('old_media_url_admin'));
                                unlink($filePth);
                            }
                            $this->Common_Model->displai_img_upload($id, $is_update);
                        }
                        $this->session->set_flashdata('message', 'Your Product has been successfully updated.');
                        redirect(base_url('products'));
                    } else {

                        $this->session->set_flashdata('error', 'Error while updating product.');
                        redirect(base_url('products-form/' . $id));
                    }
                } else {

                    $productId = $this->Common_Model->add_product($this->retailer_id());
                    if ($productId > 0) {

                        if (($_FILES['image_file']['name']) != NULL) {
                            $this->load->library('upload');
                            foreach ($_FILES['image_file']['name'] as $i => $value) {
                                $this->Common_Model->product_file_upload($this->imgConfig(), $productId, $i, 'image_file');
                            }
                        }

                        if (($_FILES['video_file']['name']) != NULL) {
                            $this->load->library('upload');
                            foreach ($_FILES['video_file']['name'] as $i => $value) {
                                $this->Common_Model->product_video_upload($this->videoConfig(), $productId, $i, 'video_file');
                            }
                        }

                        $video_url = $this->input->post('video_url');
                        foreach ($video_url as $videoUrl) {
                            $vData = array('product_id' => $productId, 'type' => 'video_url', 'media_url' => $videoUrl, 'status' => '1');
                            $this->Common_Model->insert('tbl_product_media', $vData);
                        }

                        $iframe_url = $this->input->post('iframe_url');
                        foreach ($iframe_url as $iframeUrl) {
                            $iFrmData = array('product_id' => $productId, 'type' => 'iframe_url', 'media_url' => $iframeUrl, 'status' => '1');
                            $this->Common_Model->insert('tbl_product_media', $iFrmData);
                        }

                        if ((($_FILES['media_url_admin']['name']) != NULL)) {
                            $is_update = FALSE;
                            $this->Common_Model->displai_img_upload($productId, $is_update);
                        }

                        $this->session->set_flashdata('message', 'Your Product has been successfully added.');
                        redirect(base_url('products'));
                    } else {

                        $this->session->set_flashdata('error', 'Your Product could not be added.');
                        redirect(base_url('products-form'));
                    }
                }
            }
        }

        if ($id != '') {

            $condition = $this->where_retailer_id();
            $condition['id'] = $id;



            $data['product'] = $this->Common_Model->get_row('tbl_products', $condition);

            if ($data['product'] != NULL) {


                $Media = $this->Common_Model->get_all('tbl_product_media', array('product_id' => $id));
                if ($Media != NULL) {
                    $data['media'] = $Media;
                }

                $adminMediaChk = $this->Common_Model->get_row('tbl_product_media_by_admin', array('product_id' => $data['product']->id));
                if ($adminMediaChk != NULL) {
                    $data['media_url_admin'] = $adminMediaChk->media_url_admin;
                }
                $data['is_update'] = TRUE;
                $data['title'] = "My Products";
                $data['subtitle'] = "Add";
                $data['main_content'] = 'retailers/products/add_update';


                $this->load->view(BACKEND, $data);
            } else {
                $this->session->set_flashdata('error', 'Sorry, Record could not be added.');
                redirect(base_url('products'));
            }
        } else {

            $data['is_update'] = FALSE;
            $data['title'] = "My Products";
            $data['subtitle'] = "Add";
            $data['main_content'] = 'admin/dashboard/artist/u_dash';
            $this->load->view(BACKEND, $data);
        }
    }

    function delete($id = '') {
        if (has_access_to_customer($id)) {
            if ($id != null) {
                $postData = array();
                $postData['status'] = 0;

                $condition['id'] = $id;

                $result = $this->Common_Model->update('tbl_products', $postData, $condition);

                if ($result > 0) {
                    $this->session->set_flashdata('message', 'Sucessfully Deleted Product');
                    redirect(base_url('products'));
                } else {
                    $this->session->set_flashdata('error', 'Error deleting product');
                    redirect(base_url('products'));
                }
            }
        } else {
            $this->session->set_flashdata('messege', '');
            redirect('dashboard');
        }
    }

    function change_active_status() {

        $id = $this->input->post('id');
        $pro = $this->Common_Model->get_row('tbl_products', array('id' => $id));

        if (($pro->is_active) == '1') {
            $pro = $this->Common_Model->update('tbl_products', array('is_active' => '0'), array('id' => $id));
            echo "Your Product has been successfully de-activated.";
            exit();
        } else {
            $pro = $this->Common_Model->update('tbl_products', array('is_active' => '1'), array('id' => $id));
            echo "Your Product has been successfully activated.";
            exit();
        }
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Wholesaler_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $arr = array(
            'user_id'=> $this->session->userdata('id')
        );

        $this->data['products'] = $this->pm->get_by($arr);

        $this->data['user_profile'] = $this->wm->get($this->session->userdata('id'));
        $this->load->view('wholesaler/products/products_view', $this->data);
    }

    public function detail_product($product_id = null)
    {
        if($product_id != null)
        {
            $this->data['product'] = $this->pm->get($product_id);

            $this->data['user_profile'] = $this->wm->get($this->session->userdata('id'));

            if(($this->data['product']->id)  != null)
            {
                $this->load->view('wholesaler/products/product_detail', $this->data);
            }

            else
            {
                redirect('wholesaler/products');
            }
        }

        else
        {
            redirect('wholesaler/products');
        }

    }

    public function edit_product($product_id)


    {
        $this->data['user_profile'] = $this->wm->get($this->session->userdata('id'));
        $this->data['product'] = $this->pm->get($product_id);

        if(($this->data['product']->id)  == null)
        {
            redirect('wholesaler/products');
        }

        $rules = $this->pm->rules_register;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'product_name' => $this->input->post('product_name'),
                'price' => $this->input->post('price'),
                'quantity' => $this->input->post('quantity'),
                'discount' => $this->input->post('discount'),
                'description' => $this->input->post('description'),
                'available' => $this->input->post('available')
                );

            if (!empty($_FILES['pic']['name'])) {
                $aaa = $this->do_upload();
                if ($aaa != FALSE) {

                    $this->session->set_flashdata('info_product', 'Product Updated');
                    $data['pic'] = $aaa;

                    $this->pm->update($data,$product_id);
                    redirect('wholesaler/edit_product/' . $product_id);
                }
                else {
                    $this->session->set_flashdata('upload_error', 'Error While Uploading file');
                }
            }
            $this->session->set_flashdata('info_product', 'Product Updated');
            $this->pm->update($data,$product_id);
            redirect('wholesaler/products/edit_product/'. $product_id);
        }

        $this->load->view('wholesaler/products/edit_product_view', $this->data);
    }

    public function delete_product($product_id=null)
    {
        if($product_id == null)
        {
            redirect('wholesaler/products');
        }
        $this->pm->delete($product_id);
        $this->session->set_flashdata('info_profile', 'Product Deleted');
        redirect('wholesaler/products');
    }


    public function add_product()
    {
        $this->data['user_profile'] = $this->wm->get($this->session->userdata('id'));

        $rules = $this->pm->rules_register;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'product_name' => $this->input->post('product_name'),
                'price' => $this->input->post('price'),
                'quantity' => $this->input->post('quantity'),
                'discount' => $this->input->post('discount'),
                'description' => $this->input->post('description'),
                'available' => $this->input->post('available'),
                'category' => $this->session->userdata('category'),
                'user_id' => $this->session->userdata('id'),
                'date_added' => date('Y-m-d H:i:s'),
            );

            if (!empty($_FILES['pic']['name'])) {
                $aaa = $this->do_upload();
                if ($aaa != FALSE) {

                    $this->session->set_flashdata('info_profile', 'New Product Added');
                    $data['pic'] = $aaa;

                    $this->pm->create($data);
                    $this->notify_admin($data, $this->db->insert_id(), $this->session->userdata('id'));
                    redirect('wholesaler/products/add_product');
                }
                else {
                    $this->session->set_flashdata('upload_error', 'Error While Uploading file');
                }
            }
            else
            {
                $this->session->set_flashdata('upload_error', 'Image File Required');
            }

            redirect('wholesaler/products/add_product');
        }

        $this->load->view('wholesaler/products/add_product_view', $this->data);
    }

    public function do_upload()
    {
        $config['upload_path'] = ('./assets/products');
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['overwrite'] = TRUE;
        $config['file_name'] = $this->session->userdata('username') . "_" . $this->input->post('product_name') ;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('pic')) {
            $error = array('error' => $this->upload->display_errors());
            return FALSE;

        } else {
            $data = $this->upload->data();
            $this->do_image_manipulation($data['file_name']);
            return $data['file_name'];
        }

    }

    public function do_image_manipulation($file_name)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = 'assets/products/' . $file_name;
        $config['width'] = 300;
        $config['height'] = 300;
        $config['maintain_ratio'] = FALSE;


        $this->load->library('image_lib', $config);


        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        } else {
            echo "Success";
        }
    }

    public function notify_admin($data, $product_id, $wholesaler_id)
    {
        $product_name = $this->input->post('product_name');
        $product_href = "<h4><a href='" . base_url('admin/products/detail_product/' . $product_id) . "' target='_blank' >" .$product_name . "</a></h4>";

        $wholesaler_name = $this->session->userdata('username');
        $wholesaler_href = "<h4><a href='" . base_url('admin/users/detail_wholesaler/' . $wholesaler_id) . "' target='_blank' >" . $wholesaler_name . "</a></h4>";


        $message_details = "Product : ". $product_href . " was added by wholesaler : " . $wholesaler_href;


        $this->load->model('adminnotify_model');
        $data = array(
            'subject' => ' New Product added ',
            'message' => $message_details,
            'status' => 'Unread',
            'from_id' => $wholesaler_id,
            'to_id' => null,
            'date_added' => date('Y-m-d H:i:s')
        );

        $this->adminnotify_model->create($data);

    }

}
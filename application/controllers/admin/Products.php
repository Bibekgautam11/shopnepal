<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {


        $this->data['products'] = $this->pm->join_get_product();

        $this->data['user_profile'] = $this->uam->get($this->session->userdata('id'));

        $this->load->view('admin/products/products_view', $this->data);

    }

    public function detail_product($id = null)
    {
        if ($id != null) {
            $this->data['product'] = $this->pm->join_get_all($id);

            $this->data['user_profile'] = $this->uam->get($this->session->userdata('id'));

            $this->load->view('admin/products/product_detail_view', $this->data);
        } else {
            redirect('admin/products');
        }


    }

    public function delete_product($id = null)
    {

        if ($id != null) {
            $this->pm->delete($id);
        }

        redirect('admin/products', 'refresh');
    }

}
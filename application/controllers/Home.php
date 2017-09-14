<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends GUEST_Controller
{


    //Default Controller
    public function index()
    {
        $this->load->model('product_model', 'pm');
        $this->db->where('discount !=', 0);
        $this->data['products'] = $this->pm->get();
        $this->load->view('home/home_view', $this->data);
    }

    public function check_link($product_id)
    {
        $link = 'users/login';
        if (count($this->session->userdata('id'))):
            if (($this->session->userdata('type')) == 'ws') {
                $link = 'wholesaler/dashboard';
            } elseif (($this->session->userdata('type')) == 'rt') {
                $link = 'retailer/products/detail_product/'. $product_id;
            } else {
                $link = 'admin/products/detail_product/'. $product_id;
            }
        endif;

        redirect($link,'refresh');

    }
}

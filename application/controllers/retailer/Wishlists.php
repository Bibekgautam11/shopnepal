<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlists extends Retailer_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('wishlist_model', 'wlm');
        $this->load->model('wholesaler_model', 'wm');
    }

    public function index()
    {

        $this->data['user_profile'] = $this->rm->get($this->session->userdata('id'));

        $aa = array(
            'retailer_id' => $this->session->userdata('id')
        );


        $this->data['wish_products'] = $this->wlm->get_by($aa);


        $this->data['wish_products_details'] = array();
        $dataa = array();
        foreach ($this->data['wish_products'] as $product):

            $dataa[] = $this->data['wish_products_details'] = $this->pm->get($product->product_id);


        endforeach;
        $this->data['wish_products_details'] = $dataa;
        $this->data['products'] = $this->pm->get();

        $this->load->view('retailer/wishlist_view', $this->data);

    }


    public function add($product_id)
    {

        $wholesaler_id = $this->pm->get($product_id, TRUE)->user_id;

        $retailer_id = $this->session->userdata('id');

        $data = array(

            'product_id' => $product_id,
            'retailer_id' => $retailer_id,
            'wholesaler_id' => $wholesaler_id
        );

        $this->wlm->create($data);
        $this->notify_wholesaler($product_id,$retailer_id, $wholesaler_id);
        redirect("retailer/products/detail_product/" . $product_id);
    }

    public function notify_wholesaler($product_id, $retailer_id, $wholesaler_id)
    {
        $product_name = $this->pm->get($product_id, TRUE)->product_name;
        $product_href = "<h4><a href='" . base_url('wholesaler/products/detail_product/' . $product_id) . "' target='_blank' >" .$product_name . "</a></h4>";

        $retailer_name = $this->session->userdata('username');
        $retailer_href = "<h4><a href='" . base_url('wholesaler/users/detail_retailer/' . $retailer_id) . "' target='_blank' >" . $retailer_name . "</a></h4>";


        $message_details = "Product : ". $product_href . " was added to wishlist by retailer : " . $retailer_href;


        $this->load->model('wsnotify_model');
        $data = array(
            'subject' => ' Product added to Wishlist',
            'message' => $message_details,
            'status' => 'Unread',
            'from_id' => $retailer_id,
            'to_id' => $wholesaler_id,
            'date_added' => date('Y-m-d H:i:s')
        );

        $this->wsnotify_model->create($data);

    }



    public function remove($product_id)
    {

//        $wholesaler_id = $this->pm->get($product_id, TRUE)->user_id;


        $id = $this->wlm->get_id_wishlist($product_id, $this->session->userdata('id'));

        $this->wlm->delete($id);
        redirect("retailer/products/detail_product/" . $product_id);
    }

    public function remove_wish($product_id)
    {

        $id = $this->wlm->get_id_wishlist($product_id, $this->session->userdata('id'));

        $this->wlm->delete($id);
        redirect("retailer/wishlists");
    }
}
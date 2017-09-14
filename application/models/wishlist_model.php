<?php

class  Wishlist_Model extends MY_Model
{
    protected $_table_name = 'wishlist';
    protected $_primary_key = 'id';
    protected $_order_by = 'id';
    public $rules = array();


    public function __construct()
    {
        parent::__construct();

        $this->load->model('wholesaler_model','wm');
        $this->load->model('retailer_model','rm');
        $this->load->model('product_model','pm');
    }

    public function check_in_wishlist($product_id, $retailer_id)
    {

        $detail = $this->get_by(array(
            'product_id' => $product_id,
            'retailer_id' => $retailer_id,
        ), TRUE);


        if(count($detail)):

            return TRUE;

        else:

            return FALSE;

        endif;

    }

    public function get_id_wishlist($product_id, $retailer_id)
    {

        $detail = $this->get_by(array(
            'product_id' => $product_id,
            'retailer_id' => $retailer_id,
        ), TRUE);


        if(count($detail)):

            return $detail->id;

        else:

            return FALSE;

        endif;

    }

    public function join_get_all($product_id)
    {

        $this->db->select('
            wishlist.id,
            wishlist.retailer_id,
            wishlist.wholesaler_id,
            wishlist.product_id,
            products.product_name,
            products.category,
            products.pic,
            products.date_added,
           '
        );

        $this->db->join('products','wishlist.product_id = products.id');
        $this->db->where('products.id', $product_id);

        return($this->get());

    }



}

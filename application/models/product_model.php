<?php

class  Product_Model extends MY_Model
{
    protected $_table_name = 'products';
    protected $_primary_key = 'id';
    protected $_order_by = 'product_name';
    public $rules = array();

    public $rules_register = array(
        'product_name' => array(
            'field' => 'product_name',
            'label' => 'Product Name',
            'rules' => 'trim|required|max_length[50]'
        ),
        'price' => array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'trim|required'
        ),
        'quantity' => array(
            'field' => 'quantity',
            'label' => 'Quantity',
            'rules' => 'trim|required'
        ),
        'description' => array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'trim|required|max_length[300]'
        ),
        'available' => array(
            'field' => 'available',
            'label' => 'Available',
            'rules' => 'trim|required'
        )
    );


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function join_get_name($product_id)
    {
        $this->db->limit(1);
        $this->db->select('
            wholesaler.id,
            wholesaler.fullname'
        );


        $this->db->join('wholesaler','products.user_id = wholesaler.id');
        $this->db->where('products.id', $product_id);

        return($this->get('', TRUE));

    }

    public function join_get_all($product_id)
    {
        $this->db->limit(1);
        $this->db->select('
            wholesaler.id as whid,
            wholesaler.fullname,
            products.id as prid,
            products.product_name,
            products.price,
            products.quantity,
            products.description,
            products.pic,
            products.available,
            products.discount,
            products.date_added,
            products.category
            '
        );


        $this->db->join('wholesaler','products.user_id = wholesaler.id');
        $this->db->where('products.id', $product_id);

        return($this->get('', TRUE));

    }

    public function join_get_product()
    {

        $this->db->select('
            wholesaler.id as whid,
            wholesaler.fullname,
            products.id as prid,
            products.product_name,
            products.price,
            products.quantity,
            products.description,
            products.pic,
            products.available,
            products.discount,
            products.date_added
            '
        );


        $this->db->join('wholesaler','products.user_id = wholesaler.id');

        return($this->get());

    }

    public function all($limit = 30)
    {
        $offset = $this->uri->segment(4);
        $this->db->limit($limit, $offset);
        return $this->db->get($this->_table_name)->result();


    }

    public function count()
    {
        return $this->db->count_all_results($this->_table_name);
    }


}

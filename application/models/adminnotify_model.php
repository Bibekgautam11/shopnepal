<?php

class  Adminnotify_Model extends MY_Model
{
    protected $_table_name = 'admin_message';
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


}

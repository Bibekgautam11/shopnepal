<?php

class Retailer_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('retailer_model', 'rm');
        $this->load->model('product_model', 'pm');
        $this->load->model('user_model');
        $this->load->library('form_validation');

        $exception_uris = array(
            'users/login',
            'retailer/users/register',
            'users/logout'
        );
        if (in_array(uri_string(), $exception_uris) == FALSE) {
            if ($this->user_model->loggedin() == FALSE or $this->user_model->checktype() != 'rt') {

                redirect('users/login');


            }
        }
    }
}
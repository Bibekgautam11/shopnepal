<?php

class Wholesaler_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('wholesaler_model' ,'wm');
        $this->load->model('wsnotify_model' ,'wnm');
        $this->load->model('product_model' ,'pm');
        $this->load->model('user_model');
        $this->load->library('form_validation');

        $unre = array(
            'to_id' => $this->session->userdata('id'),
            'status' =>'UnRead'
        );
        $this->data['unread_notifications'] = $this->wnm->get_by($unre);

        $exception_uris = array(
            'users/login',
            'wholesaler/users/register',
            'users/logout'
        );
        if(in_array(uri_string(), $exception_uris) == FALSE)
        {
            if($this->user_model->loggedin() == FALSE or $this->user_model->checktype() != 'ws')
            {

                    redirect('users/login');

            }
        }
    }
}
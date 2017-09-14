<?php

class Admin_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('wholesaler_model' ,'wm');
        $this->load->model('product_model' ,'pm');
        $this->load->model('user_model');
        $this->load->model('useradmin_model','uam');
        $this->load->model('adminnotify_model' ,'anm');

        $this->load->library('form_validation');

        $unre = array(
            'status' =>'UnRead'
        );

        $this->data['unread_notifications'] = $this->anm->get_by($unre);

        $exception_uris = array(
            'admin/login',
            'users/logout'
        );
        if(in_array(uri_string(), $exception_uris) == FALSE)
        {
            if($this->user_model->loggedin() == FALSE or $this->user_model->checktype() != 'admin')
            {

                    redirect('admin/login');
            }

        }
    }
}
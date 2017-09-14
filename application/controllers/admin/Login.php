<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        if($this->uam->loggedin() == TRUE)
        {
            if($this->uam->checktype() == 'admin')
            {
                $dashboard = 'admin/dashboard';
            }
            redirect($dashboard);
        }

        $rules = $this->uam->rules_login;
        $this->form_validation->set_rules($rules);

        if($this->form_validation->run() == TRUE)
        {
            if($this->uam->login() == TRUE)
            {
                if($this->uam->checktype() == 'admin')
                {
                    $dashboard = 'admin/dashboard';
                }
                redirect($dashboard);

            }
            else
            {
                $this->session->set_flashdata('error_login', 'Not a  valid credential, Try Again');
                redirect('admin/login', 'refresh');
            }
        }
        $this->load->view('admin/login_view');
    }


}
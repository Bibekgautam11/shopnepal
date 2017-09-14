<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();


    }

    public function index()
    {
        $this->data['user_profile'] = $this->uam->get($this->session->userdata('id'));
        $this->load->view('admin/dashboard_view',$this->data);
    }

}
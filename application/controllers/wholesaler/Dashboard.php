<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Wholesaler_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['user_profile'] = $this->wm->get($this->session->userdata('id'));
        $this->load->view('wholesaler/dashboard_view',$this->data);

    }

}
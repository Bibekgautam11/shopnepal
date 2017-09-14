<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Retailer_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['user_profile'] = $this->rm->get($this->session->userdata('id'));
        $this->load->view('retailer/dashboard_view',$this->data);

    }

}
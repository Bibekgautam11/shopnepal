<?php

class  Wholesaler_Model extends MY_Model
{
    protected $_table_name = 'wholesaler';
    protected $_primary_key = 'id';
    protected $_order_by = 'fullname';
    public $rules = array();

    public $rules_register = array(
        'fullname' => array(
            'field' => 'fullname',
            'label' => 'FullName',
            'rules' => 'trim|required'
        ),
        'username' => array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required|is_unique[wholesaler.username]|is_unique[retailer.username]'
        ),
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[wholesaler.email]|is_unique[retailer.email]'
        ),
        'location' => array(
            'field' => 'location',
            'label' => 'Location',
            'rules' => 'trim|required'
        ),
        'contact_no' => array(
            'field' => 'contact_no',
            'label' => 'Contact Number',
            'rules' => 'trim|required'
        ),
        'category' => array(
            'field' => 'category',
            'label' => 'Category',
            'rules' => 'trim|required'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        ),
        'confpassword' => array(
            'field' => 'confpassword',
            'label' => 'Confirm Password',
            'rules' => 'trim|required|matches[password]'
        ),
        'user_accept' => array(
            'field' => 'user_accept',
            'label' => 'User Agreement',
            'rules' => 'trim|required',
            "errors" => array('required' => "Must Accept User Aggrement")
        )
    );

    public $rules_edit = array(
        'fullname' => array(
            'field' => 'fullname',
            'label' => 'FullName',
            'rules' => 'trim|required'
        ),
        'location' => array(
            'field' => 'location',
            'label' => 'Location',
            'rules' => 'trim|required'
        ),
        'contact_no' => array(
            'field' => 'contact_no',
            'label' => 'Contact Number',
            'rules' => 'trim|required'
        )
    );

    public $rules_change_password = array(
        'current_password' => array(
            'field' => 'current_password',
            'label' => 'Current Password',
            'rules' => 'trim|required'
        ),
        'confirm_password' => array(
            'field' => 'confirm_password',
            'label' => 'Confirm Password',
            'rules' => 'trim|required|matches[new_password]'
        ),'new_password' => array(
            'field' => 'new_password',
            'label' => 'New Password',
            'rules' => 'trim|required'
        )
    );


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }





    public function logout()
    {
        $this->session->sess_destroy();
    }

    public function loggedin()
    {
        return (bool)$this->session->userdata('loggedin');

    }

    public function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
    }

    public function checktype()
    {
        return $this->session->userdata('type');

    }

}

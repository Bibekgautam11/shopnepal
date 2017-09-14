<?php

class  Useradmin_Model extends MY_Model
{
    protected $_table_name = 'admin';
    protected $_primary_key = 'id';
    protected $_order_by = 'username';
    public $rules = array();


    public $rules_login = array(
        'username' => array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
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

        $this->load->model('wholesaler_model','wm');
        $this->load->model('retailer_model','rm');
    }

    public function login()
    {

        $user_admin = $this->get_by(array(
            'username' => $this->input->post('username'),
            'password' => $this->hash($this->input->post('password')),
        ), TRUE);

        if(count($user_admin))
        {
            $data = array(
                'username' => $user_admin->username,
                'fullname' => $user_admin->username,
                'email' => $user_admin->email,
                'id' => $user_admin->id,
                'type' => 'admin',
                'loggedin' => TRUE
            );

            $this->session->set_userdata($data);
        }
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

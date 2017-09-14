<?php

class  User_Model extends MY_Model
{
    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_order_by = 'fullname';
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

    public $rules_forgot = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        )
    );

    public $rules_change_password = array(
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
        $user_ws = $this->wm->get_by(array(
            'username' => $this->input->post('username'),
            'password' => $this->hash($this->input->post('password')),
        ), TRUE);

        $user_rt = $this->rm->get_by(array(
            'username' => $this->input->post('username'),
            'password' => $this->hash($this->input->post('password')),
        ), TRUE);

        if(count($user_ws))
        {
            $data = array(
                'username' => $user_ws->username,
                'fullname' => $user_ws->fullname,
                'email' => $user_ws->email,
                'id' => $user_ws->id,
                'location' => $user_ws->location,
                'contact_no' => $user_ws->contact_no,
                'category' => $user_ws->category,
                'type' => 'ws',
                'loggedin' => TRUE
            );

            $this->session->set_userdata($data);
        }
        elseif(count($user_rt))
        {
            $data = array(
                'username' => $user_rt->username,
                'fullname' => $user_rt->fullname,
                'email' => $user_rt->email,
                'id' => $user_rt->id,
                'type' => 'rt',
                'loggedin' => TRUE
            );
            $this->session->set_userdata($data);
        }
        else
        {
            $data = array(
                'username' => '',
                'fullname' => '',
                'email' => '',
                'id' => '',
                'type' => '',
                'loggedin' => FALSE
            );
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


    public function hashtoken($string)
    {
        return hash('sha256', $string);
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends GUEST_Controller
{
    function __construct()
    {
        parent::__construct();
    }


    //Login for Wholesaler and Retailer both
    public function login()
    {

        if ($this->user_model->loggedin() == TRUE) {
            if ($this->user_model->checktype() == 'ws') {
                $dashboard = 'wholesaler/dashboard';
            } else {
                $dashboard = 'retailer/dashboard';
            }
            redirect($dashboard);
        }

        $rules = $this->user_model->rules_login;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            if ($this->user_model->login() == TRUE) {
                if ($this->user_model->checktype() == 'ws') {
                    $dashboard = 'wholesaler/dashboard';
                } else {
                    $dashboard = 'retailer/dashboard';
                }
                redirect($dashboard);

            } else {
                $this->session->set_flashdata('error_login', 'Not a  valid credential, Try Again');
                redirect('users/login', 'refresh');
            }
        }

        $this->load->view('home/login_view');
    }

    public function logout()
    {

        $this->user_model->logout();
        redirect('');
    }


    public function forgot_password()
    {


        $rules = $this->user_model->rules_forgot;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $aa = array('email' => $this->input->post('email'));

            $this->db->where($aa);

            $user_ws = $this->wm->get_by($aa, TRUE);

            $user_rt = $this->rm->get_by($aa, TRUE);

            if (count($user_ws)) {
                $this->session->set_flashdata('success_email', 'Mail Send , Check your inbox');
                $this->send_mail($user_ws, 'ws');
                redirect('users/forgot_password', 'refresh');
            } elseif (count($user_rt)) {
                $this->session->set_flashdata('success_email', 'Mail Send , Check your inbox');
                $this->send_mail($user_rt, 'rt');
                redirect('users/forgot_password', 'refresh');
            } else {

                $this->session->set_flashdata('error_email', 'Not a registered email, Try Again');
                redirect('users/forgot_password', 'refresh');
            }
        }

        $this->load->view('home/forgot_password_view');

    }

    public function send_mail($user_data, $type)
    {

        $this->load->library('email');

        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.googlemail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "shoptoshop100@gmail.com";
        $config['smtp_pass'] = "finalproject4";
        $this->email->initialize($config);

        $this->email->set_newline("\r\n");

        $this->email->from('shoptoshop100@gmail.com');

        $this->email->to($user_data->email);


        $this->email->subject("ShopToShop Password Reset");

        $token = $this->user_model->hashtoken($user_data->username . $user_data->password);

        if ($type == 'ws') {
            $message = "Please use the following link to reset your password,\n Copy and paste the below link\n";
            $link = base_url('users/reset_password_ws/' . $user_data->username . "/" . $token);

        } else {
            $message = "Please use the following link to reset your password,\n Copy and paste the below link\n";
            $link = base_url('users/reset_password_rt/' . $user_data->username . "/" . $token);

        }


        $this->email->message($message . $link);

        if ($this->email->send()) {
            return TRUE;
        } else {
            return FALSE;
//            show_error($this->email->print_debugger());
        }

    }

    public function reset_password_rt($username, $token = NUll)
    {


        if ($token != NULL) {

            $arr = array('username' => $username);
            $data = $this->rm->get_by($arr, TRUE);

            $to_hash = $data->username . $data->password;

            $to_check_data = $this->user_model->hashtoken($to_hash);

            if ($to_check_data == $token) {
                $rules = $this->user_model->rules_change_password;
                $this->form_validation->set_rules($rules);

                if ($this->form_validation->run() == TRUE) {
                    $aa = array(
                        'password' => $this->rm->hash($this->input->post('new_password'))
                    );

                    $this->rm->update($aa, $data->id);

                    $this->session->set_flashdata('password_login', 'Password changed');
                    redirect('users/login', 'refresh');
                }

                $this->load->view('home/change_password_view');
            } else {
                echo "<h1>NOt Allowed</h1>";
            }
        } else {
            echo "<h1>NOt Allowed</h1>";
        }

    }

    public function reset_password_ws($username, $token = NULL)
    {

        if ($token != NULL) {

            $arr = array('username' => $username);
            $data = $this->wm->get_by($arr, TRUE);

            $to_hash = $data->username . $data->password;

            $to_check_data = $this->user_model->hashtoken($to_hash);

            if ($to_check_data == $token) {
                $rules = $this->user_model->rules_change_password;
                $this->form_validation->set_rules($rules);

                if ($this->form_validation->run() == TRUE) {
                    $aa = array(
                        'password' => $this->wm->hash($this->input->post('new_password'))
                    );
                    $this->wm->update($aa, $data->id);

                    $this->session->set_flashdata('password_login', 'Password changed');
                    redirect('users/login', 'refresh');
                }

                $this->load->view('home/change_password_view');
            } else {
                echo "<h1>NOt Allowed</h1>";
            }
        } else {
            echo "<h1>NOt Allowed</h1>";
        }
    }

    public function license_agreement()
    {
        $this->load->view('license_agreement_view');

    }
}

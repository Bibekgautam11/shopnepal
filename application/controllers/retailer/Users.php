<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Retailer_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['user_profile'] = $this->rm->get($this->session->userdata('id'));
        $this->load->view('retailer/profile/profile_view', $this->data);
    }

    public function edit_profile()
    {

        $this->data['user_profile'] = $this->rm->get($this->session->userdata('id'));

        $rules = $this->rm->rules_edit;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'fullname' => $this->input->post('fullname'),
                'location' => $this->input->post('location'),
                'contact_no' => $this->input->post('contact_no')
            );


            if (!empty($_FILES['logo']['name'])) {
                $aaa = $this->do_upload();
                if ($aaa != FALSE) {

                    $this->session->set_flashdata('info_profile', 'Changes Saved Success');
                    $data['profile_pic'] = $aaa;
                    $this->rm->update($data,$this->session->userdata('id'));
                    redirect('retailer/users/edit_profile');
                } else {
                    $this->session->set_flashdata('upload_error', 'Error While Uploading file');
                }
            }

            $this->session->set_flashdata('info_profile', 'Changes Saved Success');
            $this->rm->update($data,$this->session->userdata('id'));
            redirect('retailer/users/edit_profile');

        }

        $this->load->view('retailer/profile/profile_edit', $this->data);
    }

    public function do_upload()
    {
        $config['upload_path'] = ('./assets/retailer_image');
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['overwrite'] = TRUE;
        $config['file_name'] = $this->session->userdata('username');


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('logo')) {
            $error = array('error' => $this->upload->display_errors());
            return FALSE;

        } else {
            $data = $this->upload->data();
            $this->do_image_manipulation($data['file_name']);
            return $data['file_name'];
        }

    }

    public function do_image_manipulation($file_name)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = 'assets/retailer_image/' . $file_name;
        $config['width'] = 300;
        $config['height'] = 300;
        $config['maintain_ratio'] = FALSE;


        $this->load->library('image_lib', $config);


        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        } else {
            echo "Success";
        }
    }


    public function edit_password()
    {
        $rules = $this->rm->rules_change_password;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            $user_rt = $this->rm->get_by(array(
                'username' => $this->session->userdata('username'),
                'password' => $this->rm->hash($this->input->post('current_password')),
            ), TRUE);
            if(count($user_rt))
            {
                $data = array(
                    'password' => $this->rm->hash($this->input->post('new_password'))
                );

                $this->rm->update($data,$this->session->userdata('id'));
                $this->session->set_flashdata('info', 'Password Successfully Saved');
                redirect('retailer/dashboard','refresh');
            }
            else
            {
                $this->session->set_flashdata('error', 'Current password does not match');
            }

        }

        $this->data['user_profile'] = $this->rm->get($this->session->userdata('id'));
        $this->load->view('retailer/profile/change_password_view', $this->data);
    }


    public function register()
    {
        $rules = $this->rm->rules_register;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'fullname' => $this->input->post('fullname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'location' => $this->input->post('location'),
                'password' => $this->rm->hash($this->input->post('password')),
                'verified' => 'NO',
                'contact_no' => $this->input->post('contact_no'),
                'date_created' => date('Y-m-d H:i:s')
            );

            if ($this->mail_to_all($data)) {
                $this->rm->create($data);

                $this->notify_admin($this->db->insert_id());
                $this->session->set_flashdata('info', 'Registration Success, Please Login');
            } else {
                $this->session->set_flashdata('info', 'Registration Not Success, Try Again');
            }

            redirect('retailer/users/register');
        }

        $this->load->view('retailer/register_retailer_view');


    }

    public function mail_to_all($user_data)
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

        $this->email->to('shoptoshop100@gmail.com');
        $this->email->bcc($user_data['email']);


        $this->email->subject("ShopToShop Registration");
        $this->email->message("Thank you for your time," . $user_data['fullname'] . " Please Enjoy our free service");

        if ($this->email->send()) {
            return TRUE;
        } else {
            return TRUE;
//            show_error($this->email->print_debugger());
        }
    }

    public function notify_admin($retailer_id)
    {

        $retailer_name = $this->input->post('username');
        $retailer_href = "<h4><a href='" . base_url('admin/users/detail_retailer/' . $retailer_id) . "' target='_blank' >" . $retailer_name . "</a></h4>";


        $message_details =  "New Retailer Registration : " . $retailer_href;


        $this->load->model('adminnotify_model');
        $data = array(
            'subject' => ' New Retailer Registration',
            'message' => $message_details,
            'status' => 'Unread',
            'from_id' => $retailer_id,
            'to_id' => null,
            'date_added' => date('Y-m-d H:i:s')
        );

        $this->adminnotify_model->create($data);

    }


    public function get_wholesaler($wholesaler_id)
    {

        $this->data['wholesaler_profile'] = $this->wm->get($wholesaler_id);

        $aa = array(
            'user_id'=>$wholesaler_id
        );

        $this->data['wholesaler_products'] = $this->pm->get_by($aa);

        $this->data['user_profile'] = $this->rm->get($this->session->userdata('id'));
        $this->load->view('retailer/profile/profile_wholesaler_view', $this->data);
    }



}
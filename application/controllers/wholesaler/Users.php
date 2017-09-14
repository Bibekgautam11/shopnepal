<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Wholesaler_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['user_profile'] = $this->wm->get($this->session->userdata('id'));
        $this->load->view('wholesaler/profile/profile_view', $this->data);
    }

    public function edit_profile()
    {

        $this->data['user_profile'] = $this->wm->get($this->session->userdata('id'));

        $rules = $this->wm->rules_edit;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'fullname' => $this->input->post('fullname'),
                'location' => $this->input->post('location'),
                'contact_no' => $this->input->post('contact_no'),
                'description' => $this->input->post('description')
            );


            if (!empty($_FILES['logo']['name'])) {
                $aaa = $this->do_upload();
                if ($aaa != FALSE) {

                    $this->session->set_flashdata('info_profile', 'Changes Saved Success');
                    $data['logo'] = $aaa;
                    $this->wm->update($data,$this->session->userdata('id'));
                    redirect('wholesaler/users/edit_profile');
                } else {
                    $this->session->set_flashdata('upload_error', 'Error While Uploading file');
                }
            }

            $this->session->set_flashdata('info_profile', 'Changes Saved Success');
            $this->wm->update($data,$this->session->userdata('id'));
            redirect('wholesaler/users/edit_profile');

        }

        $this->load->view('wholesaler/profile/profile_edit', $this->data);
    }

    public function do_upload()
    {
        $config['upload_path'] = ('./assets/wholesaler_image');
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
        $config['source_image'] = 'assets/wholesaler_image/' . $file_name;
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
        $rules = $this->wm->rules_change_password;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            $user_ws = $this->wm->get_by(array(
                'username' => $this->session->userdata('username'),
                'password' => $this->wm->hash($this->input->post('current_password')),
            ), TRUE);
            if(count($user_ws))
            {
                $data = array(
                    'password' => $this->wm->hash($this->input->post('new_password'))
                );

                $this->wm->update($data,$this->session->userdata('id'));
                $this->session->set_flashdata('info', 'Password Successfully Saved');
                redirect('wholesaler/dashboard','refresh');
            }
            else
            {
                $this->session->set_flashdata('error', 'Current password does not match');
            }


        }

        $this->data['user_profile'] = $this->wm->get($this->session->userdata('id'));
        $this->load->view('wholesaler/profile/change_password_view', $this->data);
    }


    public function register()
    {
        $rules = $this->wm->rules_register;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'fullname' => $this->input->post('fullname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'location' => $this->input->post('location'),
                'password' => $this->wm->hash($this->input->post('password')),
                'category' => $this->input->post('category'),
                'verified' => 'NO',
                'contact_no' => $this->input->post('contact_no'),
                'date_created' => date('Y-m-d H:i:s')
            );

            if ($this->mail_to_all($data)) {
                $this->wm->create($data);
                $this->notify_admin($this->db->insert_id());
                $this->session->set_flashdata('info', 'Registration Success, Please Login');
            } else {
                $this->session->set_flashdata('info', 'Registration Not Success, Try Again');
            }

            redirect('wholesaler/users/register');

        }

        $this->load->view('wholesaler/register_wholesaler_view');


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
        $this->email->message("Thank you for your time, " . $user_data['fullname'] . " Please Enjoy our free service");

        if ($this->email->send()) {
            return TRUE;
        } else {
            return TRUE;
//            show_error($this->email->print_debugger());
        }
    }

    public function detail_retailer($retailer_id)
    {
        $this->data['user_profile'] = $this->wm->get($this->session->userdata('id'));
        $this->data['retailer_profile'] = $this->rm->get($retailer_id);

        $this->load->view('wholesaler/profile/retailer_profile_view', $this->data);
    }

    public function notify_admin($wholesaler_id)
    {

        $wholesaler_name = $this->input->post('username');
        $wholesaler_href = "<h4><a href='" . base_url('admin/users/detail_wholesaler/' . $wholesaler_id) . "' target='_blank' >" . $wholesaler_name . "</a></h4>";


        $message_details =  "New Wholesaler Registration : " . $wholesaler_href;


        $this->load->model('adminnotify_model');
        $data = array(
            'subject' => ' New Wholesaler Registration',
            'message' => $message_details,
            'status' => 'Unread',
            'from_id' => $wholesaler_id,
            'to_id' => null,
            'date_added' => date('Y-m-d H:i:s')
        );

        $this->adminnotify_model->create($data);

    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function retailer()
    {
        $this->data['retailer_profiles'] = $this->rm->get();
        $this->load->view('admin/profile/retailer_view', $this->data);
    }

    public function detail_retailer($id)
    {

        $this->data['user_profile'] = $this->rm->get($id);

        if(($this->data['user_profile']->id)  == null)
        {
            redirect('admin/users/retailer');
        }

        $this->load->view('admin/profile/retailer_detail_view', $this->data);
    }

    public function delete_retailer($id)
    {

        $this->rm->delete($id);
        redirect('admin/users/retailer','refresh');
    }

    public function verify_retailer($id)
    {
        $data = array('verified' =>'YES');
        $this->rm->update($data,$id);
        redirect('admin/users/detail_retailer/'. $id,'refresh');
    }

    public function unverify_retailer($id)
    {
        $data = array('verified' =>'NO');
        $this->rm->update($data,$id);
        redirect('admin/users/detail_retailer/'.$id,'refresh');
    }


    public function wholesaler()
    {
        $this->data['wholesaler_profiles'] = $this->wm->get();


        $this->load->view('admin/profile/wholesaler_view', $this->data);
    }

    public function detail_wholesaler($id)
    {
        $this->data['wholesaler_profile'] = $this->wm->get($id);

        $aa = array(
            'user_id'=>$id
        );

        $this->data['wholesaler_products'] = $this->pm->get_by($aa);
        $this->data['user_profile'] = $this->wm->get($id);

        if(($this->data['user_profile']->id)  == null)
        {
            redirect('admin/users/wholesaler');
        }
        $this->load->view('admin/profile/wholesaler_detail_view', $this->data);
    }

    public function delete_wholesaler($id)
    {

        $this->wm->delete($id);
        redirect('admin/users/wholesaler','refresh');
    }

    public function verify_wholesaler($id)
    {
        $data = array('verified' =>'YES');
        $this->wm->update($data,$id);
        redirect('admin/users/detail_wholesaler/'. $id,'refresh');
    }

    public function unverify_wholesaler($id)
    {
        $data = array('verified' =>'NO');
        $this->wm->update($data,$id);
        redirect('admin/users/detail_wholesaler/'.$id,'refresh');
    }





    public function edit_password()
    {
        $rules = $this->uam->rules_change_password;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            $user_admin = $this->uam->get_by(array(
                'username' => $this->session->userdata('username'),
                'password' => $this->rm->hash($this->input->post('current_password')),
            ), TRUE);
            if(count($user_admin))
            {
                $data = array(
                    'password' => $this->uam->hash($this->input->post('new_password'))
                );

                $this->uam->update($data,$this->session->userdata('id'));
                $this->session->set_flashdata('info', 'Password Successfully Saved');
                redirect('admin/dashboard','refresh');
            }
            else
            {
                $this->session->set_flashdata('error', 'Current password does not match');
            }

        }

        $this->data['user_profile'] = $this->uam->get($this->session->userdata('id'));
        $this->load->view('admin/profile/change_password_view', $this->data);

    }




}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $re = array(
            'status' => 'Read'
        );

        $unre = array(
            'status' => 'UnRead'
        );

        $arch = array(
            'status' => 'Archive'
        );


        $this->data['unread_notifications'] = $this->anm->get_by($unre);
        $this->data['read_notifications'] = $this->anm->get_by($re);
        $this->data['archived_notifications'] = $this->anm->get_by($arch);


        $this->load->view('admin/notification_view', $this->data);

    }

    public function mark_as_read($id = null)
    {
        if ($id != null) {
            $data = array(
                'status' => 'Read'
            );
            $this->anm->update($data, $id);
            $this->session->set_flashdata('info', 'Update Success');
        }

        redirect('admin/notifications');

    }

    public function delete($id = null)
    {
        if ($id != null) {
            $this->anm->delete($id);
            $this->session->set_flashdata('info', 'Delete Success');
        }


        redirect('admin/notifications');

    }


    public function archive($id = null)
    {
        if ($id != null) {
            $data = array(
                'status' => 'Archive'
            );
            $this->anm->update($data, $id);
            $this->session->set_flashdata('info', 'Update Success');
        }


        redirect('admin/notifications');
    }

    public function mark_as_unread($id = null)
    {
        if ($id != null) {
            $data = array(
                'status' => 'UnRead'
            );
            $this->anm->update($data, $id);
            $this->session->set_flashdata('info', 'Update Success');
        }

        redirect('admin/notifications');
    }

}
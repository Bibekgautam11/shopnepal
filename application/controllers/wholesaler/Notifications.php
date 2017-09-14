<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends Wholesaler_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['user_profile'] = $this->wm->get($this->session->userdata('id'));

        $re = array(
            'to_id' => $this->session->userdata('id'),
            'status' =>'Read'
        );

        $unre = array(
        'to_id' => $this->session->userdata('id'),
        'status' =>'UnRead'
    );

        $arch = array(
            'to_id' => $this->session->userdata('id'),
            'status' =>'Archive'
        );


        $this->data['unread_notifications'] = $this->wnm->get_by($unre);
        $this->data['read_notifications'] = $this->wnm->get_by($re);
        $this->data['archived_notifications'] = $this->wnm->get_by($arch);


        $this->load->view('wholesaler/notification_view',$this->data);

    }

    public function mark_as_read($id)
    {
        $data = array(
            'status'=>'Read'
        );
        $this->wnm->update($data, $id);
        $this->session->set_flashdata('info', 'Update Success');
        redirect('wholesaler/notifications');

    }

    public function delete($id)
    {
        $this->wnm->delete($id);
        $this->session->set_flashdata('info', 'Delete Success');
        redirect('wholesaler/notifications');

    }


    public function archive($id)
    {
        $data = array(
            'status'=>'Archive'
        );
        $this->wnm->update($data, $id);
        $this->session->set_flashdata('info', 'Update Success');
        redirect('wholesaler/notifications');
    }

    public function mark_as_unread($id)
    {
        $data = array(
            'status'=>'UnRead'
        );
        $this->wnm->update($data, $id);
        $this->session->set_flashdata('info', 'Update Success');
        redirect('wholesaler/notifications');

    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends Guest_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('retailer_model');
        $this->load->model('user_model');
        $this->load->model('wholesaler_model');
        $this->load->model('wishlist_model');
        $this->load->model('wsnotify_model');

    }

    public function index()
    {
        $this->load->view('api_view');
    }

    //Products
    public function recent($limit = 10)
    {
        $this->db->limit($limit);
        $this->db->where('available', 'YES');
        $this->db->order_by('date_added', 'DESC');
        echo json_encode($this->product_model->get());
    }

    public function all_products()
    {

        $this->db->where('available', 'YES');
        $this->db->order_by('date_added', 'DESC');
        echo json_encode($this->product_model->get());
    }

    public function detail_product($id = null)
    {
        if ($id != NULL) {
            echo json_encode($this->product_model->get($id, TRUE));
        }
    }


    public function search_product($string = NULL)
    {
        if ($string != NULL) {
            $this->db->order_by('date_added', 'DESC');
            $this->db->where('available', 'YES');
            $this->db->like('product_name', $string);
            echo json_encode($this->product_model->get());
        }
    }

    //Retailers
    public function all_retailer()
    {
        echo json_encode($this->retailer_model->get());
    }

    public function detail_retailer($id = null)
    {
        if ($id != NULL) {
            $this->db->where('id', $id);
            echo json_encode($this->retailer_model->get());
        }
    }

    public function search_retailer($string = NULL)
    {
        if ($string != NULL) {
            $this->db->like('username', $string);
            echo json_encode($this->retailer_model->get());
        }
    }

    public function wishlist_retailer($id = NULL)
    {
        if ($id != NULL) {
            $this->db->where('retailer_id', $id);
            echo json_encode($this->wishlist_model->get());
        }
    }


    public function login_retailer()
    {

        $params = $_REQUEST;

        $user_rt = $this->retailer_model->get_by(array(
            'username' => $params['username'],
            'password' => $this->rm->hash($params['password']),
        ), TRUE);

        if (count($user_rt) != 0) {
            echo json_encode(array(
                'status' => true,
                'id' => $user_rt->id
            ));
        }
    }

    //Wholesalers
    public function all_wholesaler()
    {
        echo json_encode($this->wholesaler_model->get());
    }

    public function detail_wholesaler($id = null)
    {
        if ($id != NULL) {
            $this->db->where('id', $id);
            echo json_encode($this->wholesaler_model->get());
        }
    }

    public function search_wholesaler($string = NULL)
    {
        if ($string != NULL) {
            $this->db->like('username', $string);
            echo json_encode($this->wholesaler_model->get());
        }
    }

    public function login_wholesaler()
    {

        $params = $_REQUEST;
        $user_ws = $this->wholesaler_model->get_by(array(
            'username' => $params['username'],
            'password' => $this->rm->hash($params['password']),
        ), TRUE);

        if (count($user_ws) != 0) {
            echo json_encode(array(
                'status' => true,
                'id' => $user_ws->id
            ));
        }
    }

    public function notification_wholesaler($id = NULL)
    {
        if ($id != NULL) {
            $aa = array(
              'to_id' => $id
            );

            echo json_encode($this->wsnotify_model->get_by($aa));
        }
    }

    public function test()
    {
        $this->load->view('test_view');
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Retailer_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('wishlist_model', 'wlm');
    }


    private $limit = 30;

    public function index()
    {

        $this->data['all_wholesaler'] = $this->wm->get();

        $this->data['user_profile'] = $this->rm->get($this->session->userdata('id'));

        $this->db->order_by('date_added', 'DESC');
        $this->db->where('available', 'YES');
        $this->data['products'] = $this->pm->all();
        $this->data['total_rows'] = $this->pm->count();


        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_link"] = "&laquo;";
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";
        $config["last_link"] = "&raquo;";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '<li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $config['total_rows'] = $this->data['total_rows'];
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = 4;
        $config['base_url'] = base_url('retailer/products/index');
        $this->load->library('pagination', $config);
        $this->data['page_links'] = $this->pagination->create_links();


//        $this->data['products'] = $this->pm->get();


        $this->load->view('retailer/products/products_view', $this->data);
    }

    public function detail_product($product_id)
    {

        if ($this->wlm->check_in_wishlist($product_id, $this->session->userdata('id'))) {
            $this->data['already'] = 'YES';
        } else {
            $this->data['already'] = 'NO';
        }


        $this->data['wholesaler_detail'] = $this->pm->join_get_name($product_id);


        $this->data['product'] = $this->pm->get($product_id);
        $this->data['user_profile'] = $this->rm->get($this->session->userdata('id'));
        $this->load->view('retailer/products/product_detail', $this->data);
    }

    public function search()
    {

        $this->load->library('pagination');
        $this->data['page_links'] = $this->pagination->create_links();

        $to_match = $this->input->get('to_match');
        $this->db->where('available', 'YES');
        $this->data['all_wholesaler'] = $this->wm->get();

        if (count($to_match)) {
            $this->db->limit(18);
            $this->db->like('product_name', $to_match);
            $this->db->where('available', 'YES');
            $this->data['products'] = $this->pm->get();
        } else {
            $this->db->limit(30);
            $this->db->where('available', 'YES');
            $this->data['products'] = $this->pm->get();
        }

        $this->data['user_profile'] = $this->rm->get($this->session->userdata('id'));
        $this->load->view('retailer/products/products_view', $this->data);


    }

    public function by_wholesalers($wholesaler_id)
    {

        $this->load->library('pagination');
        $this->data['page_links'] = $this->pagination->create_links();

        $aa = array(
            'user_id' => $wholesaler_id
        );

        $this->db->where('available', 'YES');
        $this->data['products'] = $this->pm->get_by($aa);
        $this->data['all_wholesaler'] = $this->wm->get();

        $this->data['user_profile'] = $this->rm->get($this->session->userdata('id'));
        $this->load->view('retailer/products/products_view', $this->data);

    }


    public function by_category($category_name = null)
    {

        $this->load->library('pagination');
        $this->data['page_links'] = $this->pagination->create_links();

        if($category_name != null)
        {
            $aa = array(
                'category' => $category_name
            );

            $this->db->where('available', 'YES');
            $this->data['products'] = $this->pm->get_by($aa);
        }

        else
        {
           redirect('retailer/products');
        }

        $this->data['all_wholesaler'] = $this->wm->get();

        $this->data['user_profile'] = $this->rm->get($this->session->userdata('id'));
        $this->load->view('retailer/products/products_view', $this->data);

    }


}
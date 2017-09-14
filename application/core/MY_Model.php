<?php

//Basic CRUD and many more functionality

class MY_Model extends CI_Model
{
    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_order_by = 'id';

    public function __construct()
    {
        parent::__construct();
    }


    //CREATE
    public function create($data, $id= null)
    {
        if ($id === null) {
            !isset($data[$this->_primary_key]) ||  $data[$this->_primary_key] = null;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
        } else {
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }
    }

    //READ
    public function get($id = null, $single = false)
    {
        if ($id != null) {
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        } elseif ($single== true) {
            $method = 'row';
        } else {
            $this->db->order_by($this->_order_by, 'ASC');
            $method = 'result';
        }
        return $this->db->get($this->_table_name)->$method();
    }


    //UPDATE
    public function update($data, $id= null)
    {
        if ($id == null) {
            return false;
        } else {
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }
    }

    //DELETE
    public function delete($id)
    {
        if (!$id) {
            return false;
        }
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
    }


    //READ by condition
    public function get_by($where, $single = false)
    {
        $this->db->where($where);

        if ($single== true) {
            $method = 'row';
        } else {
            $this->db->order_by($this->_order_by, 'ASC');
            $method = 'result';
        }
        return $this->db->get($this->_table_name)->$method();
    }

}

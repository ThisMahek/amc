<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function new_payment($data)
    {
        return $this->db->insert('transactions', $data);
    }

    public function get_all_trannsactions($where = '')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by("id", "DESC");
        $query = $this->db->get('transactions');
        return $query->result();
    }


    public function get_all_member_trannsactions($or_where = '')
    {
        if (!empty($or_where)) {
            $this->db->or_where($or_where);
        }
        $this->db->order_by("id", "DESC");
        $query = $this->db->get('transactions');
        return $query->result();
    }



    //get project by id
    public function get_trannsaction_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('transactions');
        return $query->row();
    }

    public function get_admission_trannsaction_by_userID($user_id,$payment_type = 'admission')
    {
        $this->db->where('user_id',$user_id);
        $this->db->where('payment_type',$payment_type);
        $query = $this->db->get('transactions');
        return $query->row();
    }
}

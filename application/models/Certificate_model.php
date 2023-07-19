<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Certificate_model extends CI_Model
{
    /**
     * ############ Mark sheet
     */

    public function getcertificates($where = '')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('id');
        $query = $this->db->get('certificates');
        return $query->row();
    }

    public function add_certificates($data)
    {
        return $this->db->insert('certificates', $data);
    }

    //update page
    public function update_certificates($data, $id)
    {
        //set values

        $this->db->where('id', $id);
        return $this->db->update('certificates', $data);
    }

    public function get_all_certificatess($where = '')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('id');
        $query = $this->db->get('certificates');
        return $query->result();
    }

    public function get_certificates_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('certificates');
        return $query->row();
    }
}

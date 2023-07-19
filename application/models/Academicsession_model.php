<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Academicsession_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'session_name' => $this->input->post('session_name', true),
            'class_id' => $this->input->post('class_id', true),
            'start_date' => $this->input->post('start_date', true),
            'total_fees' => $this->input->post('total_fees', true),
            'installment_fees' => $this->input->post('installment_fees', true),
            'duration_month' => $this->input->post('duration_month', true),
            'admission_fees' => $this->input->post('admission_fees', true),
        );
        return $data;
    }

    //add page
    public function add()
    {
        $data = $this->input_values();
        $data["created_at"] = date('Y-m-d H:i:s');
        return $this->db->insert('academicsession', $data);
    }

    //update page
    public function update($id)
    {
        //set values
        $data = $this->input_values();
        $page = $this->get_academicsession_by_id($id);
        if (!empty($page)) {
            $this->db->where('id', $id);
            return $this->db->update('academicsession', $data);
        }
        return false;
    }

    //get all academicsession
    public function get_all_academicsession()
    {
        $this->db->order_by('id');
        $query = $this->db->get('academicsession');
        return $query->result();
    }

    //get academicsession
    public function get_academicsession()
    {
        $this->db->order_by('id');
        $query = $this->db->get('academicsession');
        return $query->result();
    }



    //get subacademicsession


    //get academicsession sitemap
    public function get_academicsession_sitemap()
    {
        $this->db->order_by('academicsession.id');
        $query = $this->db->get('academicsession');
        return $query->result();
    }


    //get page
    public function get_academicsession_bySlug($slug)
    {
        $slug = remove_special_characters($slug);
        $this->db->where('slug', $slug);
        $query = $this->db->get('academicsession');
        return $query->row();
    }



    //get page by id
    public function get_academicsession_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('academicsession');
        return $query->row();
    }

    //check page name
    public function check_academicsession_name()
    {
        $title = $this->input->post('title', true);
        $slug = $this->input->post('slug', true);

        if (empty($slug)) {
            //slug for title
            $slug = str_slug($title);
        }
        return true;
    }

    //delete page
    public function delete($id)
    {
        $page = $this->get_academicsession_by_id($id);
        if (!empty($page) && empty($isChild)) {
            $this->db->where('id', $id);
            return $this->db->delete('academicsession');
        }
        return false;
    }

    public function get_academicsession_by_class_id($id)
    {
        $this->db->where('class_id', $id);
        $query = $this->db->get('academicsession');
        return $query->result();
    }

  
}

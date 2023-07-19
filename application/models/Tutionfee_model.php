<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tutionfee_model extends CI_Model
{
   

    //add monthly_tution_fees
    public function add($data)
    {
        return $this->db->insert('monthly_tution_fees', $data);
    }

    //update slug

    //get monthly_tution_fees
    public function get_tution_fee($id)
    {
        $id = clean_number($id);
        $this->db->where('id', $id);
        $query = $this->db->get('monthly_tution_fees');
        return $query->row();
    }

  
    //get monthly_tution_fees
    public function get_monthly_tution_fees()
    {

      
        $query = $this->db->get('monthly_tution_fees');
        return $query->result();
    }

    //get monthly_tution_fees by lang
    public function get_monthly_tution_fees_all()
    {
    
        $query = $this->db->get('monthly_tution_fees');
        return $query->result();
    }

    //get monthly_tution_fees count
    public function get_monthly_tution_fees_count()
    {
        $query = $this->db->get('monthly_tution_fees');
        return $query->num_rows();
    }

    //update monthly_tution_fees
    public function update_monthly_tution_fees($data,$id)
    {
       
        $this->db->where('id', $id);
        return $this->db->update('monthly_tution_fees', $data);
    }

    //delete monthly_tution_fees
    public function delete_monthly_tution_fees($id)
    {
        $id = clean_number($id);
        $monthly_tution_fees = $this->get_tution_fee($id);

        if (!empty($monthly_tution_fees)) {
            $this->db->where('id', $id);
            return $this->db->delete('monthly_tution_fees');
        } else {
            return false;
        }
    }

    //get monthly_tution_fees
    public function get_monthly_tution_fees_by_student($id)
    {
        $this->db->where('student_id',$id);
        $query = $this->db->get('monthly_tution_fees');
        return $query->result();
    }

  
}

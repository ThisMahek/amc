<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OldMarksheet_model extends CI_Model
{

    public function getMarksheet($where = '')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('id');
        $query = $this->db->get('old_marksheet');
        return $query->row();
    }

    public function add_marksheet($data)
    {
        return $this->db->insert('old_marksheet', $data);
    }

    //update page
    public function update_marksheet($data, $id)
    {
        //set values

        $this->db->where('id', $id);
        return $this->db->update('old_marksheet', $data);
    }

    public function get_all_marksheets($where = '')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('id');
        $query = $this->db->get('old_marksheet');
        return $query->result();
    }

    public function get_marksheet_by_id($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('old_marksheet');
        return $query->row();
    }

    public function deleteMarksheet($id)
    {
        $paot = $this->get_marksheet_by_id($id);
        if(!empty($paot)){
            // del the marksheet data
            $this->delMarksByMarksheet($id);
            $this->db->where('id', $id);
            return $this->db->delete('old_marksheet');
        }else{
            return false;
        }
        
    }

      /**
     * ############ Mark sheet MARKS
     */
    public function getMarksBreakupbyMarksID($old_marsheet_id)
    {
        $this->db->where('old_marsheet_id',$old_marsheet_id);
        $this->db->order_by('id','ASC');;
        $query = $this->db->get('old_marks_breackup');
        return $query->result();
    }

    public function insertMarksBatch($data)
    {
        return $this->db->insert_batch('old_marks_breackup', $data);
    }

    public function deleteMarksByID($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('old_marks_breackup');
    }

    public function updateMarksData($data,$id)
    {
        $this->db->where('id',$id);
        return $this->db->update('old_marks_breackup', $data);
    }

    public function getWhere($where)
    {
        $this->db->where($where);
        $this->db->order_by('id','ASC');;
        $query = $this->db->get('old_marks_breackup');
        return $query->result();
    }
    public function delMarksByMarksheet($old_marsheet_id)
    {
        $this->db->where('old_marsheet_id', $old_marsheet_id);
        $this->db->delete('old_marks_breackup');
    }


}
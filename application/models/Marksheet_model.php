<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marksheet_model extends CI_Model
{
/*###############################
*#############33 Marksheet Marks
*/
    //add page
    public function add($data)
    {
        return $this->db->insert('markaheet_marks', $data);
    }

    //update page
    public function update($data,$id)
    {
        //set values
      
            $this->db->where('id', $id);
            return $this->db->update('markaheet_marks', $data);
      
    }

    public function getMarksheetMarks($where='')
    {
        if(!empty($where)){
            $this->db->where($where);
        }
        $this->db->order_by('id');
        $query = $this->db->get('markaheet_marks');
        return $query->result();
    }

    public function get_all_distinct_marksheet_marks()
    {
        $sql = "SELECT students.*, markaheet_marks.id AS marksheet_id 
                FROM students
                INNER JOIN markaheet_marks ON students.id = markaheet_marks.student_id WHERE students.isuued_certificate=0 GROUP BY markaheet_marks.student_id ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    /**
     * ############ Mark sheet
     */

    public function getMarksheet($where = '')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('id');
        $query = $this->db->get('marksheet');
        return $query->row();
    }

    public function add_marksheet($data)
    {
        return $this->db->insert('marksheet', $data);
    }

    //update page
    public function update_marksheet($data, $id)
    {
        //set values

        $this->db->where('id', $id);
        return $this->db->update('marksheet', $data);
    }

    public function get_all_marksheets($where = '')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->order_by('id');
        $query = $this->db->get('marksheet');
        return $query->result();
    }

    public function get_marksheet_by_id($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('marksheet');
        return $query->row();
    }

    public function mark_pass_fail($id)
    {
        $state = $this->get_marksheet_by_id($id);
        $status = $state->net_result;
        if ($status == "Fail") {
            $newstatus = "Pass";
        } elseif ($status == "Pass") {
            $newstatus = "Fail";
        }
        $data = array('net_result' => $newstatus);
        $this->update_marksheet($data, $id);
    }



}
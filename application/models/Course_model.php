<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'title_name' => $this->input->post('title_name', true),
            'title' => $this->input->post('title', true),
            'slug' => $this->input->post('slug', true),
            'page_description' => $this->input->post('page_description', true),
            'page_keywords' => $this->input->post('page_keywords', true),
            'content' => $this->input->post('content'),
            'page_order' => $this->input->post('page_order', true),
            'duration_year' => $this->input->post('duration_year', true),
            'duration_month' => $this->input->post('duration_month', true),
            'admission_fees' => $this->input->post('admission_fees', true),
            'short_description' => $this->input->post('short_description', true),
        );
        return $data;
    }

    //add page
    public function add()
    {
        $data = $this->input_values();

        if (empty($data["slug"])) {
            //slug for title
            $data["slug"] = str_slug($data["title"]);

            if (empty($data["slug"])) {
                $data["slug"] = "course-" . uniqid();
            }
        }
        $data["created_at"] = date('Y-m-d H:i:s');

        return $this->db->insert('courses', $data);
    }

    //update page
    public function update($id)
    {
        //set values
        $data = $this->input_values();

        if (empty($data["slug"])) {
            //slug for title
            $data["slug"] = str_slug($data["title"]);

            if (empty($data["slug"])) {
                $data["slug"] = "page-" . uniqid();
            }
        }

        $page = $this->get_course_by_id($id);
        if (!empty($page)) {
            $this->db->where('id', $id);
            return $this->db->update('courses', $data);
        }
        return false;
    }

    //get all courses
    public function get_all_courses()
    {
        $this->db->order_by('page_order');
        $query = $this->db->get('courses');
        return $query->result();
    }

    //get courses
    public function get_courses()
    {
        $this->db->order_by('page_order');
        $query = $this->db->get('courses');
        return $query->result();
    }

  

    //get subcourses


    //get courses sitemap
    public function get_courses_sitemap()
    {
        $this->db->order_by('courses.id');
        $query = $this->db->get('courses');
        return $query->result();
    }

    //get top menu courses
    public function get_top_menu_courses()
    {
        
        $this->db->order_by('page_order');
        $this->db->where('location', 'top');
        $query = $this->db->get('courses');
        return $query->result();
    }

    //get main menu courses
    public function get_main_menu_courses()
    {
        
        $this->db->order_by('page_order');
        $this->db->where('location', 'top');

        $query = $this->db->get('courses');
        return $query->result();
    }

    //get footer courses
    public function get_footer_courses()
    {
        
        $this->db->order_by('page_order');
        $this->db->where('location', 'footer');

        $query = $this->db->get('courses');
        return $query->result();
    }

    //get page
    public function get_course($slug)
    {
        $slug = remove_special_characters($slug);
        $this->db->where('slug', $slug);
        $query = $this->db->get('courses');
        return $query->row();
    }

   

    //get page by id
    public function get_course_by_id($id)
    {
        $is_single = false; 
        if (is_array($id)) 
        {
           $this->db->where_in('id', $id);
        }
        else
        {
           $is_single = true;
           $this->db->where('id', $id); 
        }    
        $query = $this->db->get('courses');

        return ($is_single)?$query->row():$query->result();
    }

    //check page name
    public function check_course_name()
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
        $page = $this->get_course_by_id($id);
        $isChild = $this->checkIsChild($id);
        if (!empty($page) && empty($isChild)) {
            $this->db->where('id', $id);
            return $this->db->delete('courses');
        }
        return false;
    }

    public function getAllParrentcourses()
    {
        $this->db->where('courses.lang_id', $this->selected_lang->id);
        $this->db->order_by('page_order');

        $query = $this->db->get('courses');
        return $query->result();
    }

    public function getSubcoursesByParrent($parrent_id)
    {
        $this->db->where('courses.lang_id', $this->selected_lang->id);
        $this->db->order_by('page_order');

        $query = $this->db->get('courses');
        return $query->result();
    }

    //get all courses
    public function get_all_coursesParrent()
    {
        $this->db->order_by('page_order', "ASC");

        $query = $this->db->get('courses');
        return $query->result();
    }

    public function checkIsChild($page_id)
    {
        $this->db->where('parrent_id', $page_id);
        $query = $this->db->get('courses');
        return $query->num_rows();
    }

    public function get_courses_all_home($limit=5)
    {
        $this->db->order_by('page_order');
        $this->db->limit($limit);
        $query = $this->db->get('courses');
        return $query->result();
    }
}

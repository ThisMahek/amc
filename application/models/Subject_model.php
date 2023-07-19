<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subject_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'course_id' => $this->input->post('course_id', true),
            'year' => $this->input->post('year', true),
            'sub_name' => $this->input->post('sub_name', true),
            'sub_code' => $this->input->post('sub_code', false),
            'theory' => $this->input->post('theory', true),
            'practical' => $this->input->post('practical', true),
            'internal_assessment' => $this->input->post('internal_assessment', true),
            'sub_order' => $this->input->post('sub_order', true),
        );
        return $data;
    }

    public function getSubjectByCourseYear($course_id,$year)
    {
        $sql = "SELECT * FROM course_subjects WHERE course_id =  ? AND year=? Order By sub_order";
        $query = $this->db->query($sql, array(clean_number($course_id), clean_number($year)));
        return $query->result();
    }

    //add post
    public function add_post()
    {
        $data = $this->input_values();
        return $this->db->insert('course_subjects', $data);
    }

    //update post
    public function update_post($id)
    {
        $data = $this->input_values();
        $this->db->where('id', clean_number($id));
        return $this->db->update('course_subjects', $data);
    }

  

    //query string
    public function query_string()
    {
        return "SELECT course_subjects.*, courses.title as course_name, courses.title_name as title_name
                FROM course_subjects
                INNER JOIN courses ON course_subjects.course_id = courses.id" . " ";
    }

    //get post
    public function get_post($id)
    {
        $sql = "SELECT * FROM course_subjects WHERE id =  ?";
        $query = $this->db->query($sql, array(clean_number($id)));
        return $query->row();
    }

    //get post joined
    public function get_post_joined($id)
    {
        $sql = $this->query_string() . "WHERE course_subjects.id = ?";
        $query = $this->db->query($sql, array(clean_number($id)));
        return $query->row();
    }

    //get post by slug
    public function get_post_by_slug($slug)
    {
        $sql = $this->query_string() . "WHERE course_subjects.slug = ?";
        $query = $this->db->query($sql, array(clean_str($slug)));
        return $query->row();
    }

    //get posts
    public function get_posts()
    {
        $sql = "SELECT * FROM course_subjects WHERE course_subjects.lang_id = ? ORDER BY course_subjects.id DESC";
        $query = $this->db->query($sql, array(clean_number($this->selected_lang->id)));
        return $query->result();
    }

    //get posts count
    public function get_posts_count()
    {
        $sql = "SELECT COUNT(course_subjects.id) AS count FROM course_subjects WHERE course_subjects.lang_id = ?";
        $query = $this->db->query($sql, array(clean_number($this->selected_lang->id)));
        return $query->row()->count;
    }

    //get all posts
    public function get_posts_all()
    {
        $sql = "SELECT * FROM course_subjects ORDER BY course_subjects.id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    //get all posts joined
    public function get_posts_all_joined()
    {
        $sql = $this->query_string() . "ORDER BY course_subjects.id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    //get all posts count
    public function get_all_posts_count()
    {
        $sql = "SELECT COUNT(course_subjects.id) AS count FROM course_subjects";
        $query = $this->db->query($sql);
        return $query->row()->count;
    }

    //get latest posts
    public function get_latest_posts($limit)
    {
        $sql = $this->query_string() . "WHERE course_subjects.lang_id = ? ORDER BY course_subjects.id DESC LIMIT ?";
        $query = $this->db->query($sql, array(clean_number($this->selected_lang->id), clean_number($limit)));
        return $query->result();
    }

    //get posts by category
    public function get_posts_by_category($course_id)
    {
        $sql = "SELECT * FROM course_subjects WHERE course_subjects.course_id = ? ORDER BY course_subjects.id DESC";
        $query = $this->db->query($sql, array(clean_number($course_id)));
        return $query->result();
    }

    //get post count by category
    public function get_post_count_by_category($course_id)
    {
        $sql = "SELECT COUNT(course_subjects.id) AS count FROM course_subjects WHERE course_subjects.course_id = ? ORDER BY course_subjects.id DESC";
        $query = $this->db->query($sql, array(clean_number($course_id)));
        return $query->row()->count;
    }

    //get paginated posts
    public function get_paginated_posts($offset, $per_page)
    {
        $sql = $this->query_string() . "WHERE course_subjects.lang_id = ? ORDER BY course_subjects.id DESC LIMIT ?,?";
        $query = $this->db->query($sql, array(clean_number($this->selected_lang->id), clean_number($offset), clean_number($per_page)));
        return $query->result();
    }

    //get paginated category posts
    public function get_paginated_category_posts($offset, $per_page, $course_id)
    {
        $sql = $this->query_string() . "WHERE course_subjects.course_id = ? ORDER BY course_subjects.id DESC LIMIT ?,?";
        $query = $this->db->query($sql, array(clean_number($course_id), clean_number($offset), clean_number($per_page)));
        return $query->result();
    }

    //get paginated tag posts
    public function get_paginated_tag_posts($offset, $per_page, $tag_slug)
    {
        $sql = "SELECT course_subjects.*, courses.name as category_name, courses.slug as category_slug
                FROM course_subjects
                INNER JOIN courses ON course_subjects.course_id = courses.id
                INNER JOIN podcasts_tags ON course_subjects.id = podcasts_tags.blog_id 
                WHERE podcasts_tags.tag_slug = ? AND course_subjects.lang_id = ? ORDER BY course_subjects.id DESC LIMIT ?,?";
        $query = $this->db->query($sql, array(clean_str($tag_slug), clean_number($this->selected_lang->id), clean_number($offset), clean_number($per_page)));
        return $query->result();
    }

    //get paginated tag posts count
    public function get_paginated_tag_posts_count($tag_slug)
    {
        $sql = "SELECT COUNT(course_subjects.id) AS count FROM course_subjects
                INNER JOIN courses ON course_subjects.course_id = courses.id
                INNER JOIN podcasts_tags ON course_subjects.id = podcasts_tags.blog_id 
                WHERE podcasts_tags.tag_slug = ? AND course_subjects.lang_id = ?";
        $query = $this->db->query($sql, array(clean_str($tag_slug), clean_number($this->selected_lang->id)));
        return $query->row()->count;
    }

    //get related posts
    public function get_related_posts($course_id, $blog_id)
    {
        $sql = $this->query_string() . "WHERE course_subjects.course_id = ? AND course_subjects.id != ? ORDER BY RAND() LIMIT 3";
        $query = $this->db->query($sql, array(clean_number($course_id), clean_number($blog_id)));
        return $query->result();
    }

    //delete post
    public function delete_post($id)
    {
        $post = $this->get_post($id);
        if (!empty($post)) {
            //get images
            $this->db->where('id', $post->id);
            return $this->db->delete('course_subjects');
        } else {
            return false;
        }
    }


    public function singleUpdate($data, $id)
    {
        $this->db->where('id', clean_number($id));
        return $this->db->update('course_subjects', $data);
    }


    public function getPopularPost($where = '')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->where('lang_id', $this->selected_lang->id);
        $this->db->order_by('hit', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get('course_subjects');
        return $query->result();
    }

    public function get_random_posts()
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->where('lang_id', $this->selected_lang->id);
        $this->db->order_by('rand()');
        $this->db->limit(4);
        $query = $this->db->get('course_subjects');
        return $query->result();
    }
    public function set_filter_query()
    {
        $this->db->join('courses', 'course_subjects.course_id = courses.id');
        $this->db->select('course_subjects.* , courses.name as category_name, courses.slug as category_slug,  
		(SELECT COUNT(podcasts_comments.id) FROM podcasts_comments WHERE podcasts_comments.post_id = course_subjects.id AND podcasts_comments.parent_id = 0 AND status = 1) as comment_count');
        $this->db->where('course_subjects.status', 1);
        $this->db->where('course_subjects.lang_id', $this->selected_lang->id);
    }
    //get search course_subjects
    public function get_paginated_search_posts($q, $per_page, $offset)
    {
        $this->set_filter_query();
        $this->db->group_start();
        $this->db->like('course_subjects.title', $q);
        $this->db->or_like('course_subjects.content', $q);
        $this->db->or_like('course_subjects.short_description', $q);
        $this->db->group_end();
        $this->db->order_by('course_subjects.id', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('course_subjects');
        return $query->result();
    }

    //get search post count
    public function get_search_post_count($q)
    {
        $this->set_filter_query();
        $this->db->group_start();
        $this->db->like('course_subjects.title', $q);
        $this->db->or_like('course_subjects.content', $q);
        $this->db->or_like('course_subjects.short_description', $q);
        $this->db->group_end();
        $query = $this->db->get('course_subjects');
        return $query->num_rows();
    }


    //get posts by category
    public function get_posts_by_course($course_id)
    {
        $sql = "SELECT * FROM course_subjects WHERE course_subjects.course_id = ? ORDER BY course_subjects.sub_order Gr";
        $query = $this->db->query($sql, array(clean_number($course_id)));
        return $query->result();
    }
}

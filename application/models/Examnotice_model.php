<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Examnotice_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'title' => $this->input->post('title', true),
            'slug' => $this->input->post('slug', true),
            'short_description' => $this->input->post('short_description', true),
            'content' => $this->input->post('content', false),
            'optional_url' => $this->input->post('optional_url', true),
            'course_id' => $this->input->post('course_id', true),
            'session_id' => $this->input->post('session_id', true),
        );
        return $data;
    }

    //add post
    public function add_post()
    {
        $data = $this->input_values();

        if (empty($data["slug"])) {
            //slug for title
            $data["slug"] = str_slug($data["title"]);
        }
        $data["created_at"] = date('Y-m-d H:i:s');
        return $this->db->insert('exam_notice', $data);
    }

    //update post
    public function update_post($id)
    {
        $data = $this->input_values();
        $post = $this->get_post($id);
        //slug for title
        if (empty($data["slug"])) {
            $data["slug"] = str_slug($data["title"]);
        }
        $this->db->where('id', clean_number($id));
        return $this->db->update('exam_notice', $data);
    }

    //update slug
    public function update_slug($id)
    {
        $post = $this->get_post($id);
        $slug = $post->slug;
        $new_slug = $post->slug;
        //check Blog Posts
        $blogPost = $this->jobs_model->get_post_by_slug($slug);
        if (!empty($blogPost)) {
            $new_slug = $slug . "-" . $post->id;
        }
        if ($this->check_is_slug_unique($slug, $id) == true) {
            $new_slug = $slug . "-" . $post->id;
        }
        $data = array(
            'slug' => $new_slug
        );
        $this->db->where('id', $id);
        return $this->db->update('exam_notice', $data);
    }

    //check slug
    public function check_is_slug_unique($slug, $id)
    {
        $this->db->where('slug', $slug);
        $this->db->where('id !=', $id);
        $query = $this->db->get('exam_notice');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //query string
    public function query_string()
    {
        return "SELECT *  FROM exam_notice ";
    }

    //get post
    public function get_post($id)
    {
        $sql = "SELECT * FROM exam_notice WHERE id =  ?";
        $query = $this->db->query($sql, array(clean_number($id)));
        return $query->row();
    }

    //get post joined
    public function get_post_joined($id)
    {
        $sql = $this->query_string() . "WHERE exam_notice.id = ?";
        $query = $this->db->query($sql, array(clean_number($id)));
        return $query->row();
    }

    //get post by slug
    public function get_post_by_slug($slug)
    {
        $sql = $this->query_string() . "WHERE exam_notice.slug = ?";
        $query = $this->db->query($sql, array(clean_str($slug)));
        return $query->row();
    }

    //get posts
    public function get_posts()
    {
        $sql = "SELECT * FROM exam_notice WHERE exam_notice.lang_id = ? ORDER BY exam_notice.created_at DESC";
        $query = $this->db->query($sql, array(clean_number($this->selected_lang->id)));
        return $query->result();
    }

    //get posts count
    public function get_posts_count()
    {
        $sql = "SELECT COUNT(exam_notice.id) AS count FROM exam_notice WHERE exam_notice.lang_id = ?";
        $query = $this->db->query($sql, array(clean_number($this->selected_lang->id)));
        return $query->row()->count;
    }

    //get all posts
    public function get_posts_all()
    {
        $sql = "SELECT * FROM exam_notice ORDER BY exam_notice.created_at DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    //get all posts joined
    public function get_posts_all_joined()
    {
        $sql = $this->query_string() . "ORDER BY exam_notice.created_at DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    //get all posts count
    public function get_all_posts_count()
    {
        $sql = "SELECT COUNT(exam_notice.id) AS count FROM exam_notice";
        $query = $this->db->query($sql);
        return $query->row()->count;
    }

    //get latest posts
    public function get_latest_posts($limit)
    {
        $sql = $this->query_string() . "WHERE exam_notice.lang_id = ? ORDER BY exam_notice.created_at DESC LIMIT ?";
        $query = $this->db->query($sql, array(clean_number($this->selected_lang->id), clean_number($limit)));
        return $query->result();
    }

    //get posts by category
    public function get_posts_by_category($category_id)
    {
        $sql = "SELECT * FROM exam_notice WHERE exam_notice.category_id = ? ORDER BY exam_notice.created_at DESC";
        $query = $this->db->query($sql, array(clean_number($category_id)));
        return $query->result();
    }

    //get post count by category
    public function get_post_count_by_category($category_id)
    {
        $sql = "SELECT COUNT(exam_notice.id) AS count FROM exam_notice WHERE exam_notice.category_id = ? ORDER BY exam_notice.created_at DESC";
        $query = $this->db->query($sql, array(clean_number($category_id)));
        return $query->row()->count;
    }

    //get paginated posts
    public function get_paginated_posts($offset, $per_page)
    {
        $sql = $this->query_string() . "WHERE exam_notice.lang_id = ? ORDER BY exam_notice.id DESC LIMIT ?,?";
        $query = $this->db->query($sql, array(clean_number($this->selected_lang->id), clean_number($offset), clean_number($per_page)));
        return $query->result();
    }

    //get paginated category posts
    public function get_paginated_category_posts($offset, $per_page, $category_id)
    {
        $sql = $this->query_string() . "WHERE exam_notice.category_id = ? ORDER BY exam_notice.created_at DESC LIMIT ?,?";
        $query = $this->db->query($sql, array(clean_number($category_id), clean_number($offset), clean_number($per_page)));
        return $query->result();
    }

    //get paginated tag posts
    public function get_paginated_tag_posts($offset, $per_page, $tag_slug)
    {
        $sql = "SELECT exam_notice.*, job_categories.name as category_name, job_categories.slug as category_slug
                FROM exam_notice
                INNER JOIN job_categories ON exam_notice.category_id = job_categories.id
                INNER JOIN podcasts_tags ON exam_notice.id = podcasts_tags.blog_id 
                WHERE podcasts_tags.tag_slug = ? AND exam_notice.lang_id = ? ORDER BY exam_notice.created_at DESC LIMIT ?,?";
        $query = $this->db->query($sql, array(clean_str($tag_slug), clean_number($this->selected_lang->id), clean_number($offset), clean_number($per_page)));
        return $query->result();
    }

    //get paginated tag posts count
    public function get_paginated_tag_posts_count($tag_slug)
    {
        $sql = "SELECT COUNT(exam_notice.id) AS count FROM exam_notice
                INNER JOIN job_categories ON exam_notice.category_id = job_categories.id
                INNER JOIN podcasts_tags ON exam_notice.id = podcasts_tags.blog_id 
                WHERE podcasts_tags.tag_slug = ? AND exam_notice.lang_id = ?";
        $query = $this->db->query($sql, array(clean_str($tag_slug), clean_number($this->selected_lang->id)));
        return $query->row()->count;
    }

    //get related posts
    public function get_related_posts($category_id, $blog_id)
    {
        $sql = $this->query_string() . "WHERE exam_notice.category_id = ? AND exam_notice.id != ? ORDER BY RAND() LIMIT 3";
        $query = $this->db->query($sql, array(clean_number($category_id), clean_number($blog_id)));
        return $query->result();
    }

    //delete post
    public function delete_post($id)
    {
        $post = $this->get_post($id);
        if (!empty($post)) {
            //get images
            $this->db->where('id', $post->id);
            return $this->db->delete('exam_notice');
        } else {
            return false;
        }
    }

  
    public function singleUpdate($data, $id)
    {
        $this->db->where('id', clean_number($id));
        return $this->db->update('exam_notice', $data);
    }

    
    public function getPopularPost($where = '')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->where('lang_id', $this->selected_lang->id);
        $this->db->order_by('hit', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get('exam_notice');
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
        $query = $this->db->get('exam_notice');
        return $query->result();
    }
    public function set_filter_query()
    {
        $this->db->join('job_categories', 'exam_notice.category_id = job_categories.id');
        $this->db->select('exam_notice.* , job_categories.name as category_name, job_categories.slug as category_slug,  
		(SELECT COUNT(podcasts_comments.id) FROM podcasts_comments WHERE podcasts_comments.post_id = exam_notice.id AND podcasts_comments.parent_id = 0 AND status = 1) as comment_count');
        $this->db->where('exam_notice.status', 1);
        $this->db->where('exam_notice.lang_id', $this->selected_lang->id);
    }
    //get search exam_notice
    public function get_paginated_search_posts($q, $per_page, $offset)
    {
        $this->set_filter_query();
        $this->db->group_start();
        $this->db->like('exam_notice.title', $q);
        $this->db->or_like('exam_notice.content', $q);
        $this->db->or_like('exam_notice.short_description', $q);
        $this->db->group_end();
        $this->db->order_by('exam_notice.created_at', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('exam_notice');
        return $query->result();
    }

    //get search post count
    public function get_search_post_count($q)
    {
        $this->set_filter_query();
        $this->db->group_start();
        $this->db->like('exam_notice.title', $q);
        $this->db->or_like('exam_notice.content', $q);
        $this->db->or_like('exam_notice.short_description', $q);
        $this->db->group_end();
        $query = $this->db->get('exam_notice');
        return $query->num_rows();
    }

    // profile

    public function getdashBoardNotice($where = '')
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get('exam_notice');
        return $query->result();
    }

    public function get_student_notice($course_id, $session_id)
    {
      $sql = "SELECT * FROM exam_notice WHERE exam_notice.course_id = ? AND  exam_notice.session_id =?  ORDER BY exam_notice.created_at DESC";
        $query = $this->db->query($sql, array(clean_number($course_id), clean_number($session_id)));
        return $query->result();
    }

}

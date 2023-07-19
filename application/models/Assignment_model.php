<?php defined('BASEPATH') or exit('No direct script access allowed');

class Assignment_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'title' => $this->input->post('title', true),
            'slug' => $this->input->post('slug', true),
            'meta_description' => $this->input->post('meta_description', true),
            'short_description' => $this->input->post('short_description', true),
            'content' => $this->input->post('content', false),
            'keywords' => $this->input->post('keywords', true),
            'featured_image' => $this->input->post('featured_image', true),
            'extra_image' => $this->input->post('extra_image', true),
            'optional_url' => $this->input->post('optional_url', true),
            'closing_date' => $this->input->post('closing_date', true),
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
        if (!empty($data["featured_image"])) {
            $this->doMoveimage($data["featured_image"]);
        }
        if (!empty($data["extra_image"])) {
            $this->doMoveimage($data["extra_image"]);
        }
        $data["created_at"] = date('Y-m-d H:i:s');
        return $this->db->insert('assignment_post', $data);
    }

    //update post
    public function update_post($id)
    {
        $data = $this->input_values();
        $post = $this->get_post($id);
        $featured_image = $data["featured_image"];
        $extra_image = $data["extra_image"];
        $old_featured_image = $this->input->post('old_featured_image', true);
        $old_extra_image = $this->input->post('old_extra_image', true);
        //slug for title
        if (empty($data["slug"])) {
            $data["slug"] = str_slug($data["title"]);
        }
        if ($featured_image != $old_featured_image) {
            $this->doMoveimage($data["featured_image"]);
        }
        if ($extra_image != $old_extra_image) {
            $this->doMoveimage($data["extra_image"]);
        }
        $this->db->where('id', clean_number($id));
        return $this->db->update('assignment_post', $data);
    }

    //update slug
    public function update_slug($id)
    {
        $post = $this->get_post($id);
        $slug = $post->slug;
        $new_slug = $post->slug;

        if ($this->check_is_slug_unique($slug, $id) == true) {
            $new_slug = $slug . "-" . $post->id;
        }
        $data = array(
            'slug' => $new_slug
        );
        $this->db->where('id', $id);
        return $this->db->update('assignment_post', $data);
    }

    //check slug
    public function check_is_slug_unique($slug, $id)
    {
        $this->db->where('slug', $slug);
        $this->db->where('id !=', $id);
        $query = $this->db->get('assignment_post');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //query string
    public function query_string()
    {
        return "SELECT assignment_post.* FROM assignment_post" . " ";
    }

    //get post
    public function get_post($id)
    {
        $sql = "SELECT * FROM assignment_post WHERE id =  ?";
        $query = $this->db->query($sql, array(clean_number($id)));
        return $query->row();
    }

    //get post joined
    public function get_post_joined($id)
    {
        $sql = $this->query_string() . "WHERE assignment_post.id = ?";
        $query = $this->db->query($sql, array(clean_number($id)));
        return $query->row();
    }

    //get post by slug
    public function get_post_by_slug($slug)
    {
        $sql = $this->query_string() . "WHERE assignment_post.slug = ?";
        $query = $this->db->query($sql, array(clean_str($slug)));
        return $query->row();
    }

    //get posts
    public function get_posts()
    {
        $sql = "SELECT * FROM assignment_post  ORDER BY assignment_post.created_at DESC";
        $query = $this->db->query($sql, array(clean_number($this->selected_lang->id)));
        return $query->result();
    }

    //get posts count
    public function get_posts_count()
    {
        $sql = "SELECT COUNT(assignment_post.id) AS count FROM assignment_post ";
        $query = $this->db->query($sql, array(clean_number($this->selected_lang->id)));
        return $query->row()->count;
    }

    //get all posts
    public function get_posts_all()
    {
        $sql = "SELECT * FROM assignment_post ORDER BY assignment_post.created_at DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    //get all posts joined
    public function get_posts_all_joined()
    {
        $sql = $this->query_string() . "ORDER BY assignment_post.created_at DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    //get all posts count
    public function get_all_posts_count()
    {
        $sql = "SELECT COUNT(assignment_post.id) AS count FROM assignment_post";
        $query = $this->db->query($sql);
        return $query->row()->count;
    }

    //get latest posts
    public function get_latest_posts($limit)
    {
        $sql = $this->query_string() . "WHERE assignment_post.lang_id = ? ORDER BY assignment_post.created_at DESC LIMIT ?";
        $query = $this->db->query($sql, array(clean_number($this->selected_lang->id), clean_number($limit)));
        return $query->result();
    }

    //get posts by category
    public function get_posts_by_category($category_id)
    {
        $sql = "SELECT * FROM assignment_post WHERE assignment_post.category_id = ? ORDER BY assignment_post.created_at DESC";
        $query = $this->db->query($sql, array(clean_number($category_id)));
        return $query->result();
    }

    //get post count by category
    public function get_post_count_by_category($category_id)
    {
        $sql = "SELECT COUNT(assignment_post.id) AS count FROM assignment_post WHERE assignment_post.category_id = ? ORDER BY assignment_post.created_at DESC";
        $query = $this->db->query($sql, array(clean_number($category_id)));
        return $query->row()->count;
    }

    //get paginated posts
    public function get_paginated_posts($offset, $per_page)
    {
        $sql = $this->query_string() . "WHERE assignment_post.lang_id = ? ORDER BY assignment_post.created_at DESC LIMIT ?,?";
        $query = $this->db->query($sql, array(clean_number($this->selected_lang->id), clean_number($offset), clean_number($per_page)));
        return $query->result();
    }

    //get paginated category posts
    public function get_paginated_category_posts($offset, $per_page, $category_id)
    {
        $sql = $this->query_string() . "WHERE assignment_post.category_id = ? ORDER BY assignment_post.created_at DESC LIMIT ?,?";
        $query = $this->db->query($sql, array(clean_number($category_id), clean_number($offset), clean_number($per_page)));
        return $query->result();
    }

    //get paginated tag posts
    public function get_paginated_tag_posts($offset, $per_page, $tag_slug)
    {
        $sql = "SELECT assignment_post.*, blog_categories.name as category_name, blog_categories.slug as category_slug
                FROM assignment_post
                INNER JOIN blog_categories ON assignment_post.category_id = blog_categories.id
                INNER JOIN blog_tags ON assignment_post.id = blog_tags.blog_id 
                WHERE blog_tags.tag_slug = ? AND assignment_post.lang_id = ? ORDER BY assignment_post.created_at DESC LIMIT ?,?";
        $query = $this->db->query($sql, array(clean_str($tag_slug), clean_number($this->selected_lang->id), clean_number($offset), clean_number($per_page)));
        return $query->result();
    }

    //get paginated tag posts count
    public function get_paginated_tag_posts_count($tag_slug)
    {
        $sql = "SELECT COUNT(assignment_post.id) AS count FROM assignment_post
                INNER JOIN blog_categories ON assignment_post.category_id = blog_categories.id
                INNER JOIN blog_tags ON assignment_post.id = blog_tags.blog_id 
                WHERE blog_tags.tag_slug = ? AND assignment_post.lang_id = ?";
        $query = $this->db->query($sql, array(clean_str($tag_slug), clean_number($this->selected_lang->id)));
        return $query->row()->count;
    }



    //get related posts
    public function get_related_posts($category_id, $post_id)
    {
        $sql = $this->query_string() . "WHERE assignment_post.category_id = ? AND assignment_post.id != ? ORDER BY RAND() LIMIT 3";
        $query = $this->db->query($sql, array(clean_number($category_id), clean_number($post_id)));
        return $query->result();
    }

    //delete post
    public function delete_post($id)
    {
        $post = $this->get_post($id);
        if (!empty($post)) {
            //get images
            $featured_image = $post->featured_image;
            $extra_image = $post->extra_image;
            // delete Images
            $this->deleteSavedFile($featured_image, FCPATH . "/uploads/assignment_image/");
            $this->deleteSavedFile($extra_image, FCPATH . "/uploads/assignment_image/");
            //get files 
            $blogFiles = $this->assignment_files_model->getAssignmentFiles($post->id);
            if (!empty($blogFiles)) {
                foreach ($blogFiles as $key => $value) {
                    $fileName = $value->file_name;
                    $this->deleteSavedFile($fileName, FCPATH . "/uploads/files/");
                }
                $this->assignment_files_model->delete_all_AssignmentFiles_by_assignment_id($post->id);
            }
            $this->db->where('id', $post->id);
            return $this->db->delete('assignment_post');
        } else {
            return false;
        }
    }

    public function change_status($id)
    {
        $post = $this->get_post($id);
        if (!empty($post)) {
            $status = $post->status;
            if ($status == 1) {
                $data = ['status' => 0];
                return $this->singleUpdate($data, $id);
            } else {
                $data = ['status' => 1];
                return $this->singleUpdate($data, $id);
            }
        } else {
            return false;
        }
    }

    // move images
    public function doMoveimage($file)
    {
        $source = FCPATH . "/uploads/tempimg/";
        $destination = FCPATH . "/uploads/assignment_image/";
        if (!empty($file)) {
            if (@rename($source . $file, $destination . $file)) {
                return true;
            } else {
                return true;
            }
        }
    }

    public function singleUpdate($data, $id)
    {
        $this->db->where('id', clean_number($id));
        return $this->db->update('assignment_post', $data);
    }

    // Delete Files
    public function deleteSavedFile($file, $path)
    {
        @unlink($path . $file);
    }

    public function get_blog_count_by_category($category_id)
    {
        $this->db->where("category_id", $category_id);
        $this->db->where('lang_id', $this->selected_lang->id);
        $this->db->where('status', 1);
        $query = $this->db->get('assignment_post');
        return $query->num_rows();
    }

    public function getPopularPost($where = '')
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->where('lang_id', $this->selected_lang->id);
        $this->db->order_by('hit', 'DESC');
        $this->db->limit(6);
        $query = $this->db->get('assignment_post');
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
        $query = $this->db->get('assignment_post');
        return $query->result();
    }

    //increase post hit
    public function increase_post_hit($post)
    {
        if (!empty($post)) :
            if (!isset($_COOKIE['blog_post_' . $post->id])) :
                //increase hit
                helper_setcookie('blog_post_' . $post->id, '1');

                $data = array(
                    'hit' => $post->hit + 1
                );

                $this->db->where('id', $post->id);
                $this->db->update('assignment_post', $data);

            endif;
        endif;
    }

    public function set_filter_query()
    {
        $this->db->join('blog_categories', 'assignment_post.category_id = blog_categories.id');
        $this->db->select('assignment_post.* , blog_categories.name as category_name, blog_categories.slug as category_slug,  
		(SELECT COUNT(blog_comments.id) FROM blog_comments WHERE blog_comments.post_id = assignment_post.id AND blog_comments.parent_id = 0 AND status = 1) as comment_count');
        $this->db->where('assignment_post.status', 1);
        $this->db->where('assignment_post.lang_id', $this->selected_lang->id);
    }
    //get search assignment_post
    public function get_paginated_search_posts($q, $per_page, $offset)
    {
        $this->set_filter_query();
        $this->db->group_start();
        $this->db->like('assignment_post.title', $q);
        $this->db->or_like('assignment_post.content', $q);
        $this->db->or_like('assignment_post.short_description', $q);
        $this->db->group_end();
        $this->db->order_by('assignment_post.created_at', 'DESC');
        $this->db->limit($per_page, $offset);
        $query = $this->db->get('assignment_post');
        return $query->result();
    }

    //get search post count
    public function get_search_post_count($q)
    {
        $this->set_filter_query();
        $this->db->group_start();
        $this->db->like('assignment_post.title', $q);
        $this->db->or_like('assignment_post.content', $q);
        $this->db->or_like('assignment_post.short_description', $q);
        $this->db->group_end();
        $query = $this->db->get('assignment_post');
        return $query->num_rows();
    }
}

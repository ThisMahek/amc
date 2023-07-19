<?php defined('BASEPATH') or exit('No direct script access allowed');
class Job_cat_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'name' => $this->input->post('name', true),
            'slug' => $this->input->post('slug', true),
            'description' => $this->input->post('description', true),
            'keywords' => $this->input->post('keywords', true),
            'cat_order' => $this->input->post('cat_order', true)
        );
        return $data;
    }

    //add category
    public function add_category()
    {
        $data = $this->input_values();

        if (empty($data["slug"])) {
            //slug for title
            $data["slug"] = str_slug($data["name"]);
        }

        return $this->db->insert('job_categories', $data);
    }

    //update slug
    public function update_slug($id)
    {
        $category = $this->get_category($id);

        if (empty($category->slug) || $category->slug == "-") {
            $data = array(
                'slug' => $category->id
            );
            $this->db->where('id', $id);
            $this->db->update('job_categories', $data);
        } else {
            if ($this->check_is_slug_unique($category->slug, $id) == true) {
                $data = array(
                    'slug' => $category->slug . "-" . $category->id
                );

                $this->db->where('id', $id);
                $this->db->update('job_categories', $data);
            }
        }
    }

    //check slug
    public function check_is_slug_unique($slug, $id)
    {
        $this->db->where('job_categories.slug', $slug);
        $this->db->where('job_categories.id !=', $id);
        $query = $this->db->get('job_categories');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //get category
    public function get_category($id)
    {
        $id = clean_number($id);
        $this->db->where('id', $id);
        $query = $this->db->get('job_categories');
        return $query->row();
    }

    //get category by slug
    public function get_category_by_slug($slug)
    {
        $this->db->where('slug', $slug);
        $query = $this->db->get('job_categories');
        return $query->row();
    }

    //get categories
    public function get_categories()
    {
        $this->db->order_by('cat_order');
        $query = $this->db->get('job_categories');
        return $query->result();
    }

    //get categories by 
    public function get_categories_all()
    {
        $this->db->order_by('cat_order');
        $query = $this->db->get('job_categories');
        return $query->result();
    }

 
    //get category count
    public function get_category_count()
    {
        $query = $this->db->get('job_categories');
        return $query->num_rows();
    }

    //update category
    public function update_category($id)
    {
        $id = clean_number($id);
        $data = $this->input_values();

        //slug for title
        if (empty($data["slug"])) {
            $data["slug"] = str_slug($data["name"]);
        }

        $this->db->where('id', $id);
        return $this->db->update('job_categories', $data);
    }

    //delete category
    public function delete_category($id)
    {
        $id = clean_number($id);
        $category = $this->get_category($id);

        if (!empty($category)) {
            $this->db->where('id', $id);
            return $this->db->delete('job_categories');
        } else {
            return false;
        }
    }
}
?>
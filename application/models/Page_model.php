<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'title' => $this->input->post('title', true),
            'slug' => $this->input->post('slug', true),
            'page_description' => $this->input->post('page_description', true),
            'page_keywords' => $this->input->post('page_keywords', true),
            'page_content' => $this->input->post('content'),
            'page_order' => $this->input->post('page_order', true),
            'location' => $this->input->post('location', true),
        );
        return $data;
    }

    //add page
    public function add()
    {
        $data = $this->page_model->input_values();

        if (empty($data["slug"])) {
            //slug for title
            $data["slug"] = str_slug($data["title"]);

            if (empty($data["slug"])) {
                $data["slug"] = "page-" . uniqid();
            }
        }
        $data["created_at"] = date('Y-m-d H:i:s');

        return $this->db->insert('pages', $data);
    }

    //update page
    public function update($id)
    {
        //set values
        $data = $this->page_model->input_values();

        if (empty($data["slug"])) {
            //slug for title
            $data["slug"] = str_slug($data["title"]);

            if (empty($data["slug"])) {
                $data["slug"] = "page-" . uniqid();
            }
        }

        $page = $this->get_page_by_id($id);
        if (!empty($page)) {
            $this->db->where('id', $id);
            return $this->db->update('pages', $data);
        }
        return false;
    }

    //get all pages
    public function get_all_pages()
    {
        $this->db->order_by('page_order');
        $query = $this->db->get('pages');
        return $query->result();
    }

    //get pages
    public function get_pages()
    {
        $this->db->where('pages.lang_id', $this->selected_lang->id);
        $this->db->order_by('page_order');
        $query = $this->db->get('pages');
        return $query->result();
    }

    

    //get pages sitemap
    public function get_pages_sitemap()
    {
        $this->db->order_by('pages.id');
        $query = $this->db->get('pages');
        return $query->result();
    }

    //get top menu pages
    public function get_top_menu_pages()
    {
        $this->db->order_by('page_order');
        $this->db->where('location', 'top');
        $this->db->or_where('location', 'both');
        $query = $this->db->get('pages');
        return $query->result();
    }

    //get main menu pages
    public function get_main_menu_pages()
    {
        $this->db->order_by('page_order');
        $this->db->where('location', 'top');
        $this->db->or_where('location', 'both');
        $query = $this->db->get('pages');
        return $query->result();
    }

    //get footer pages
    public function get_footer_pages()
    {
        $this->db->order_by('page_order');
        $this->db->where('location', 'footer');
        $this->db->or_where('location', 'both');
        $query = $this->db->get('pages');
        return $query->result();
    }

    //get page
    public function get_page($slug)
    {
        $slug = remove_special_characters($slug);
        $this->db->where('slug', $slug);
        $this->db->where('visibility', 1);
        $query = $this->db->get('pages');
        return $query->row();
    }

  

    //get page by id
    public function get_page_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('pages');
        return $query->row();
    }

    //check page name
    public function check_page_name()
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
        $page = $this->get_page_by_id($id);
       
        if (!empty($page)) {
            $this->db->where('id', $id);
            return $this->db->delete('pages');
        }
        return false;
    }

  
   
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Partner_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'title' => $this->input->post('title', true),
            'partner_url' => $this->input->post('partner_url'),
            'featured_image' => $this->input->post('featured_image', true),
            'partner_order' => $this->input->post('partner_order', true),
        );
        return $data;
    }

    //add traning_partner
    public function add()
    {
        $data = $this->input_values();
        
            if (!empty($data["featured_image"])) {
                $this->doMoveimage($data["featured_image"]);
            }
        return $this->db->insert('traning_partners', $data);
    }

    //update traning_partner
    public function update($id)
    {
        
        //set values
        $data = $this->input_values();
        $featured_image = $data["featured_image"];
        $old_featured_image = $this->input->post('old_featured_image', true);
        if ($featured_image != $old_featured_image) {
            $this->doMoveimage($data["featured_image"]);
        }
        $traning_partner = $this->get_traning_partner_by_id($id);
        if (!empty($traning_partner)) {
            $this->db->where('id', $id);
            return $this->db->update('traning_partners', $data);
        }
        return false;
    }

    //get all traning_partners
    public function get_all_traning_partners()
    {
      $this->db->order_by('id','DESC');
        $query = $this->db->get('traning_partners');
        return $query->result();
    }

    //get traning_partners
    public function get_traning_partners()
    {
      $this->db->order_by('id','DESC');
        $query = $this->db->get('traning_partners');
        return $query->result();
    }

   
    //get subtraning_partners


    //get traning_partners sitemap
    public function get_traning_partners_sitemap()
    {
        $this->db->order_by('traning_partners.id');
        $query = $this->db->get('traning_partners');
        return $query->result();
    }

    //get top menu traning_partners
    public function get_top_menu_traning_partners()
    {
      $this->db->order_by('id','DESC');
         $this->db->where('location', 'top');
        $query = $this->db->get('traning_partners');
        return $query->result();
    }

    
    //get traning_partner
    public function get_traning_partner_by_slug($slug)
    {
        $slug = remove_special_characters($slug);
        $this->db->where('slug', $slug);
        $query = $this->db->get('traning_partners');
        return $query->row();
    }

    
    //get traning_partner by id
    public function get_traning_partner_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('traning_partners');
        return $query->row();
    }

    //check traning_partner name
    public function check_traning_partner_name()
    {
        $title = $this->input->post('title', true);
        $slug = $this->input->post('slug', true);
        if (empty($slug)) {
            //slug for title
            $slug = str_slug($title);
        }
        $languages = $this->language_model->get_languages();
        if (!empty($languages)) {
            foreach ($languages as $language) {
                if ($language->short_form == trim($slug)) {
                    return false;
                }
            }
        }
        return true;
    }

    //delete traning_partner
    public function delete($id)
    {
        $traning_partner = $this->get_traning_partner_by_id($id);
        if (!empty($traning_partner)) {
            delete_file_from_server('uploads/traning_partner/' . $traning_partner->featured_image);
            $this->db->where('id', $id);
            return $this->db->delete('traning_partners');
        }
        return false;
    }

    // move images
    public function doMoveimage($file)
    {
        $source = FCPATH . "/uploads/tempimg/";
        $destination = FCPATH . "/uploads/traning_partner/";
        if (!empty($file)) {
            if (@rename($source . $file, $destination . $file)) {
                return true;
            } else {
                return true;
            }
        }
    }

    //get traning_partners
    public function get_traning_partners_by_lang_home($lang_id)
    {
        $this->db->where('traning_partners.lang_id', $lang_id);
        $this->db->order_by('order', 'ASC');
        $this->db->limit(3);
        $query = $this->db->get('traning_partners');
        return $query->result();
    }

    //get all traning_partners
    public function get_traning_partner_count()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('traning_partners');
        return $query->num_rows();
    }

    public function get_posts_count()
    {
        $sql = "SELECT COUNT(traning_partners.id) AS count FROM traning_partners WHERE traning_partners.lang_id = ?";
        $query = $this->db->query($sql, array(clean_number($this->selected_lang->id)));
        return $query->row()->count;
    }

    //get paginated posts
    public function get_paginated_posts($offset, $per_page)
    {
        $sql = "SELECT * FROM traning_partners WHERE traning_partners.lang_id = ? ORDER BY traning_partners.created_at DESC LIMIT ?,?";
        $query = $this->db->query($sql, array(clean_number($this->selected_lang->id), clean_number($offset), clean_number($per_page)));
        return $query->result();
    }
}

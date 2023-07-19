<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Image_gallery_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'lang_id' => 1,
            'title' => $this->input->post('title', true),
        );
        return $data;
    }

    //add image
    public function add()
    {
        $data = $this->input_values();
        // upload logo
        if ($_FILES['image']['name'] != '') {
            $path = FCPATH . 'uploads/image_gallery/';
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('image')) {
                $file_data = $this->upload->data();
                $this->resizeImage($file_data);
                $data["image"] =  $file_data['file_name'];
            } else {
                $this->session->set_flashdata('error',  $this->upload->display_errors());
                redirect($this->agent->referrer());
            }
        }
      
        $data["created_at"] = date('Y-m-d H:i:s');
        return $this->db->insert('image_gallery', $data);
    }

    public function resizeImage($file_data)
    {
        $this->load->library('image_lib');
        $path = FCPATH . "/uploads/image_gallery/";
        $height = 480;
        $width = 640;
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path . $file_data["raw_name"] . $file_data['file_ext'];
        $config['new_image'] = $path . $file_data["raw_name"] . $file_data['file_ext'];
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = "60";
        $config['width']         = $width;
        $config['height']       = $height;
        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }

    //update image
    public function update($id)
    {
        //set values
        $data = $this->input_values();
        $oldIng = $this->input->post('oldIng', true);
        if ($_FILES['image']['name'] != '') {
            $path = FCPATH . 'uploads/image_gallery/';
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('image')) {
                $file_data = $this->upload->data();
                $this->resizeImage($file_data);
                $data["image"] =  $file_data['file_name'];
                if (!empty($oldIng)) {
                    delete_file_from_server('uploads/image_gallery/'.$oldIng);
                }
            } else {
                $this->session->set_flashdata('error',  $this->upload->display_errors());
                redirect($this->agent->referrer());
            }
        }
        $image = $this->get_image_by_id($id);
        if (!empty($image)) {
      
            $this->db->where('id', $id);
            return $this->db->update('image_gallery', $data);
        }else{
            return false;          
        }
    }

    //get all image_gallery
    public function get_all_images()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('image_gallery');
        return $query->result();
    }

    //get images
    public function get_images()
    {
        $this->db->where('image_gallery.lang_id', 1);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('image_gallery');
        return $query->result();
    }

    //get images
    public function get_images_by_lang($lang_id =1)
    {
        $this->db->where('image_gallery.lang_id', $lang_id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('image_gallery');
        return $query->result();
    }

   
    //get image by id
    public function get_image_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('image_gallery');
        return $query->row();
    }

 

    //delete image
    public function delete($id)
    {
        $image = $this->get_image_by_id($id);
        if (!empty($image)) {
            delete_file_from_server('uploads/image_gallery/' . $image->image);
            $this->db->where('id', $id);
            return $this->db->delete('image_gallery');
        }
        return false;
    }
  
    //get activities
    public function get_image_by_lang_home($lang_id =1)
    {
        $this->db->where('image_gallery.lang_id', $lang_id);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get('image_gallery');
        return $query->result();
    }
    public function doMoveimage($file)
    {
        $source = FCPATH . "/uploads/tempimg/";
        $destination = FCPATH . "/uploads/image_gallery/";
        if (!empty($file)) {
            if (@rename($source . $file, $destination . $file)) {
                return true;
            } else {
                return true;
            }
        }
    }
    public function get_posts_count()
    {
        $sql = "SELECT COUNT(image_gallery.id) AS count FROM image_gallery" ;
        $query = $this->db->query($sql);
        return $query->row()->count;
    }

    //get paginated posts
    public function get_paginated_posts($offset, $per_page)
    {
        $sql = "SELECT * FROM image_gallery WHERE image_gallery.lang_id = ? ORDER BY image_gallery.created_at DESC LIMIT ?,?";
        $query = $this->db->query($sql, array(clean_number(1), clean_number($offset), clean_number($per_page)));
        return $query->result();
    }
}

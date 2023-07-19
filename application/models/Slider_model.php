<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider_model extends CI_Model
{
    public function __construct() {
        $this->load->library('upload');
    }
    //add item
    public function add_item()
    {
        $data = array(
            'lang_id' => 1,
            'title' => $this->input->post('title', true),
            'title1' => $this->input->post('title1', true),
            'title2' => $this->input->post('title2', true),
            'item_order' => $this->input->post('item_order', true),
        );
        // upload logo
        if ($_FILES['image']['name'] != '') {
            $path = FCPATH . 'uploads/slider/';
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
                $data["image"] = $file_data['file_name'];
            } else {
                return false;
            }
        }
        return $this->db->insert('slider', $data);
    }

    //update item
    public function update_item($id)
    {
        $newImg="";
        $data = array(
            'lang_id' => $this->input->post('lang_id', true),
            'title' => $this->input->post('title', true),
            'title1' => $this->input->post('title1', true),
            'title2' => $this->input->post('title2', true),
            'item_order' => $this->input->post('item_order', true),
            
        );
        // upload logo
        if ($_FILES['image']['name'] != '') {
            $path = FCPATH . 'uploads/slider/';
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
                $newImg = $file_data['file_name'];
            } else {
                return false;
            }
        }

        $item = $this->get_slider_item($id);
        if (!empty($item)) {
            
            
            if (!empty($newImg)) {
                delete_file_from_server('uploads/slider/'.$item->image);
                $data["image"] = $newImg;
            }
            $this->db->where('id', $id);
            return $this->db->update('slider', $data);
        }
        return false;
    }

    //get slider item
    public function get_slider_item($id)
    {
        $id = clean_number($id);
        $this->db->where('id', $id);
        $query = $this->db->get('slider');
        return $query->row();
    }

    //get slider items
    public function get_slider_items()
    {
        $this->db->where('slider.lang_id', 1);
        $this->db->order_by('item_order');
        $query = $this->db->get('slider');
        return $query->result();
    }

    //get all slider items
    public function get_slider_items_all()
    {
        $this->db->order_by('item_order');
        $query = $this->db->get('slider');
        return $query->result();
    }

    //update slider settings
    public function update_slider_settings()
    {
        $data = array(
            'slider_status' => $this->input->post('slider_status', true),
            'slider_type' => $this->input->post('slider_type', true),
            'slider_effect' => $this->input->post('slider_effect', true)
        );

        $this->db->where('id', 1);
        return $this->db->update('general_settings', $data);
    }

    //delete slider item
    public function delete_slider_item($id)
    {
        $id = clean_number($id);
        $slider_item = $this->get_slider_item($id);
        if (!empty($slider_item)) {

            delete_file_from_server('uploads/slider/' . $slider_item->image);
            $this->db->where('id', $id);
            return $this->db->delete('slider');
        }
        return false;
    }

    /*
    *-------------------------------------------------------------------------------------------------
    * Banner SETTINGS
    *-------------------------------------------------------------------------------------------------
    */

    //get all slider items
    public function get_banner_items_all()
    {
        $this->db->order_by('id');
        $query = $this->db->get('banner');
        return $query->result();
    }
    public function add_banner_item()
    {
        $data = array(
            'lang_id' => $this->input->post('lang_id', true),
        );
        // upload logo
        if ($_FILES['image']['name'] != '') {
            $path = FCPATH . 'uploads/slider/';
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
                $data["image"] = $file_data['file_name'];
            } else {
                return false;
            }
        }
        return $this->db->insert('banner', $data);
    }

    //update item
    public function update_banner_item($id)
    {
        $newImg = "";
        $data = array(
            'lang_id' => $this->input->post('lang_id', true),
        );
        // upload logo
        if ($_FILES['image']['name'] != '') {
            $path = FCPATH . 'uploads/slider/';
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
                $newImg = $file_data['file_name'];
            } else {
                return false;
            }
        }

        $item = $this->get_banner_item($id);
        if (!empty($item)) {
            if (!empty($newImg)) {
                delete_file_from_server('uploads/slider/' . $item->image);
                $data["image"] = $newImg;
            }
            $this->db->where('id', $id);
            return $this->db->update('banner', $data);
        }
        return false;
    }
    public function get_banner_item($id)
    {
        $id = clean_number($id);
        $this->db->where('id', $id);
        $query = $this->db->get('banner');
        return $query->row();
    }

    //delete slider item
    public function delete_banner_item($id)
    {
        $id = clean_number($id);
        $slider_item = $this->get_banner_item($id);
        if (!empty($slider_item)) {

            delete_file_from_server('uploads/slider/' . $slider_item->image);
            $this->db->where('id', $id);
            return $this->db->delete('banner');
        }
        return false;
    }

    //get slider items
    public function get_banner_item_row()
    {
        $this->db->where('banner.lang_id', 1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get('banner');
        return $query->row();
    }

}

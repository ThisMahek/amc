<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimonial_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'user_name' => $this->input->post('user_name', true),
            'testimonial_details' => $this->input->post('testimonial_details', true),
            'testimonial_order' => $this->input->post('testimonial_order', true),
        );
        return $data;
    }

    //add testimonials
    public function add_testimonial()
    {
        $data = $this->input_values();
        // upload logo
        if ($_FILES['testimonial_image']['name'] != '') {
            $path = FCPATH . 'uploads/testimonials/';
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('testimonial_image')) {
                $file_data = $this->upload->data();
                $data["testimonial_image"] =  $file_data['file_name'];
            } else {
                return false;
            }
        }
        return $this->db->insert('testimonials', $data);
    }

    //update slug
   
    //get testimonials
    public function get_testimonial($id)
    {
        $id = clean_number($id);
        $this->db->where('id', $id);
        $query = $this->db->get('testimonials');
        return $query->row();
    }

    //get testimonials by slug
    public function get_testimonials_by_slug($slug)
    {
        $this->db->where('slug', $slug);
        $query = $this->db->get('testimonials');
        return $query->row();
    }

    //get testimonials
    public function get_testimonials()
    {

        $this->db->order_by('testimonial_order');
        $query = $this->db->get('testimonials');
        return $query->result();
    }

    //get testimonials by lang
    public function get_testimonials_all()
    {
        $this->db->order_by('testimonial_order');
        $query = $this->db->get('testimonials');
        return $query->result();
    }

    //get testimonials count
    public function get_testimonials_count()
    {
        $query = $this->db->get('testimonials');
        return $query->num_rows();
    }

    //update testimonials
    public function update_testimonials($id)
    {
        $id = clean_number($id);
        $data = $this->input_values();
        $old_image = $this->input->post('old_image', true);
        if ($_FILES['testimonial_image']['name'] != '') {
            $path = FCPATH . 'uploads/testimonials/';
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('testimonial_image')) {
                $file_data = $this->upload->data();
                $data["testimonial_image"] =  $file_data['file_name'];
                $this->removeOldImage($old_image);
            } else {
                return false;
            }
        }
        $this->db->where('id', $id);
        return $this->db->update('testimonials', $data);
    }

    //delete testimonials
    public function delete_testimonials($id)
    {
        $id = clean_number($id);
        $testimonials = $this->get_testimonial($id);

        if (!empty($testimonials)) {
            $this->removeOldImage($testimonials->testimonial_image);
            $this->db->where('id', $id);
            return $this->db->delete('testimonials');
        } else {
            return false;
        }
    }

    // move images
    public function doMoveimage($file)
    {
        $source = FCPATH . "/uploads/tempimg/";
        $destination = FCPATH . "/uploads/testimonials/";
        if (!empty($file)) {
            if (@rename($source . $file, $destination . $file)) {
                return true;
            } else {
                return true;
            }
        }
    }

    public function removeOldImage($old_image)
    {
        $path = FCPATH . "/uploads/testimonials/";
        @unlink($path . $old_image);
    }

    public function get_testimonialss_all_home($limit=10)
    {
        $this->db->order_by('testimonial_order');
        $this->db->limit($limit);
        $query = $this->db->get('testimonials');
        return $query->result();
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Video_gallery_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'lang_id' => 1,
            'video_id' => $this->input->post('video_id', true),
        );
        return $data;
    }

    //add video
    public function add()
    {
        $data = $this->input_values();
        // upload logo
        $data["created_at"] = date('Y-m-d H:i:s');
        return $this->db->insert('video_gallery', $data);
    }

    

    //update video
    public function update($id)
    {
        //set values
        $data = $this->input_values();
        
   
        $video = $this->get_video_by_id($id);
        if (!empty($video)) {

            $this->db->where('id', $id);
            return $this->db->update('video_gallery', $data);
        } else {
            return false;
        }
    }

    //get all video_gallery
    public function get_all_videos()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('video_gallery');
        return $query->result();
    }

    //get videos
    public function get_videos()
    {
        $this->db->where('video_gallery.lang_id', 1);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('video_gallery');
        return $query->result();
    }

    //get videos
    public function get_videos_by_lang($lang_id = 1)
    {
        $this->db->where('video_gallery.lang_id', $lang_id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('video_gallery');
        return $query->result();
    }


    //get video by id
    public function get_video_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('video_gallery');
        return $query->row();
    }



    //delete video
    public function delete($id)
    {
        $video = $this->get_video_by_id($id);
        if (!empty($video)) {
            $this->db->where('id', $id);
            return $this->db->delete('video_gallery');
        }
        return false;
    }

    //get activities
    public function get_video_by_lang_home($lang_id = 1)
    {
        $this->db->where('video_gallery.lang_id', $lang_id);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(3);
        $query = $this->db->get('video_gallery');
        return $query->result();
    }
   
    public function get_posts_count()
    {
        $sql = "SELECT COUNT(video_gallery.id) AS count FROM video_gallery";
        $query = $this->db->query($sql);
        return $query->row()->count;
    }

    //get paginated posts
    public function get_paginated_posts($offset, $per_page)
    {
        $sql = "SELECT * FROM video_gallery WHERE video_gallery.lang_id = ? ORDER BY video_gallery.created_at DESC LIMIT ?,?";
        $query = $this->db->query($sql, array(clean_number(1), clean_number($offset), clean_number($per_page)));
        return $query->result();
    }
}

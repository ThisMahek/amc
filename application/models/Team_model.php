<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Team_model extends CI_Model
{
    //input values
    public function input_values()
    {
        $data = array(
            'member_name' => $this->input->post('member_name', true),
            'slug' => $this->input->post('slug', true),
            'member_designation' => $this->input->post('member_designation', true),
            'member_image' => $this->input->post('member_image', true),
            'about_member' => $this->input->post('about_member'),
            'meta_description' => $this->input->post('meta_description', true),
            'meta_keywords' => $this->input->post('meta_keywords', true),
            'facebook_url' => $this->input->post('facebook_url', true),
            'twitter_url' => $this->input->post('twitter_url', true),
            'instagram_url' => $this->input->post('instagram_url', true),
            'linkedin_url' => $this->input->post('linkedin_url', true),
            'youtube_url' => $this->input->post('youtube_url', true),
            'website_url' => $this->input->post('website_url', true),
            'member_order' => $this->input->post('member_order', true),
        );
        return $data;
    }

    //add team
    public function add_member()
    {
        $data = $this->input_values();
        if (!empty($data["member_image"])) {
            $this->doMoveimage($data["member_image"]);
        }
        if (empty($data["slug"])) {
            //slug for title
            $data["slug"] = str_slug($data["member_name"]);
        }

        return $this->db->insert('team', $data);
    }

    //update slug
    public function update_slug($id)
    {
        $team = $this->get_team($id);

        if (empty($team->slug) || $team->slug == "-") {
            $data = array(
                'slug' => $team->id
            );
            $this->db->where('id', $id);
            $this->db->update('team', $data);
        } else {
            if ($this->check_is_slug_unique($team->slug, $id) == true) {
                $data = array(
                    'slug' => $team->slug . "-" . $team->id
                );
                $this->db->where('id', $id);
                $this->db->update('team', $data);
            }
        }
    }

    //check slug
    public function check_is_slug_unique($slug, $id)
    {
        $this->db->where('team.slug', $slug);
        $this->db->where('team.id !=', $id);
        $query = $this->db->get('team');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //get team
    public function get_team($id)
    {
        $id = clean_number($id);
        $this->db->where('id', $id);
        $query = $this->db->get('team');
        return $query->row();
    }

    //get team by slug
    public function get_team_by_slug($slug)
    {
        $this->db->where('slug', $slug);
        $query = $this->db->get('team');
        return $query->row();
    }

    //get team
    public function get_teams()
    {
       
        $this->db->order_by('member_order');
        $query = $this->db->get('team');
        return $query->result();
    }

    //get team by lang
    public function get_teams_all()
    {
        $this->db->order_by('member_order');
        $query = $this->db->get('team');
        return $query->result();
    }

       //get team count
    public function get_team_count()
    {
        $query = $this->db->get('team');
        return $query->num_rows();
    }

    //update team
    public function update_team($id)
    {
        $id = clean_number($id);
        $data = $this->input_values();
        $old_image = $this->input->post('old_image', true);

        if ($data["member_image"] != $old_image) {
            $this->doMoveimage($data["member_image"]);
            $this->removeOldImage($old_image);
        }

        //slug for title
        if (empty($data["slug"])) {
            $data["slug"] = str_slug($data["name"]);
        }

        $this->db->where('id', $id);
        return $this->db->update('team', $data);
    }

    //delete team
    public function delete_team($id)
    {
        $id = clean_number($id);
        $team = $this->get_team($id);

        if (!empty($team)) {
            $this->removeOldImage($team->member_image);
            $this->db->where('id', $id);
            return $this->db->delete('team');
        } else {
            return false;
        }
    }

    // move images
    public function doMoveimage($file)
    {
        $source = FCPATH . "/uploads/tempimg/";
        $destination = FCPATH . "/uploads/team/";
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
        $path = FCPATH . "/uploads/team/";
        @unlink($path . $old_image);
    }

    public function get_teams_all_home()
    {
        $this->db->order_by('member_order');
        $this->db->limit(4);
        $query = $this->db->get('team');
        return $query->result();
    }
}

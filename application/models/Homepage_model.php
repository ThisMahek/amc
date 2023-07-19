<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage_model extends CI_Model
{
    /*
    *-------------------------------------------------------------------------------------------------
    * HOMEPAGE About Us SETTINGS
    *-------------------------------------------------------------------------------------------------
    */

    public function get_about_data($lang_id=1)
    {
        $this->db->where('lang_id', $lang_id);
        $query = $this->db->get('home_about');
        return $query->row();
    }

    public function update_about_data()
    {
        $lang_id = 1;
        $oldIng = $this->input->post('oldIng', true);
        $data = array(

            'about_heading' => $this->input->post('about_heading', true),
            'mission_heading' => $this->input->post('mission_heading', true),
            'strategy_heading' => $this->input->post('strategy_heading', true),
            'about_content' => $this->input->post('about_content', true),
            'mission_content' => $this->input->post('mission_content', true),
            'vision_heading' => $this->input->post('vision_heading', true),
            'vision_content' => $this->input->post('vision_content', true),
            'strategy_content' => $this->input->post('strategy_content', true),
            'button_text' => $this->input->post('button_text', true),
            'button_link' => $this->input->post('button_link', true),
        );
        // upload logo
        if ($_FILES['image']['name'] != '') {
            $path = FCPATH . 'uploads/misc/';
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
                $data["image"] =  $file_data['file_name'];
                if (!empty($oldIng)) {
                    delete_file_from_server('uploads/misc/' . $oldIng);
                }
            } else {
                return false;
            }
        }

        $this->db->where('lang_id', $lang_id);
        return $this->db->update('home_about', $data);
    }

    /*
    *-------------------------------------------------------------------------------------------------
    * HOMEPAGE COUNTER SETTINGS
    *-------------------------------------------------------------------------------------------------
    */

    public function get_counter_data($lang_id = 1)
    {
        $this->db->where('lang_id', $lang_id);
        $query = $this->db->get('home_counter');
        return $query->row();
    }

    public function update_counter_data()
    {
        $data = array(
            'c1_heading' => $this->input->post('c1_heading'),
            'c2_heading' => $this->input->post('c2_heading'),
            'c3_heading' => $this->input->post('c3_heading'),
            'c4_heading' => $this->input->post('c4_heading'),
            'c1_num' => $this->input->post('c1_num'),
            'c2_num' => $this->input->post('c2_num'),
            'c3_num' => $this->input->post('c3_num'),
            'c4_num' => $this->input->post('c4_num'),
        );
        // print_r($data);exit;
        $this->db->where('id',1);
        return $this->db->update('home_counter', $data);
    }

    /*
    *-------------------------------------------------------------------------------------------------
    * HOMEPAGE Future SETTINGS
    *-------------------------------------------------------------------------------------------------
    */

    public function get_futureProspect_data($lang_id = 1)
    {
        $this->db->where('lang_id', $lang_id);
        $query = $this->db->get('home_futureprospect');
        return $query->row();
    }

    public function update_futureProspect_data()
    {
        $lang_id = $this->input->post('lang_id', true);
        $oldIng = $this->input->post('oldIng', true);
        $oldIng1 = $this->input->post('oldIng1', true);
        $oldIng2 = $this->input->post('oldIng2', true);
        $oldIng3 = $this->input->post('oldIng3', true);
        $data = array(

            'heading1' => $this->input->post('heading1', true),
            'heading2' => $this->input->post('heading2', true),
            'content' => $this->input->post('content', true),
        );
        // upload logo
        if ($_FILES['image']['name'] != '') {
            $path = FCPATH . 'uploads/misc/';
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
                $data["image"] =  $file_data['file_name'];
                if (!empty($oldIng)) {
                    delete_file_from_server('uploads/misc/' . $oldIng);
                }
            } else {
                $this->session->set_flashdata('error',  $this->upload->display_errors());
                redirect($this->agent->referrer());
            }
        }
        if ($_FILES['image1']['name'] != '') {
            $path = FCPATH . 'uploads/misc/';
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('image1')) {
                $file_data = $this->upload->data();
                $data["image1"] =  $file_data['file_name'];
                if (!empty($oldIng)) {
                    delete_file_from_server('uploads/misc/' . $oldIng);
                }
            } else {
                $this->session->set_flashdata('error',  $this->upload->display_errors());
                redirect($this->agent->referrer());
            }
        }
        if ($_FILES['image2']['name'] != '') {
            $path = FCPATH . 'uploads/misc/';
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('image2')) {
                $file_data = $this->upload->data();
                $data["image2"] =  $file_data['file_name'];
                if (!empty($oldIng)) {
                    delete_file_from_server('uploads/misc/' . $oldIng);
                }
            } else {
                $this->session->set_flashdata('error',  $this->upload->display_errors());
                redirect($this->agent->referrer());
            }
        }
        if ($_FILES['image3']['name'] != '') {
            $path = FCPATH . 'uploads/misc/';
            if (!is_dir($path)) {
                mkdir($path, 0755, TRUE);
            }
            $config_prof['encrypt_name']  = TRUE;
            $config_prof['upload_path']   = $path;
            $config_prof['allowed_types'] = 'png|jpeg|jpg';
            $config['max_size']           = '5000';
            $config_prof['overwrite']     = true;
            $this->upload->initialize($config_prof);
            if ($this->upload->do_upload('image3')) {
                $file_data = $this->upload->data();
                $data["image3"] =  $file_data['file_name'];
                if (!empty($oldIng)) {
                    delete_file_from_server('uploads/misc/' . $oldIng);
                }
            } else {
                $this->session->set_flashdata('error',  $this->upload->display_errors());
                redirect($this->agent->referrer());
            }
        }

        $this->db->where('lang_id', $lang_id);
        return $this->db->update('home_futureprospect', $data);
    }

    /*
    *-------------------------------------------------------------------------------------------------
    * HOMEPAGE Project SETTINGS
    *-------------------------------------------------------------------------------------------------
    */

    public function get_project_data($lang_id)
    {
        $this->db->where('lang_id', $lang_id);
        $query = $this->db->get('home_project');
        return $query->row();
    }

    public function update_project_data()
    {
        $lang_id = $this->input->post('lang_id', true);

        $data = array(

            'heading1' => $this->input->post('heading1', true),
            'heading2' => $this->input->post('heading2', true),
            'content' => $this->input->post('content', true),
        );
        $this->db->where('lang_id', $lang_id);
        return $this->db->update('home_project', $data);
    }
    /*
    *-------------------------------------------------------------------------------------------------
    * HOMEPAGE help SETTINGS
    *-------------------------------------------------------------------------------------------------
    */

    public function get_help_data($lang_id)
    {
        $this->db->where('lang_id', $lang_id);
        $query = $this->db->get('home_help');
        return $query->row();
    }

    public function update_help_data()
    {
        $lang_id = $this->input->post('lang_id', true);
        $oldIng = $this->input->post('oldIng', true);
        $data = array(
            'heading1' => $this->input->post('heading1', true),
            'heading2' => $this->input->post('heading2', true),
            'content' => $this->input->post('content', true),
            'button_text' => $this->input->post('button_text', true),
            'button_link' => $this->input->post('button_link', true),
            'button_text2' => $this->input->post('button_text2', true),
            'button_link2' => $this->input->post('button_link2', true),
        );
        // upload logo
        if ($_FILES['image']['name'] != '') {
            $path = FCPATH . 'uploads/misc/';
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
                $data["image"] =  $file_data['file_name'];
                if (!empty($oldIng)) {
                    delete_file_from_server('uploads/misc/' . $oldIng);
                }
            } else {
                $this->session->set_flashdata('error',  $this->upload->display_errors());
                redirect($this->agent->referrer());
            }
        }

        $this->db->where('lang_id', $lang_id);
        return $this->db->update('home_help', $data);
    }

    /*
    *-------------------------------------------------------------------------------------------------
    * HOMEPAGE SETTINGS
    *-------------------------------------------------------------------------------------------------
    */

    public function get_homepageSettings_data($lang_id)
    {
        $this->db->where('lang_id', $lang_id);
        $query = $this->db->get('homepage_settings');
        return $query->row();
    }

    public function update_homepageSettings_data()
    {
        $lang_id = $this->input->post('lang_id', true);
        $about = $this->input->post('about', true);
        $futureprospect = $this->input->post('futureprospect', true);
        $activities = $this->input->post('activities', true);
        $project = $this->input->post('project', true);
        $help = $this->input->post('help', true);
        $team = $this->input->post('team', true);
        $message = $this->input->post('message', true);
        $mission = $this->input->post('mission', true);
        if (!empty($about)) {
            $about = 1;
        } else {
            $about = 0;
        }
        if (!empty($futureprospect)) {
            $futureprospect = 1;
        } else {
            $futureprospect = 0;
        }
        if (!empty($activities)) {
            $activities = 1;
        } else {
            $activities = 0;
        }
        if (!empty($project)) {
            $project = 1;
        } else {
            $project = 0;
        }
        if (!empty($help)) {
            $help = 1;
        } else {
            $help = 0;
        }
        if (!empty($team)) {
            $team = 1;
        } else {
            $team = 0;
        }
        if (!empty($message)) {
            $message = 1;
        } else {
            $message = 0;
        }
        if (!empty($mission)) {
            $mission = 1;
        } else {
            $mission = 0;
        }
        $data = array(
            'about' => $about,
            'futureprospect' => $futureprospect,
            'activities' => $activities,
            'project' => $project,
            'help' => $help,
            'mission' => $mission,
            'team' => $team,
            'message' => $message,
        );
        $this->db->where('lang_id', $lang_id);
        return $this->db->update('homepage_settings', $data);
    }
    /*
    *-------------------------------------------------------------------------------------------------
    * HOMEPAGE mission SETTINGS
    *-------------------------------------------------------------------------------------------------
    */

    public function get_mission_data($lang_id)
    {
        $this->db->where('lang_id', $lang_id);
        $query = $this->db->get('home_mission');
        return $query->row();
    }

    public function update_mission_data()
    {
        $lang_id = $this->input->post('lang_id', true);
        $data = array(
            'mission_heading' => $this->input->post('mission_heading', true),
            'mission_content' => $this->input->post('mission_content', true),
            'mission_button_text' => $this->input->post('mission_button_text', true),
            'mission_button_link' => $this->input->post('mission_button_link', true),
            'vision_heading' => $this->input->post('vision_heading', true),
            'vision_content' => $this->input->post('vision_content', true),
            'vision_button_text' => $this->input->post('vision_button_text', true),
            'vision_button_link' => $this->input->post('vision_button_link', true),
            'objective_heading' => $this->input->post('objective_heading', true),
            'objective_content' => $this->input->post('objective_content', true),
            'objective_button_text' => $this->input->post('objective_button_text', true),
            'objective_button_link' => $this->input->post('objective_button_link', true),
        );
        $this->db->where('lang_id', $lang_id);
        return $this->db->update('home_mission', $data);
    }
    /*
    *-------------------------------------------------------------------------------------------------
    * HOMEPAGE Project SETTINGS
    *-------------------------------------------------------------------------------------------------
    */

    public function get_team_data($lang_id)
    {
        $this->db->where('lang_id', $lang_id);
        $query = $this->db->get('home_team');
        return $query->row();
    }

    public function update_team_data()
    {
        $lang_id = $this->input->post('lang_id', true);

        $data = array(

            'heading1' => $this->input->post('heading1', true),
            'heading2' => $this->input->post('heading2', true),
            'content' => $this->input->post('content', true),
        );
        $this->db->where('lang_id', $lang_id);
        return $this->db->update('home_team', $data);
    }
    /*
    *-------------------------------------------------------------------------------------------------
    * HOMEPAGE Message SETTINGS
    *-------------------------------------------------------------------------------------------------
    */

    public function get_message_data($lang_id)
    {
        $this->db->where('lang_id', $lang_id);
        $query = $this->db->get('home_president_message');
        return $query->row();
    }

    public function update_message_data()
    {
        $lang_id = $this->input->post('lang_id', true);
        $oldIng = $this->input->post('oldIng', true);
        $data = array(
            'president_name' => $this->input->post('president_name', true),
            'designation' => $this->input->post('designation', true),
            'content' => $this->input->post('content', true),
            'heading' => $this->input->post('heading', true),
        );
        // upload logo
        if ($_FILES['image']['name'] != '') {
            $path = FCPATH . 'uploads/misc/';
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
                $data["image"] =  $file_data['file_name'];
                if (!empty($oldIng)) {
                    delete_file_from_server('uploads/misc/' . $oldIng);
                }
            } else {
                return false;
            }
        }

        $this->db->where('lang_id', $lang_id);
        return $this->db->update('home_president_message', $data);
    }
}

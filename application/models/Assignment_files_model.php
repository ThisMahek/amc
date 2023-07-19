<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Assignment_files_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function add_assignment_files($assignment_id)
    {
        $extrafiles = $_POST['extraFiles__'];
        if (!empty($extrafiles)) {
            foreach ($extrafiles as $extrafile) {
                if (!empty($extrafile)) {
                    $data = array(
                        'assignment_id' => $assignment_id,
                        'file_name' => trim($extrafile),
                    );
                    $this->db->insert('assignment_files', $data);
                    $this->doMoveFile($extrafile);
                }
            }
        }
    }
    public function getAssignmentFiles($assignment_id)
    {
        $this->db->where('assignment_id', $assignment_id);
        $query = $this->db->get('assignment_files');
        return $query->result();
    }
    public function getAssignmentFilesRow($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('assignment_files');
        return $query->row();
    }
    public function updateAssignmentFiles($data, $id)
    {
        $this->db->where('id', clean_number($id));
        return $this->db->update('assignment_files', $data);
    }
    public function deleteAssignmentFiles($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('assignment_files');
    }
    public function updateAllAssignmentFiles($assignment_id)
    {
        $postdata = $_POST;
        $i = 0;
        foreach ($postdata['existingFile']  as $vdata) {
            $file =  trim($vdata);
            $id = trim($postdata['file_id'][$i]);
            $i++;
            if (!empty($id) && !empty($file)) {
                // insert into multi dimantion array
                $subdataArray['assignment_id'] = $assignment_id;
                $subdataArray['file_name'] = $file;
                $this->updateAssignmentFiles($subdataArray, $id);
            }
        }
        if (!empty($postdata['extraFiles__'])) {
            $extrafiles = $_POST['extraFiles__'];
            if (!empty($extrafiles)) {
                foreach ($extrafiles as $extrafile) {
                    if (!empty($extrafile)) {
                        $data = array(
                            'assignment_id' => $assignment_id,
                            'file_name' => trim($extrafile),
                        );
                        $this->db->insert('assignment_files', $data);
                        $this->doMoveFile($extrafile);
                    }
                }
            }
        }
    }
    public function delete_all_AssignmentFiles_by_assignment_id($assignment_id)
    {
        //find tags
        $AssignmentFiles = $this->getAssignmentFiles($assignment_id);
        if (!empty($AssignmentFiles)) {
            foreach ($AssignmentFiles as $file) {
                //delete
                $this->db->where('id', $file->id);
                $this->db->delete('assignment_files');
            }
        }
    }
    // move images
    public function doMoveFile($file)
    {
        $source = FCPATH . "/uploads/tempfiles/";
        $destination = FCPATH . "/uploads/files/";
        if (!empty($file)) {
            if (@rename($source . $file, $destination . $file)) {
                return true;
            } else {
                return true;
            }
        }
    }
}

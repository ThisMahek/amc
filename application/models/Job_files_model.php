<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Job_files_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function add_job_files($job_id)
    {
        $extrafiles = $_POST['extraFiles__'];
        if (!empty($extrafiles)) {
            foreach ($extrafiles as $extrafile) {
                if (!empty($extrafile)) {
                    $data = array(
                        'job_id' => $job_id,
                        'file_name' => trim($extrafile),
                    );
                    $this->db->insert('job_files', $data);
                    $this->doMoveFile($extrafile);
                }
            }
        }
    }
    public function get_job_files($job_id)
    {
        $this->db->where('job_id', $job_id);
        $query = $this->db->get('job_files');
        return $query->result();
    }
    public function getJobFilesRow($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('job_files');
        return $query->row();
    }
    public function updateJobFiles($data, $id)
    {
        $this->db->where('id', clean_number($id));
        return $this->db->update('job_files', $data);
    }
    public function deleteJobFiles($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('job_files');
    }
    public function updateAllJobFiles($job_id)
    {
        $postdata = $_POST;
        $i = 0;
        foreach ($postdata['existingFile']  as $vdata) {
            $file =  trim($vdata);
            $id = trim($postdata['file_id'][$i]);
            $i++;
            if (!empty($id) && !empty($file)) {
                // insert into multi dimantion array
                $subdataArray['job_id'] = $job_id;
                $subdataArray['file_name'] = $file;
                $this->updateJobFiles($subdataArray, $id);
            }
        }
        if (!empty($postdata['extraFiles__'])) {
            $extrafiles = $_POST['extraFiles__'];
            if (!empty($extrafiles)) {
                foreach ($extrafiles as $extrafile) {
                    if (!empty($extrafile)) {
                        $data = array(
                            'job_id' => $job_id,
                            'file_name' => trim($extrafile),
                        );
                        $this->db->insert('job_files', $data);
                        $this->doMoveFile($extrafile);
                    }
                }
            }
        }
    }
    public function delete_all_JobFiles_by_job_id($job_id)
    {
        //find tags
        $JobFiles = $this->get_job_files($job_id);
        if (!empty($JobFiles)) {
            foreach ($JobFiles as $file) {
                //delete
                $this->db->where('id', $file->id);
                $this->db->delete('job_files');
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
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Notice_files_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function add_notice_files($notice_id)
    {
        $extrafiles = $_POST['extraFiles__'];
        if (!empty($extrafiles)) {
            foreach ($extrafiles as $extrafile) {
                if (!empty($extrafile)) {
                    $data = array(
                        'notice_id' => $notice_id,
                        'file_name' => trim($extrafile),
                    );
                    $this->db->insert('notice_files', $data);
                    $this->doMoveFile($extrafile);
                }
            }
        }
    }
    public function getNoticeFiles($notice_id)
    {
        $this->db->where('notice_id', $notice_id);
        $query = $this->db->get('notice_files');
        return $query->result();
    }
    public function getNoticeFilesRow($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('notice_files');
        return $query->row();
    }
    public function updateNoticeFiles($data, $id)
    {
        $this->db->where('id', clean_number($id));
        return $this->db->update('notice_files', $data);
    }
    public function deleteNoticeFiles($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('notice_files');
    }
    public function updateAllNoticeFiles($notice_id)
    {
        $postdata = $_POST;
        $i = 0;
        foreach ($postdata['existingFile']  as $vdata) {
            $file =  trim($vdata);
            $id = trim($postdata['file_id'][$i]);
            $i++;
            if (!empty($id) && !empty($file)) {
                // insert into multi dimantion array
                $subdataArray['notice_id'] = $notice_id;
                $subdataArray['file_name'] = $file;
                $this->updateNoticeFiles($subdataArray, $id);
            }
        }
        if (!empty($postdata['extraFiles__'])) {
            $extrafiles = $_POST['extraFiles__'];
            if (!empty($extrafiles)) {
                foreach ($extrafiles as $extrafile) {
                    if (!empty($extrafile)) {
                        $data = array(
                            'notice_id' => $notice_id,
                            'file_name' => trim($extrafile),
                        );
                        $this->db->insert('notice_files', $data);
                        $this->doMoveFile($extrafile);
                    }
                }
            }
        }
    }
    public function delete_all_NoticeFiles_by_notice_id($notice_id)
    {
        //find tags
        $NoticeFiles = $this->getNoticeFiles($notice_id);
        if (!empty($NoticeFiles)) {
            foreach ($NoticeFiles as $file) {
                //delete
                $this->db->where('id', $file->id);
                $this->db->delete('notice_files');
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

<div class="post-b">
    <div class="post-h">
        <h5>Add Video</h5>
        <div>
            <a class="btn btn-primary" href="<?php echo admin_url() ?>video-gallery">video Gallery</a>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="post-d">
                <h5>Video Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>
                <?php echo form_open('admin/save-video-gallery'); ?>

                <div class="form-group">
                    <label>Video ID <span class="required">*</span></label>
                    <input type="text" name="video_id" class="form-control" placeholder="Video ID" required>
                </div>

                <div class="sav-btn">
                    <button>Save Changes</button>
                </div>

            </div>
        </div>

    </div>

</div>
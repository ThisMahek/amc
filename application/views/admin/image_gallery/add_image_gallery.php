<div class="post-b">
    <div class="post-h">
        <h5>Add Image</h5>
        <div>
            <a class="btn btn-primary" href="<?php echo admin_url() ?>image-gallery">Image Gallery</a>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="post-d">
                <h5>Image Details</h5>
                <?php $this->load->view('admin/includes/_messages'); ?>
                <?php echo form_open_multipart('admin/save-image-gallery'); ?>
              
                <div class="form-group">
                    <label>Image Title <span class="required">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Title" required>
                </div>
                <div class="form-group">
                    <label> Image</label>
                    <input type="file"  name="image" placeholder="image" required>
                </div>
                <div class="sav-btn">
                    <button>Save Changes</button>
                </div>

            </div>
        </div>
       
    </div>

</div>
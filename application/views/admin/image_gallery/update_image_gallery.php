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
                <?php echo form_open_multipart('admin/update-image-gallery'); ?>
              
                <div class="form-group">
                    <label>Image Title <span class="required">*</span></label>
                    <input type="text" name="title" value="<?php echo $image_gallery->title ?>" class="form-control" placeholder="Title" required>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <?php if (!empty($image_gallery->image)) : ?>
                        <div class="row mx-auto">
                            <div class="col-md-3">
                                <img src="<?php echo base_url() . 'uploads/image_gallery/' . $image_gallery->image ?>" style="width: 100%; padding:10px 0">
                            </div>
                        </div>

                    <?php else : ?>
                        <div class="row mx-auto">
                            <div class="col-md-3">
                                <img src="<?php echo base_url() . 'assets/backend/images/noimg.png' ?>" style="width: 100%; padding:10px 0">
                            </div>
                        </div>

                    <?php endif; ?>
                    <input type="file" name="image" class="" value="" placeholder="Image">
                </div>
                <input type="hidden" name="oldIng" value="<?php echo $image_gallery->image; ?>">
                <input type="hidden" name="id" value="<?php echo $image_gallery->id; ?>">
                <div class="sav-btn">
                    <button>Save Changes</button>
                </div>

            </div>
        </div>

    </div>

</div>
<div class="col-sm-12">
    <?php $this->load->view('admin/includes/_messages'); ?>
</div>

<div class="wrapper2">
    <div class="mblog">

        <h4>Pagination Settings</h4>
        <?php echo form_open('admin_controller/paginationSettings_post'); ?>
        <div class="form-group">
            <label>Image Gallery Per Page Item</label>
            <input type="text" name="image_gallery_per_page" class="form-control" value="<?php echo $general_settings->image_gallery_per_page ?>">
        </div>
        <div class="form-group">
            <label>Video Gallery Per Page Item </label>
            <input type="text" name="video_gallery_per_page" class="form-control" value="<?php echo $general_settings->video_gallery_per_page ?>">
        </div>
     

    </div>
    <div class="sav-btn">
        <button type="submit">Save Changes</button>
    </div>
    <?php echo form_close(); ?>
</div>
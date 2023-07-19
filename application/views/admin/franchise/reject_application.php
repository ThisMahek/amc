<div class="col-sm-12">
    <?php $this->load->view('admin/includes/_messages'); ?>
</div>

<div class="wrapper2">
    <div class="mblog">
        <?php echo form_open('adminfranchise_controller/reject_franchise_app_post'); ?>
        <div class="form-group">
            <label>Student Name</label>
            <input type="text" class="form-control" value="<?php echo $franchise->franchise_name ?>" disabled>
        </div>
        <div class="form-group">
            <label>Course applied for </label>
            <input type="text" class="form-control" value="<?php echo implode(',',$courses) ?>" disabled>
        </div>
        <div class="form-group">
            <label>Franchise User Name </label>
            <input type="text" class="form-control" value="<?php echo $franchise->franchise_email; ?>" disabled>
        </div>
        <div class="form-group">
            <label>Rejection Cause</label>
            <textarea name="rejection_cause" class="form-control ckeditor" placeholder="Cause" required></textarea>
        </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $franchise->id ?>">
    <div class="sav-btn">
        <button type="submit">Reject</button>
    </div>
    <?php echo form_close(); ?>
</div>
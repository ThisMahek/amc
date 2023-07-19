<div class="wrapper2">
    <div class="mblog">
        <div class="col-sm-12">
            <?php $this->load->view('admin/includes/_messages'); ?>
        </div>
        <h4>Change Password</h4>
        <?php echo form_open('update-password'); ?>
        <div class="form-group">
            <label>Old Password</label>
            <input type="password" name="old_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>New Password </label>
            <input type="password" name="new_password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Re-type Password </label>
            <input type="password" name="password_confirm" class="form-control" required>
        </div>

    </div>
    <div class="sav-btn">
        <button type="submit">Save Changes</button>
    </div>
    <?php echo form_close(); ?>
</div>
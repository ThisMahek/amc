<div class="col-sm-12">
    <?php $this->load->view('admin/includes/_messages'); ?>
</div>

<div class="wrapper2">
    <div class="mblog">

        <h4>Payment Settings</h4>
        <?php echo form_open('admin_controller/payment_settings_post'); ?>
        <div class="form-group">
            <label>Razorpay key id</label>
            <input type="text" name="razorpay_key_id" class="form-control" value="<?php echo $general_settings->razorpay_key_id ?>">
        </div>
        <div class="form-group">
            <label>Razorpay key secret </label>
            <input type="text" name="razorpay_key_secret" class="form-control" value="<?php echo $general_settings->razorpay_key_secret ?>">
        </div>
       
    </div>
    <div class="sav-btn">
        <button type="submit">Save Changes</button>
    </div>
    <?php echo form_close(); ?>
</div>
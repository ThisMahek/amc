<div class="col-sm-12">
  <?php $this->load->view('admin/includes/_messages'); ?>
</div>

<div class="wrapper2">
  <div class="mblog">

    <h4>Email Settings</h4>
    <?php echo form_open('admin_controller/emailSettings_post'); ?>
    <div class="form-group">
      <label>Email Title</label>
      <input type="text" name="mail_title" class="form-control" value="<?php echo $general_settings->mail_title ?>">
    </div>
    <div class="form-group">
      <label>Email Protocol </label>
      <input type="text" name="mail_protocol" class="form-control" value="<?php echo $general_settings->mail_protocol ?>">
    </div>
    <div class="form-group">
      <label>Email Host </label>
      <input type="text" name="mail_host" class="form-control" value="<?php echo $general_settings->mail_host ?>">
    </div>
    <div class="form-group">
      <label>Email Port No </label>
      <input type="text" name="mail_port" class="form-control" value="<?php echo $general_settings->mail_port ?>">
    </div>
    <div class="form-group">
      <label>Email Username </label>
      <input type="text" name="mail_username" class="form-control" value="<?php echo $general_settings->mail_username ?>">
    </div>
    <div class="form-group">
      <label>Email Password </label>
      <input type="password" name="mail_password" class="form-control" value="<?php echo $general_settings->mail_password ?>">
    </div>





  </div>
  <div class="sav-btn">
    <button type="submit">Save Changes</button>
  </div>
  <?php echo form_close(); ?>
</div>
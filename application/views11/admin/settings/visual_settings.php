<div class="col-sm-12">
    <?php $this->load->view('admin/includes/_messages'); ?>
</div>

<div class="wrapper2 visual-setting">
    <div class="mblog">

        <h4><?php echo ('Visual Settings'); ?></h4>
        <?php echo form_open_multipart('admin_controller/visual_settings_post'); ?>
        <div class="row">
            <div class="col-md-4">

            <div class="form-group">
            <img src="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->logo ?>" width="80px;" class="py-3">
            <label class="py-3">Logo (85x85px) (.png, .jpg, .jpeg, .gif, .svg)</label>
            <input type="file" name="logo" class="">
           
          
           
        </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            
            <img src="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->logo ?>" width="80px;" class="py-3">
            <div>
            <label class="py-3">Email Protocol (.png, .jpg, .jpeg)</label>
            <input type="file" name="logo_email" class="">
            </div>
        </div>

            </div>
            <div class="col-md-4">
            <div class="form-group">
            
            <img src="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->favicon ?>" width="80px;" class="py-3">
            <div class="py-3">
            <label >Favicon (16x16px)(.png)</label>
            <input type="file" name="favicon" class="">
            </div>
        </div>

            </div>
        </div>
      
        
        
    </div>
    <div class="sav-btn">
        <button type="submit">Save Changes</button>
    </div>
    <?php echo form_close(); ?>
</div>
 <div class="col-sm-12">
     <?php $this->load->view('admin/includes/_messages'); ?>
 </div>

 <div class="wrapper2">
     <div class="mblog">

         <h4><?php echo $title ?></h4>
         <?php echo form_open('admin/update_volunteer_member_settings'); ?>
         <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                     <label>Setting Language</label>
                     <select name="lang_id" class="form-control" onchange="window.location.href = '<?php echo admin_url(); ?>volunteer-member-settings?lang='+this.value;" style="max-width: 600px;">
                         <?php foreach ($this->languages as $language) : ?>
                             <option value="<?php echo $language->id; ?>" <?php echo ($language->id == $settings_lang) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                         <?php endforeach; ?>
                     </select>
                 </div>
             </div>
         </div>
         <div class="form-group">
             <label>Heading</label>
             <input type="text" name="heading" class="form-control" placeholder="Heading" value="<?php echo html_escape($panel_data->heading); ?>">
         </div>
         <div class="form-group">
             <label>Meta Keywords</label>
             <input type="text" name="meta_keywords" class="form-control" placeholder="Meta Keywords" value="<?php echo html_escape($panel_data->meta_keywords); ?>">
         </div>
         <div class="form-group">
             <label>Meta Description</label>
             <input type="text" name="meta_description" class="form-control" placeholder="Meta Description" value="<?php echo html_escape($panel_data->meta_description); ?>">
         </div>
         <div class="form-group">
             <label>Content</label>
             <div>
                 <textarea name="content" class="ckeditor"><?php echo html_escape($panel_data->content); ?></textarea>
             </div>
         </div>
     </div>
     <div class="sav-btn">
         <button type="submit" class="btn btn-primary" style="margin-bottom: 5px;"><?php echo ucfirst('Save Settings'); ?></button>

     </div>
     <?php echo form_close(); ?>
 </div>
<div class="wrapper">
    <div class="">
        <?php echo form_open_multipart('admin/home_futureProspect_settings_post'); ?>
        <div class="wrapper-box">
            <h1 class="text-center">Future Prospect</h1>
            <div class="col-sm-12">
                <?php $this->load->view('admin/includes/_messages'); ?>
            </div>
            <div class="wrapper-box-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Setting Language</label>
                            <select name="lang_id" class="form-control" onchange="window.location.href = '<?php echo admin_url(); ?>future-prospect?lang='+this.value;" style="max-width: 600px;">
                                <?php foreach ($this->languages as $language) : ?>
                                    <option value="<?php echo $language->id; ?>" <?php echo ($language->id == $settings_lang) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="m-wrapper-content">

                    <div class="captcha">
                        <div class="captcha-content">
                            <div class="form-group">
                                <label>Heading1</label>
                                <input type="text" name="heading1" value="<?php echo $panel_data->heading1; ?>" class="form-control" placeholder="Heading1">
                            </div>
                            <div class="form-group">
                                <label>Heading2</label>
                                <input type="text" name="heading2" value="<?php echo $panel_data->heading2; ?>" class="form-control" placeholder="Heading2">
                            </div>
                           
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" class="form-control ckeditor" placeholder="Content"><?php echo $panel_data->content; ?></textarea>
                            </div>
                             <div class="row">
                                <div class="col-md-3">
                            <div class="form-group text-center">
                                <label>Image</label>
                                <?php if (!empty($panel_data->image)) : ?>
                                    
                                            <img src="<?php echo base_url() . 'uploads/misc/' . $panel_data->image ?>" style="width: 100%; padding:10px 0;height: 200px;">
                                  

                                <?php else : ?>
                                    
                                            <img src="<?php echo base_url() . 'assets/backend/images/noimg.png' ?>" style="width: 100%; padding:10px 0;height: 200px;border: 1px solid #0001; margin: 5px 0;">
                                   

                                <?php endif; ?>
                                <input type="file" name="image" class="" value="" placeholder="Image">
                            </div>
                            </div>
                              <div class="col-md-3">
                            <div class="form-group text-center">
                                <label class="">Image1</label>
                                <?php if (!empty($panel_data->image1)) : ?>
                                   
                                            <img src="<?php echo base_url() . 'uploads/misc/' . $panel_data->image1 ?>" style="width: 100%; padding:10px 0; height: 200px;">

                                <?php else : ?>
                                    
                                            <img src="<?php echo base_url() . 'assets/backend/images/noimg.png' ?>" style="width: 100%; padding:10px 0;height: 200px;border: 1px solid #0001; margin: 5px 0;">
                                      

                                <?php endif; ?>
                                <input type="file" name="image1" class="" value="" placeholder="Image">
                            </div>
                            </div>
                              <div class="col-md-3">
                            <div class="form-group text-center">
                                <label>Image2</label>
                                <?php if (!empty($panel_data->image2)) : ?>
                                    
                                            <img src="<?php echo base_url() . 'uploads/misc/' . $panel_data->image2 ?>" style="width: 100%; padding:10px 0;height: 200px;">
                                    

                                <?php else : ?>
                                    
                                            <img src="<?php echo base_url() . 'assets/backend/images/noimg.png' ?>" style="width: 100%; padding:10px 0;height: 200px;border: 1px solid #0001; margin: 5px 0;">
                                  

                                <?php endif; ?>
                                <input type="file" name="image2" class="" value="" placeholder="Image">
                            </div>
                            </div>
                              <div class="col-md-3">
                            <div class="form-group text-center">
                                <label>Image3</label>
                                <?php if (!empty($panel_data->image3)) : ?>
                                    
                                            <img src="<?php echo base_url() . 'uploads/misc/' . $panel_data->image3 ?>" style="width: 100%; padding:10px 0;height: 200px;">
                                     

                                <?php else : ?>
                                    
                                            <img src="<?php echo base_url() . 'assets/backend/images/noimg.png' ?>" style="width: 100%; padding:10px 0;height: 200px;border: 1px solid #0001; margin: 5px 0;">
                                       

                                <?php endif; ?>
                                <input type="file" name="image3" class="" value="" placeholder="Image">
                            </div>
                            </div>

                        </div>
                            <input type="hidden" name="oldIng" value="<?php echo $panel_data->image; ?>">
                            <input type="hidden" name="oldIng1" value="<?php echo $panel_data->image1; ?>">
                            <input type="hidden" name="oldIng2" value="<?php echo $panel_data->image2; ?>">
                            <input type="hidden" name="oldIng3" value="<?php echo $panel_data->image3; ?>">
                            <div class="sav-btn">
                                <button>Save Changes</button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
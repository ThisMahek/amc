<div class="wrapper">
    <div class="">
        <?php echo form_open_multipart('admin/home_mission_settings_post'); ?>
        <div class="wrapper-box">
            <h1 class="text-center">Misssion Vision Objective Section</h1>
            <div class="col-sm-12">
                <?php $this->load->view('admin/includes/_messages'); ?>
            </div>
            <div class="wrapper-box-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Setting Language</label>
                            <select name="lang_id" class="form-control" onchange="window.location.href = '<?php echo admin_url(); ?>mission?lang='+this.value;" style="max-width: 600px;">
                                <?php foreach ($this->languages as $language) : ?>
                                    <option value="<?php echo $language->id; ?>" <?php echo ($language->id == $settings_lang) ? 'selected' : ''; ?>><?php echo $language->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="m-wrapper-content">
                    <h4><strong>Mission</strong></h4>
                    <div class="captcha">
                        <div class="captcha-content">
                            <div class="form-group">
                                <label>Mission Heading</label>
                                <input type="text" name="mission_heading" value="<?php echo $panel_data->mission_heading; ?>" class="form-control" placeholder="mission heading">
                            </div>

                            <div class="form-group">
                                <label>Mission Button Text</label>
                                <input type="text" name="mission_button_text" value="<?php echo $panel_data->mission_button_text; ?>" class="form-control" placeholder="Mission Button Text">
                            </div>
                            <div class="form-group">
                                <label>Mission Button Link</label>
                                <input type="text" name="mission_button_link" value="<?php echo $panel_data->mission_button_link; ?>" class="form-control" placeholder=" Mission Button Link (only put slug)">
                            </div>
                            <div class="form-group">
                                <label>Mission Content</label>
                                <textarea name="mission_content" class="form-control ckeditor" placeholder="Content"><?php echo $panel_data->mission_content; ?></textarea>
                            </div>



                        </div>
                    </div>
                    <h4><strong>Vision</strong></h4>
                    <div class="captcha">
                        <div class="captcha-content">
                            <div class="form-group">
                                <label>vision Heading</label>
                                <input type="text" name="vision_heading" value="<?php echo $panel_data->vision_heading; ?>" class="form-control" placeholder="vision heading">
                            </div>

                            <div class="form-group">
                                <label>vision Button Text</label>
                                <input type="text" name="vision_button_text" value="<?php echo $panel_data->vision_button_text; ?>" class="form-control" placeholder="vision Button Text">
                            </div>
                            <div class="form-group">
                                <label>vision Button Link</label>
                                <input type="text" name="vision_button_link" value="<?php echo $panel_data->vision_button_link; ?>" class="form-control" placeholder=" vision Button Link (only put slug)">
                            </div>
                            <div class="form-group">
                                <label>vision Content</label>
                                <textarea name="vision_content" class="form-control ckeditor" placeholder="Content"><?php echo $panel_data->vision_content; ?></textarea>
                            </div>



                        </div>
                    </div>
                    <h4><strong>Objective</strong></h4>
                    <div class="captcha">
                        <div class="captcha-content">
                            <div class="form-group">
                                <label>objective Heading</label>
                                <input type="text" name="objective_heading" value="<?php echo $panel_data->objective_heading; ?>" class="form-control" placeholder="objective heading">
                            </div>

                            <div class="form-group">
                                <label>objective Button Text</label>
                                <input type="text" name="objective_button_text" value="<?php echo $panel_data->objective_button_text; ?>" class="form-control" placeholder="objective Button Text">
                            </div>
                            <div class="form-group">
                                <label>objective Button Link</label>
                                <input type="text" name="objective_button_link" value="<?php echo $panel_data->objective_button_link; ?>" class="form-control" placeholder=" objective Button Link (only put slug)">
                            </div>
                            <div class="form-group">
                                <label>objective Content</label>
                                <textarea name="objective_content" class="form-control ckeditor" placeholder="Content"><?php echo $panel_data->objective_content; ?></textarea>
                            </div>


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
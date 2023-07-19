<div class="wrapper">
    <div class="">
        <?php echo form_open_multipart('admin_controller/home_about_settings_post'); ?>
        <div class="wrapper-box">
            <h1 class="text-center">About Section</h1>
            <div class="col-sm-12">
                <?php $this->load->view('admin/includes/_messages'); ?>
            </div>
            <div class="wrapper-box-content">
                <div class="m-wrapper-content">

                    <div class="captcha">
                        <div class="captcha-content">
                            <div class="form-group">
                                <label>About Heading</label>
                                <input type="text" name="about_heading" value="<?php echo $panel_data->about_heading; ?>" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="about_content" class="form-control ckeditor" placeholder="Content"><?php echo $panel_data->about_content; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Mission Heading</label>
                                <input type="text" name="mission_heading" value="<?php echo $panel_data->mission_heading; ?>" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="mission_content" class="form-control ckeditor" placeholder="Content"><?php echo $panel_data->mission_content; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Vision Heading</label>
                                <input type="text" name="vision_heading" value="<?php echo $panel_data->vision_heading; ?>" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="vision_content" class="form-control ckeditor" placeholder="Content"><?php echo $panel_data->vision_content; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Strategy Heading</label>
                                <input type="text" name="strategy_heading" value="<?php echo $panel_data->strategy_heading; ?>" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="strategy_content" class="form-control ckeditor" placeholder="Content"><?php echo $panel_data->strategy_content; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Button Text</label>
                                <input type="text" name="button_text" value="<?php echo $panel_data->button_text; ?>" class="form-control" placeholder="Button Text">
                            </div>
                            <div class="form-group">
                                <label>Button Link</label>
                                <input type="text" name="button_link" value="<?php echo $panel_data->button_link; ?>" class="form-control" placeholder="Button Link (only put slug)">
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <?php if (!empty($panel_data->image)) : ?>
                                    <div class="row mx-auto">
                                        <div class="col-md-3">
                                            <img src="<?php echo base_url() . 'uploads/misc/' . $panel_data->image ?>" style="width: 100%; padding:10px 0">
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
                            <input type="hidden" name="oldIng" value="<?php echo $panel_data->image; ?>">
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
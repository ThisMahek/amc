<div class="wrapper">
    <div class="">
        <?php echo form_open_multipart('admin/home_help_settings_post'); ?>
        <div class="wrapper-box">
            <h1 class="text-center">Help Section</h1>
            <div class="col-sm-12">
                <?php $this->load->view('admin/includes/_messages'); ?>
            </div>
            <div class="wrapper-box-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Setting Language</label>
                            <select name="lang_id" class="form-control" onchange="window.location.href = '<?php echo admin_url(); ?>help?lang='+this.value;" style="max-width: 600px;">
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
                                <label>Button Text</label>
                                <input type="text" name="button_text" value="<?php echo $panel_data->button_text; ?>" class="form-control" placeholder="Button Text">
                            </div>
                            <div class="form-group">
                                <label>Button Link</label>
                                <input type="text" name="button_link" value="<?php echo $panel_data->button_link; ?>" class="form-control" placeholder="Button Link (only put slug)">
                            </div>
                            <div class="form-group">
                                <label>Button Text2</label>
                                <input type="text" name="button_text2" value="<?php echo $panel_data->button_text2; ?>" class="form-control" placeholder="Button Text2">
                            </div>
                            <div class="form-group">
                                <label>Button Link2</label>
                                <input type="text" name="button_link2" value="<?php echo $panel_data->button_link2; ?>" class="form-control" placeholder="Button Link2 (only put slug)">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" class="form-control ckeditor" placeholder="Content"><?php echo $panel_data->content; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Background Image</label>
                                <?php if (!empty($panel_data->image)) : ?>

                                    <div class="row mx-auto">
                                        <div class="col-md-3">
                                            <img src="<?php echo base_url() . 'uploads/misc/' . $panel_data->image ?>" style="width: 100%;padding: 10px 0;">
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="row  mx-auto">
                                        <div class="col-md-3">
                                            <img src="<?php echo base_url() . 'assets/backend/images/noimg.png' ?>" style="width: 100%;padding: 10px 0;">
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
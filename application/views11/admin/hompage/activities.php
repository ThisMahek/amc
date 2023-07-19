<div class="wrapper">
    <div class="">
        <?php echo form_open_multipart('admin/home_activities_settings_post'); ?>
        <div class="wrapper-box">
            <h1 class="text-center">Our Activities Section</h1>
            <div class="col-sm-12">
                <?php $this->load->view('admin/includes/_messages'); ?>
            </div>
            <div class="wrapper-box-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Setting Language</label>
                            <select name="lang_id" class="form-control" onchange="window.location.href = '<?php echo admin_url(); ?>activities?lang='+this.value;" style="max-width: 600px;">
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
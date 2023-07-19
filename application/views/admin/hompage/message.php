<div class="wrapper">
    <div class="">
        <?php echo form_open_multipart('admin/home_message_settings_post'); ?>
        <div class="wrapper-box">
            <h1 class="text-center">President Message</h1>
            <div class="col-sm-12">
                <?php $this->load->view('admin/includes/_messages'); ?>
            </div>
            <div class="wrapper-box-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Setting Language</label>
                            <select name="lang_id" class="form-control" onchange="window.location.href = '<?php echo admin_url(); ?>message?lang='+this.value;" style="max-width: 600px;">
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
                                <label>Heading</label>
                                <input type="text" name="heading" value="<?php echo $panel_data->heading; ?>" class="form-control" placeholder="Heading">
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="president_name" value="<?php echo $panel_data->president_name; ?>" class="form-control" placeholder="name">
                            </div>
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" name="designation" value="<?php echo $panel_data->designation; ?>" class="form-control" placeholder="Designation">
                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" class="form-control ckeditor" placeholder="Content"><?php echo $panel_data->content; ?></textarea>
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
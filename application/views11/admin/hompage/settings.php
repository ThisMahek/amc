<div class="wrapper">
    <div class="">
        <?php echo form_open_multipart('admin/update_homepageSettings_data'); ?>
        <div class="wrapper-box">
            <h1 class="text-center">About Section</h1>
            <div class="col-sm-12">
                <?php $this->load->view('admin/includes/_messages'); ?>
            </div>
            <div class="wrapper-box-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Setting Language</label>
                            <select name="lang_id" class="form-control" onchange="window.location.href = '<?php echo admin_url(); ?>home-page-settings?lang='+this.value;" style="max-width: 600px;">
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
                                <div class="switch-list">

                                    <ul>
                                        <li><span class="list-item-list">About Us </span>
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox1" name="about" <?php echo ($panel_data->about == 1) ? 'checked' : '' ?>>
                                                <label for="checkbox1"></label>
                                            </div>
                                        </li>
                                        <li><span class="list-item-list">Our Activities </span>
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox2" name="activities" <?php echo ($panel_data->activities == 1) ? 'checked' : '' ?>>
                                                <label for="checkbox2"></label>
                                            </div>
                                        </li>
                                        <li><span class="list-item-list">Future Prospect </span>
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox3" name="futureprospect" <?php echo ($panel_data->futureprospect == 1) ? 'checked' : '' ?>>
                                                <label for="checkbox3"></label>
                                            </div>
                                        </li>
                                        <li><span class="list-item-list">Our Project</span>
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox4" name="project" <?php echo ($panel_data->project == 1) ? 'checked' : '' ?>>
                                                <label for="checkbox4"></label>
                                            </div>
                                        </li>
                                        <li><span class="list-item-list">Help </span>
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox5" name="help" <?php echo ($panel_data->help == 1) ? 'checked' : '' ?>>
                                                <label for="checkbox5"></label>
                                            </div>
                                        </li>
                                        <li><span class="list-item-list">Mission Vision</span>
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox6" name="mission" <?php echo ($panel_data->mission == 1) ? 'checked' : '' ?>>
                                                <label for="checkbox6"></label>
                                            </div>
                                        </li>
                                        <li><span class="list-item-list">Our Team</span>
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox7" name="team" <?php echo ($panel_data->team == 1) ? 'checked' : '' ?>>
                                                <label for="checkbox7"></label>
                                            </div>
                                        </li>
                                        <li><span class="list-item-list">President Message</span>
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox8" name="message" <?php echo ($panel_data->message == 1) ? 'checked' : '' ?>>
                                                <label for="checkbox8"></label>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
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
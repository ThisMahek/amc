<div class="wrapper">
  <div class="">
    <?php echo form_open('admin_controller/settings_post'); ?>
    <div class="wrapper-box">
      <h1 class="text-center">Settings</h1>
      <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
      </div>
      <div class="wrapper-box-content">
       
        <div class="m-wrapper-content">
          <div class="tab">
            <a href="javascript:void(0)" class="tablinks active" onclick="openCity(event, '1')">General Setting</a>
            <a href="javascript:void(0)" class="tablinks" onclick="openCity(event,'2')">Contact Setting</a>
            <a href="javascript:void(0)" class="tablinks" onclick="openCity(event,'3')">Social Media Setting</a>
            <a href="javascript:void(0)" class="tablinks" onclick="openCity(event,'4')">Custom Css Code</a>
            <a href="javascript:void(0)" class="tablinks" onclick="openCity(event,'5')">Custom JS Code</a>
          </div>
          <div id="1" class="tabcontent" style="display:block;">

            <div class="form-group">
              <label>Application Name</label>
              <input type="text" name="application_name" class="form-control" placeholder="Application Name" value="<?php echo html_escape($this->general_settings->application_name); ?>">
            </div>
            <div class="form-group">
              <label>Site Title</label>
              <input type="text" name="site_title" class="form-control" placeholder="Site Title" value="<?php echo html_escape($settings->site_title); ?>">
            </div>
            <div class="form-group">
              <label>Homepage Title</label>
              <input type="text" name="homepage_title" class="form-control" placeholder="Homepage Title" value="<?php echo html_escape($settings->homepage_title); ?>">
            </div>
            <div class="form-group">
              <label>Site Description</label>
              <input type="text" name="site_description" class="form-control" placeholder="Site Description" value="<?php echo html_escape($settings->site_description); ?>">
            </div>
            <div class="form-group">
              <label>Keywords</label>
              <textarea class="form-control" name="keywords"><?php echo html_escape($settings->keywords); ?></textarea>
            </div>
            <div class="form-group">
              <label>Footer About Us</label>
              <div>
                <textarea name="about_us" rows="7" class="form-control"><?php echo html_escape($settings->about_us); ?></textarea>
              </div>
            </div>
            <div class="sav-btn">
              <button>Save Changes</button>
            </div>

          </div>
          <div id="2" class="tabcontent" style="display:none">

            <div class="form-group">
              <label><i class="fa fa-map-marker" aria-hidden="true"></i> Address</label>
              <input type="text" name="contact_address" class="form-control" value="<?php echo html_escape($settings->contact_address); ?>">
            </div>
            <div class="form-group">
              <label><i class="fa fa-envelope" aria-hidden="true"></i> Email Address</label>
              <input type="text" name="contact_email" class="form-control" value="<?php echo html_escape($settings->contact_email); ?>">
            </div>
            <div class="form-group">
              <label><i class="fa fa-phone" aria-hidden="true"></i> Phone</label>
              <input type="text" name="contact_phone" class="form-control" value="<?php echo html_escape($settings->contact_phone); ?>">
            </div>
            <div class="form-group">
              <label>Contact Text</label>
              <div>
                <textarea name="contact_text" class="ckeditor"><?php echo html_escape($settings->contact_text); ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label>Map Link</label>
              <div>
                <textarea name="map" rows="7" class="form-control"><?php echo html_escape($settings->map); ?></textarea>
              </div>
            </div>

            <div class="sav-btn">
              <button>Save Changes</button>
            </div>

          </div>
          <div id="3" class="tabcontent" style="display:none">

            <div class="form-group">
              <label>Facebook URL</label>
              <input type="text" name="facebook_url" class="form-control" placeholder="" value="<?php echo html_escape($settings->facebook_url); ?>">
            </div>
            <div class="form-group">
              <label>Instagram URL</label>
              <input type="text" name="twitter_url" class="form-control" placeholder="" value="<?php echo html_escape($settings->twitter_url); ?>">
            </div>
            <div class="form-group">
              <label>Twitter URL</label>
              <input type="text" name="instagram_url" class="form-control" placeholder="" value="<?php echo html_escape($settings->instagram_url); ?>">
            </div>

            <div class="form-group">
              <label>LinkedIn URL</label>
              <input type="text" name="linkedin_url" class="form-control" placeholder="" value="<?php echo html_escape($settings->linkedin_url); ?>">
            </div>
            <div class="form-group">
              <label>Youtube URL</label>
              <input type="text" name="youtube_url" class="form-control" placeholder="" value="<?php echo html_escape($settings->youtube_url); ?>">
            </div>
            <div class="sav-btn">
              <button>Save Changes</button>
            </div>

          </div>
          <div id="4" class="tabcontent" style="display:none">

            <div class="form-group">
              <p>Custom CSS Codes (These codes will be added to the header of the site.)</p>
              <textarea class="form-control" rows="7" name="custom_css_codes"><?php echo $this->general_settings->custom_css_codes; ?></textarea>
            </div>
            <!-- "Example:<style> body {background-color: #00a65a;} </style>" -->
            <div class="sav-btn">
              <button>Save Changes</button>
            </div>

          </div>
          <div id="5" class="tabcontent" style="display:none">

            <div class="form-group">
              <p>Custom JavaScript Codes (These codes will be added to the footer of the site.)</p>
              <textarea class="form-control" rows="7" name="custom_javascript_codes"><?php echo $this->general_settings->custom_javascript_codes; ?></textarea>
              <!-- "Example:<script> alert('Hello!'); </script>" -->
            </div>
            <div class="sav-btn">
              <button>Save Changes</button>
            </div>
            <?php echo form_close(); ?>
            <?php echo form_open('admin/recaptcha_settings_post'); ?>


          </div>
          <div class="captcha">
            <div class="captcha-content">
              <h5>Google reCAPTCHA</h5>
              <div class="form-group">
                <label>Site Key</label>
                <input type="text" name="recaptcha_site_key" value="<?php echo $this->general_settings->recaptcha_site_key; ?>" class="form-control" placeholder="Site Key">
              </div>
              <div class="form-group">
                <label>Secret Key</label>
                <input type="text" name="recaptcha_secret_key" class="form-control" placeholder="Secret Key" value="<?php echo $this->general_settings->recaptcha_secret_key; ?>">
              </div>
              <div class="form-group">
                <label>Language</label>
                <input type="text" name="recaptcha_lang" class="form-control" value="<?php echo $this->general_settings->recaptcha_lang; ?>">
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
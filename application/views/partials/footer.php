<footer class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-logo">
                    <img src="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->logo ?>" alt="" />
                </div>
                <div class="footer-text mt-4">
                    <p><?php echo $this->settings->about_us ?></p>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="footer-holder">
                    <h4>Important Links</h4>
                    <ul class="footer-link">
                        <?php if (!empty($this->footer_pages)) : ?>
                            <?php foreach ($this->footer_pages as $footer_page) : ?>
                                <li><a href="<?php echo base_url() . $footer_page->slug; ?>"> <?php echo $footer_page->title ?> </a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <li><a href="<?php echo base_url() . 'contact-us'; ?>"> Contact Us </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-holder">
                    <h4>Contact Us</h4>
                    <ul class="contact-details">
                        <li><a class="d-flex" href="tel:<?php echo $this->settings->contact_phone ?>"><span><i class="fa fa-phone"></i></span> <?php echo $this->settings->contact_phone ?> </a></li>
                        <li><a class="d-flex" href="mailto:<?php echo $this->settings->contact_email ?>"><span><i class="fa fa-envelope-open"></i></span> <?php echo $this->settings->contact_email ?></a></li>
                        <li><a class="d-flex" href="javascript:void(0);"><span><i class="fa fa-map-marker"></i></span> <?php echo $this->settings->contact_address ?> </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer-holder">
                    <h4>News letter</h4>
                    <form id="form_newsletter_footer" class="form-newsletter">
                        <div class="d-flex">
                            <input class="form-control newsletter-input" type="email" placeholder="Input Your Email" required>
                            <input class="submit-btn" type="submit" />
                        </div>
                        <div id="form_newsletter_response"></div>
                    </form>
                    <div class="mt-3">
                        <h4> Social Media</h4>
                        <ul class="d-flex align-items-center footer-social">
                            <?php if (!empty($this->settings->facebook_url)) : ?>
                                <li><a href="<?php echo $this->settings->facebook_url ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($this->settings->twitter_url)) : ?>
                                <li><a href="<?php echo $this->settings->twitter_url ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($this->settings->instagram_url)) : ?>
                                <li><a href="<?php echo $this->settings->instagram_url ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($this->settings->linkedin_url)) : ?>
                                <li><a href="<?php echo $this->settings->linkedin_url ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <?php endif; ?>
                            <?php if (!empty($this->settings->youtube_url)) : ?>
                                <li><a href="<?php echo $this->settings->youtube_url ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="bottom-footer p-2">
    <div class="text-center">
        <p> © <a href="<?php echo base_url() ?>"><?php echo $this->general_settings->application_name ?></a> | Designed & Developed By <a href="https://business.bigpage.in/" target="_blank">Bigpage</a></p>
    </div>
</div>
<!-- LOGIN MODAL -->

<div class="modal franchise-login-modal"  tabindex="-1" role="dialog" id="franchise_login_modal" style="padding-right: 17px;">
      <div class="modal-dialog modal-md modal-dialog-centered " role="document">
        <div class="modal-content">


        <!-- <form id="franchise_register_form" method="post" action="<?php echo base_url() . 'franchise_registration_save' ?>"  > -->
         
          <div class="modal-header align-items-center">
            <h4 class="modal-title"><i class="fa fa-user"></i> Franchise Register</h4>
            <button  type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <div class="register_div form_div" >
              <?php echo form_open('franchise_registration_save',['id'=>'franchise_register_form']); ?>  
              <div class="row"> 
                  <div class="col-md-6">
                     <div class="form-cover">
                         <label> Proposed Center Name <span class="required">*</span></label>
                         <input class="form-control" id="input-franchise_name" type="text" name="franchise_name" placeholder="Franchise Name" required value="">
                         <p class="error"></p>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-cover">
                         <label> Email <span class="required">*</span></label>
                         <input class="form-control" id="input-email" type="text" name="email" required value="" placeholder="Email ">
                         <p class="error"></p>
                     </div>
                  </div>
                  
                  <div class="col-md-6">
                     <div class="form-cover">
                         <label> Password <span class="required">*</span></label>
                         <input class="form-control" id="input-password" type="password" name="password" placeholder="Enter Password" required>
                         <p class="error"></p>
                     </div>
                 </div>

                 <div class="col-md-6">
                     <div class="form-cover">
                         <label> Re-type Password <span class="required">*</span></label>
                         <input class="form-control" id="input-confirm_password" type="password" name="confirm_password" required placeholder="Re-Enter Password">
                         <p class="error"></p>
                     </div>
                 </div>  
                
                   <div class="g-recaptcha" data-sitekey="6Lf76SUkAAAAAP20MCjoEQeKfnbtI95k6u28PKko"></div>
                   <!-- <p class="pt-1">Already have an account? <a href="javascript:void(0)" onclick="synchLoginRegisterDiv('login_div')" class="blue-text">Log In</a></p> -->
               </div>
               <?php echo form_close(); ?>
             </div> 
             <!-- <div class="login_div form_div">
                <?php echo form_open('login-check', array('class' => 'form','id'=>'franchise_login_form')); ?>
                 <div class="form-cover d-flex align-items-center icon-input-column">
                    <span class="input-icon d-flex align-items-center justify-content-center"><i class="fa fa-user"></i></span>
                    <input name="username"  type="text" class="form-control" placeholder="Franchise User Name">
                  </div>
                  <div class="form-cover d-flex align-items-center icon-input-column">
                    <span class="input-icon d-flex align-items-center justify-content-center"><i class="fa fa-lock"></i></span>
                    <input  name="password" type="password" class="form-control" placeholder="Password">
                  </div>
                  <div class="g-recaptcha" data-sitekey="6Lf76SUkAAAAAP20MCjoEQeKfnbtI95k6u28PKko"></div>
                  <p class="pt-1">Not a member? <a href="javascript:void(0)" onclick="synchLoginRegisterDiv('register_div')" class="blue-text">Register</a></p>
                  <input type="hidden" name="login_type" value="franchise">
                  <?php echo form_close(); ?>
             </div>  -->
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-default login-btn col-12 register_div_button" onclick="franchiseRegister()">Register</button>
            <!-- <button type="button"  class="btn btn-default login-btn col-12 login_div_button" onclick="franchiseLogin()" >Login</button> -->
          </div>

        
         <!--  </form> -->
        </div>
      </div>
    </div>

<!-- Scroll Top -->
<div class="scrollup"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
<!-- jquery Min js -->
<script src="<?php echo base_url(); ?>assets/frontend/js/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.bundle.min.js"></script>
<!-- AOS JS -->
<script src="<?php echo base_url(); ?>assets/frontend/js/wow.min.js"></script>
<!-- Gallery JS -->
<script src="<?php echo base_url(); ?>assets/frontend/js/baguetteBox.js"></script>
<!-- slick JS -->
<script src="<?php echo base_url(); ?>assets/frontend/js/slick.min.js"></script>
<!-- matchHeight js -->
<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.matchHeight-min.js"></script>
<!-- Custome js -->
<script src="<?php echo base_url(); ?>/assets/multiselect/bootstrap-multiselect.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/custome.js?<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/bpscipt.js?<?php echo time(); ?>"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<?php echo $this->general_settings->google_analytics; ?>
<?php echo $this->general_settings->custom_javascript_codes; ?>
<?php $hours = date_difference_in_hours(date('Y-m-d H:i:s'), $this->general_settings->last_cron_update); ?>
<?php if (!empty($this->session->userdata('mds_send_email_data'))) : ?>
    <script>
        $(document).ready(function() {
            var data = JSON.parse(<?php echo json_encode($this->session->userdata("mds_send_email_data")); ?>);
            if (data) {
                data[csfr_token_name] = $.cookie(csfr_cookie_name);
                $.ajax({
                    type: "POST",
                    url: "<?= base_url(); ?>auto-send-email-post",
                    data: data,
                    success: function(response) {}
                });
            }
        });
    </script>
<?php endif;
$this->session->unset_userdata('mds_send_email_data'); ?>
</body>

</html>
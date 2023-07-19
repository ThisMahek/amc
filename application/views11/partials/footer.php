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
<script src="<?php echo base_url(); ?>assets/frontend/js/custome.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/js/bpscipt.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<?php echo $this->general_settings->google_analytics; ?>
<?php echo $this->general_settings->custom_javascript_codes; ?>
<?php $hours = date_difference_in_hours(date('Y-m-d H:i:s'), $this->general_settings->last_cron_update); ?>
</body>

</html>
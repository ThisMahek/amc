<div class="contact-page mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h2 class="heading">Get In Touch</h2>
                <p class="mb-2"><?php echo $this->settings->contact_text; ?></p>
            </div>
            <div class="col-lg-8 col-md-12 matchHeight">
                <?php $this->load->view('partials/_messages'); ?>
                <?php echo form_open('contact-post'); ?>
                <div class="form-contact">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <input class="form-control" type="text" placeholder="Name" name="name" required />
                        </div>
                        <div class="col-md-6 mb-4">
                            <input class="form-control" type="email" placeholder="Email" name="email" required />
                        </div>
                        <div class="col-md-12 mb-4">
                            <textarea class="form-control" placeholder="Massage" rows="4" name="message" required></textarea>
                        </div>
                        <div class="text-center captcha">
                            <div class="form-group">
                                <?php generate_recaptcha(); ?>
                            </div>

                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" name="et_builder_submit_button" class="send-message border-0 w-100"> Send </button>
                        </div>

                    </div>
                </div>
                <?php echo form_close(); ?>

            </div>
            <div class="col-lg-4 col-md-12">
                <div class="right-barContact matchHeight">
                    <div class="detailspagecon">
                        <h4 class="small-heading"> Contact Us </h4>
                        <ul>
                            <li><a class="d-flex" href="mailto:<?php echo $this->settings->contact_email ?>"><span><i class="fa fa-envelope"></i></span><?php echo $this->settings->contact_email ?></a></li>
                            <li><a class="d-flex" href="tel:<?php echo $this->settings->contact_phone ?>"><span><i class="fa fa-phone"></i></span><?php echo $this->settings->contact_phone ?></a></li>
                            <li><a class="d-flex" href="javascript:void(0)"><span><i class="fa fa-map-marker"></i></span><?php echo $this->settings->contact_address ?></a></li>
                        </ul>
                    </div>
                    <hr>
                    <div class="contact-social">
                        <h4 class="small-heading"> Social Media</h4>
                        <ul class="d-flex align-items-center footer-social">
                            <?php if (!empty($this->settings->facebook_url)) : ?>
                                <li><a href="<?php echo $this->settings->facebook_url ?>" target="_blank" class="contact-icon">
                                        <i class="fa fa-facebook"></i></a>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($this->settings->twitter_url)) : ?>
                                <li><a href="<?php echo $this->settings->twitter_url ?>" target="_blank" class="contact-icon">
                                        <i class="fa fa-twitter"></i></a>
                                </li>
                            <?php endif; ?>
                            <?php if (!empty($this->settings->instagram_url)) : ?>
                                <li><a href="<?php echo $this->settings->instagram_url ?>" target="_blank" class="contact-icon">
                                        <i class="fa fa-instagram"></i></a>
                                </li>
                            <?php endif; ?>
                            <?php if (!empty($this->settings->linkedin_url)) : ?>
                                <li><a href="<?php echo $this->settings->linkedin_url ?>" target="_blank" class="contact-icon">
                                        <i class="fa fa-linkedin"></i></a>
                                </li>
                            <?php endif; ?>
                            <?php if (!empty($this->settings->youtube_url)) : ?>
                                <li><a href="<?php echo $this->settings->youtube_url ?>" target="_blank" class="contact-icon">
                                        <i class="fa fa-youtube"></i></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="map">
    <iframe src="<?php echo $this->settings->map; ?>" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
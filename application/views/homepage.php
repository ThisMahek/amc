<div class="about-area commonGapTop-70 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <h3 class="heading"> About <?php echo $this->general_settings->application_name ?> </h3>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="under-about mb-4 wow slideInLeft">
                    <h4> <?php echo html_escape($about->about_heading); ?></h4>
                    <?php echo ($about->about_content); ?>

                </div>
                <div class="under-about mb-4 wow slideInLeft">
                    <h4> <?php echo html_escape($about->mission_heading); ?></h4>
                    <?php echo ($about->mission_content); ?>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <img src="<?php echo base_url() . 'uploads/misc/' . $about->image ?>" alt="About Image" />
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="under-about mb-4 wow slideInRight">
                    <h4> <?php echo html_escape($about->vision_heading); ?></h4>
                    <?php echo ($about->vision_content); ?>
                </div>
                <div class="under-about mb-4 wow slideInRight">
                    <h4> <?php echo html_escape($about->strategy_heading); ?></h4>
                    <?php echo ($about->strategy_content); ?>
                </div>
            </div>
            <div class="text-center">
                <a class="read-more" href="<?php echo base_url() . $about->button_link ?>"><?php echo html_escape($about->button_text); ?> </a>
            </div>
        </div>
    </div>
</div>
<div class="course-section pt-5 pb-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <h3 class="heading"> Our Courses </h3>
            </div>
            <div class="course-slide">
                <?php foreach ($courses as $course) : ?>
                    <div class="cover-course matchHeight">
                        <div class="text-center">
                            <i class="fa fa-graduation-cap"></i>
                            <h4 class="small-heading"> <?php echo $course->title_name ?> </h4>
                        </div>
                        <p><?php echo $course->short_description ?></p>
                        <a class="enroll-btn" href="<?php echo base_url(). 'student-registration/'?>">Enroll Now </a>
                    </div>
                <?php endforeach; ?>
             
            </div>
        </div>
    </div>
</div>
<div class="notice-area mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 wow slideInUp">
                <div class="cover-slide">
                    <h4 class="notice-heading">Notice</h4>
                    <div class="slideUp">
                        <?php if (!empty($notices)) :
                            foreach ($notices as $notice) : ?>
                                <div class="d-flex align-items-center"><a href="<?php echo generate_url("notice") . "/" . $notice->slug; ?>"> <?php echo html_escape($notice->title); ?> </a> <!-- <span class="new-bling">New</span> -->
                                </div>
                        <?php endforeach;
                        endif; ?>

                    </div>
                </div>
            </div>
            <div class="col-md-6 wow slideInUp">
                <div class="cover-slide">
                    <h4 class="notice-heading">Job Alert</h4>
                    <div class="slideUp">
                        <?php if (!empty($jobs)) :
                            foreach ($jobs as $job) :
                                $post_category = $this->job_cat_model->get_category($job->category_id);
                        ?>
                                <div class="d-flex align-items-center"><a href="<?php echo generate_url("job") . "/" . $post_category->slug; ?>/<?php echo $job->slug; ?>"> <?php echo html_escape($job->title); ?></a>
                                    <!-- <span class="new-bling">New</span> -->
                                </div>
                        <?php endforeach;
                        endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter -->
<div class="counter-area">
    <div class="container">
        <div id="counter">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="cover-counter text-center ">
                        <div class="d-flex justify-content-center">
                            <div class="counter-value" data-count="<?php echo $counters->c1_num ?>">0</div> <span>+</span>
                        </div>
                        <h4> <?php echo $counters->c1_heading ?> </h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="cover-counter text-center ">
                        <div class="d-flex justify-content-center">
                            <div class="counter-value" data-count="<?php echo $counters->c2_num ?>">0</div> <span>+</span>
                        </div>
                        <h4> <?php echo $counters->c2_heading ?> </h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="cover-counter text-center ">
                        <div class="d-flex justify-content-center">
                            <div class="counter-value" data-count="<?php echo $counters->c3_num ?>">0</div> <span>+</span>
                        </div>
                        <h4> <?php echo $counters->c3_heading ?> </h4>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="cover-counter text-center ">
                        <div class="d-flex justify-content-center">
                            <div class="counter-value" data-count="<?php echo $counters->c4_num ?>">0</div> <span>+</span>
                        </div>
                        <h4> <?php echo $counters->c4_heading ?> </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter -->
<div class="team">
    <div class="container">
        <div class="col-12">
            <div class="text-center mb-5">
                <h3 class="heading"> Our Professors</h3>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($professors)) : ?>
                <?php foreach ($professors as $professor) : ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-area matchHeight">
                            <div class="client-image">
                                <div class="pic">
                                    <img src="<?php echo base_url(); ?>assets/frontend/images/team-blank-image.png" alt="Blank Image"> <!-- Dummy Image-->
                                    <a class="holder" href="<?php echo generate_url("professor") . "/" . $professor->slug; ?>" style="background-image:url(<?php echo base_url() . '/uploads/team/' . $professor->member_image ?>);"></a> <!-- Main Image-->
                                </div>
                            </div>
                            <div class="team-social">
                                <ul>
                                    <?php if (!empty($professor->facebook_url)) : ?>
                                        <li><a href="<?php echo $professor->facebook_url ?>" target="_blank" class="fa fa-facebook"></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($professor->twitter_url)) : ?>
                                        <li><a href="<?php echo $professor->twitter_url ?>" target="_blank" class="fa fa-twitter"></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($professor->instagram_url)) : ?>
                                        <li><a href="<?php echo $professor->instagram_url ?>" target="_blank" class="fa fa-instagram"></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($professor->linkedin_url)) : ?>
                                        <li><a href="<?php echo $professor->linkedin_url ?>" target="_blank" class="fa fa-linkedin"></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($professor->youtube_url)) : ?>
                                        <li><a href="<?php echo $professor->youtube_url ?>" target="_blank" class="fa fa-youtube"></a></li>
                                    <?php endif; ?>
                                    <?php if (!empty($professor->website_url)) : ?>
                                        <li><a href="<?php echo $professor->website_url ?>" target="_blank" class="fa fa-globe"></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="clint-details text-center pt-3 pb-3">
                                <h4><?php echo html_escape($professor->member_name); ?></h4>
                                <p><?php echo $professor->member_designation ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>


        </div>
    </div>
</div>
<div class="course-section pt-5 pb-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <h3 class="heading"> Our Partners </h3>
            </div>
            <div class="partners-slide">
                <?php foreach ($partners as $partner) : ?>
                    <div class="cover-course">
                        <a href="<?php echo $partner->partner_url ?>" target="blank"><img src="<?php echo base_url() . 'uploads/traning_partner/' . $partner->featured_image ?>"></a>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
<div class="testimonial mb-5">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="heading"> Student Testimonial </h3>
        </div>
        <div class="testimonial-slide">
            <?php foreach ($testiminials as $testiminial) : ?>
                <div class="testi-area">
                    <div class="client-image-testi">
                        <img src="<?php echo base_url() . 'uploads/testimonials/' . $testiminial->testimonial_image; ?>" alt="client" />
                    </div>
                    <div class="testimo-content">
                        <h4> <?php echo $testiminial->user_name ?> </h4>
                        <?php echo $testiminial->testimonial_details ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
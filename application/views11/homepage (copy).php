<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->favicon ?>" href="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->favicon ?>">
    <title><?php echo xss_clean($title); ?> - <?php echo xss_clean($this->settings->site_title); ?></title>
    <meta name="description" content="<?php echo xss_clean($description); ?>" />
    <meta name="keywords" content="<?php echo xss_clean($keywords); ?>" />
    <meta name="author" content="Bigpage" />
    <meta property="site_name" content="Bigpage" />
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>assets/frontend/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/selectize.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/vanillabox/vanillabox.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/vanillabox/vanillabox.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/frontend/css/style.css" type="text/css">
    <title>Alternative Medicine Center - Home</title>
    <style type="text/css">
        .about_image {
            width: 80%;
        }

        #girle {
            transform: rotate(30deg);
        }
    </style>
    <style>
        <?php echo $this->general_settings->custom_css_codes; ?>
    </style>
    <script>
        var base_url = '<?php echo base_url(); ?>';
        var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csfr_cookie_name = '<?php echo $this->config->item('csrf_cookie_name'); ?>';
    </script>
</head>

<body class="page-homepage-carousel">
    <div class="wrapper">
        <style type="text/css">
            .navigation-wrapper .primary-navigation-wrapper header .navbar-brand img {
                max-height: 80px;
                margin-top: -15px;
            }

            @media (max-width: 767px) {
                .navigation-wrapper .primary-navigation-wrapper header .navbar-brand img {
                    max-width: 50px;
                    margin-top: -5px;
                    margin-left: 10px;
                }
            }
        </style>
        <div class="navigation-wrapper">
            <div class="secondary-navigation-wrapper">
                <div class="container">
                    <div class="navigation-contact pull-left">Call Us: <span class="opacity-70">+91-9451051086</span></div>
                    <div class="search">
                        <div class="input-group">
                            <input type="search" class="form-control" name="search" placeholder="Search">
                            <span class="input-group-btn"><button type="submit" id="search-submit" class="btn"><i class="fa fa-search"></i></button></span>
                        </div><!-- /.input-group -->
                    </div>
                    <ul class="secondary-navigation list-unstyled">
                        <li><a href="#">Registration</a></li>
                        <li><a href="result">Result</a></li>
                    </ul>
                </div>
            </div><!-- /.secondary-navigation -->
            <div class="primary-navigation-wrapper">
                <header class="navbar" id="top" role="banner">
                    <div class="container">
                        <div class="navbar-header">
                            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="navbar-brand nav" id="brand">
                                <a href="index.php"><img class="logo" src="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->logo ?>" alt="<?php echo xss_clean($this->settings->site_title); ?>"></a>
                            </div>
                        </div>
                        <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                            <ul class="nav navbar-nav">
                                <li class="active">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="#" class=" has-child no-link">About us</a>
                                    <ul class="list-unstyled child-navigation">
                                        <li><a href="about-us.php">The Institution</a></li>
                                        <li><a href="#">Our Association</a></li>
                                        <li><a href="#">Faculties</a></li>
                                        <li><a href="#">Certificates</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class=" has-child no-link">Our Courses</a>
                                    <ul class="list-unstyled child-navigation">
                                        <li><a href="dmlt.php">DMLT</a></li>
                                        <li><a href="dott.php">DOTT</a></li>
                                        <li><a href="DRIT.php">DRIT</a></li>
                                        <li><a href="DNYS.php">DNYS</a></li>
                                        <li><a href="cmsed.php">CMS & ED</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class=" has-child no-link">Gallery</a>
                                    <ul class="list-unstyled child-navigation">
                                        <li><a href="#"><?php echo base_url() ?>assets/frontend/images</a></li>
                                        <li><a href="#">Videos</a></li>
                                    </ul>
                                </li>
                                <li><a href="result">Result</a></li>

                                <li>
                                    <a href="#">Placements</a>
                                </li>
                                <li>
                                    <a href="#">Alumini</a>
                                </li>
                                <li>
                                    <a href="#" class=" has-child no-link">Franchise</a>
                                    <ul class="list-unstyled child-navigation">
                                        <li><a href="#">Guidline</a></li>
                                        <li><a href="#">Application Form</a></li>
                                        <li><a href="#">Franchise List</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Contact Us</a>
                                </li>
                            </ul>
                        </nav><!-- /.navbar collapse-->
                    </div><!-- /.container -->
                </header><!-- /.navbar -->
            </div><!-- /.primary-navigation -->
            <div class="background">
                <img src="<?php echo base_url() ?>assets/frontend/img/background-city.png" alt="background">
            </div>
        </div>
        <div id="page-content">
            <div id="homepage-carousel">
                <div class="container">
                    <div class="homepage-carousel-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-sm-7">
                                <div class="image-carousel">
                                    <div class="image-carousel-slide"><img src="<?php echo base_url() ?>assets/frontend/images/c1.png" alt=""></div>
                                    <div class="image-carousel-slide"><img src="<?php echo base_url() ?>assets/frontend/images/c2.png" alt=""></div>
                                    <div class="image-carousel-slide"><img src="<?php echo base_url() ?>assets/frontend/images/c3.png" alt=""></div>
                                    <div class="image-carousel-slide"><img src="<?php echo base_url() ?>assets/frontend/images/c4.png" alt=""></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-5">
                                <div class="slider-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h1 class="text-center">Alternative Medicine Center</h1>
                                            <hr>
                                            <h3 class="text-center">Agaganj- Tikri- Ayodhya - U.P - 224195</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="background"></div>
                    </div>
                    <div class="slider-inner"></div>
                </div>
            </div>
            <div class="block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <section class="news-small" id="news-small">
                                <header>
                                    <h2>Notice</h2>
                                </header>
                                <div class="section-content">
                                    <article>
                                        <figure class="date"><i class="fa fa-file-o"></i>
                                            <a href="pdf/NPCI.pdf">CMS & ED </a> <img src="<?php echo base_url() ?>assets/frontend/images/new_red.gif">
                                        </figure>
                                    </article>
                                    <!--  <article>
                                <figure class="date"><i class="fa fa-file-o"></i></figure>
                                <header><a href="#"></a></header>
                            </article>
                            <article>
                                <figure class="date"><i class="fa fa-file-o"></i></figure>
                                <header><a href="#"></a></header>
                            </article> -->
                                </div>
                                <!--  <a href="#" class="read-more stick-to-bottom">All News</a> -->
                            </section>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <section class="events small" id="events-small">
                                <header>
                                    <h2>Job Alert</h2>
                                </header>
                                <div class="section-content">
                                    <article class="event nearest">
                                        <aside>
                                            <header>
                                                <p> WE ARE HIRING LAB TECHNICIANS ON URGENT BASIS <span id="dots"><img src="<?php echo base_url() ?>assets/frontend/images/new_red.gif"></span><span id="more" style="display: none;">
                                                        Job Locations: Between Borivali to Bandra<br>
                                                        Eligibility- <br>
                                                        BSC AND DMLT CANDIDATES<br>
                                                        SPECIALISED IN PHLEBOTOMY AND COVID RTPCR<br>

                                                        Contact : 9136622022 /9136698123<br>

                                                        Interview Location-<br>
                                                        Suburban diagnostics <br>
                                                        Shop no 1,Shankar Prakash bldg, Plot no 11, New Nagardas road near Pinky Talkies Subway, Andheri East, Mumbai 400069</span></p>
                                            </header>
                                            <div class="additional-info" onclick="myFunction()" id="myBtn" style="cursor: pointer;">Read More</div>
                                            <hr>
                                        </aside>
                                    </article>
                                    <article class="event nearest">
                                        <figure>

                                        </figure>
                                        <aside>
                                            <header>
                                                <a href="#"></a>
                                                <p>We are Hiring Phlebotomists for our largest fleet at home sample collection team.<span id="dots0"><img src="<?php echo base_url() ?>assets/frontend/images/new_red.gif"></span><span id="more0" style="display: none;"><br>
                                                        Industry best benefits:<br>
                                                        <b>
                                                            - Fixed salary upto Rs.30,000 per month.<br>
                                                            - Earn upto Rs.80 conveyance incentive per sample pickup.<br>
                                                            - Life Insurance with accident cover worth Rs.10 lakhs.<br>
                                                            - Medical insurance for self & family members worth Rs.3 lakhs.<br>
                                                            - Earn monthly incentives/bonuses upto 2X of fixed salary.<br>
                                                            - Bike/Scooty provided by company & ownership transfer in 12 months.<br><br>

                                                            For more Info Contact :<br>
                                                            SPOC - Anant - 7895173717<br>
                                                            SPOC - Josna - 9650349875<br>
                                                            SPOC - Shruti - 9311123919<br>
                                                            SPOC - Abhishek - 9311478502</b>
                                                    </span></p>
                                            </header>
                                            <div class="additional-info" onclick="myFunction0()" id="myBtn0" style="cursor: pointer;">Read More</div>
                                            <hr>
                                        </aside>
                                    </article>
                                    <article class="event nearest">
                                        <aside>
                                            <header>
                                                <a href="#"></a>
                                                <p>Urgent Job Requirement Post
                                                    <span id="dots1"><img src="<?php echo base_url() ?>assets/frontend/images/new_red.gif"></span><span id="more1" style="display: none;"><br>
                                                        Post - Senior RT PCR Technician <br>
                                                        Duty Time - Night and Evening Shift .<br>
                                                        Location - Thane<br>
                                                        Organization - Alpine Diagnostics<br>
                                                        Salary - Open and Flexible for Experienced Candidate<br>
                                                        Joining - Immediate<br>
                                                        Note - Experienced Candidates only<br>
                                                        Contact no.9834890033</span>
                                                </p>
                                            </header>
                                            <div class="additional-info" onclick="myFunction1()" id="myBtn1" style="cursor: pointer;">Read More</div>
                                            <hr>
                                        </aside>
                                    </article>
                                    <article class="event nearest">
                                        <aside>
                                            <header>
                                                <a href="#"></a>
                                                <p>Required x ray technician for job
                                                    <span id="dots2"><img src="<?php echo base_url() ?>assets/frontend/images/new_red.gif"></span><span id="more2" style="display: none;"><br>
                                                        Centre name. LOKAHNDWALA DIAGNOATIC CENTRE <br>
                                                        ADDRESS.:- C102 autumn grove
                                                        Lokhandwala complex
                                                        Near Lokhandwala foundation school
                                                        Kandivali East<br><br>
                                                        CONTACT PERSON. MR. BASAVRAJ PATIL<br>
                                                        Mob.no. : +91-8308612812</span>
                                                </p>
                                            </header>
                                            <div class="additional-info" onclick="myFunction2()" id="myBtn2" style="cursor: pointer;">Read More</div>
                                            <hr>
                                        </aside>
                                    </article>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <section id="about">
                                <header>
                                    <h2>About SSGIPS</h2>
                                </header>
                                <div class="section-content">
                                    <img src="<?php echo base_url() ?>assets/frontend/images/about.jpg" alt="" class="add-margin about_image">
                                    <p><strong>Alternative Medicine Center</strong> is established under the provisions of Sri Sitaram Goswami Gramodhyog Sansthan Agaganj- Tikri- Ayodhya with S.R. Act 21, 1860 (Government of Uttar Pradesh) and C.R. Act, 1957 (Government of India).</p><br>
                                    <a href="about-us.php" class="read-more stick-to-bottom">Read More</a>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <section id="testimonials">
                <div class="block">
                    <div class="container">
                        <div class="author-carousel">
                            <div class="author">
                                <blockquote>
                                    <figure class="author-picture"><img src="<?php echo base_url() ?>assets/frontend/images/m1.png" alt=""></figure>
                                    <article class="paragraph-wrapper">
                                        <div class="inner">
                                            <header class="text-right">The Organization believes in providing affiliation for bright future of the students and not for the purpose of making profit. The service can save not only time but also maintain the trust and authenticity as a basic requisite.</header>
                                            <footer class="text-right">Baba Sri Sitaram Goswami <br><span style="padding-left: 110px;">(Chairman)</span></footer>
                                        </div>
                                    </article>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <section id="academic-life">
                                <header>
                                    <h2>Academic Life & Research</h2>
                                </header>
                                <div class="section-content">
                                    <ul class="list-links">
                                        <li><a href="#">Programs and Areas</a></li>
                                        <li><a href="#">Research</a></li>
                                        <li><a href="#">Graduate & Postdoctoral Programs</a></li>
                                        <li><a href="#">Continuing Studies</a></li>
                                        <li><a href="#">International Activities</a></li>
                                        <li><a href="#">Course Calendars & Listings</a></li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <section id="campus-life">
                                <header>
                                    <h2>Campus Life</h2>
                                </header>
                                <div class="section-content">
                                    <ul class="list-links">
                                        <li><a href="#">Athletics & Recreation</a></li>
                                        <li><a href="#">Clubs & Extra-curricular Activities</a></li>
                                        <li><a href="#">Health & Wellness</a></li>
                                        <li><a href="#">Housing & Residence</a></li>
                                        <li><a href="#">Arts & Culture</a></li>
                                        <li><a href="#">Student IT Services</a></li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <section id="campus-life">
                                <header>
                                    <h2>Divisions</h2>
                                </header>
                                <div class="section-content">
                                    <ul class="list-links">
                                        <li><a href="#">Accounting & Finance</a></li>
                                        <li><a href="#">Advertising & Marketing</a></li>
                                        <li><a href="#">Architecture & Interior</a></li>
                                        <li><a href="#">Arts & Design</a></li>
                                        <li><a href="#">Business & Management</a></li>
                                        <li><a href="#">Computing & IT</a></li>
                                    </ul>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block">
                <div class="container">
                    <div class="block-dark-background">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <section id="division" class="has-dark-background">
                                    <header>
                                        <h2>Our Mission</h2>
                                    </header>
                                    <div class="section-content">
                                        <p>Paramedical Sciences has served as a lateral aid to the medical science, in terms of diagnosis and treatment of diseases. Alternative Medicine Center has a primary role to educate and trained the students to provide advanced pre- hospital medical care to the patients. A paramedic is defined as a person who works in a healthcare field in an auxiliary capacity to a physician. They are specially trained medical technicians certified to provide a range of emergency medical services. In developing countries as in India, the rural areas are still left unattended in terms of quality health care system, due to the acute shortage of skilled health care professional. This dearth of paramedics has to be compensated with increased world class training and education in paramedical sciences to the youths for catering a quality health care service to this needy section of the society</p>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block">
                <div class="container">
                    <section id="our-professors">
                        <header>
                            <h2>Our Professors</h2>
                        </header>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="section-content">
                                    <div class="professors">
                                        <article class="professor-thumbnail">
                                            <figure class="professor-image"><a href="member-detail.html"><img src="<?php echo base_url() ?>assets/frontend/images/m2.png" alt=""></a></figure>
                                            <aside>
                                                <header>
                                                    <a href="member-detail.html">Prof. Rananjay Pratap Goswami</a>
                                                    <div class="divider"></div>
                                                    <figure class="professor-description">Director</figure>
                                                </header>
                                                <a href="#" class="show-profile">Show Profile</a>
                                            </aside>
                                        </article>
                                        <article class="professor-thumbnail">
                                            <figure class="professor-image"><a href="member-detail.html"><img src="<?php echo base_url() ?>assets/frontend/images/p1.png" alt=""></a></figure>
                                            <aside>
                                                <header>
                                                    <a href="member-detail.html">Dr. Purshotam Kaushik</a>
                                                    <div class="divider"></div>
                                                    <figure class="professor-description"></figure>
                                                </header>
                                                <a href="#" class="show-profile">Show Profile</a>
                                            </aside>
                                        </article>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="section-content">
                                    <div class="professors">
                                        <article class="professor-thumbnail">
                                            <figure class="professor-image"><a href="member-detail.html"><img src="<?php echo base_url() ?>assets/frontend/images/p3.png" alt=""></a></figure>
                                            <aside>
                                                <header>
                                                    <a href="member-detail.html">Prof. Kushagra Goswami </a>
                                                    <div class="divider"></div>
                                                    <figure class="professor-description">B.Pharma. M.pharma.</figure>
                                                </header>
                                                <a href="#" class="show-profile">Show Profile</a>
                                            </aside>
                                        </article>
                                        <article class="professor-thumbnail">
                                            <figure class="professor-image"><a href="member-detail.html"><img src="<?php echo base_url() ?>assets/frontend/images/p4.png" alt=""></a></figure>
                                            <aside>
                                                <header>
                                                    <a href="member-detail.html">Prof. Ajar Pandey</a>
                                                    <div class="divider"></div>
                                                    <figure class="professor-description">B.sc. B. Pharma</figure>
                                                </header>
                                                <a href="#" class="show-profile">Show Profile</a>
                                            </aside>
                                        </article>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="section-content">
                                    <div class="professors">
                                        <article class="professor-thumbnail">
                                            <figure class="professor-image"><a href="member-detail.html"><img src="<?php echo base_url() ?>assets/frontend/images/p5.png" alt=""></a></figure>
                                            <aside>
                                                <header>
                                                    <a href="member-detail.html">Prof. Yash Pratap</a>
                                                    <div class="divider"></div>
                                                    <figure class="professor-description">MCA</figure>
                                                </header>
                                                <a href="#" class="show-profile">Show Profile</a>
                                            </aside>
                                        </article>
                                        <article class="professor-thumbnail">
                                            <figure class="professor-image"><a href="member-detail.html"><img src="<?php echo base_url() ?>assets/frontend/images/p6.png" alt=""></a></figure>
                                            <aside>
                                                <header>
                                                    <a href="member-detail.html">Dr. Saurabh Goswami</a>
                                                    <div class="divider"></div>
                                                    <figure class="professor-description">BAMS, MD</figure>
                                                </header>
                                                <a href="#" class="show-profile">Show Profile</a>
                                            </aside>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <section id="partners">
                                <header>
                                    <h2>Partners & Donors</h2>
                                </header>
                                <div class="section-content">
                                    <div class="logos">
                                        <div class="logo"><a href="#"><img src="<?php echo base_url() ?>assets/frontend/images/hf.png" alt=""></a></div>
                                        <div class="logo"><a href="#"><img src="<?php echo base_url() ?>assets/frontend/images/mgmpysb.png" alt="" style="width: 150px"></a></div>
                                        <div class="logo"><a href="#"><img src="<?php echo base_url() ?>assets/frontend/images/skill.jfif" alt="" style="width: 150px"></a></div>
                                        <div class="logo"><a href="#"><img src="<?php echo base_url() ?>assets/frontend/images/iti.jfif" alt="" style="width: 200px"></a></div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style type="text/css">
            .logo_ft {
                width: 50%;
            }
        </style>
        <footer id="page-footer">
            <section id="footer-top">
                <div class="container">
                    <div class="footer-inner">
                        <div class="footer-social">
                            <figure>Follow us:</figure>
                            <div class="icons">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div><!-- /.icons -->
                        </div><!-- /.social -->
                        <div class="search pull-right">
                            <form id="form_newsletter_footer" class="form-newsletter">
                                <div class="input-group">
                                    <input type="email" class="form-control newsletter-input" placeholder="Newsletter" required>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn">submit</i></button>
                                    </span>
                                </div><!-- /input-group -->
                                <div id="form_newsletter_response"></div>
                            </form>
                        </div><!-- /.pull-right -->
                    </div><!-- /.footer-inner -->
                </div><!-- /.container -->
            </section><!-- /#footer-top -->

            <section id="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <aside class="logo">
                                <img src="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->logo ?>" class="vertical-center logo_ft" alt="<?php echo xss_clean($this->settings->site_title); ?>">
                            </aside>
                        </div><!-- /.col-md-3 -->
                        <div class="col-md-3 col-sm-4">
                            <aside>
                                <header>
                                    <h4>Contact Us</h4>
                                </header>
                                <address>
                                    <?php echo $this->settings->contact_address ?>
                                    <abbr title="Telephone">Mobile:</abbr> <?php echo $this->settings->contact_phone ?>
                                    <br>
                                    <abbr title="Email">Email:</abbr> <a href="#"><?php echo $this->settings->contact_email ?></a>
                                </address>
                            </aside>
                        </div><!-- /.col-md-3 -->
                        <div class="col-md-3 col-sm-4">
                            <aside>
                                <header>
                                    <h4>Important Links</h4>
                                </header>
                                <ul class="list-links">
                                    <li><a href="#">Our Courses</a></li>
                                    <li><a href="#">Our Alumini</a></li>
                                    <li><a href="#">Our Professors</a></li>
                                    <li><a href="#">Libary & Health</a></li>
                                    <li><a href="#">Research</a></li>
                                </ul>
                            </aside>
                        </div><!-- /.col-md-3 -->
                        <div class="col-md-3 col-sm-4">
                            <aside>
                                <header>
                                    <h4>About SSGIPS</h4>
                                </header>
                                <p><?php echo $this->settings->about_us ?>
                                </p>
                                <div>
                                    <a href="#" class="read-more">All News</a>
                                </div>
                            </aside>
                        </div><!-- /.col-md-3 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
                <div class="background"><img src="<?php echo base_url() ?>assets/frontend/img/background-city.png" class="" alt=""></div>
            </section><!-- /#footer-content -->

            <section id="footer-bottom">
                <div class="container">
                    <div class="footer-inner">
                        <div class="copyright">© <a href="<?php echo base_url() ?>"><?php echo $this->general_settings->application_name ?></a> | Designed & Developed By <a href="https://business.bigpage.in/">Bigpage</a></div><!-- /.copyright -->
                    </div><!-- /.footer-inner -->
                </div><!-- /.container -->
            </section><!-- /#footer-bottom -->

        </footer>
    </div>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/selectize.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/jQuery.equalHeights.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/icheck.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/jquery.vanillabox-0.1.5.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/retina-1.1.0.min"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/custom.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/bpscipt.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }
    </script>
    <script>
        function myFunction0() {
            var dots = document.getElementById("dots0");
            var moreText = document.getElementById("more0");
            var btnText = document.getElementById("myBtn0");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }
    </script>
    <script>
        function myFunction1() {
            var dots = document.getElementById("dots1");
            var moreText = document.getElementById("more1");
            var btnText = document.getElementById("myBtn1");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }
    </script>
    <script>
        function myFunction2() {
            var dots = document.getElementById("dots2");
            var moreText = document.getElementById("more2");
            var btnText = document.getElementById("myBtn2");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }
    </script>
</body>

</html>
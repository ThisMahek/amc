<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->favicon ?>" href="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->favicon ?>">
    <title><?php echo xss_clean($title); ?> - <?php echo xss_clean($this->settings->site_title); ?></title>
    <meta name="description" content="<?php echo xss_clean($description); ?>" />
    <meta name="keywords" content="<?php echo xss_clean($keywords); ?>" />
    <meta name="author" content="Bigpage" />
    <meta property="site_name" content="Bigpage" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/animate.min.css">
    <!-- Gallery CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/baguetteBox.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/slick-theme.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/font-awesome.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/style.css">
    <style>
        <?php echo $this->general_settings->custom_css_codes; ?>
    </style>
    <script>
        var base_url = '<?php echo base_url(); ?>';
        var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csfr_cookie_name = '<?php echo $this->config->item('csrf_cookie_name'); ?>';
    </script>
</head>

<body>
    <header>
        <div class="header-top">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between res-make">
                    <div>
                        <a class="phone-number" href="tel:<?php echo $this->settings->contact_phone ?>"><span><i class="fa fa-phone"></i></span> &nbsp; <?php echo $this->settings->contact_phone ?></a> &nbsp;
                        <a class="phone-number" href="mailto:<?php echo $this->settings->contact_email ?>"><span><i class="fa fa-envelope"></i></span> &nbsp; <?php echo $this->settings->contact_email ?></a>
                    </div>
                    <div class="d-flex justify-content-end align-items-center respon-sprade">

                        <?php if (auth_check()) : ?>
                            <ul class="d-flex right-top justify-content-center">
                                <li><a href="<?php echo base_url() . 'dashboard' ?>">My Panel</a></li>
                                <li class="text-white"> | &nbsp; </li>
                                <li><a href="<?php echo base_url() . 'logout' ?>">Logout</a></li>

                            </ul>
                        <?php else : ?>
                            <ul class="d-flex right-top justify-content-center">
                                <li><a href="<?php echo base_url() . 'login' ?>">Login</a></li>
                                <li class="text-white"> | &nbsp; </li>
                                <li><a href="<?php echo base_url() . 'student-registration' ?>">Registration</a></li>
                            </ul>
                        <?php endif; ?>
                        <a class="search-top" href="#"><i class="fa fa-search"></i></a>
                        <div class="search-drop">
                            <form>
                                <div class="search-area d-flex">
                                    <select class="form-select">
                                        <option value="course"> Course </option>
                                        <option value="job"> Job </option>
                                        <option value="notice"> Notice </option>
                                    </select>
                                    <input type="text" class="searchBox form-control" placeholder="Search...">
                                    <button type="submit" class="searchButton">
                                        Search
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php $this->load->view('partials/nav_ber'); ?>
    </header>

<div class="marq">
<marquee onMouseOver="this.stop()" onMouseOut="this.start()"> Our website is under processing. Please <a href="http://oldsite.ssgips.in/" target="_blank"> click on </a>  this Link  to know the details of the result. </marquee>
</div>

    <?php if (!empty($slider_items)) {
        $this->load->view('partials/slider');
    } else {
        if (empty($e404)) {
            $this->load->view('partials/banner');
        }
    }
    ?>
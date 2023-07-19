<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->favicon ?>" href="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->favicon ?>">
  <title><?php echo xss_clean($title); ?> - <?php echo xss_clean($this->settings->site_title); ?></title>
  <link rel="icon" href="<?php echo base_url(); ?>assets/frontend/images/amma_logo_animated_ver4.gif" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/tagsinput/jquery.tagsinput.min.css">
  <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/responsive.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/style.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/tagsinput/jquery.tagsinput.min.css">
  <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
  <!-- Datatables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/datatables/jquery.dataTables_themeroller.css">
  <script>
    var base_url = '<?php echo base_url(); ?>';
    var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csfr_cookie_name = '<?php echo $this->config->item('csrf_cookie_name'); ?>';
  </script>
</head>

<body>
  <aside class="mside-nav" id="show-mside-navigation1">
    <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-mside-navigation1"></i>
    <div class="heading">
      <!--  <img src="<?php echo base_url('assets/backend/images/man.jpg'); ?>" alt=""> -->
      <div class="info">
        <h3><a href="#">Administrator</a></h3>
        <p>Admin</p>
      </div>
    </div>
    <!--  <div class="search">
      <input type="text" placeholder="Type here"><i class="fa fa-search"></i>
    </div> -->
    <ul class="categories">
      <li class="f-list"><i class="fa fa-tachometer" aria-hidden="true"></i><a href="<?php echo base_url('dashboard') ?>">Dashboard</a>

      <li><i class="fa fa-picture-o fa-fw"></i><a href="#">Slider / Banner</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() ?>sliders">Slider</a></li>
        </ul>
      </li>
      <li><i class="fa fa-home fa-fw" aria-hidden="true"></i><a href="#">Home Page</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() ?>about-us">About Us</a></li>
          <li><a href="<?php echo admin_url() ?>counter">Counter</a></li>
          <li><a href="<?php echo admin_url() ?>testimonials">Testimonials</a></li>
        </ul>
      </li>


      <li><i class="fa fa-graduation-cap fa-fw"></i><a href="#">Courses</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() ?>add-courses">Add Course</a></li>
          <li><a href="<?php echo admin_url() ?>courses">All Courses</a></li>
        </ul>
      </li>
      <li><i class="fa fa-book fa-fw"></i><a href="#">Subject</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() ?>add-subject">Add Subject</a></li>
          <li><a href="<?php echo admin_url() ?>subjects">All Subjects</a></li>
        </ul>
      </li>
      <li class="f-list"><i class="fa fa-sitemap" aria-hidden="true"></i><a href="<?php echo admin_url() . 'academic-session' ?>">Session / Batch</a></li>
      <li><i class="fa fa-th-list fa-fw"></i><a href="#">Assignment</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() ?>assignments">All Assignment</a></li>
          <li><a href="<?php echo admin_url() ?>add-assignment">Add Assignment </a></li>
          <li><a href="<?php echo admin_url() ?>submitted-assignment">Submited Assignment </a></li>
          <li><a href="<?php echo admin_url() ?>pending-assignment">Pending Assignment </a></li>
        </ul>
      </li>
      <li><i class="fa fa-users fa-fw"></i><a href="#">Student</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() ?>students">Students</a></li>
          <li><a href="<?php echo admin_url() ?>add-student">Add Student </a></li>
          <li><a href="<?php echo admin_url() ?>pending-student">Pending Student </a></li>
          <li><a href="<?php echo admin_url() ?>approved-student">Approved Student </a></li>
          <li><a href="<?php echo admin_url() ?>rejected-student">Rejected Student </a></li>
          <li><a href="<?php echo admin_url() ?>dispute-student">Dispute Student </a></li>
          <!-- <li><a href="<?php echo admin_url() ?>search-student">Search Student </a></li> -->
        </ul>
      </li>
      <li><i class="fa fa-users fa-fw"></i><a href="#">Franchise</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() ?>franchises">Franchises</a></li>
          <li><a href="<?php echo admin_url() ?>approved-franchise">Approved Franchise </a></li>
          <!-- <li><a href="<?php echo admin_url() ?>add-franchise">Add Franchise </a></li> -->
          <li><a href="<?php echo admin_url() ?>pending-franchise">Pending Franchise </a></li>
          <!-- <li><a href="<?php echo admin_url() ?>pending-franchise">Payment Pending Franchise </a></li> -->
          <li><a href="<?php echo admin_url() ?>un-complete-pending">Un Complete Form Franchise </a></li>
          <li><a href="<?php echo admin_url() ?>rejected-franchise">Rejected Franchise </a></li>
        </ul>
      </li>
      <li><i class="fa fa-newspaper-o fa-fw"></i><a href="#">Postdated Marksheet</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() ?>postdated-marksheet">Marksheets</a></li>
          <li><a href="<?php echo admin_url() ?>add-postdated-marksheet">Add New</a></li>
        </ul>
      </li>
      <li><i class="fa fa-newspaper-o fa-fw"></i><a href="#">Marksheet</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() ?>marksheets">Published Marksheets</a></li>
          <li><a href="<?php echo admin_url() ?>waiting-marksheets">Waitng for Publish</a></li>
          <li><a href="<?php echo admin_url() ?>pending-marksheets">Pending Marksheet</a></li>
          <li><a href="<?php echo admin_url() ?>add-marksheet">Add marksheet </a></li>
          <li><a href="<?php echo admin_url() ?>search-marksheet">Search marksheet </a></li>
        </ul>
      </li>
      <li><i class="fa fa-newspaper-o fa-fw"></i><a href="#">Certificate</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() ?>certificats">Certificates</a></li>
          <li><a href="<?php echo admin_url() ?>search-certificate">Search Certificate </a></li>
        </ul>
      </li>
      <li><i class="fa fa-users fa-fw"></i><a href="#">Professors Team</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() ?>all-member">Team Member</a></li>
          <li><a href="<?php echo admin_url() ?>add-member">Add Member</a></li>
        </ul>
      </li>
      <li><i class="fa fa-briefcase fa-fw"></i><a href="#">Job Allert</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() ?>jobs">All Jobs</a></li>
          <li><a href="<?php echo admin_url() ?>add-job">Add Job</a></li>
          <li><a href="<?php echo admin_url() ?>job-categories">Job Categories</a></li>
          <li><a href="<?php echo admin_url() ?>add-job-category">Add Job Category</a>
        </ul>
      </li>
      <li><i class="fa fa-bell fa-fw"></i><a href="#">Notice Board</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() ?>notices">All Notice</a></li>
          <li><a href="<?php echo admin_url() ?>add-notice">Add Notice </a></li>
        </ul>
      </li>
      <li class="f-list"><i class="fa fa-exclamation-circle" aria-hidden="true"></i><a href="<?php echo admin_url() . 'exam-notice' ?>">Exam Notice</a></li>
      <li><i class="fa fa-file fa-fw"></i><a href="#"> CMS Page</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() ?>all-pages">All Pages</a></li>
          <li><a href="<?php echo admin_url() ?>add-page">Add Page</a></li>
        </ul>
      </li>
      <li class="f-list"><i class="fa fa-sitemap" aria-hidden="true"></i><a href="<?php echo admin_url() . 'partners' ?>">Traning Partners</a></li>
      <li><i class="fa fa-photo fa-fw"></i><a href="#"> Gallery</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() ?>image-gallery">Image Gallery</a></li>
          <li><a href="<?php echo admin_url() ?>video-gallery"> Video Gallery</a></li>
        </ul>
      </li>

      <li class="f-list"><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="<?php echo admin_url() . 'newsletter' ?>">Newsletter</a></li>

      <li class="f-list"><i class="fa fa-paper-plane" aria-hidden="true"></i><a href="<?php echo admin_url() . 'contact-messages' ?>">Contact messages</a>
      <li><i class="fa fa-bolt fa-fw"></i><a href="#">Setting</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo admin_url() . 'settings'; ?>"> General Setting </a></li>
          <li><a href="<?php echo admin_url() . 'email-settings'; ?>">Email Settings</a></li>
          <li><a href="<?php echo admin_url() . 'seo-tools'; ?>">SEO Tools</a></li>
          <li><a href="<?php echo admin_url() . 'visual-settings'; ?>">Visual Settings</a></li>
          <li><a href="<?php echo admin_url() . 'payment-settings'; ?>">Payment Settings</a></li>
          <li><a href="<?php echo admin_url() . 'pagination-settings'; ?>">pagination Settings</a></ li>
        </ul>
      </li>

    </ul>
  </aside>
  <section id="contents" style="padding: 0;">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <i class="fa fa-align-right"></i>
          </button>
          <a class="navbar-brand" href="#"><?php echo $title ?></a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url() ?>" target="_blank"><i class="fa fa-home" aria-hidden="true"></i> View Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My profile <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url('change-password'); ?>"><i class="fa fa-lock"></i> Change Password</a></li>
                <li><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out"></i> Log out</a></li>
              </ul>
            </li>
            <li style="padding-top: 17px;"><a href="#"><i data-show="show-mside-navigation1" class="fa fa-bars show-side-btn"></i></a></li>
          </ul>
        </div>
      </div>
    </nav>
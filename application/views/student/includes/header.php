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
        <h3><a href="#">Student</a></h3>
        <p>Panel</p>
      </div>
    </div>
    <!--  <div class="search">
      <input type="text" placeholder="Type here"><i class="fa fa-search"></i>
    </div> -->
    <ul class="categories">
      <li class="f-list"><i class="fa fa-tachometer" aria-hidden="true"></i><a href="<?php echo base_url() . 'student-portal' ?>">Dashboard</a>

        <!--    <li><i class="fa fa-th-list fa-fw"></i><a href="#">Assignment</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo student_url() ?>assignments">All Assignment</a></li>
          <li><a href="<?php echo student_url() ?>add-assignment">Add Assignment </a></li>
          <li><a href="<?php echo student_url() ?>submitted-assignment">Submited Assignment </a></li>
          <li><a href="<?php echo student_url() ?>pending-assignment">Pending Assignment </a></li>
        </ul>
      </li> -->

      <li class="f-list"><i class="fa fa-newspaper-o" aria-hidden="true"></i><a href="<?php echo student_url() . 'marksheet' ?>">Marksheet</a></li>

      <li class="f-list"><i class="fa fa-newspaper-o" aria-hidden="true"></i><a href="<?php echo student_url() . 'certificate' ?>">Certificate</a></li>

      <li class="f-list"><i class="fa fa-bell" aria-hidden="true"></i><a href="<?php echo student_url() . 'notice-board' ?>">Notice Board</a></li>


      <li class="f-list"><i class="fa fa-exclamation-circle" aria-hidden="true"></i><a href="<?php echo student_url() . 'exam-notice' ?>">Exam Notice</a></li>

      <li><i class="fa fa-inr fa-fw"></i><a href="#">Financilas</a>
        <ul class="mside-nav-dropdown">
          <li><a href="<?php echo student_url() ?>monthly-tution-fees">Monthly Tution Fees</a></li>
        <!--   <li><a href="<?php echo student_url() ?>examination-fees">Examination Fees </a></li> -->
      </ul>


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
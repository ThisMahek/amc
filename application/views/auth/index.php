<!DOCTYPE html>
<html lang="eng">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->favicon ?>" href="<?php echo base_url() . 'uploads/logo/' . $this->general_settings->favicon ?>">
  <title>Login - <?php echo xss_clean($this->settings->site_title); ?></title>
  <link href="<?php echo base_url('assets/backend/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/style.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/backend/css/responsive.css'); ?>">

  <script>
    var base_url = '<?php echo base_url(); ?>';
    var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csfr_cookie_name = '<?php echo $this->config->item('csrf_cookie_name'); ?>';
  </script>
</head>

<body data-spy="scroll" data-target="#bs-example-navbar-collapse-1" data-offset="5" class="scrollspy-example without_bg_images">
  <section class="login-section">
    <div class="login-box">
      <?php if (!empty($this->session->flashdata('errors'))) : ?>
        <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php echo $this->session->flashdata('errors'); ?>
        </div>
      <?php endif; ?>
      <h2>Login</h2>
      <?php echo form_open('login-check', array('class' => 'form')); ?>

      <div class="user-box">
        <input class="input" name="username" type="text" required="">
        <label class="label" for="">User Name / Registration No</label>
      </div>

      <div class="user-box">
        <input class="input" type="password" name="password" required="">
        <label class="label" for="">Password</label>
      </div>
      <div class="frg-pass">
        <a href="<?php echo base_url('forgot-password'); ?>">Forget Password?</a>
      </div>


      <button type="submit">


        Login </button>
      <?php echo form_close(); ?>

    </div>
  </section>





  <script src="<?php echo base_url('assets/backend/js/jquery-2.2.4.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/backend/js/bootstrap.min.js'); ?>"></script>




</body>


</html>
<!-- footer  -->
<?php
    include APPPATH . 'views/fragment/header-login.php';
?>

<body style="background-color: white;">
<div class="container" style="margin-top:25px;">
  <title>Halaman Login</title>
<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>
<div class="form-group row">
    <label for="kode" class="col-sm-2 col-form-label"><?php echo lang('login_identity_label', 'identity');?></label>
    <div class="col-sm-5">
    <?php echo form_input($identity);?> </div>
  </div>
  <div class="form-group row">
    <label for="kode" class="col-sm-2 col-form-label"><?php echo lang('login_password_label', 'password');?></label>
    <div class="col-sm-5">
    <?php echo form_input($password);?>
</div>
  </div>
  <div class="form-group row">
    <label for="kode" class="col-sm-2 col-form-label"><?php echo lang('login_remember_label', 'remember');?></label>
    <div class="col-sm-5">
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
</div>
  </div>
  <div class="form-group row">
    <label for="kode" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-5">
    <?php echo form_submit('submit', lang('login_submit_btn'));?>
</div>
  </div>
  


<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
</div>
</body>

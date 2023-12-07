<?php
    include APPPATH . 'views/fragment/header.php'; 
    include APPPATH . 'views/fragment/sidebar.php';
    include APPPATH . 'views/fragment/topbar.php';
?>
<div class="container-fluid">
<h1><?php echo lang('edit_group_heading');?></h1>
<p><?php echo lang('edit_group_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url());?>

      <p>
            <?php echo lang('edit_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name);?>
      </p>

      <p>
            <?php echo lang('edit_group_desc_label', 'description');?> <br />
            <?php echo form_input($group_description);?>
      </p>

      <p><?php echo form_submit('submit', lang('edit_group_submit_btn'));?></p>
      <a class="btn btn-danger" href="<?= base_url() ?>auth">Kembali</a>

<?php echo form_close();?>
</div>
<?php
    include APPPATH . 'views/fragment/footer.php';
?>
<?php
    include APPPATH . 'views/fragment/header.php'; 
    include APPPATH . 'views/fragment/sidebar.php' ;
    include APPPATH . 'views/fragment/topbar.php' ;
?>
<div class="container-fluid">
<main>
    <h3>Edit Data Kategori</h3>
    <br>
<?php echo form_open_multipart('kategori/edit_save'); ?>
<input type="hidden" name="idcategory" value="<?= $idcategory ?>" />
  <div class="form-group row">
    <label for="kode" class="col-sm-2 col-form-label">Kode Kategori</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="<?= $kode_kategori ?>" id="kode_kategori" name="kode_kategori"  required="required" />
    </div>
  </div>
  <div class="form-group row">
    <label for="judul" class="col-sm-2 col-form-label">Nama Kategori</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="<?= $nama_kategori ?>" name="nama_kategori" id="nama_kategori" required="required"/>
    </div>
  </div>
<div class="form-group">
<input class="btn btn-primary" type="submit" value="Simpan" id="submit" name="submit" />
<a class="btn btn-danger" href="<?= base_url() ?>kategori">Kembali</a>
</div>
<?php echo form_close(); ?>
</main>
</div>
<?php
    include APPPATH . 'views/fragment/footer.php';
?>
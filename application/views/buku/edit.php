<?php
    include APPPATH . 'views/fragment/header.php'; 
    include APPPATH . 'views/fragment/sidebar.php' ;
    include APPPATH . 'views/fragment/topbar.php' ;
?>
<div class="container-fluid">
<main>
    <h3>Tambah Data Buku</h3>
    <br>
<?php echo form_open_multipart('buku/edit_save'); ?>
<input type="hidden" name="id" value="<?php echo $id ?>" />
  <div class="form-group row">
    <label for="kode" class="col-sm-2 col-form-label">Kode Buku</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="kode_buku" name="kode_buku" value="<?php echo $kode_buku ?>"required="required" />
    </div>
  </div>
  <div class="form-group row">
    <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" name="judul" id="judul" value="<?php echo $judul ?>" required="required"/>
    </div>
  </div>
  <div class="form-group row">
    <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="<?php echo $pengarang ?>" name="pengarang" id="pengarang" required="required"/>
    </div>
  </div>
  <div class="form-group row">
    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" value="<?php echo $penerbit ?>" name="penerbit" id="penerbit"  required="required"/>
    </div>
  </div>
  <div class="form-group row">
    <label for="tanggal_terbit" class="col-sm-2 col-form-label">Tanggal Terbit</label>
    <div class="col-sm-5">
        <input type="date" name="tanggal_terbit" value="<?php echo $tanggal_terbit ?>" class="form-control" id="tanggal_terbit" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="kota_terbit" class="col-sm-2 col-form-label">Kota Terbit</label>
    <div class="col-sm-5">
        <input type="text" name="kota_terbit" value="<?php echo $kota_terbit ?>" class="form-control" id="kota_terbit" required="required"/>
    </div>
  </div>
  <div class="form-group row">
    <label for="jumlah_halaman" class="col-sm-2 col-form-label">Jumlah Halaman</label>
    <div class="col-sm-5">
        <input type="text" name="jumlah_halaman" value="<?php echo $jumlah_halaman ?>" class="form-control" id="jumlah_halaman" size="11" required="required"/>
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
    <div class="col-sm-5">
        <input type="file" name="foto" id="foto" value="<?php echo base_url() . "/fotobuku/" . $foto?>">
        <img src="<?php echo base_url() . "/fotobuku/" . $foto?>" alt="" width="200" height="200">
    </div>
  </div>
  <div class="form-group row">
    <label for="idcategory" class="col-sm-2 col-form-label">Kategori</label>
    <div class="col-sm-5">
    <select name="idcategory" id="idcategory">
    <?php
    foreach ($kategori as $key => $row){
        ?>
        <option value="<?= $row['idcategory'] ?>" <?= $idcategory == $row['idcategory'] ? 'selected' : ''?>><?= $row['nama_kategori'] ?></option>
        <?php
    }
    ?>
    </select>
    </div>
  </div>
<div class="form-group">
<input class="btn btn-primary" type="submit" value="Simpan" id="submit" name="submit" />
<a class="btn btn-danger" href="<?= base_url() ?>buku">Kembali</a>
</div>
<?php echo form_close(); ?>
</main>
</div>
<?php
    include APPPATH . 'views/fragment/footer.php';
?>
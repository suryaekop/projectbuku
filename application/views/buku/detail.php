<?php
    include APPPATH . 'views/fragment/header.php'; 
    include APPPATH . 'views/fragment/sidebar.php' ;
    include APPPATH . 'views/fragment/topbar.php' ;
?>
<h1 align="center">Detail Buku</h1>
<div class="card text-center" style="width: 350px; margin-left: 390px;">
  <img src="<?php echo base_url() . "/fotobuku/" . $foto ?>" class="card-img-top" alt="..." width="200" height="200">
  <div class="card-body">
    <div>
      <label style="font-size: 24pt; font-weight: bold;" for="">Profile Buku</label>
      <h5>Kode Buku : <?php echo $kode_buku ?></h5>
      <h5>Judul Buku : <?php echo $judul ?></h5>
      <h5>Pengarang : <?php echo $pengarang ?></h5>
      <h5>Penerbit : <?php echo $penerbit ?></h5>
      <h5>Tanggal Terbit : <?php echo $tanggal_terbit ?></h5>
      <h5>Kota Terbit : <?php echo $kota_terbit ?></h5>
      <h5>Jumlah Halaman : <?php echo $jumlah_halaman ?></h5>
      <h5>Kategori : <?php echo $namakategori ?></h5>
      <a class="btn btn-primary" href="<?= base_url() ?>buku">Kembali</a>
    </div>
  </div>
</div>
<?php
    include APPPATH . 'views/fragment/footer.php'; 
?>
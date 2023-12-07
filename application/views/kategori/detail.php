<?php
    include APPPATH . 'views/fragment/header.php'; 
    include APPPATH . 'views/fragment/sidebar.php' ;
    include APPPATH . 'views/fragment/topbar.php' ;
?>
<div>
<h3>Detail Kategori</h3>
</div>
<div>
<label>Kode Kategori</label>
<label for="">:</label>
<label for=""><?php echo $kode_kategori ?></label>
</div>
<div>
<label>Nama Kategori</label>
<label for="">:</label>
<label for=""><?php echo $nama_kategori ?></label>
</div>
<div>
<a class="btn btn-primary" href="<?= base_url() ?>kategori">Kembali</a>
</div>
</form>
<?php
    include APPPATH . 'views/fragment/footer.php';
?>
<?php
    include APPPATH . 'views/fragment/header.php'; 
    include APPPATH . 'views/fragment/sidebar.php' ;
    include APPPATH . 'views/fragment/topbar.php' ;
?>
<div class="container">
<h1>Pencarian Judul Buku</h1>
<form action="<?= base_url("welcome/cari_action")?>" class="form-horizontal" name="formtambah" method="post" id="formtambah">
    <div class="form-group" style="margin-top: 25px;">
        <label for="">Cari Buku</label>
        <label for="">:</label>
        <input type="text" name="judul" id="judul" placeholder="Ketik Judul" size="30">
        <input type="submit" value="Cari" id="submit" name="submit" class="btn btn-primary">
    </div>
</form>
<div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0"> 
                <thead>
                    <tr>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tanggal Terbit</th>
                        <th>Kota Terbit</th>
                        <th>Jumlah Halaman</th>
                        <th>Foto</th>
                        <th>Kategori Buku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
    <?php
    if(isset($books)){
    foreach($books as $bo => $data){
        ?>
        <tr>
            <td><?= $data['kode_buku'] ?></td>
            <td><?= $data['judul'] ?></td>
            <td><?= $data['pengarang']?></td>
            <td><?= $data['penerbit']?></td>
            <td><?= $data['tanggal_terbit']?></td>
            <td><?= $data['kota_terbit']?></td>
            <td><?= $data['jumlah_halaman']?></td>
            <td><img src="<?php echo base_url() . '/fotobuku/' . $data['foto'];?>" height="100" width="100"></td>
            <td><?= $data['namakategori']?></td>
            <td>
                <a class="badge badge-primary " href="<?= base_url("buku/detail/{$data['id']}")?>">Detail</a>
                <a class="badge badge-warning  " href="<?= base_url("buku/edit/{$data['id']}")?>">Edit</a>
                <a class="badge badge-danger " onclick="return confirm('menghapus data?')" href="<?= base_url("buku/hapus/{$data['id']}")?>">Hapus</a>
            </td>
        </tr>
    <?php
    }
}
    ?>
    </tbody>
</table>
</div>
</div>
</div>
</div>
<?php
include APPPATH . 'views/fragment/footer.php' ;
?>
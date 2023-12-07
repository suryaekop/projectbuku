<?php
    include APPPATH . 'views/fragment/header.php'; 
    include APPPATH . 'views/fragment/sidebar.php' ;
    include APPPATH . 'views/fragment/topbar.php' ;
?>
<h1>Daftar List Buku</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Buku
        <a class="btn btn-success btn-sm float-right" href="<?= base_url("buku/tambah")?>">Page Tambah Data</a> 
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
        Tambah Data Modal
        </button>
    </div>
    <div class="card-body">
        <?php echo $this->session->flashdata('pesan');?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center" id="dataTable" width="100%" cellspacing="0"> 
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
            <td><img src="<?php echo base_url() . '/fotobuku/' . $data['foto'];?>" height="150" width="100"></td>
            <td><?= $data['namakategori']?></td>
            <td>
                <a class="badge badge-primary" href="<?= base_url("buku/detail/{$data['id']}")?>">Detail</a>
                <a class="badge badge-warning" href="<?= base_url("buku/edit/{$data['id']}")?>">Edit</a>
                <a class="badge badge-danger" onclick="return confirm('menghapus data?')" href="<?= base_url("buku/hapus/{$data['id']}")?>">Hapus</a>
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
</div>
</div>
</div>

<!-- modal tambah data -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php echo form_open_multipart('buku/tambah_save'); ?>
                <div class="form-group">
                    <label for="kode">Kode Buku</label>
                    <input type="text" class="form-control" id="kode_buku" name="kode_buku" required="required" />
                </div>
                <div class="form-group">
                    <label for="judul">Judul Buku</label>
                    <input type="text" class="form-control" name="judul" id="judul" required="required"/>
                </div>
                <div class="form-group">
                    <label for="pengarang">Pengarang</label>
                    <input type="text" class="form-control" name="pengarang" id="pengarang" required="required"/>
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" id="penerbit"  required="required"/>
                </div>
                <div class="form-group">
                    <label for="tanggalterbit">Tanggal Terbit</label>
                    <input type="date" name="tanggal_terbit" class="form-control" id="tanggal_terbit" required="required">
                </div>
                <div class="form-group">
                    <label for="kota">Kota Terbit</label>
                    <input type="text" name="kota_terbit" class="form-control" id="kota_terbit" required="required"/>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Halaman</label>
                    <input type="text" name="jumlah_halaman" class="form-control" id="jumlah_halaman" size="11" required="required"/>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="idcategory" id="idcategory" class="form-control">
                            <?php
                            foreach ($kategori as $key => $kategori){
                                ?>
                                <option value="<?= $kategori['idcategory'] ?>"><?= $kategori['nama_kategori'] ?></option>
                                <?php
                                }
                                ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                <?php echo form_close(); ?>
            </div>
            </div>
        </div>
        </div>
<?php
include APPPATH . 'views/fragment/footer.php' ;
?>
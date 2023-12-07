<?php
    include APPPATH . 'views/fragment/header.php'; 
    include APPPATH . 'views/fragment/sidebar.php' ;
    include APPPATH . 'views/fragment/topbar.php' ;
?>
<h1>Daftar List Kategori</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kategori
        <a class="btn btn-success btn-sm float-right" href="<?= base_url("kategori/tambah")?>">Page Tambah Kategori</a>
        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
        Tambah Kategori Modal
        </button>
    </div>
    <div class="card-body">
    <?php echo $this->session->flashdata('pesan');?>
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0"> 
                <thead>
                    <tr>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th> 
                    </tr>
                </thead>
                <tbody>
    <?php
    foreach($categories as $cs => $data){
        ?>
        <tr>
            <td><?= $data['kode_kategori'] ?></td>
            <td><?= $data['nama_kategori'] ?></td>
            <td>
                <a class="badge badge-primary " href="<?= base_url("kategori/detail/{$data['idcategory']}")?>">Detail</a>
                <a class="badge badge-warning  " href="<?= base_url("kategori/edit/{$data['idcategory']}")?>">Edit</a>
                <a class="badge badge-danger" onclick="return confirm('menghapus data?')" href="<?= base_url("kategori/hapus/{$data['idcategory']}")?>">Hapus</a>
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
            <?php echo form_open_multipart('kategori/tambah_save'); ?>
                <div class="form-group">
                    <label for="kode">Kode Kategori</label>
                    <input type="text" class="form-control" id="kode_kategori" name="kode_kategori" required="required" />
                </div>
                <div class="form-group">
                    <label for="judul">Nama Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" required="required"/>
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
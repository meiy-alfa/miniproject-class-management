<div class="d-flex justify-content-between align-items-center">
    <h2 class="my-4">Daftar Kelas</h2>
    <a href="<?= site_url('classes/create') ?>" class="btn btn-primary" title="Tambah"><i class="bi bi-person-video3"></i> Seting Kelas</a>
</div>

<?php if ($this->session->message) { ?>
    <div class="alert alert-info" role="alert">
        <?= $this->session->message ?>
    </div>
<?php } elseif ($this->session->messageDel) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $this->session->messageDel ?>
    </div>
<?php } ?>


<div class="container">
    <div class="col-sm-12 col-md-12">
        <table class="table table-striped table-bordered" id="table-classes">
            <thead>
                <tr>
                    <th width="150px"><center>Tahun Pelajaran</center></th>
                    <th><center>Kelas</center></th>
                    <th width="150px"><center>Action</center></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($items as $item) : 
                ?>
                    <tr>
                        <td><center><?= $item->tapel ?><center></td>
                        <td><?= $item->tingkat."-".$item->kompetensi.'-'.$item->kelompok ?></td>
                        <td>
                            <center>
                                <a href="<?= site_url("classes/update/$item->id") ?>" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                <a onclick="return confirm('Data yang dihapus tidak bisa dikembalikan, yakin menghapus data ???')" href="<?= site_url("classes/delete_process/$item->id") ?>" class="btn btn-danger btn-sm" title="Hapus"><i class="bi bi-trash3-fill"></i></a>
                            </center>
                        </td>
                    </tr>
                <?php
                    endforeach; 
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center">
    <h2 class="my-4">Daftar Tingkatan</h2>
    <a href="<?= site_url('level/create') ?>" class="btn btn-primary" title="Tambah"><i class="bi bi-clipboard2-data-fill"></i> Tambah Tingkatan</a>
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
        <table class="table table-striped table-bordered" id="my-table">
            <thead>
                <tr>
                    <th><center>Tingkat</center></th>
                    <th width="150px"><center>Action</center></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($items as $item) : 
                ?>
                    <tr>
                        <td><center><?= $item->level ?></center></td>
                        <td>
                            <center>
                                <a href="<?= site_url("level/update/$item->id") ?>" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                <a onclick="return confirm('Data yang dihapus tidak bisa dikembalikan, yakin menghapus data ???')" href="<?= site_url("level/delete_process/$item->id") ?>" class="btn btn-danger btn-sm" title="Hapus"><i class="bi bi-trash3-fill"></i></a>
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

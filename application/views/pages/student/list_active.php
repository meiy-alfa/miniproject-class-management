<div class="d-flex justify-content-between align-items-center">
    <h2 class="my-4">Daftar Siswa Aktif</h2>
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
        <table class="table table-striped table-bordered" id="table-student">
            <thead>
                <tr>
                    <th width="100px"><center>NIS</center></th>
                    <th><center>Nama</center></th>
                    <th width="50px"><center>JK</center></th>
                    <th width="150px"><center>Angkatan</center></th>
                    <th width="150px"><center>Kelas</center></th>
                    <th width="150px"><center>Action</center></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($items as $item) : 
                ?>
                    <tr>
                        <td><center><?= $item->nis ?></center></td>
                        <td><?= $item->fullname ?></td>
                        <td><center><?= $item->gender ?></center></td>
                        <td><center><?= $item->title ?></center></td>
                        <td><?= $item->levs."-".$item->code ?></td>
                        <td>
                            <center>
                                <a href="<?= site_url("student/update/$item->id") ?>" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                <a onclick="return confirm('Data yang dihapus tidak bisa dikembalikan, yakin menghapus data ???')" href="<?= site_url("student/delete_process/$item->id") ?>" class="btn btn-danger btn-sm" title="Hapus"><i class="bi bi-trash3-fill"></i></a>
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

<?php
    // cek keberadan variabel edit
    $is_edit    = isset($item);
    // cek session error
    $is_error   = $this->session->errors;
    // membuat target url
    $target_url = $is_edit ? "team/update_process/$item->id" : "team/create_process";
?>

<h2 class="my-3"> <?= $is_edit ? "Edit" : "Tambah"; ?> Angkatan </h2>

<?php if($is_error) : ?>
    <div class="alert alert-danger">
        <?= $is_error ?>
    </div>
<?php endif; ?>

<form action="<?= site_url($target_url) ?>" method="POST">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="title">Nama Angkatan</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bi bi-bookmark-fill"></i></span>
                </div>
                <input type="text" class="form-control" id="title" placeholder="Nama Angkatan" name="title" value="<?= $is_error ? $this->session->inputs['title'] : ($is_edit ? $item->title : '') ?>">
            </div>
        </div>
    </div>
    <br>
    <a href="<?= site_url("team") ?>" class="btn btn-secondary" title="Kembali">Kembali</a>
    <button class="btn btn-dark" title="Simpan">Simpan</button>
</form>

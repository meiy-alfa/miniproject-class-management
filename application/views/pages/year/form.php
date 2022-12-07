<?php
    // cek keberadan variabel edit
    $is_edit    = isset($item);
    // cek session error
    $is_error   = $this->session->errors;
    // membuat target url
    $target_url = $is_edit ? "year/update_process/$item->id" : "year/create_process";
?>

<h2 class="my-3"> <?= $is_edit ? "Edit" : "Tambah"; ?> Tahun Pelajaran </h2>

<?php if($is_error) : ?>
    <div class="alert alert-danger">
        <?= $is_error ?>
    </div>
<?php endif; ?>

<form action="<?= site_url($target_url) ?>" method="POST">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="year">Tahun Pelajaran</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bi bi-calendar2-range-fill"></i></span>
                </div>
                <input type="text" class="form-control" id="year" placeholder="Tahun Pelajaran | Contoh : 2022-2023" name="year" value="<?= $is_error ? $this->session->inputs['year'] : ($is_edit ? $item->year : '') ?>">
            </div>
        </div>
    </div>
    <br>
    <a href="<?= site_url("year") ?>" class="btn btn-secondary" title="Kembali">Kembali</a>
    <button class="btn btn-dark" title="Simpan">Simpan</button>
</form>

<?php
    // cek keberadan variabel edit
    $is_edit    = isset($item);
    // cek session error
    $is_error   = $this->session->errors;
    // membuat target url
    $target_url = $is_edit ? "vocation/update_process/$item->id" : "vocation/create_process";
?>

<h2 class="my-3"> <?= $is_edit ? "Edit" : "Tambah"; ?> Kompetensi </h2>

<?php if($is_error) : ?>
    <div class="alert alert-danger">
        <?= $is_error ?>
    </div>
<?php endif; ?>

<form action="<?= site_url($target_url) ?>" method="POST">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="name">Nama Kompetensi</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bi bi-signpost-2-fill"></i></span>
                </div>
                <input type="text" class="form-control" id="name" placeholder="Nama Kompetensi" name="name" value="<?= $is_error ? $this->session->inputs['name'] : ($is_edit ? $item->name : '') ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="code">Code Kompetensi</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bi bi-upc"></i></span>
                </div>
                <input type="text" class="form-control" id="code" placeholder="code Kompetensi" name="code" value="<?= $is_error ? $this->session->inputs['code'] : ($is_edit ? $item->code : '') ?>">
            </div>
        </div>
    </div>
    <br>
    <a href="<?= site_url("vocation") ?>" class="btn btn-secondary" title="Kembali">Kembali</a>
    <button class="btn btn-dark" title="Simpan">Simpan</button>
</form>
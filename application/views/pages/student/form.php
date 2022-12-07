<?php
    // cek keberadan variabel edit
    $is_edit    = isset($item);
    // cek session error
    $is_error   = $this->session->errors;
    // membuat target url
    $target_url = $is_edit ? "student/update_process/$item->id" : "student/create_process";
?>

<h2 class="my-3"> <?= $is_edit ? "Edit" : "Tambah"; ?> Siswa </h2>

<?php if($is_error) : ?>
    <div class="alert alert-danger">
        <?= $is_error ?>
    </div>
<?php endif; ?>

<form action="<?= site_url($target_url) ?>" method="POST">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="fullname">Nama Lengkap</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                </div>
                <input type="text" class="form-control" id="fullname" placeholder="Nama Lengkap" name="fullname" value="<?= $is_error ? $this->session->inputs['fullname'] : ($is_edit ? $item->fullname : '') ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="nis">NIS</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bi bi-upc"></i></span>
                </div>
                <input type="text" class="form-control" id="nis" placeholder="Nomor Induk Siswa" name="nis" value="<?= $is_error ? $this->session->inputs['nis'] : ($is_edit ? $item->nis : '') ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                </div>
                <select class="form-control" id="gender" name="gender">
                    <option value="">--- Pilih Salah Satu ---</option>
                    <option value="L" <?= $is_error && $this->session->inputs['gender'] === "L" ? "selected" : ($is_edit && $item->gender === "L" ? "selected" : '') ?>> Laki-laki </option>
                    <option value="P" <?= $is_error && $this->session->inputs['gender'] === "P" ? "selected" : ($is_edit && $item->gender === "P" ? "selected" : '') ?>> Perempuan </option>
                </select>
            </div>
        </div>
    </div>
    <br>
    <a href="<?= site_url("student") ?>" class="btn btn-secondary" title="Kembali">Kembali</a>
    <button class="btn btn-dark" title="Simpan">Simpan</button>
</form>
<?php
    // cek keberadan variabel edit
    $is_edit    = isset($item);
    // cek session error
    $is_error   = $this->session->errors;
    // membuat target url
    $target_url = $is_edit ? "classes/update_process/$item->id" : "classes/create_process";
?>

<h2 class="my-3"> <?= $is_edit ? "Edit Setingan" : "Tambah Setingan"; ?> Kelas </h2>

<?php if($is_error) : ?>
    <div class="alert alert-danger">
        <?= $is_error ?>
    </div>
<?php endif; ?>

<form action="<?= site_url($target_url) ?>" method="POST">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="team_id">Angkatan</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bi bi-bookmark-fill"></i></span>
                </div>
                <select class="form-control" id="team_id" name="team_id">
                    <option value="">--- Pilih Salah Satu ---</option>
                    <?php foreach ($team_options as $team_opt) : ?>
                        <option value="<?= $team_opt->id?>" <?= $is_edit && $item->team_id === $team_opt->id ? "selected" : '' ?>><?= $team_opt->title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="year_id">Tahun Pelajaran</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bi bi-calendar2-range-fill"></i></span>
                </div>
                <select class="form-control" id="year_id" name="year_id">
                    <option value="">--- Pilih Salah Satu ---</option>
                    <?php foreach ($year_options as $year_opt) : ?>
                        <option value="<?= $year_opt->id?>" <?= $is_edit && $item->year_id == $year_opt->id ? "selected" : '' ?>><?= $year_opt->year ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="level_id">Tingkat</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="bi bi-clipboard2-data-fill"></i></span>
                </div>
                <select class="form-control" id="level_id" name="level_id">
                    <option value="">--- Pilih Salah Satu ---</option>
                    <?php foreach ($level_options as $level_opt) : ?>
                        <option value="<?= $level_opt->id?>" <?= $is_edit && $item->level_id === $level_opt->id ? "selected" : '' ?>><?= $level_opt->level ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <br>
    <a href="<?= site_url("classes") ?>" class="btn btn-secondary" title="Kembali">Kembali</a>
    <button class="btn btn-dark" title="Simpan">Simpan</button>
</form>

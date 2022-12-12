<?php
    // cek session error
    $is_error   = $this->session->errors;
?>

<center>
    <h2 class="my-3"> Pilih Kelas </h2>
</center>

<?php if($is_error) : ?>
    <div class="alert alert-danger">
        <?= $is_error ?>
    </div>
<?php endif; ?>

<center>
    <div class="container">
        <form action="<?= site_url("student/absen") ?>" method="POST">
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label for="year_id">Tahun Pelajaran</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bi bi-calendar2-range-fill"></i></span>
                        </div>
                        <select class="form-control" id="year_id" name="year_id">
                            <option value="">--- Pilih Salah Satu ---</option>
                            <?php foreach ($year_options as $year_opt) : ?>
                                <option value="<?= $year_opt->id?>" <?= $is_error && $this->session->inputs['year_id'] === $year_opt->id ? "selected" : '' ?>><?= $year_opt->year ?></option>
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
                                <option value="<?= $level_opt->id?>" <?= $is_error && $this->session->inputs['level_id'] === $level_opt->id ? "selected" : '' ?>><?= $level_opt->level ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="vocation_id">Kompetensi-Rombel</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="bi bi-signpost-2-fill"></i></span>
                        </div>
                        <select class="form-control" id="vocation_id" name="vocation_id">
                            <option value="">--- Pilih Salah Satu ---</option>
                            <?php foreach ($vocation_options as $vocation_opt) : ?>
                                <option value="<?= $vocation_opt->id?>" <?= $is_error && $this->session->inputs['vocation_id'] === $vocation_opt->id ? "selected" : '' ?>><?= $vocation_opt->code ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <button class="btn btn-dark" title="Simpan">Tampilkan</button>
        </form>
    </div>
</center>

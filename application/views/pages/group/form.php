<?php
    // cek keberadan variabel edit
    $is_edit    = isset($item);
    // cek session error
    $is_error   = $this->session->errors;
    // membuat target url
    $target_url = $is_edit ? "group/update_process/$item->id" : "group/create_process";
?>

<h2 class="my-3"> <?= $is_edit ? "Edit" : "Tambah"; ?> Group </h2>

<?php if($is_error) : ?>
    <div class="alert alert-danger">
        <?= $is_error ?>
    </div>
<?php endif; ?>

<form action="<?= site_url($target_url) ?>" method="POST">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="student_id">Siswa</label>
            <div class="input-group mb-3">
                <select class="form-control" id="student_id" name="student_id">
                    <option value=""></option>
                    <?php foreach ($student_options as $student_opt) : ?>
                        <option value="<?= $student_opt->id?>" <?= $is_error && $this->session->inputs['student_id'] === $student_opt->id ? "selected" : ($is_edit && $item->student_id === $student_opt->id ? "selected" : '') ?>><?= $student_opt->nis." / ".$student_opt->fullname ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="vocation_id">Kompetensi-Rombel</label>
            <div class="input-group mb-3">
                <select class="form-control" id="vocation_id" name="vocation_id">
                    <option value=""></option>
                    <?php foreach ($vocation_options as $vocation_opt) : ?>
                        <option value="<?= $vocation_opt->id?>" <?= $is_error && $this->session->inputs['vocation_id'] === $vocation_opt->id ? "selected" : ($is_edit && $item->vocation_id == $vocation_opt->id ? "selected" : '') ?>><?= $vocation_opt->code ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="team_id">Angkatan</label>
            <div class="input-group mb-3">
                <select class="form-control" id="team_id" name="team_id">
                    <option value=""></option>
                    <?php foreach ($team_options as $team_opt) : ?>
                        <option value="<?= $team_opt->id?>" <?= $is_error && $this->session->inputs['team_id'] === $team_opt->id ? "selected" : ($is_edit && $item->team_id === $team_opt->id ? "selected" : '') ?>><?= $team_opt->title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <br>
    <a href="<?= site_url("group") ?>" class="btn btn-secondary" title="Kembali">Kembali</a>
    <button class="btn btn-dark" title="Simpan">Simpan</button>
</form>

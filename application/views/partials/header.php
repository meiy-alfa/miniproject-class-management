<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Manajemen Kelas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= site_url('student') ?>">Siswa</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Atribut</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?= site_url('team') ?>">Angkatan</a>
          <a class="dropdown-item" href="<?= site_url('year') ?>">Tahun Pelajaran</a>
          <a class="dropdown-item" href="<?= site_url('vocation') ?>">Kompetensi</a>
          <a class="dropdown-item" href="<?= site_url('level') ?>">Tingkat</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Seting</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?= site_url('group') ?>">Group</a>
          <a class="dropdown-item" href="<?= site_url('classes') ?>">Kelas</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

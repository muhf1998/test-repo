<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">BKD - Dosen |</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= isset($data['page']) && $data['page'] == 'Home' ? 'active' : '' ?>" aria-current="page" href="<?= BASEURL; ?>AdminController">Home</a>
        </li>
        <?php if ($_SESSION['user']['role'] == 'Admin') : ?>
          <li class="nav-item">
            <a class="nav-link <?= isset($data['page']) && $data['page'] == 'Kegiatan Dosen' ? 'active' : '' ?>" href="<?= BASEURL; ?>AdminController/input_kegiatan_dosen">Input Kegiatan Dosen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= isset($data['page']) && $data['page'] == 'Rekap Laporan' ? 'active' : '' ?>" href="<?= BASEURL; ?>AdminController/rekap_laporan_kegiatan">Rekap Laporan Kegiatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= isset($data['page']) && $data['page'] == 'Manajemen Pengguna' ? 'active' : '' ?>" href="<?= BASEURL; ?>AdminController/manajemen_pengguna/Admin">Manajemen Pengguna</a>
          </li>
        <?php endif ?>
        <?php if ($_SESSION['user']['role'] == 'Dosen') : ?>
          <li class="nav-item">
            <a class="nav-link <?= isset($data['page']) && $data['page'] == 'Laporan Kegiatan' ? 'active' : '' ?>" href="<?= BASEURL; ?>UserController/laporan_kegiatan">Laporan Kegiatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= isset($data['page']) && $data['page'] == 'Ubah Profile' ? 'active' : '' ?>" href="<?= BASEURL; ?>AuthController/ubah_profile/<?= $_SESSION['user']['id'] ?>/<?= $_SESSION['user']['role'] ?>">Ubah Profile</a>
          </li>
        <?php endif ?>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <div class="dropdown menu-my-dropdown">
            <a href="#" class="dropdown-toggle text-dark menu-dropdown" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?= $_SESSION['user']['nama'] ?>
            </a>

            <div class="dropdown-menu menu-menu dropdown-menu-right" aria-label="dropdownMenuLink">
              <a class="dropdown-item" href="<?= BASEURL; ?>AuthController/logout">logout</a>
            </div>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-3">
        <li class="nav-item">
          <img src="<?= BASEURL . $_SESSION['user']['foto'] ?>" alt="Profile" class="img-fluid rounded-circle" style="width: 40px; height: 40px">
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main -->
<div class="container-fluid">
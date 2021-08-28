<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card card-outline card-primary mt-3">
            <div class="card-header">
                Detail Pengguna
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body text-center">
                        <?php if ($data['user']['foto'] == '' || $data['user']['foto'] == null) { ?>
                            Tidak ada foto profile
                        <?php } else { ?>
                            <img src="<?= BASEURL . $data['user']['foto'] ?>" alt="" class="w-100 rounded">
                        <?php } ?>
                        <a href="<?= BASEURL; ?>AuthController/ubah_profile/<?= $data['user']['id'] ?>/<?= $data['user']['role'] ?>" class="badge badge-warning py-2 px-3 mt-4 w-100">Edit</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group small-line-height">
                            <label for="Nama">Nama</label>
                            <br>
                            <small><?= $data['user']['nama'] . ',' . $data['user']['gelar_depan'] . ',' . $data['user']['gelar_belakang'] . '.' ?></small>
                        </div>
                        <div class="form-group small-line-height">
                            <label for="Tgl Lahir">Tempat/Tgl Lahir</label>
                            <br>
                            <small><?= $data['user']['tempat_lahir'] . ', ' . $data['user']['tgl_lahir'] ?></small>
                        </div>
                        <div class="form-group small-line-height">
                            <label for="Nip">Nip</label>
                            <br>
                            <small><?= $data['user']['NIP'] ?></small>
                        </div>
                        <div class="form-group small-line-height">
                            <label for="Email">Email</label>
                            <br>
                            <small><?= $data['user']['email'] ?></small>
                        </div>
                        <div class="form-group small-line-height">
                            <label for="Password">Password</label>
                            <br>
                            <small><?= $data['user']['password'] ?></small>
                            <br>
                            <a href="<?= BASEURL ?>UserController/getPassword/<?= $data['user']['id'] ?>" class="badge badge-warning">Lupa Password</a>
                        </div>
                        <div class="form-group small-line-height">
                            <label for="No Hp">No Hp</label>
                            <br>
                            <small><?= $data['user']['no_hp'] ?></small>
                        </div>
                        <div class="form-group small-line-height">
                            <label for="Gelar Depan">Gelar Depan</label>
                            <br>
                            <small><?= $data['user']['gelar_depan'] ?></small>
                        </div>
                        <div class="form-group small-line-height">
                            <label for="Gelar Belakang">Gelar Belakang</label>
                            <br>
                            <small><?= $data['user']['gelar_belakang'] ?></small>
                        </div>
                        <div class="form-group small-line-height">
                            <label for="Alamat">Alamat PT</label>
                            <br>
                            <small><?= $data['user']['alamat_pt'] ?></small>
                        </div>
                        <div class="form-group small-line-height">
                            <label for="Jabatan Fungsional">Jabatan Fungsional</label>
                            <br>
                            <small><?= $data['user']['jabatan_fungsional'] ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
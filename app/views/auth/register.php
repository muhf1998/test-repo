<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="mt-4">
            <?= Flash::flasher() ?>
        </div>
        <div class="card mt-4 card-outline card-primary">
            <div class="card-body p-3">
                <div class="text-center">
                    <h2>Manajemen Pengguna Dosen</h2>
                </div>
            </div>
        </div>
        <div class="card mt-1">
            <div class="card-body">
                <form action="<?= BASEURL; ?>AuthController/register_proses/<?= $data['role'] ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group mt-2">
                        <label for="title">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control w-75" value="<?= isset($data['data_old']['nama']) ? $data['data_old']['nama'] : '' ?>" required placeholder="...">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">Gelar Depan</label>
                        <input type="text" name="gelar_depan" id="gelar_depan" class="form-control w-50" value="<?= isset($data['data_old']['gelar_depan']) ? $data['data_old']['gelar_depan'] : '' ?>" required placeholder="...">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">Gelar Belakang</label>
                        <input type="text" name="gelar_belakang" id="gelar_belakang" class="form-control w-25" value="<?= isset($data['data_old']['gelar_belakang']) ? $data['data_old']['gelar_belakang'] : '' ?>" required placeholder="...">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">Alamat PT</label>
                        <input type="text" name="alamat_pt" id="alamat_pt" class="form-control" value="<?= isset($data['data_old']['alamat_pt']) ? $data['data_old']['alamat_pt'] : '' ?>" required placeholder="...">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">Jabatan Fungsional</label>
                        <input type="text" name="jabatan_fungsional" id="jabatan_fungsional" class="form-control" value="<?= isset($data['data_old']['jabatan_fungsional']) ? $data['data_old']['jabatan_fungsional'] : '' ?>" required placeholder="...">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control w-50" value="<?= isset($data['data_old']['tempat_lahir']) ? $data['data_old']['tempat_lahir'] : '' ?>" required placeholder="...">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">Tanggal Lahir</label>
                        <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control w-25" value="<?= isset($data['data_old']['tgl_lahir']) ? $data['data_old']['tgl_lahir'] : '' ?>" required placeholder="...">
                    </div>
                    <!-- Label Riwayat pendidikan -->
                    <hr>
                    <label for="title">Riwayat Pendidikan</label>
                    <div class="form-group mt-2">
                        <label for="title">S1</label>
                        <input type="text" name="s1" id="s1" class="form-control" value="<?= isset($data['data_old']['s1']) ? $data['data_old']['s1'] : '' ?>" placeholder="...">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">S2</label>
                        <input type="text" name="s2" id="s2" class="form-control" value="<?= isset($data['data_old']['s2']) ? $data['data_old']['s2'] : '' ?>" placeholder="...">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">S3</label>
                        <input type="text" name="s3" id="s3" class="form-control" value="<?= isset($data['data_old']['s3']) ? $data['data_old']['s3'] : '' ?>" placeholder="...">
                    </div>
                    <!-- Lainnya -->
                    <hr>
                    <label for="title">Lainnya</label>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group mt-2">
                                <label for="title">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="<?= isset($data['data_old']['email']) ? $data['data_old']['email'] : '' ?>" required placeholder="...">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mt-2">
                                <label for="title">Password</label>
                                <input type="password" name="password" id="password" class="form-control" value="<?= isset($data['data_old']['password']) ? $data['data_old']['password'] : '' ?>" required placeholder="...">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mt-2">
                                <label for="title">No Hp</label>
                                <input type="number" name="no_hp" id="no_hp" class="form-control" value="<?= isset($data['data_old']['no_hp']) ? $data['data_old']['no_hp'] : '' ?>" required placeholder="...">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mt-2">
                                <label for="title">NIP</label>
                                <input type="number" name="nip" id="nip" class="form-control" value="<?= isset($data['data_old']['no_hp']) ? $data['data_old']['no_hp'] : '' ?>" required placeholder="...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">Foto</label>
                        <input type="file" name="file" id="file" class="form-control" required placeholder="...">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary px-4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
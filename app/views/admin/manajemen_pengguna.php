<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="mt-4">
            <?= Flash::flasher() ?>
        </div>
        <div class="card mt-4 card-outline card-primary">
            <div class="card-body p-3">
                <div class="text-center">
                    <h2>Manajemen Pengguna</h2>
                </div>
            </div>
        </div>
        <div class="card mt-1">
            <div class="card-header">
                <div class="float-left">
                    <a href="<?= BASEURL; ?>AdminController/manajemen_pengguna/Admin" class="btn btn-primary">Admin</a>
                    <a href="<?= BASEURL; ?>AdminController/manajemen_pengguna/Dosen" class="btn btn-primary">Dosen</a>
                </div>
                <div class="float-right">
                    <a href="<?= BASEURL; ?>authController/register/<?= $data['role']; ?>" class="btn btn-primary">Tambah </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama <?= $data['role'] ?></th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['users'] as $val) : ?>
                                <tr>
                                    <td><?= $data['no_users']++ ?></td>
                                    <td><?= $val['nama'] ?></td>
                                    <td>
                                        <a href="<?= BASEURL; ?>UserController/view_pengguna/<?= $val['id'] ?>/<?= $data['role'] ?>" class="badge badge-primary py-2 px-4">Lihat</a>
                                        <a href="<?= BASEURL; ?>AuthController/ubah_profile/<?= $val['id'] ?>/<?= $data['role'] ?>" class="badge badge-warning py-2 px-4">Edit</a>
                                        <?php if ($val['id'] != $_SESSION['user']['id']) { ?>
                                            <a href="<?= BASEURL; ?>UserController/deleteUser/<?= $val['id'] ?>/<?= $data['role'] ?>" class="badge badge-danger py-2 px-4">Hapus</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
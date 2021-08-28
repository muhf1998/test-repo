<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="mt-4">
            <?= Flash::flasher() ?>
        </div>
        <div class="card mt-4 card-outline card-primary">
            <div class="card-body p-3">
                <div class="text-center">
                    <h2>Rekap Kegiatan Dosen</h2>
                </div>
            </div>
        </div>
        <div class="card mt-1">
            <div class="card-header">
                <div class="float-right">
                    <a href="<?= BASEURL; ?>adminController/input_kegiatan_dosen" class="btn btn-primary">Tambah </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Laporan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['kegiatan_dosen'] as $val) { ?>
                                <tr>
                                    <td><?= $data['no']++ ?></td>
                                    <td><?= $val['nama'] ?></td>
                                    <td><?= $val['jenis_kegiatan'] ?></td>
                                    <td><?= $val['status'] == 0 ? 'Belum Dibaca' : 'Dibaca' ?></td>
                                    <td>
                                        <a href="<?= BASEURL; ?>AdminController/ubahKegiatanDosenForm/<?= $val['kegiatan_id'] ?>" class="badge badge-warning py-2 px-4">Edit</a>
                                        <?php if ($val['id'] != $_SESSION['user']['id']) { ?>
                                            <a href="<?= BASEURL; ?>AdminController/deleteKegiatanDosen/<?= $val['kegiatan_id'] ?>" class="badge badge-danger py-2 px-4">Hapus</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
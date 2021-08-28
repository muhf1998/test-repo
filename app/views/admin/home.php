<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card rounded-0 bg-primary mt-4">
            <div class="card-header">
                *Kegiatan
            </div>
            <div class="card-body bg-white p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Kegiatan</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['kegiatan_dosen'] as $val) { ?>
                                <tr>
                                    <td><?= $data['no']++ ?></td>
                                    <td><?= $val['jenis_kegiatan'] ?></td>
                                    <td><?= $val['nama'] ?></td>
                                    <td>
                                        <a href="<?= BASEURL . 'AdminController/detail_kegiatan_dosen/' . $val['kegiatan_id'] ?>" class="badge badge-primary py-2 px-2">Lihat</a>
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
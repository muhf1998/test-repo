<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="mt-4">
            <?= Flash::flasher() ?>
        </div>
        <div class="card mt-4 card-outline card-primary">
            <div class="card-body p-3">
                <div class="text-center">
                    <h2>Input Kegiatan Dosen</h2>
                </div>
            </div>
        </div>
        <div class="card mt-1">
            <div class="card-body">
                <input type="hidden" name="url" id="url" value="<?= BASEURL ?>">
                <form action="<?= BASEURL ?>AdminController/create_kegiatan_dosen" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Jenis Kegiatan</label>
                        <select name="jenis_kegiatan" id="jenis_kegiatan" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <?php foreach ($data['jenis_kegiatan'] as $val) { ?>
                                <option value="<?= $val['nama_jenis'] ?>"><?= $val['nama_jenis'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <hr>
                    <label for="Label">Beban Kerja</label>
                    <div class="form-group mt-2">
                        <label for="title">Nama Dosen</label>
                        <select name="id_dosen" id="id_dosen" class="form-control" required>
                            <option value="">--Pilih--</option>
                            <?php foreach ($data['dosen'] as $val) { ?>
                                <option value="<?= $val['id'] ?>"><?= $val['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">NIDN/NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control w-75" required placeholder="...">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">Bukti Penugasan</label>
                        <input type="file" name="bukti_penugasan" id="bukti_penugasan" class="form-control w-50" required placeholder="...">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">SKS</label>
                        <input type="number" name="sks" id="sks" class="form-control w-25" required placeholder="...">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">Masa Penugasan</label>
                        <input type="text" name="masa_penugasan" id="masa_penugasan" class="form-control" required placeholder="...">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">Kinerja</label>
                        <input type="text" name="kinerja" id="kinerja" class="form-control" required placeholder="...">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">Bukti Dokumen</label>
                        <input type="file" name="bukti_dokumen" id="bukti_dokumen" class="form-control w-50" required placeholder="...">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">SKS</label>
                        <input type="number" name="sks_2" id="sks_2" class="form-control w-25" required placeholder="...">
                    </div>
                    <div class="form-group mt-2">
                        <label for="title">Rekomendasi</label>
                        <input type="text" name="rekomendasi" id="rekomendasi" class="form-control" required placeholder="...">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary px-4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
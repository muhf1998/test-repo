<?php

class Kegiatan_Dosen_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll()
    {
        $query = "SELECT *, kegiatan_dosen.id as kegiatan_id FROM kegiatan_dosen INNER JOIN users ON users.id = kegiatan_dosen.users_id";

        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getByAkun($id)
    {
        $query = "SELECT *, kegiatan_dosen.id as kegiatan_id FROM kegiatan_dosen INNER JOIN users ON users.id = kegiatan_dosen.users_id WHERE kegiatan_dosen.users_id = '$id'";

        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $query = "SELECT *, kegiatan_dosen.id as kegiatan_id FROM kegiatan_dosen INNER JOIN users ON users.id = kegiatan_dosen.users_id WHERE kegiatan_dosen.id = '$id'";

        $this->db->query($query);
        return $this->db->single();
    }

    public function create($data, $obj = null)
    {
        $query = "INSERT INTO kegiatan_dosen VALUE ('', :users_id, :jenis_kegiatan, :bukti_penugasan, :sks, :masa_penugasan, :kinerja, :bukti_dokumen, :sks_2, :rekomendasi, :status, :created_at)";

        $this->db->query($query);
        $this->db->bind('users_id', $data['id_dosen']);
        $this->db->bind('jenis_kegiatan', $data['jenis_kegiatan']);
        $this->db->bind('bukti_penugasan', $obj['buktiPenugasan']);
        $this->db->bind('sks', (int) $data['sks']);
        $this->db->bind('masa_penugasan', $data['masa_penugasan']);
        $this->db->bind('kinerja', $data['kinerja']);
        $this->db->bind('bukti_dokumen', $obj['buktiDokumen']);
        $this->db->bind('sks_2', (int) $data['sks_2']);
        $this->db->bind('rekomendasi', $data['rekomendasi']);
        $this->db->bind('status', 0);
        $this->db->bind('created_at', date('d-m-Y'));
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update_kegiatan($data, $id, $obj = null)
    {
        $query = "UPDATE kegiatan_dosen SET jenis_kegiatan = :jenis_kegiatan, sks = :sks, masa_penugasan = :masa_penugasan, kinerja = :kinerja, sks_2 = :sks_2, rekomendasi = :rekomendasi WHERE id = '$id'";

        $this->db->query($query);
        $this->db->bind('jenis_kegiatan', $data['jenis_kegiatan']);
        $this->db->bind('sks', (int) $data['sks']);
        $this->db->bind('masa_penugasan', $data['masa_penugasan']);
        $this->db->bind('kinerja', $data['kinerja']);
        $this->db->bind('sks_2', (int) $data['sks_2']);
        $this->db->bind('rekomendasi', $data['rekomendasi']);
        $this->db->execute();

        if ($obj['buktiPenugasan'] != '') {
            $this->updateFilePenugasan($id, $obj);
        }

        if ($obj['buktiDokumen'] != '') {
            $this->updateFileDokumen($id, $obj);
        }

        return 1;
    }

    public function updateFilePenugasan($id, $obj)
    {
        $query = "UPDATE kegiatan_dosen SET bukti_penugasan = :bukti_penugasan WHERE id = '$id'";

        $this->db->query($query);
        $this->db->bind('bukti_penugasan', $obj['buktiPenugasan']);

        $this->db->execute();
    }

    public function updateFileDokumen($id, $obj)
    {
        $query = "UPDATE kegiatan_dosen SET bukti_dokumen = :bukti_dokumen WHERE id = '$id'";

        $this->db->query($query);
        $this->db->bind('bukti_dokumen', $obj['buktiDokumen']);

        $this->db->execute();
    }

    public function setReadStatus($id)
    {
        $query = "UPDATE kegiatan_dosen SET status = :status WHERE id = '$id'";

        $this->db->query($query);
        $this->db->bind('status', 1);

        $this->db->execute();
        return 1;
    }

    public function delete($id)
    {
        $query = "DELETE FROM kegiatan_dosen WHERE id = '$id'";

        $this->db->query($query);
        $this->db->execute();

        return $this->db->rowCount();
    }
}

<?php

class AdminController extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            header('location: ' . BASEURL . 'AuthController');
            exit;
        }
    }

    public function index()
    {
        $data['page'] = 'Home';

        if ($_SESSION['user']['role'] == 'Admin') {
            $data['kegiatan_dosen'] = $this->model('Kegiatan_Dosen_Model')->getAll();
        } else {
            $data['kegiatan_dosen'] = $this->model('Kegiatan_Dosen_Model')->getByAkun($_SESSION['user']['id']);
        }
        $data['no'] = 1;

        $this->view('templates/header');
        $this->view('templates/navbar', $data);
        $this->view('admin/home', $data);
        $this->view('templates/footer');
    }

    public function input_kegiatan_dosen()
    {
        $data['page'] = 'Kegiatan Dosen';
        $data['jenis_kegiatan'] = $this->model('jenis_kegiatan')->getData();
        if ($_SESSION['user']['role'] == 'Admin') {
            $data['dosen'] = $this->model('Users_Model')->getByRole('Dosen');
        } else {
            $data['dosen'] = $this->model('Users_Model')->getUsersWhereId($_SESSION['user']['id']);
        }

        $this->view('templates/header');
        $this->view('templates/navbar', $data);
        $this->view('admin/kegiatan_dosen', $data);
        $this->view('templates/footer');
    }

    public function create_kegiatan_dosen()
    {
        $buktiPenugasan = $this->uploadFile($_FILES['bukti_penugasan']);
        $buktiDokumen = $this->uploadFile($_FILES['bukti_dokumen']);

        $obj['buktiPenugasan'] = $buktiPenugasan;
        $obj['buktiDokumen'] = $buktiDokumen;

        if ($this->model('Kegiatan_Dosen_Model')->create($_POST, $obj) > 0) {
            Flash::setFlash('Berhasil', ' tambah data', 'success');
            header('location: ' . BASEURL . 'AdminController/input_kegiatan_dosen');
            exit;
        }

        $this->input_kegiatan_dosen();
    }

    public function detail_kegiatan_dosen($id)
    {
        if ($_SESSION['user']['role'] == 'Dosen') {
            $this->model('Kegiatan_Dosen_Model')->setReadStatus($id);
        }
        $data['kegiatan_dosen'] = $this->model('Kegiatan_Dosen_Model')->getById($id);
        $data['no'] = 'dslkfds';

        $this->view('templates/header');
        $this->view('templates/navbar', $data);
        $this->view('admin/detail_kegiatan_dosen', $data);
        $this->view('templates/footer');
    }

    public function rekap_laporan_kegiatan()
    {
        $data['page'] = 'Rekap Laporan';
        $data['kegiatan_dosen'] = $this->model('Kegiatan_Dosen_Model')->getAll();
        $data['no'] = 1;


        $this->view('templates/header');
        $this->view('templates/navbar', $data);
        $this->view('admin/laporan_kegiatan', $data);
        $this->view('templates/footer');
    }

    public function ubahKegiatanDosenForm($id)
    {
        $data['page'] = 'Edit Kegiatan Dosen';
        $data['kegiatan_dosen'] = $this->model('Kegiatan_Dosen_Model')->getById($id);
        $data['jenis_kegiatan'] = $this->model('jenis_kegiatan')->getData();
        $data['dosen'] = $this->model('Users_Model')->getByRole('Dosen');


        $this->view('templates/header');
        $this->view('templates/navbar', $data);
        $this->view('admin/edit_kegiatan_dosen', $data);
        $this->view('templates/footer');
    }

    public function editKegiatanDosen($id)
    {
        $buktiPenugasan = $this->uploadFile($_FILES['bukti_penugasan']);
        $buktiDokumen = $this->uploadFile($_FILES['bukti_dokumen']);

        $file = $this->model('Kegiatan_Dosen_Model')->getById($id);

        if ($buktiPenugasan != '') {
            $this->unlink($file['bukti_penugasan']);
        }

        if ($buktiDokumen != '') {
            $this->unlink($file['bukti_dokumen']);
        }

        $obj['buktiPenugasan'] = $buktiPenugasan;
        $obj['buktiDokumen'] = $buktiDokumen;

        if ($this->model('Kegiatan_Dosen_Model')->update_kegiatan($_POST, $id, $obj) > 0) {
            Flash::setFlash('Berhasil', ' edit data', 'success');
            header('location: ' . BASEURL . 'AdminController/rekap_laporan_kegiatan');
            exit;
        }
    }

    public function deleteKegiatanDosen($id)
    {
        $file = $this->model('Kegiatan_Dosen_Model')->getById($id);

        $this->unlink($file['bukti_penugasan']);
        $this->unlink($file['bukti_dokumen']);

        if ($this->model('Kegiatan_Dosen_Model')->delete($id) > 0) {
            Flash::setFlash('Berhasil', ' hapus data', 'success');
            header('location: ' . BASEURL . 'AdminController/rekap_laporan_kegiatan');
            exit;
        }
    }

    public function manajemen_pengguna($role = null)
    {
        $data['page'] = 'Manajemen Pengguna';
        $data['role'] = $role;
        $data['users'] = $this->model('Users_Model')->getUsers($role);
        $data['no_users'] = 1;

        $this->view('templates/header');
        $this->view('templates/navbar', $data);
        $this->view('admin/manajemen_pengguna', $data);
        $this->view('templates/footer');
    }
}

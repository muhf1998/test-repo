<?php

class AuthController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['user'])) {
            header('location: ' . BASEURL . 'AdminController');
            exit;
        } else {
            $this->view('templates/header');
            $this->view('auth/index');
            $this->view('templates/footer');
        }
    }

    public function login()
    {
        $user = $this->model('Users_Model')->getLogin($_POST);
        if ($user) {
            $_SESSION['user'] = $user;
            header('location: ' . BASEURL . 'AdminController');
            exit;
        } else {
            Flash::setFlash('Gagal Login,', 'Periksa Kembali Email Dan Password', 'danger');
            header('location: ' . BASEURL . 'AuthController');
            exit;
        }
    }

    public function register($role = null)
    {
        $data['role'] = $role;
        $data['data_old'] = $_POST;

        $this->view('templates/header');
        $this->view('templates/navbar');
        $this->view('auth/register', $data);
        $this->view('templates/footer');
    }

    public function register_proses($role)
    {
        $user = $this->model('Users_Model')->getUserByEmail($_POST['email']);
        if (!$user) {
            $file = $this->uploadImage($_FILES['file']);
            if ($file != '') {
                if ($this->model('Auth_Model')->register($_POST, $role, $file) > 0) {
                    $users_id = $this->model('Users_Model')->getUserByDesc();
                    if ($this->model('Riwayat_Pendidikan_Model')->add($_POST, $users_id['id']) > 0) {
                        Flash::setFlash('Berhasil', ' tambah data', 'success');
                        header('location: ' . BASEURL . 'AdminController/manajemen_pengguna/' . $role);
                        exit;
                    }
                    $this->register($role);
                }
                $this->register($role);
            }
            $this->register($role);
        } else {
            Flash::setFlash('Email sudah terdaftar,', ' Gagal tambah pengguna', 'danger');
            $this->register($role);
        }
    }

    public function ubah_profile($id = null, $role = null)
    {
        $data['page'] = 'Ubah Profile';
        $data['role'] = $role;
        $data['user'] = $this->model('Users_Model')->getUsersById($id);
        $data['riwayat_pendidikan'] = $this->model('Riwayat_Pendidikan_Model')->riwayat_pendidikan($data['user']['id']);

        $this->view('templates/header');
        $this->view('templates/navbar', $data);
        $this->view('auth/ubah_profile', $data);
        $this->view('templates/footer');
    }

    public function ubah_profile_proses($id, $role = null)
    {

        $file = $this->uploadImage($_FILES['file']);
        $user = $this->model('Users_Model')->getUsersById($id);

        if ($file != '') {
            $this->unlink($user['foto']);
        }

        if ($this->model('Users_Model')->update_user($_POST, $id, $file) > 0) {
            if ($this->model('Riwayat_Pendidikan_Model')->update($_POST, $id) > 0) {
                Flash::setFlash('Berhasil', ' ubah profile', 'success');
                header('location: ' . BASEURL . 'AdminController/manajemen_pengguna/' . $role);
                exit;
            }
            $this->ubah_profile($id, $role);
        }

        $this->ubah_profile($id, $role);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_unset();
        session_destroy();

        header('location: ' . BASEURL . 'AuthController');
        exit;
    }
}

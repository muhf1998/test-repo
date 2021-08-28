<?php

class UserController extends Controller
{
    public function laporan_kegiatan()
    {
        $data['page'] = 'Laporan Kegiatan';
        $data['kegiatan_dosen'] = $this->model('Kegiatan_Dosen_Model')->getByAkun($_SESSION['user']['id']);
        $data['no'] = 1;

        $this->view('templates/header');
        $this->view('templates/navbar', $data);
        $this->view('user/laporan_kegiatan', $data);
        $this->view('templates/footer');
    }

    public function deleteUser($id, $role)
    {
        $user = $this->model('Users_Model')->getUsersById($id);

        $this->unlink($user['foto']);

        if ($this->model('Users_Model')->delete($id) > 0) {
            header('location: ' . BASEURL . 'AdminController/manajemen_pengguna/' . $role);
            exit;
        }
    }

    public function getDosen($id)
    {
        $user = $this->model('Users_Model')->getUsersById($id);
        echo json_encode($user);
    }

    public function view_pengguna($id, $role)
    {
        $data['page'] = 'Manajemen Pengguna';
        $data['user'] = $this->model('Users_Model')->getUsersById($id);

        $this->view('templates/header');
        $this->view('templates/navbar', $data);
        $this->view('user/view_pengguna', $data);
        $this->view('templates/footer');
    }

    public function getPassword($id)
    {
        $data['page'] = 'Manajemen Pengguna';
        $data['user'] = $this->model('Users_Model')->getUsersById($id);

        $this->view('templates/header');
        $this->view('templates/navbar', $data);
        $this->view('user/getPassword', $data);
        $this->view('templates/footer');
    }

    public function gantiPassword($id)
    {
        $user = $this->model('Users_Model')->getUsersById($id);

        $this->model('Users_Model')->gantiPassword($_POST, $id);
        header('location: ' . BASEURL . 'UserController/view_pengguna/' . $user['id'] . '/' . $user['role']);
        exit;
    }
}

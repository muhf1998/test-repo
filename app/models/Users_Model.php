<?php

class Users_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUsers($role)
    {
        $query = "SELECT * FROM users WHERE users.role = '$role'";

        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getUsersWhereId($id)
    {
        $query = "SELECT * FROM users WHERE users.id = '$id'";

        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getUsersById($id)
    {
        $query = "SELECT * FROM users WHERE users.id = '$id'";

        $this->db->query($query);
        return $this->db->single();
    }

    public function getLogin($data)
    {

        $email = $data['email'];
        $password = md5($data['password']);

        $query = "SELECT * FROM users WHERE users.email = '$email' AND users.password = '$password'";

        $this->db->query($query);
        return $this->db->single();
    }

    public function getByRole($role)
    {
        $query = "SELECT * FROM users WHERE users.role = '$role'";

        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getUserByEmail($email)
    {

        $query = "SELECT * FROM users WHERE users.email = '$email'";

        $this->db->query($query);
        return $this->db->single();
    }

    public function getUserByDesc()
    {
        $query = "SELECT * FROM users ORDER BY id DESC";

        $this->db->query($query);
        return $this->db->single();
    }

    public function update_user($data, $id, $file = '')
    {
        $query = "UPDATE users SET nama = :nama, NIP = :NIP, no_hp = :no_hp, gelar_depan = :gelar_depan, gelar_belakang = :gelar_belakang, alamat_pt = :alamat_pt, jabatan_fungsional = :jabatan_fungsional, tempat_lahir = :tempat_lahir, tgl_lahir = :tgl_lahir WHERE id = '$id'";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('NIP', $data['nip']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('gelar_depan', $data['gelar_depan']);
        $this->db->bind('gelar_belakang', $data['gelar_belakang']);
        $this->db->bind('alamat_pt', $data['alamat_pt']);
        $this->db->bind('jabatan_fungsional', $data['jabatan_fungsional']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);

        $this->db->execute();

        if ($file != '') {
            $this->updateFoto($id, $file);
        }

        return 1;
    }

    public function updateFoto($id, $file = '')
    {
        $query = "UPDATE users SET foto = :foto WHERE id = '$id'";

        $this->db->query($query);
        $this->db->bind('foto', $file);

        $this->db->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id = '$id'";

        $this->db->query($query);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function gantiPassword($data, $id)
    {
        $password = md5($data['password']);

        $query = "UPDATE users SET password = :password WHERE id = '$id'";

        $this->db->query($query);
        $this->db->bind('password', $password);

        $this->db->execute();
    }
}

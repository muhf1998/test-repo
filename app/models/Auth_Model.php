<?php

class Auth_Model
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data, $role, $file = null)
    {
        $query = "INSERT INTO users VALUE ('', :foto, :nama, :NIP, :email, :password, :no_hp, :gelar_depan, :gelar_belakang, :alamat_pt, :jabatan_fungsional, :tempat_lahir, :tgl_lahir, :role)";

        $this->db->query($query);
        $this->db->bind('foto', $file);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('NIP', $data['nip']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', md5($data['password']));
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('gelar_depan', $data['gelar_depan']);
        $this->db->bind('gelar_belakang', $data['gelar_belakang']);
        $this->db->bind('alamat_pt', $data['alamat_pt']);
        $this->db->bind('jabatan_fungsional', $data['jabatan_fungsional']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('role', $role);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

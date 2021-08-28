<?php

class Riwayat_Pendidikan_Model
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function add($data, $users_id)
    {
        $query = "INSERT INTO riwayat_pendidikan VALUE ('', :users_id,:s1, :s2, :s3, '', '')";

        $this->db->query($query);
        $this->db->bind('users_id', $users_id);
        $this->db->bind('s1', $data['s1']);
        $this->db->bind('s2', $data['s2']);
        $this->db->bind('s3', $data['s3']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function riwayat_pendidikan($users_id)
    {
        $query = "SELECT * FROM riwayat_pendidikan WHERE users_id = '$users_id'";

        $this->db->query($query);
        return $this->db->single();
    }

    public function update($data, $id)
    {
        $query = "UPDATE riwayat_pendidikan SET s1 = :s1, s2 = :s2, s3 = :s3 WHERE users_id = '$id'";

        $this->db->query($query);
        $this->db->bind('s1', $data['s1']);
        $this->db->bind('s2', $data['s2']);
        $this->db->bind('s3', $data['s3']);

        $this->db->execute();

        return 1;
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class TargetNotifikasiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_target_notifikasi';
    protected $primaryKey       = 'id_target_notifikasi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_notifikasi', 'id_user', 'jadwal_notifikasi', 'jenis_notifikasi', 'status_notifikasi'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getTargetNotifikasiByIdNotifikasi($id_notifikasi)
    {
        // Manual atau Query Builder
        $query = $this->db->query("SELECT * FROM tbl_target_notifikasi as a inner join tbl_user as b on a.id_user = b.id where a.id_notifikasi = '$id_notifikasi'");
        return $query->getResult(); // return berupa array objek
    }

    public function countByIdUser()
    {
        $id_user = session()->get('id');
        // Manual atau Query Builder
        $query = $this->db->query("SELECT count(tbl_target_notifikasi.id_user) as total_notif FROM tbl_target_notifikasi INNER JOIN tbl_notifikasi ON tbl_target_notifikasi.id_notifikasi = tbl_notifikasi.id_notifikasi WHERE tbl_target_notifikasi.id_user = '$id_user' AND tbl_target_notifikasi.status_notifikasi = 1 AND tbl_target_notifikasi.jenis_notifikasi = 1");
        return $query->getResult(); // return berupa array objek
    }

    public function getNotifikasiByIdUserLogin()
    {
        $id_user = session()->get('id');
        // Manual atau Query Builder
        $query = $this->db->query("SELECT tbl_target_notifikasi.id_target_notifikasi, tbl_target_notifikasi.jenis_notifikasi, tbl_notifikasi.pesan_notifikasi, tbl_notifikasi.judul_notifikasi, tbl_notifikasi.created_at FROM tbl_target_notifikasi INNER JOIN tbl_notifikasi ON tbl_target_notifikasi.id_notifikasi = tbl_notifikasi.id_notifikasi WHERE tbl_target_notifikasi.id_user = '$id_user' AND tbl_target_notifikasi.status_notifikasi = 1 AND tbl_target_notifikasi.jenis_notifikasi = 1 ORDER BY tbl_notifikasi.created_at DESC LIMIT 5 ");
        return $query->getResult(); // return berupa array objek
    }

    public function getNotifikasiByIdUserLoginAll()
    {
        $id_user = session()->get('id');
        // Manual atau Query Builder
        $query = $this->db->query("SELECT tbl_target_notifikasi.id_target_notifikasi, tbl_target_notifikasi.jenis_notifikasi, tbl_notifikasi.pesan_notifikasi, tbl_notifikasi.judul_notifikasi, tbl_notifikasi.created_at FROM tbl_target_notifikasi INNER JOIN tbl_notifikasi ON tbl_target_notifikasi.id_notifikasi = tbl_notifikasi.id_notifikasi WHERE tbl_target_notifikasi.id_user = '$id_user' AND tbl_target_notifikasi.status_notifikasi = 1 ORDER BY tbl_notifikasi.created_at DESC ");
        return $query->getResult(); // return berupa array objek
    }
}



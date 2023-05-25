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
}


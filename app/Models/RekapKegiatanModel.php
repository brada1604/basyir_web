<?php

namespace App\Models;

use CodeIgniter\Model;

class RekapKegiatanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_rekap_kegiatan';
    protected $primaryKey       = 'id_rekap_kegiatan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_amalan_yaumi','id_user','total_dilakukan','total_belum_dilakukan'];

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

    public function getRekapKegiatanByIdUser($id_user)
    {
        $query = $this->db->query("
            SELECT
                a.id_amalan_yaumi,
              IF ( a.id_amalan_yaumi = 1, 'Amalan Lain', a.judul_amalan_yaumi ) AS judul_amalan_yaumi_baru,
                (SELECT b.total_dilakukan FROM tbl_rekap_kegiatan as b WHERE b.id_user = '$id_user' AND b.id_amalan_yaumi = a.id_amalan_yaumi) as total_dilakukan_kegiatan,
                (SELECT b.total_belum_dilakukan FROM tbl_rekap_kegiatan as b WHERE b.id_user = '$id_user' AND b.id_amalan_yaumi = a.id_amalan_yaumi) as total_belum_dilakukan_kegiatan
            FROM
                tbl_amalan_yaumi as a 
            ");
        return $query->getResult(); // return berupa array objek
    }

}

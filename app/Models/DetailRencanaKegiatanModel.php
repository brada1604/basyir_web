<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailRencanaKegiatanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_detail_rencana_kegiatan';
    protected $primaryKey       = 'id_detail_rencana_kegiatan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_rencana_kegiatan', 'rencana_jadwal', 'realisasi_jadwal'];

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

    public function getDetailRencanaKegiatan($id_rencana_kegiatan, $id = false)
    {
        if ($id === false) {
            // return $this->findAll();

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_detail_rencana_kegiatan where id_rencana_kegiatan = '$id_rencana_kegiatan'");
            return $query->getResult(); // return berupa array objek

        } else {
            // return $this->getWhere(['id' => $id]);

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_detail_rencana_kegiatan where id_rencana_kegiatan = '$id_rencana_kegiatan' AND id_detail_rencana_kegiatan = '$id' ");
            return $query->getResult(); // return berupa array objek
        }
    }
}

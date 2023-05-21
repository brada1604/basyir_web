<?php

namespace App\Models;

use CodeIgniter\Model;

class RencanaKegiatanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_rencana_kegiatan';
    protected $primaryKey       = 'id_rencana_kegiatan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_rencana_kegiatan','id_user', 'id_amalan_yaumi','status_rencana_kegiatan'];

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

    public function getRencanaKegiatan($id = false)
    {
        $id_user = session()->get('role');
        if ($id === false) {
            // return $this->findAll();

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_rencana_kegiatan as a INNER JOIN tbl_user as b on a.id_user = b.id INNER join tbl_amalan_yaumi as c on a.id_amalan_yaumi = c.id_amalan_yaumi");
            return $query->getResult(); // return berupa array objek

        } else {
            // return $this->getWhere(['id' => $id]);

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_rencana_kegiatan as a INNER JOIN tbl_user as b on a.id_user = b.id INNER join tbl_amalan_yaumi as c on a.id_amalan_yaumi = c.id_amalan_yaumi where id_rencana_kegiatan = '$id' ");
            return $query->getResult(); // return berupa array objek
        }
    }
}

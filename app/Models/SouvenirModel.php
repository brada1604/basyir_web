<?php

namespace App\Models;

use CodeIgniter\Model;

class SouvenirModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_souvenir';
    protected $primaryKey       = 'idbrg';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['namabrg','harga','diskon','stok','namafile'];

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

    public function getSouvenir($id = false)
    {
        if ($id === false) {
            // return $this->findAll();

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_souvenir");
            return $query->getResult(); // return berupa array objek

        } else {
            // return $this->getWhere(['id' => $id]);

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_souvenir where idbrg = '$id' ");
            return $query->getResult(); // return berupa array objek
        }
    }
}

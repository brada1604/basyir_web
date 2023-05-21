<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriWawasanIslamiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_kategori_wawasan_islami';
    protected $primaryKey       = 'id_kategori_wawasan_islami';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_kategori_wawasan_islami', 'status_kategori_wawasan_islami'];

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

    public function getKategoriWawasanIslami($id = false)
    {
        if ($id === false) {
            // return $this->findAll();

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_kategori_wawasan_islami");
            return $query->getResult(); // return berupa array objek

        } else {
            // return $this->getWhere(['id' => $id]);

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_kategori_wawasan_islami where id_kategori_wawasan_islami = '$id' ");
            return $query->getResult(); // return berupa array objek
        }
    }

    public function getKategoriWawasanIslamiForm($id = false)
    {
        if ($id === false) {
            // return $this->findAll();

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_kategori_wawasan_islami where status_kategori_wawasan_islami = '1'");
            return $query->getResult(); // return berupa array objek

        } else {
            // return $this->getWhere(['id' => $id]);

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_kategori_wawasan_islami where status_kategori_wawasan_islami = '1' AND id_kategori_wawasan_islami = '$id' ");
            return $query->getResult(); // return berupa array objek
        }
    }
}

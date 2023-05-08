<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_berita';
    protected $primaryKey       = 'id_berita';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'judul_berita', 'ringkasan_berita', 'konten_berita', 'gambar_berita', 'video_berita', 'status_berita'];

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

    public function getBerita($id = false)
    {
        $id_user = session()->get('id');
        $role_user = session()->get('role');
        if ($id === false) {
            // return $this->findAll();

            if ($role_user == 1) {
                // Manual atau Query Builder
                $query = $this->db->query("SELECT * FROM tbl_berita");
            } else {
                // Manual atau Query Builder
                $query = $this->db->query("SELECT * FROM tbl_berita where id_user = '$id_user'");
            }

            return $query->getResult(); // return berupa array objek

        } else {
            // return $this->getWhere(['id' => $id]);

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_berita where id_berita = '$id' ");
            return $query->getResult(); // return berupa array objek
        }
    }

    public function getBeritaLandingPage($id = false)
    {
        $id_user = session()->get('role');
        if ($id === false) {
            // return $this->findAll();

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_berita where status_berita = '2' ORDER BY created_at desc limit 3");
            return $query->getResult(); // return berupa array objek

        } else {
            // return $this->getWhere(['id' => $id]);

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_berita where id_berita = '$id' ");
            return $query->getResult(); // return berupa array objek
        }
    }

    public function countByStatus($status)
    {
        $id_user = session()->get('id');
        $role_user = session()->get('role');

        if ($role_user == 1) {
            $query = $this->db->query("SELECT count(id_berita) as total_berita FROM tbl_berita where status_berita = '$status'");
        } else {
            $query = $this->db->query("SELECT count(id_berita) as total_berita FROM tbl_berita where status_berita = '$status' AND id_user = '$id_user'");
        }

        return $query->getResult(); // return berupa array objek


    }
}

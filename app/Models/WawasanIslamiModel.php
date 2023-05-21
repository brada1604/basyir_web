<?php

namespace App\Models;

use CodeIgniter\Model;

class WawasanIslamiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_wawasan_islami';
    protected $primaryKey       = 'id_wawasan_islami';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["id_user", "id_kategori_wawasan_islami","judul_wawasan_islami", "slug_wawasan_islami", "ringkasan_wawasan_islami", "konten_wawasan_islami", "gambar_wawasan_islami", "video_wawasan_islami", "status_wawasan_islami",];

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

    public function getWawasanIslami($id = false)
    {
        $id_user = session()->get('id');
        $role_user = session()->get('role');
        if ($id === false) {
            // return $this->findAll();

            if ($role_user == 1) {
                // Manual atau Query Builder
                $query = $this->db->query("SELECT * FROM tbl_wawasan_islami as a INNER JOIN tbl_user as b on a.id_user = b.id INNER join tbl_kategori_wawasan_islami as c on a.id_kategori_wawasan_islami = c.id_kategori_wawasan_islami");
            } else {
                // Manual atau Query Builder
                $query = $this->db->query("SELECT * FROM tbl_wawasan_islami as a INNER JOIN tbl_user as b on a.id_user = b.id INNER join tbl_kategori_wawasan_islami as c on a.id_kategori_wawasan_islami = c.id_kategori_wawasan_islami where id_user = '$id_user'");
            }
            return $query->getResult(); // return berupa array objek

        } else {
            // return $this->getWhere(['id' => $id]);

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_wawasan_islami as a INNER JOIN tbl_user as b on a.id_user = b.id INNER join tbl_kategori_wawasan_islami as c on a.id_kategori_wawasan_islami = c.id_kategori_wawasan_islami where id_wawasan_islami = '$id' ");
            return $query->getResult(); // return berupa array objek
        }
    }

    public function getWawasanIslamiLandingPage($id = false)
    {
        if ($id === false) {
            // return $this->findAll();

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_wawasan_islami where status_wawasan_islami = '2' ORDER BY created_at desc limit 3");
            return $query->getResult(); // return berupa array objek

        } else {
            // return $this->getWhere(['id' => $id]);

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_wawasan_islami where id_wawasan_islami = '$id' ");
            return $query->getResult(); // return berupa array objek
        }
    }

    public function countByStatus($status)
    {
        $id_user = session()->get('id');
        $role_user = session()->get('role');

        if ($role_user == 1) {
            $query = $this->db->query("SELECT count(id_wawasan_islami) as total_wawasan_islami FROM tbl_wawasan_islami where status_wawasan_islami = '$status'");
        } else {
            $query = $this->db->query("SELECT count(id_wawasan_islami) as total_wawasan_islami FROM tbl_wawasan_islami where status_wawasan_islami = '$status' AND id_user = '$id_user'");
        }

        return $query->getResult(); // return berupa array objek


    }
}

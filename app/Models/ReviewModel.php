<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_review';
    protected $primaryKey       = 'id_review';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['reviewer', 'pekerjaan', 'bintang', 'pesan', 'status_review', 'gambar_reviewer'];

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

    public function getReview($id = false)
    {
        if ($id === false) {
            $query = $this->db->query("SELECT * FROM tbl_review");
            return $query->getResult(); // return berupa array objek

        } else {
            $query = $this->db->query("SELECT * FROM tbl_review where id_review = '$id' ");
            return $query->getResult(); // return berupa array objek
        }
    }

    public function getReviewLandingPage($id = false)
    {
        if ($id === false) { 
            $query = $this->db->query("SELECT * FROM tbl_review where status_review = '1' ");
            return $query->getResult(); // return berupa array objek

        } else {
            $query = $this->db->query("SELECT * FROM tbl_review where status_review = '1' AND id_review = '$id' ");
            return $query->getResult(); // return berupa array objek
        }
    }
}


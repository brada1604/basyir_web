<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_mahasiswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nim','nama','umur'];

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

    public function getMahasiswa($id = false)
    {
        if ($id === false) {
            // return $this->findAll();

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_mahasiswa");
            return $query->getResult(); // return berupa array objek

        } else {
            // return $this->getWhere(['id' => $id]);

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_mahasiswa where id = '$id' ");
            return $query->getResult(); // return berupa array objek
        }
    }

    public function getMahasiswaByNama($nama)
    {
        if ($nama === false) {
            // return $this->findAll();

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_mahasiswa");
            return $query->getResult(); // return berupa array objek

        } else {
            // return $this->getWhere(['id' => $id]);

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_mahasiswa where nama LIKE '%$nama%' ");
            return $query->getResult(); // return berupa array objek
        }
    }
 
    public function saveMahasiswa($data)
    {
        // $builder = $this->db->table($this->table);
        // return $builder->insert($data);

        // Manual atau Quert Builder
        $nim = $data['nim'];
        $nama = $data['nama'];
        $umur = $data['umur'];
        $query = $this->db->query("INSERT INTO tbl_mahasiswa (nim,nama,umur) VALUES('$nim','$nama','$umur')");
        return $query;
    }

    public function updateMahasiswa($data)
    {

        // Manual atau Quert Builder
        $id = $data['id'];
        $nim = $data['nim'];
        $nama = $data['nama'];
        $umur = $data['umur'];
        $query = $this->db->query("UPDATE tbl_mahasiswa SET nim='$nim', nama='$nama', umur='$umur' WHERE id='$id'");
        return $query;
    }
}

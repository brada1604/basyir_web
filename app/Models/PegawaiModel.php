<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_pegawai';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nip','nama','gender','telp','email','pendidikan'];

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

    public function getPegawai($id = false)
    {
        if ($id === false) {
            // return $this->findAll();

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_pegawai");
            return $query->getResult(); // return berupa array objek

        } else {
            // return $this->getWhere(['id' => $id]);

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_pegawai where id = '$id' ");
            return $query->getResult(); // return berupa array objek
        }
    }

    public function getPegawaiByNama($nama)
    {
        if ($nama === false) {
            // return $this->findAll();

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_pegawai");
            return $query->getResult(); // return berupa array objek

        } else {
            // return $this->getWhere(['id' => $id]);

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_pegawai where nama LIKE '%$nama%' ");
            return $query->getResult(); // return berupa array objek
        }
    }
 
    public function savePegawai($data)
    {
        // $builder = $this->db->table($this->table);
        // return $builder->insert($data);

        // Manual atau Quert Builder
        $nip = $data['nip'];
        $nama = $data['nama'];
        $gender = $data['gender'];
        $telp = $data['telp'];
        $email = $data['email'];
        $pendidikan = $data['pendidikan'];
        $query = $this->db->query("INSERT INTO tbl_pegawai (nip,nama,gender,telp,email,pendidikan) VALUES('$nip','$nama','$gender','$telp','$email','$pendidikan')");
        return $query;
    }

    public function updatePegawai($data)
    {

        // Manual atau Quert Builder
        $id = $data['id'];
        $nip = $data['nip'];
        $nama = $data['nama'];
        $gender = $data['gender'];
        $telp = $data['telp'];
        $email = $data['email'];
        $pendidikan = $data['pendidikan'];
        $query = $this->db->query("UPDATE tbl_pegawai SET nip='$nip', nama='$nama', gender='$gender', telp='$telp', email='$email', pendidikan='$pendidikan' WHERE id='$id'");
        return $query;
    }
    
}

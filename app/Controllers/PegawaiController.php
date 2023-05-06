<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Controllers\BaseController;

class PegawaiController extends BaseController
{
    public function index()
    {
        $model = new PegawaiModel;
        $data['title'] = 'Data Pegawai';
        $data['getPegawai'] = $model->getPegawai();

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('Pegawai/index', $data);
        echo view('layout/v_footer');
    }

     public function search()
    {
        $model = new PegawaiModel;
        $data['title'] = 'Data Pegawai By Nama';
        $nama = $this->request->getPost('nama');
        $data['getPegawai'] = $model->getPegawaiByNama($nama);

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('pegawai/index', $data);
        echo view('layout/v_footer');
    }

    public function detail($id){
        $model = new PegawaiModel;
        $data['title'] = 'Data Detail Pegawai';
        $data['getPegawai'] = $model->getPegawai($id);
        
        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('pegawai/detail', $data);
        echo view('layout/v_footer');
    }

    public function add(){
        $data['title'] = 'Data Pegawai';

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('pegawai/add');
        echo view('layout/v_footer');
    }

    public function save(){
        $model = new PegawaiModel;

        // //////////
        if (!$this->validate([
            'nip' => ['label' => 'nip', 'rules' => 'required|exact_length[10]|is_unique[tbl_pegawai.nip]'],
            'nama' => ['label' => 'nama', 'rules' => 'required|max_length[50]|alpha_space'],
            'gender' => ['label' => 'gender', 'rules' => 'required'],
            'telp' => ['label' => 'telp', 'rules' => 'required|min_length[9]|max_length[15]|numeric'],
            'email' => ['label' => 'email', 'rules' => 'required|min_length[5]|valid_email|is_unique[tbl_pegawai.email]'],
            'pendidikan' => ['label' => 'pendidikan', 'rules' => 'required'],
        ])) {
            session()->setFlashdata('msg', $this->validator->listErrors());
            return redirect()->back()->withInput();
            // echo view('validation_form', ['validation' => $this->validator]);
            // echo view('pegawai/add', ['validation' => $this->validator]);
            // echo $this->validator->listErrors();
        } else {
            $data = array(
                'nip' => $this->request->getPost('nip'),
                'nama' => $this->request->getPost('nama'),
                'gender' => $this->request->getPost('gender'),
                'telp' => $this->request->getPost('telp'),
                'email' => $this->request->getPost('email'),
                'pendidikan' => $this->request->getPost('pendidikan')
            );
            $model->savePegawai($data);
            echo '<script>
                    alert("Selamat! Berhasil Menambah Data Pegawai");
                    window.location="' . base_url('pegawai') . '"
                </script>';
        }
        
    }

    public function edit($id){
        $model = new PegawaiModel;
        $data['title'] = 'Data Pegawai - Edit';
        $data['getPegawai'] = $model->getPegawai($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('pegawai/edit', $data);
        echo view('layout/v_footer');
    }

    public function update(){
        $model = new PegawaiModel;

        $data = array(
            'id' => $this->request->getPost('id'),
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'gender' => $this->request->getPost('gender'),
            'telp' => $this->request->getPost('telp'),
            'email' => $this->request->getPost('email'),
            'pendidikan' => $this->request->getPost('pendidikan')
        );
        $model->updatePegawai($data);

        echo '<script>
                alert("Selamat! Berhasil Mengubah Data Pegawai");
                window.location="' . base_url('pegawai') . '"
            </script>';
    }


    public function delete($id){
        $model = new PegawaiModel;
        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Pegawai");
                window.location="' . base_url('pegawai') . '"
            </script>';
    }
}

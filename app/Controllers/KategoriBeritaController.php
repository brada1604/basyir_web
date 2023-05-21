<?php

namespace App\Controllers;

use App\Models\KategoriBeritaModel;
use App\Controllers\BaseController;

class KategoriBeritaController extends BaseController
{
    public function index()
    {
        $model = new KategoriBeritaModel;
        $data['session'] = session();
        $data['title'] = 'Data Kategori Berita';
        $data['getKategoriBerita'] = $model->getKategoriBerita();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('kategori_berita/index', $data);
        echo view('layout/v_footer');
    }

    public function add(){
        $data['title'] = 'Data Kategori Berita - Add';
        $data['session'] = session();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('kategori_berita/add');
        echo view('layout/v_footer');
    }

    public function save(){
        $data['session'] = session();
        $rules = [
            'nama_kategori_berita' => 'required'
        ];
     
        if($this->validate($rules)){
            $model = new KategoriBeritaModel();

            $data = [
                'nama_kategori_berita' => $this->request->getVar('nama_kategori_berita')
            ];
             
            $model->save($data);
     
            return redirect()->to('/kategori_berita_master');
     
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Kategori Berita';

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('kategori_berita/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function edit($id){
        $model = new KategoriBeritaModel;
        $data['session'] = session();
        $data['title'] = 'Data Kategori Berita - Edit';
        $data['getKategoriBerita'] = $model->getKategoriBerita($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('kategori_berita/edit', $data);
        echo view('layout/v_footer');
    }

    public function edit_status($id, $no)
    {
        $model = new KategoriBeritaModel();
        $id_kategori_berita = $id;
        $status = $no;

        $data = [
            'status_kategori_berita' => $status
        ];

        $model->update($id_kategori_berita, $data);

        echo '<script>
                    alert("Selamat! Berhasil Mengubah Status Kategori Berita");
                    window.location="' . base_url('kategori_berita_master') . '"
                </script>';
    }

    public function update(){
        $data['session'] = session();
        $rules = [
            'nama_kategori_berita' => 'required'
        ];
     
        if($this->validate($rules)){
            $model = new KategoriBeritaModel();
            $id_kategori_berita = $this->request->getVar('id_kategori_berita');

                $data = [
                    'nama_kategori_berita' => $this->request->getVar('nama_kategori_berita')
                ];

                $model->update($id_kategori_berita, $data);
         
                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Kategori Berita");
                    window.location="' . base_url('kategori_berita_master') . '"
                </script>';
            }
        else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Kategori Berita';

            echo view('layout/v_header', $data);
            echo view('layout/v_navbar');
            echo view('kategori_berita/edit', $data);
            echo view('layout/v_footer');
        }

    }

    public function delete($id){
        $model = new KategoriBeritaModel;
        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Kategori Berita");
                window.location="' . base_url('kategori_berita_master') . '"
            </script>';
    }
}

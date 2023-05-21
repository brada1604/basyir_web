<?php

namespace App\Controllers;

use App\Models\KategoriWawasanIslamiModel;
use App\Controllers\BaseController;

class KategoriWawasanIslamiController extends BaseController
{
    public function index()
    {
        $model = new KategoriWawasanIslamiModel;
        $data['session'] = session();
        $data['title'] = 'Data Kategori Wawasan Islami';
        $data['getKategoriWawasanIslami'] = $model->getKategoriWawasanIslami();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('kategori_wawasan_islami/index', $data);
        echo view('layout/v_footer');
    }

    public function add(){
        $data['title'] = 'Data Kategori Wawasan Islami - Add';
        $data['session'] = session();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('kategori_wawasan_islami/add');
        echo view('layout/v_footer');
    }

    public function save(){
        $data['session'] = session();
        $rules = [
            'nama_kategori_wawasan_islami' => 'required'
        ];
     
        if($this->validate($rules)){
            $model = new KategoriWawasanIslamiModel();

            $data = [
                'nama_kategori_wawasan_islami' => $this->request->getVar('nama_kategori_wawasan_islami')
            ];
             
            $model->save($data);
     
            return redirect()->to('/kategori_wawasan_islami_master');
     
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Kategori Wawasan Islami';

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('kategori_wawasan_islami/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function edit($id){
        $model = new KategoriWawasanIslamiModel;
        $data['session'] = session();
        $data['title'] = 'Data Kategori Wawasan Islami - Edit';
        $data['getKategoriWawasanIslami'] = $model->getKategoriWawasanIslami($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('kategori_wawasan_islami/edit', $data);
        echo view('layout/v_footer');
    }

    public function edit_status($id, $no)
    {
        $model = new KategoriWawasanIslamiModel();
        $id_kategori_wawasan_islami = $id;
        $status = $no;

        $data = [
            'status_kategori_wawasan_islami' => $status
        ];

        $model->update($id_kategori_wawasan_islami, $data);

        echo '<script>
                    alert("Selamat! Berhasil Mengubah Status Kategori Wawasan Islami");
                    window.location="' . base_url('kategori_wawasan_islami_master') . '"
                </script>';
    }

    public function update(){
        $data['session'] = session();
        $rules = [
            'nama_kategori_wawasan_islami' => 'required'
        ];
     
        if($this->validate($rules)){
            $model = new KategoriWawasanIslamiModel();
            $id_kategori_wawasan_islami = $this->request->getVar('id_kategori_wawasan_islami');

                $data = [
                    'nama_kategori_wawasan_islami' => $this->request->getVar('nama_kategori_wawasan_islami')
                ];

                $model->update($id_kategori_wawasan_islami, $data);
         
                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Kategori Wawasan Islami");
                    window.location="' . base_url('kategori_wawasan_islami_master') . '"
                </script>';
            }
        else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Kategori Wawasan Islami';

            echo view('layout/v_header', $data);
            echo view('layout/v_navbar');
            echo view('kategori_wawasan_islami/edit', $data);
            echo view('layout/v_footer');
        }

    }

    public function delete($id){
        $model = new KategoriWawasanIslamiModel;
        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Kategori Wawasan Islami");
                window.location="' . base_url('kategori_wawasan_islami_master') . '"
            </script>';
    }
}

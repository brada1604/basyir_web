<?php

namespace App\Controllers;

use App\Models\DoaModel;
use App\Controllers\BaseController;

class DoaController extends BaseController
{
    public function index()
    {
        $model = new DoaModel;
        $data['session'] = session();
        $data['title'] = 'Data Doa';
        $data['getDoa'] = $model->getDoa();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('doa/index', $data);
        echo view('layout/v_footer');
    }

    public function add(){
        $data['title'] = 'Data Doa - Add';
        $data['session'] = session();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('doa/add');
        echo view('layout/v_footer');
    }

    public function save(){
        $data['session'] = session();
        $rules = [
            'judul_doa' => 'required',
            'ringkasan_doa' => 'required',
            'ringkasan_latin_doa' => 'required'
        ];
     
        if($this->validate($rules)){
            $model = new DoaModel();

            $data = [
                'judul_doa' => $this->request->getVar('judul_doa'),
                'ringkasan_doa' => $this->request->getVar('ringkasan_doa'),
                'ringkasan_latin_doa' => $this->request->getVar('ringkasan_latin_doa'),
            ];
             
            $model->save($data);
     
            return redirect()->to('/doa_master');
     
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Doa';

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('doa/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function edit($id){
        $model = new DoaModel;
        $data['session'] = session();
        $data['title'] = 'Data Doa - Edit';
        $data['getDoa'] = $model->getDoa($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('doa/edit', $data);
        echo view('layout/v_footer');
    }

    public function update(){
        $data['session'] = session();
        $rules = [
            'judul_doa' => 'required',
            'ringkasan_doa' => 'required',
            'ringkasan_latin_doa' => 'required'
        ];
     
        if($this->validate($rules)){
            $model = new DoaModel();
            $id_doa = $this->request->getVar('id_doa');

                $data = [
                    'judul_doa' => $this->request->getVar('judul_doa'),
                    'ringkasan_doa' => $this->request->getVar('ringkasan_doa'),
                    'ringkasan_latin_doa' => $this->request->getVar('ringkasan_latin_doa'),
                ];

                $model->update($id_doa, $data);
         
                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Doa");
                    window.location="' . base_url('doa_master') . '"
                </script>';
            }
        else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Doa';

            echo view('layout/v_header', $data);
            echo view('layout/v_navbar');
            echo view('doa/add', $data);
            echo view('layout/v_footer');
        }

    }

    public function delete($id){
        $model = new DoaModel;
        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Doa");
                window.location="' . base_url('doa_master') . '"
            </script>';
    }
}

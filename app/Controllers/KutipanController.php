<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KutipanModel;

class KutipanController extends BaseController
{
    public function index()
    {
        $model = new KutipanModel;
        $data['session'] = session();
        $data['title'] = 'Data Kutipan';
        $data['getKutipan'] = $model->getKutipan();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('kutipan/index', $data);
        echo view('layout/v_footer');
    }

    public function add(){
        $data['title'] = 'Data Kutipan - Add';
        $data['session'] = session();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('kutipan/add');
        echo view('layout/v_footer');
    }

    public function save(){
        $data['session'] = session();
        $rules = [
            'judul_kutipan' => 'required',
            'deskripsi_kutipan' => 'required',
            'sumber_kutipan' => 'required'
        ];
     
        if($this->validate($rules)){
            $model = new KutipanModel();
            $fileImage_name = "";
            if(isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                if($fileImage = $this->request->getFile('image_file')) {
                    if (! $fileImage->isValid()) {
                        throw new \RuntimeException($fileImage->getErrorString().'('.$fileImage->getError().')');
                    } else {            
                        $fileImage->move('assets/image/kutipan');
                        $fileImage_name = $fileImage->getName();
                    }
                }
            }
            $data = [
                'id_user' => $this->request->getVar('id_user'),
                'judul_kutipan' => $this->request->getVar('judul_kutipan'),
                'deskripsi_kutipan' => $this->request->getVar('deskripsi_kutipan'),
                'sumber_kutipan' => $this->request->getVar('sumber_kutipan'),
            ];
             
            $model->save($data);
     
            return redirect()->to('/kutipan_master');
     
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Kutipan';

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('kutipan/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function edit($id){
        $model = new KutipanModel;
        $data['session'] = session();
        $data['title'] = 'Data Kutipan - Edit';
        $data['getKutipan'] = $model->getKutipan($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('kutipan/edit', $data);
        echo view('layout/v_footer');
    }

    public function update(){
        $data['session'] = session();
        $rules = [
            'judul_kutipan' => 'required',
            'deskripsi_kutipan' => 'required',
            'sumber_kutipan' => 'required'
        ];
     
        if($this->validate($rules)){
            $model = new KutipanModel();
            $id_kutipan = $this->request->getVar('id_kutipan');

                $data = [
                    'id_user' => $this->request->getVar('id_user'),
                    'judul_kutipan' => 'required',
                    'deskripsi_kutipan' => 'required',
                    'sumber_kutipan' => 'required'
                ];

                $model->update($id_kutipan, $data);
         
                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Kutipan Islami");
                    window.location="' . base_url('kutipan_master') . '"
                </script>';
            }
        else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Kutipan Islami';

            echo view('layout/v_header', $data);
            echo view('layout/v_navbar');
            echo view('kutipan/add', $data);
            echo view('layout/v_footer');
        }

    }

    public function delete($id){
        $model = new KutipanModel;
        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Kutipan Islami");
                window.location="' . base_url('kutipan_master') . '"
            </script>';
    }
}

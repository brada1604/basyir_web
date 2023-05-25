<?php

namespace App\Controllers;

use App\Models\KutipanModel;
use App\Controllers\BaseController;

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

            $data = [
                'judul_kutipan' => $this->request->getVar('judul_kutipan'),
                'deskripsi_kutipan' => $this->request->getVar('deskripsi_kutipan'),
                'sumber_kutipan' => $this->request->getVar('sumber_kutipan'),
            ];
             
            $model->save($data);
     
            // return redirect()->to('/kutipan_master');

            return redirect()->to('/onesignal/push/'.$this->request->getVar('sumber_kutipan').'/'.$this->request->getVar('deskripsi_kutipan').'/kutipan_master');
     
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

    public function edit_status($id, $no)
    {
        $model = new KutipanModel();
        $id_kutipan = $id;
        $status = $no;

        $data = [
            'status_kutipan' => $status
        ];

        $model->update($id_kutipan, $data);

        echo '<script>
                    alert("Selamat! Berhasil Mengubah Status Kutipan");
                    window.location="' . base_url('kutipan_master') . '"
                </script>';
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
                    'judul_kutipan' => $this->request->getVar('judul_kutipan'),
                    'deskripsi_kutipan' => $this->request->getVar('deskripsi_kutipan'),
                    'sumber_kutipan' => $this->request->getVar('sumber_kutipan'),
                ];

                $model->update($id_kutipan, $data);
         
                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Kutipan");
                    window.location="' . base_url('kutipan_master') . '"
                </script>';
            }
        else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Kutipan';

            echo view('layout/v_header', $data);
            echo view('layout/v_navbar');
            echo view('kutipan/edit', $data);
            echo view('layout/v_footer');
        }

    }

    public function delete($id){
        $model = new KutipanModel;
        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Kutipan");
                window.location="' . base_url('kutipan_master') . '"
            </script>';
    }
}

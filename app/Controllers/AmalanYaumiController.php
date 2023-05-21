<?php

namespace App\Controllers;

use App\Models\AmalanYaumiModel;
use App\Controllers\BaseController;

class AmalanYaumiController extends BaseController
{
    public function index()
    {
        $model = new AmalanYaumiModel;
        $data['session'] = session();
        $data['title'] = 'Data Amalan Yaumi';
        $data['getAmalanYaumi'] = $model->getAmalanYaumi();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('amalan_yaumi/index', $data);
        echo view('layout/v_footer');
    }

    public function add(){
        $data['title'] = 'Data Amalan Yaumi - Add';
        $data['session'] = session();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('amalan_yaumi/add');
        echo view('layout/v_footer');
    }

    public function save(){
        $data['session'] = session();
        $rules = [
            'judul_amalan_yaumi' => 'required',
            'konten_amalan_yaumi' => 'required'
        ];
     
        if($this->validate($rules)){
            $model = new AmalanYaumiModel();
            $data = [
                'judul_amalan_yaumi' => $this->request->getVar('judul_amalan_yaumi'),
                'konten_amalan_yaumi' => $this->request->getVar('konten_amalan_yaumi')
            ];
             
            $model->save($data);
     
            return redirect()->to('/amalan_yaumi_master');
     
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Amalan Yaumi';

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('amalan_yaumi/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function edit($id){
        $model = new AmalanYaumiModel;
        $data['session'] = session();
        $data['title'] = 'Data Amalan Yaumi - Edit';
        $data['getAmalanYaumi'] = $model->getAmalanYaumi($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('amalan_yaumi/edit', $data);
        echo view('layout/v_footer');
    }

    public function edit_status($id, $no)
    {
        $model = new AmalanYaumiModel();
        $id_amalan_yaumi = $id;
        $status = $no;

        $data = [
            'status_amalan_yaumi' => $status
        ];

        $model->update($id_amalan_yaumi, $data);

        echo '<script>
                    alert("Selamat! Berhasil Mengubah Status Amalan Yaumi");
                    window.location="' . base_url('amalan_yaumi_master') . '"
                </script>';
    }

    public function update(){
        $data['session'] = session();
        $rules = [
            'judul_amalan_yaumi' => 'required',
            'konten_amalan_yaumi' => 'required'
        ];
     
        if($this->validate($rules)){
            $model = new AmalanYaumiModel();
            $id_amalan_yaumi = $this->request->getVar('id_amalan_yaumi');

            $data = [
                'id_user' => $this->request->getVar('id_user'),
                'judul_amalan_yaumi' => $this->request->getVar('judul_amalan_yaumi'),
                'konten_amalan_yaumi' => $this->request->getVar('konten_amalan_yaumi'),
                'video_amalan_yaumi' => $this->request->getVar('video_amalan_yaumi'),
            ];

            $model->update($id_amalan_yaumi, $data);

            echo '<script>
                alert("Selamat! Berhasil Mengubah Data Amalan Yaumi");
                window.location="' . base_url('amalan_yaumi_master') . '"
            </script>';

        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Amalan Yaumi';

            echo view('layout/v_header', $data);
            echo view('layout/v_navbar');
            echo view('amalan_yaumi/add', $data);
            echo view('layout/v_footer');
        }

    }

    public function delete($id){
        $model = new AmalanYaumiModel;

        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Amalan Yaumi");
                window.location="' . base_url('amalan_yaumi_master') . '"
            </script>';
    }
}

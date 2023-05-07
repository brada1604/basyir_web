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
            'konten_amalan_yaumi' => 'required',
            'image_file'     => 'uploaded[image_file]|is_image[image_file]'
        ];
     
        if($this->validate($rules)){
            $model = new AmalanYaumiModel();
            $fileImage_name = "";
            if(isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                if($fileImage = $this->request->getFile('image_file')) {
                    if (! $fileImage->isValid()) {
                        throw new \RuntimeException($fileImage->getErrorString().'('.$fileImage->getError().')');
                    } else {            
     
                        $fileImage->move('assets/image/amalan_yaumi');
                        $fileImage_name = $fileImage->getName();
                    }
                }
            }
            $data = [
                'judul_amalan_yaumi' => $this->request->getVar('judul_amalan_yaumi'),
                'konten_amalan_yaumi' => $this->request->getVar('konten_amalan_yaumi'),
                'video_amalan_yaumi' => $this->request->getVar('video_amalan_yaumi'),
                'gambar_amalan_yaumi' => 'assets/image/amalan_yaumi/'.$fileImage_name,
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

    public function update(){
        $data['session'] = session();
        $rules = [
            'judul_amalan_yaumi' => 'required',
            'konten_amalan_yaumi' => 'required'
        ];
     
        if($this->validate($rules)){
            $model = new AmalanYaumiModel();
            $id_amalan_yaumi = $this->request->getVar('id_amalan_yaumi');

            $cek = $this->request->getFile('image_file');
            
            if (empty($cek->getName())) {
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
            }
            else{
                

                $data_amalan_yaumi = $model->getAmalanYaumi($id_amalan_yaumi);
                @unlink($data_amalan_yaumi[0]->gambar_amalan_yaumi);

                $fileImage_name = "";

                if(isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                    if($fileImage = $this->request->getFile('image_file')) {
                        if (! $fileImage->isValid()) {
                            throw new \RuntimeException($fileImage->getErrorString().'('.$fileImage->getError().')');
                        } else {            
         
                            $fileImage->move('assets/image/amalan_yaumi');
                            $fileImage_name = $fileImage->getName();
                        }
                    }
                }

                $data = [
                    'id_user' => $this->request->getVar('id_user'),
                    'judul_amalan_yaumi' => $this->request->getVar('judul_amalan_yaumi'),
                    'konten_amalan_yaumi' => $this->request->getVar('konten_amalan_yaumi'),
                    'video_amalan_yaumi' => $this->request->getVar('video_amalan_yaumi'),
                    'gambar_amalan_yaumi' => 'assets/image/amalan_yaumi/'.$fileImage_name,
                ];

                 
                $model->update($id_amalan_yaumi, $data);
         
                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Amalan Yaumi");
                    window.location="' . base_url('amalan_yaumi_master') . '"
                </script>';
            }

     
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

        $data_amalan_yaumi = $model->getAmalanYaumi($id);

        @unlink($data_amalan_yaumi[0]->gambar_amalan_yaumi);

        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Amalan Yaumi");
                window.location="' . base_url('amalan_yaumi_master') . '"
            </script>';
    }
}

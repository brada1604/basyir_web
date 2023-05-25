<?php

namespace App\Controllers;

use App\Models\WawasanIslamiModel;
use App\Models\KategoriWawasanIslamiModel;
use App\Controllers\BaseController;

class WawasanIslamiController extends BaseController
{
    public function index()
    {
        $model = new WawasanIslamiModel;
        $data['session'] = session();
        $data['title'] = 'Data Wawasan Islami';
        $data['getWawasanIslami'] = $model->getWawasanIslami();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('wawasan_islami/index', $data);
        echo view('layout/v_footer');
    }

    public function detail($id)
    {
        $model = new WawasanIslamiModel;
        $data['session'] = session();
        $data['title'] = 'Data Wawasan Islami - Detail';
        $data['getWawasanIslami'] = $model->getWawasanIslami($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('wawasan_islami/detail', $data);
        echo view('layout/v_footer');
    }

    public function detail_wawasan_depan($id_wawasan_islami){
        $model = new WawasanIslamiModel;
        $data['getWawasanDepan'] = $model->getWawasanIslamiLandingPage($id_wawasan_islami);

        echo view('detailWawasanPengunjung', $data);
    }

    public function listWawasan(){
        $model = new WawasanIslamiModel;
        $data['getListWawasan'] = $model->getWawasanIslamiLandingPage();
        $data['pager'] = $model->pager;


        echo view('listWawasanIslami', $data);

    }

    public function add(){
        $model = new KategoriWawasanIslamiModel;
        $data['title'] = 'Data Wawasan Islami - Add';
        $data['session'] = session();

        $data['getKategoriWawasanIslami'] = $model->getKategoriWawasanIslamiForm();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('wawasan_islami/add', $data);
        echo view('layout/v_footer');
    }

    public function save(){
        $data['session'] = session();
        $rules = [
            'judul_wawasan_islami' => 'required',
            'ringkasan_wawasan_islami' => 'required',
            'konten_wawasan_islami' => 'required',
            'image_file'     => 'uploaded[image_file]|is_image[image_file]'
        ];
     
        if($this->validate($rules)){
            $model = new WawasanIslamiModel();
            $fileImage_name = "";
            if(isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                if($fileImage = $this->request->getFile('image_file')) {
                    if (! $fileImage->isValid()) {
                        throw new \RuntimeException($fileImage->getErrorString().'('.$fileImage->getError().')');
                    } else {            
     
                        $fileImage->move('assets/image/wawasan_islami');
                        $fileImage_name = $fileImage->getName();
                    }
                }
            }
            $data = [
                'id_user' => $this->request->getVar('id_user'),
                'id_kategori_wawasan_islami' => $this->request->getVar('id_kategori_wawasan_islami'),
                'judul_wawasan_islami' => $this->request->getVar('judul_wawasan_islami'),
                'slug_wawasan_islami' => str_replace ( ' ' , '_' , $this->request->getVar('judul_wawasan_islami') ),
                'ringkasan_wawasan_islami' => $this->request->getVar('ringkasan_wawasan_islami'),
                'konten_wawasan_islami' => $this->request->getVar('konten_wawasan_islami'),
                'video_wawasan_islami' => $this->request->getVar('video_wawasan_islami'),
                'gambar_wawasan_islami' => 'assets/image/wawasan_islami/'.$fileImage_name,
            ];
             
            $model->save($data);
     
            return redirect()->to('/wawasan_islami_master');
     
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Wawasan Islami';

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('wawasan_islami/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function edit($id){
        $model_wawasan_islami = new WawasanIslamiModel;
        $model_kategori_wawasan_islami = new KategoriWawasanIslamiModel;
        $data['session'] = session();
        $data['title'] = 'Data Wawasan Islami - Edit';
        $data['getWawasanIslami'] = $model_wawasan_islami->getWawasanIslami($id);
        $data['getKategoriWawasanIslami'] = $model_kategori_wawasan_islami->getKategoriWawasanIslamiForm();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('wawasan_islami/edit', $data);
        echo view('layout/v_footer');
    }

    public function edit_status($id, $no)
    {
        $model = new WawasanIslamiModel();
        $id_wawasan_islami = $id;
        $status = $no;

        $data = [
            'status_wawasan_islami' => $status
        ];

        $model->update($id_wawasan_islami, $data);

        $data_wawasan_islami = $model->getWawasanIslami($id_wawasan_islami);


        if ($status == '2') {
            return redirect()->to('/onesignal/push/'.'Baca Kajian Terbaru Basyir'.'/'.$data_wawasan_islami[0]->judul_wawasan_islami.'/wawasan_islami_master');
        }

        echo '<script>
                    alert("Selamat! Berhasil Mengubah Status Wawasan Islami");
                    window.location="' . base_url('/wawasan_islami_master') . '"
                </script>';
    }

    public function update(){
        $data['session'] = session();
        $rules = [
            'judul_wawasan_islami' => 'required',
            'ringkasan_wawasan_islami' => 'required',
            'konten_wawasan_islami' => 'required'
        ];
     
        if($this->validate($rules)){
            $model = new WawasanIslamiModel();
            $id_wawasan_islami = $this->request->getVar('id_wawasan_islami');

            $cek = $this->request->getFile('image_file');
            
            if (empty($cek->getName())) {
                $data = [
                    'id_user' => $this->request->getVar('id_user'),
                    'id_kategori_wawasan_islami' => $this->request->getVar('id_kategori_wawasan_islami'),
                    'judul_wawasan_islami' => $this->request->getVar('judul_wawasan_islami'),
                    'slug_wawasan_islami' => str_replace ( ' ' , '_' , $this->request->getVar('judul_wawasan_islami') ),
                    'ringkasan_wawasan_islami' => $this->request->getVar('ringkasan_wawasan_islami'),
                    'konten_wawasan_islami' => $this->request->getVar('konten_wawasan_islami'),
                    'video_wawasan_islami' => $this->request->getVar('video_wawasan_islami'),
                ];

                $model->update($id_wawasan_islami, $data);

                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Wawasan Islami");
                    window.location="' . base_url('wawasan_islami_master') . '"
                </script>';
            }
            else{
                

                $data_wawasan_islami = $model->getWawasanIslami($id_wawasan_islami);
                @unlink($data_wawasan_islami[0]->gambar_wawasan_islami);

                $fileImage_name = "";

                if(isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                    if($fileImage = $this->request->getFile('image_file')) {
                        if (! $fileImage->isValid()) {
                            throw new \RuntimeException($fileImage->getErrorString().'('.$fileImage->getError().')');
                        } else {            
         
                            $fileImage->move('assets/image/wawasan_islami');
                            $fileImage_name = $fileImage->getName();
                        }
                    }
                }

                $data = [
                    'id_user' => $this->request->getVar('id_user'),
                    'id_kategori_wawasan_islami' => $this->request->getVar('id_kategori_wawasan_islami'),
                    'judul_wawasan_islami' => $this->request->getVar('judul_wawasan_islami'),
                    'slug_wawasan_islami' => str_replace ( ' ' , '_' , $this->request->getVar('judul_wawasan_islami') ),
                    'ringkasan_wawasan_islami' => $this->request->getVar('ringkasan_wawasan_islami'),
                    'konten_wawasan_islami' => $this->request->getVar('konten_wawasan_islami'),
                    'video_wawasan_islami' => $this->request->getVar('video_wawasan_islami'),
                    'gambar_wawasan_islami' => 'assets/image/wawasan_islami/'.$fileImage_name,
                ];

                 
                $model->update($id_wawasan_islami, $data);
         
                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Wawasan Islami");
                    window.location="' . base_url('wawasan_islami_master') . '"
                </script>';
            }

     
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Wawasan Islami';

            echo view('layout/v_header', $data);
            echo view('layout/v_navbar');
            echo view('wawasan_islami/add', $data);
            echo view('layout/v_footer');
        }

    }

    public function delete($id){
        $model = new WawasanIslamiModel;

        $data_wawasan_islami = $model->getWawasanIslami($id);

        @unlink($data_wawasan_islami[0]->gambar_wawasan_islami);

        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Wawasan Islami");
                window.location="' . base_url('wawasan_islami_master') . '"
            </script>';
    }

}

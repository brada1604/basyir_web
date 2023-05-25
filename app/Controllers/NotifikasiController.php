<?php

namespace App\Controllers;

use App\Models\NotifikasiModel;
use App\Controllers\BaseController;

class NotifikasiController extends BaseController
{
    public function index()
    {
        $model = new NotifikasiModel;
        $data['session'] = session();
        $data['title'] = 'Data Notifikasi';
        $data['getNotifikasi'] = $model->getNotifikasi();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('notifikasi/index', $data);
        echo view('layout/v_footer');
    }

    public function add(){
        $data['title'] = 'Data Notifikasi - Add';
        $data['session'] = session();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('notifikasi/add');
        echo view('layout/v_footer');
    }

     public function save()
    {
        $data['session'] = session();
        $rules = [
            'judul_notifikasi' => 'required',
            'pesan_notifikasi' => 'required',
            'link_tujuan_notifikasi' => 'required'
        ];

        if ($this->validate($rules)) {
            $model = new NotifikasiModel();

            $cek = $this->request->getFile('image_file');

            if (empty($cek->getName())) {
                $data = [
                    'judul_notifikasi' => $this->request->getVar('judul_notifikasi'),
                    'pesan_notifikasi' => $this->request->getVar('pesan_notifikasi'),
                    'link_tujuan_notifikasi' => $this->request->getVar('link_tujuan_notifikasi')
                ];
            }
            else{
                $fileImage_name = "";
                if (isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                    if ($fileImage = $this->request->getFile('image_file')) {
                        if (!$fileImage->isValid()) {
                            throw new \RuntimeException($fileImage->getErrorString() . '(' . $fileImage->getError() . ')');
                        } else {

                            $fileImage->move('assets/image/notifikasi');
                            $fileImage_name = $fileImage->getName();
                        }
                    }
                }
                $data = [
                    'judul_notifikasi' => $this->request->getVar('judul_notifikasi'),
                    'pesan_notifikasi' => $this->request->getVar('pesan_notifikasi'),
                    'link_tujuan_notifikasi' => $this->request->getVar('link_tujuan_notifikasi'),
                    'gambar_notifikasi' => 'assets/image/notifikasi/' . $fileImage_name,
                ];
            }

            $model->save($data);

            return redirect()->to('/notifikasi_master');
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Notifikasi';

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('notifikasi/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function edit($id){
        $model = new NotifikasiModel;
        $data['session'] = session();
        $data['title'] = 'Data Notifikasi - Edit';
        $data['getNotifikasi'] = $model->getNotifikasi($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('notifikasi/edit', $data);
        echo view('layout/v_footer');
    }

    public function edit_status($id, $no)
    {
        $model = new NotifikasiModel();
        $id_notifikasi = $id;
        $status = $no;

        $data = [
            'status_notifikasi' => $status
        ];

        $model->update($id_notifikasi, $data);

        echo '<script>
                    alert("Selamat! Berhasil Mengubah Status Notifikasi");
                    window.location="' . base_url('notifikasi_master') . '"
                </script>';
    }

    public function update()
    {
        $data['session'] = session();
        $rules = [
            'judul_notifikasi' => 'required',
            'pesan_notifikasi' => 'required',
            'link_tujuan_notifikasi' => 'required'
        ];

        if ($this->validate($rules)) {
            $model = new NotifikasiModel();
            $id_notifikasi = $this->request->getVar('id_notifikasi');

            $cek = $this->request->getFile('image_file');

            if (empty($cek->getName())) {
                $data = [
                    'judul_notifikasi' => $this->request->getVar('judul_notifikasi'),
                    'pesan_notifikasi' => $this->request->getVar('pesan_notifikasi'),
                    'link_tujuan_notifikasi' => $this->request->getVar('link_tujuan_notifikasi')
                ];

                $model->update($id_notifikasi, $data);

                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Notifikasi");
                    window.location="' . base_url('notifikasi_master') . '"
                </script>';
            } else {


                $data_notifikasi = $model->getNotifikasi($id_notifikasi);
                @unlink($data_notifikasi[0]->gambar_notifikasi);

                $fileImage_name = "";

                if (isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                    if ($fileImage = $this->request->getFile('image_file')) {
                        if (!$fileImage->isValid()) {
                            throw new \RuntimeException($fileImage->getErrorString() . '(' . $fileImage->getError() . ')');
                        } else {

                            $fileImage->move('assets/image/notifikasi');
                            $fileImage_name = $fileImage->getName();
                        }
                    }
                }

                $data = [
                    'judul_notifikasi' => $this->request->getVar('judul_notifikasi'),
                    'pesan_notifikasi' => $this->request->getVar('pesan_notifikasi'),
                    'link_tujuan_notifikasi' => $this->request->getVar('link_tujuan_notifikasi'),
                    'gambar_notifikasi' => 'assets/image/notifikasi/' . $fileImage_name
                ];


                $model->update($id_notifikasi, $data);

                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Notifikasi");
                    window.location="' . base_url('notifikasi_master') . '"
                </script>';
            }
        } else {
            $data['validation'] = $this->validator;
            $model = new NotifikasiModel;
            $data['session'] = session();
            $data['title'] = 'Data Notifikasi - Edit';
            $data['getNotifikasi'] = $model->getNotifikasi();


            echo view('layout/v_header', $data);
            echo view('layout/v_navbar');
            echo view('notifikasi/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function delete($id)
    {
        $model = new NotifikasiModel;

        $data_notifikasi = $model->getNotifikasi($id);

        @unlink($data_notifikasi[0]->gambar_notifikasi);

        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Notifikasi");
                window.location="' . base_url('notifikasi_master') . '"
            </script>';
    }
}

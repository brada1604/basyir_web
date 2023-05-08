<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Controllers\BaseController;

class BeritaController extends BaseController
{
    public function index()
    {
        $model = new BeritaModel;
        $data['session'] = session();
        $data['title'] = 'Data Berita';
        $data['getBerita'] = $model->getBerita();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('berita/index', $data);
        echo view('layout/v_footer');
    }

    public function detail($id)
    {
        $model = new BeritaModel;
        $data['session'] = session();
        $data['title'] = 'Data Berita - Detail';
        $data['getBerita'] = $model->getBerita($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('berita/detail', $data);
        echo view('layout/v_footer');
    }

    public function add()
    {
        $data['title'] = 'Data Berita - Add';
        $data['session'] = session();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('berita/add');
        echo view('layout/v_footer');
    }

    public function save()
    {
        $data['session'] = session();
        $rules = [
            'judul_berita' => 'required',
            'ringkasan_berita' => 'required',
            'konten_berita' => 'required',
            'image_file'     => 'uploaded[image_file]|is_image[image_file]'
        ];

        if ($this->validate($rules)) {
            $model = new BeritaModel();
            $fileImage_name = "";
            if (isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                if ($fileImage = $this->request->getFile('image_file')) {
                    if (!$fileImage->isValid()) {
                        throw new \RuntimeException($fileImage->getErrorString() . '(' . $fileImage->getError() . ')');
                    } else {

                        $fileImage->move('assets/image/berita');
                        $fileImage_name = $fileImage->getName();
                    }
                }
            }
            $data = [
                'id_user' => $this->request->getVar('id_user'),
                'judul_berita' => $this->request->getVar('judul_berita'),
                'ringkasan_berita' => $this->request->getVar('ringkasan_berita'),
                'konten_berita' => $this->request->getVar('konten_berita'),
                'video_berita' => $this->request->getVar('video_berita'),
                'gambar_berita' => 'assets/image/berita/' . $fileImage_name,
            ];

            $model->save($data);

            return redirect()->to('/berita_master');
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Berita';

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('berita/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function edit($id)
    {
        $model = new BeritaModel;
        $data['session'] = session();
        $data['title'] = 'Data Berita - Edit';
        $data['getBerita'] = $model->getBerita($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('berita/edit', $data);
        echo view('layout/v_footer');
    }

    public function edit_status($id, $no)
    {
        $model = new BeritaModel();
        $id_berita = $id;
        $status = $no;

        $data = [
            'status_berita' => $status
        ];

        $model->update($id_berita, $data);

        echo '<script>
                    alert("Selamat! Berhasil Mengubah Status Berita");
                    window.location="' . base_url('berita_master') . '"
                </script>';
    }

    public function update()
    {
        $data['session'] = session();
        $rules = [
            'judul_berita' => 'required',
            'ringkasan_berita' => 'required',
            'konten_berita' => 'required'
        ];

        if ($this->validate($rules)) {
            $model = new BeritaModel();
            $id_berita = $this->request->getVar('id_berita');

            $cek = $this->request->getFile('image_file');

            if (empty($cek->getName())) {
                $data = [
                    'id_user' => $this->request->getVar('id_user'),
                    'judul_berita' => $this->request->getVar('judul_berita'),
                    'ringkasan_berita' => $this->request->getVar('ringkasan_berita'),
                    'konten_berita' => $this->request->getVar('konten_berita'),
                    'video_berita' => $this->request->getVar('video_berita'),
                ];

                $model->update($id_berita, $data);

                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Berita");
                    window.location="' . base_url('berita_master') . '"
                </script>';
            } else {


                $data_berita = $model->getBerita($id_berita);
                @unlink($data_berita[0]->gambar_berita);

                $fileImage_name = "";

                if (isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                    if ($fileImage = $this->request->getFile('image_file')) {
                        if (!$fileImage->isValid()) {
                            throw new \RuntimeException($fileImage->getErrorString() . '(' . $fileImage->getError() . ')');
                        } else {

                            $fileImage->move('assets/image/berita');
                            $fileImage_name = $fileImage->getName();
                        }
                    }
                }

                $data = [
                    'id_user' => $this->request->getVar('id_user'),
                    'judul_berita' => $this->request->getVar('judul_berita'),
                    'ringkasan_berita' => $this->request->getVar('ringkasan_berita'),
                    'konten_berita' => $this->request->getVar('konten_berita'),
                    'video_berita' => $this->request->getVar('video_berita'),
                    'gambar_berita' => 'assets/image/berita/' . $fileImage_name,
                ];


                $model->update($id_berita, $data);

                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Berita");
                    window.location="' . base_url('berita_master') . '"
                </script>';
            }
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Berita';

            echo view('layout/v_header', $data);
            echo view('layout/v_navbar');
            echo view('berita/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function delete($id)
    {
        $model = new BeritaModel;

        $data_berita = $model->getBerita($id);

        @unlink($data_berita[0]->gambar_berita);

        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Berita");
                window.location="' . base_url('berita_master') . '"
            </script>';
    }
}

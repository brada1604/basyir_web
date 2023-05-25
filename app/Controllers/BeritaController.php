<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\KategoriBeritaModel;

/**
 * Summary of BeritaController
 */
class BeritaController extends BaseController
{
    public function index()
    {
        $model_berita = new BeritaModel;
        $model_kategori_berita = new KategoriBeritaModel;
        $model_user = new UserModel;

        $data['session'] = session();
        $data['title'] = 'Data Berita';
        $data['getBerita'] = $model_berita->getBerita();
        $data['getKategoriBerita'] = $model_kategori_berita->getKategoriBerita();
        $data['getUser'] = $model_user->getUserALL();


        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('berita/index', $data);
        echo view('layout/v_footer');
    }
    /**
     * Summary of detail_berita_depan
     * @return void
     */
    public function detail_berita_depan($id_berita){
        $model = new BeritaModel;
        $data['getBeritaDepan'] = $model->getBeritaLandingPage($id_berita);

        echo view('detailBeritaPengunjung', $data);
    }

    /**
     * Summary of listBerita
     * @return void
     */
    public function listBerita(){
        $model = new BeritaModel;
        $data['getListBerita'] = $model->getBeritaLandingPage();
        $data['pager'] = $model->pager;


        echo view('berita/listBerita', $data);
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

        $model_kategori_berita = new KategoriBeritaModel;
        $data['getKategoriBerita'] = $model_kategori_berita->getKategoriBerita();

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
            'judul_berita' => 'required|is_unique[tbl_berita.judul_berita]',
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
                'id_kategori_berita' => $this->request->getVar('id_kategori_berita'),
                'judul_berita' => $this->request->getVar('judul_berita'),
                'slug_berita' => str_replace ( ' ' , '_' , $this->request->getVar('judul_berita') ),
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

            $model_kategori_berita = new KategoriBeritaModel;
            $data['getKategoriBerita'] = $model_kategori_berita->getKategoriBerita();

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
        $modelKategori = new KategoriBeritaModel;
        $data['session'] = session();
        $data['title'] = 'Data Berita - Edit';
        $data['getBerita'] = $model->getBerita($id);
        $data['getKategoriBerita'] = $modelKategori->getKategoriBerita();

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

        $data_berita = $model->getBerita($id_berita);

        $model->update($id_berita, $data);

        if ($status == '2') {
            return redirect()->to('/onesignal/push/'.'Baca Artikel Terbaru Basyir'.'/'.$data_berita[0]->judul_berita.'/berita_master');
        }

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
                    'id_kategori_berita' => $this->request->getVar('id_kategori_berita'),
                    'judul_berita' => $this->request->getVar('judul_berita'),
                    'slug_berita' => str_replace ( ' ' , '_' , $this->request->getVar('judul_berita') ),
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
                    'id_kategori_berita' => $this->request->getVar('id_kategori_berita'),
                    'judul_berita' => $this->request->getVar('judul_berita'),
                    'slug_berita' => str_replace ( ' ' , '_' , $this->request->getVar('judul_berita') ),
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
            $model = new BeritaModel;
            $modelKategori = new KategoriBeritaModel;
            $data['session'] = session();
            $data['title'] = 'Data Berita - Edit';
            $data['getBerita'] = $model->getBerita();
            $data['getKategoriBerita'] = $modelKategori->getKategoriBerita();

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

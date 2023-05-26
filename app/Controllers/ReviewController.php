<?php

namespace App\Controllers;

use App\Models\ReviewModel;
use App\Controllers\BaseController;

/**
 * Summary of ReviewController
 */
class ReviewController extends BaseController
{
    public function index()
    {
        $model_review = new ReviewModel;

        $data['session'] = session();
        $data['title'] = 'Data Review';
        $data['getReview'] = $model_review->getReview();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('review/index', $data);
        echo view('layout/v_footer');
    }



    public function add()
    {
        $data['title'] = 'Data Review - Add';
        $data['session'] = session();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('review/add');
        echo view('layout/v_footer');
    }

    public function save()
    {
        $data['session'] = session();
        $rules = [
            'reviewer' => 'required',
            'pekerjaan' => 'required',
            'bintang' => 'required',
            'pesan' => 'required',
            'image_file'     => 'uploaded[image_file]|is_image[image_file]'
        ];

        if ($this->validate($rules)) {
            $model = new ReviewModel();
            $fileImage_name = "";
            if (isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                if ($fileImage = $this->request->getFile('image_file')) {
                    if (!$fileImage->isValid()) {
                        throw new \RuntimeException($fileImage->getErrorString() . '(' . $fileImage->getError() . ')');
                    } else {

                        $fileImage->move('assets/image/review');
                        $fileImage_name = $fileImage->getName();
                    }
                }
            }
            $data = [
                'reviewer' => $this->request->getVar('reviewer'),
                'pekerjaan' => $this->request->getVar('pekerjaan'),
                'bintang' => $this->request->getVar('bintang'),
                'pesan' => $this->request->getVar('pesan'),
                'gambar_reviewer' => 'assets/image/review/' . $fileImage_name,
            ];

            $model->save($data);

            return redirect()->to('/review_master');
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Review';

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('review/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function edit($id)
    {
        $model = new ReviewModel;
        $data['session'] = session();
        $data['title'] = 'Data Review - Edit';
        $data['getReview'] = $model->getReview($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('review/edit', $data);
        echo view('layout/v_footer');
    }

    public function edit_status($id, $no)
    {
        $model = new ReviewModel();
        $id_review = $id;
        $status = $no;

        $data = [
            'status_review' => $status
        ];

        $model->update($id_review, $data);

        echo '<script>
                    alert("Selamat! Berhasil Mengubah Status Review");
                    window.location="' . base_url('review_master') . '"
                </script>';
    }

    public function update()
    {
        $data['session'] = session();
        $rules = [
            'reviewer' => 'required',
            'pekerjaan' => 'required',
            'bintang' => 'required',
            'pesan' => 'required'
        ];

        if ($this->validate($rules)) {
            $model = new ReviewModel();
            $id_review = $this->request->getVar('id_review');

            $cek = $this->request->getFile('image_file');

            if (empty($cek->getName())) {
                $data = [
                    'reviewer' => $this->request->getVar('reviewer'),
                    'pekerjaan' => $this->request->getVar('pekerjaan'),
                    'bintang' => $this->request->getVar('bintang'),
                    'pesan' => $this->request->getVar('pesan')
                ];

                $model->update($id_review, $data);

                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Review");
                    window.location="' . base_url('review_master') . '"
                </script>';
            } else {


                $data_review = $model->getReview($id_review);
                @unlink($data_review[0]->gambar_reviewer);

                $fileImage_name = "";

                if (isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                    if ($fileImage = $this->request->getFile('image_file')) {
                        if (!$fileImage->isValid()) {
                            throw new \RuntimeException($fileImage->getErrorString() . '(' . $fileImage->getError() . ')');
                        } else {

                            $fileImage->move('assets/image/review');
                            $fileImage_name = $fileImage->getName();
                        }
                    }
                }

                $data = [
                    'reviewer' => $this->request->getVar('reviewer'),
                    'pekerjaan' => $this->request->getVar('pekerjaan'),
                    'bintang' => $this->request->getVar('bintang'),
                    'pesan' => $this->request->getVar('pesan'),
                    'gambar_reviewer' => 'assets/image/review/' . $fileImage_name,
                ];


                $model->update($id_review, $data);

                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Review");
                    window.location="' . base_url('review_master') . '"
                </script>';
            }
        } else {
            $data['validation'] = $this->validator;
            $model = new ReviewModel;
            $data['session'] = session();
            $data['title'] = 'Data Review - Edit';
            $data['getReview'] = $model->getReview();

            echo view('layout/v_header', $data);
            echo view('layout/v_navbar');
            echo view('review/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function delete($id)
    {
        $model = new ReviewModel;

        $data_review = $model->getReview($id);

        @unlink($data_review[0]->gambar_reviewer);

        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Review");
                window.location="' . base_url('review_master') . '"
            </script>';
    }
}

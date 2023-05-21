<?php

namespace App\Controllers;

use App\Models\DoaModel;
use App\Models\DoaDetailModel;
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

    public function edit_status($id, $no)
    {
        $model = new DoaModel();
        $id_doa = $id;
        $status = $no;

        $data = [
            'status_doa' => $status
        ];

        $model->update($id_doa, $data);

        echo '<script>
                    alert("Selamat! Berhasil Mengubah Status Doa");
                    window.location="' . base_url('doa_master') . '"
                </script>';
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
            echo view('doa/edit', $data);
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

    public function detail($id)
    {
        $model_doa = new DoaModel;
        $model_doa_detail = new DoaDetailModel;
        $data['session'] = session();
        $data['title'] = 'Data Detail Doa';
        $data['getDoa'] = $model_doa->getDoa($id);
        $data['getDoaDetail'] = $model_doa_detail->getDoaDetail($id,false);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('doa/index_detail', $data);
        echo view('layout/v_footer');
    }

    public function add_detail($id_doa){
        $data['title'] = 'Data Doa Detail - Add';
        $data['session'] = session();

        $data['id_doa'] = $id_doa;

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('doa/add_detail');
        echo view('layout/v_footer');
    }

    public function save_detail(){
        $data['session'] = session();
        $rules = [
            'id_doa' => 'required',
            'konten_doa' => 'required',
            'konten_latin_doa' => 'required'
        ];
     
        if($this->validate($rules)){
            $model = new DoaDetailModel();

            $data = [
                'id_doa' => $this->request->getVar('id_doa'),
                'konten_doa' => $this->request->getVar('konten_doa'),
                'konten_latin_doa' => $this->request->getVar('konten_latin_doa'),
            ];
             
            $model->save($data);
            
            $id_doa = $this->request->getVar('id_doa');

            return redirect()->to('/doa/detail/'.$id_doa);
     
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Doa Detail';

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('doa/add_detail', $data);
            echo view('layout/v_footer');
        }
    }

    public function edit_detail($id,$id_doa){
        $model = new DoaDetailModel;
        $data['session'] = session();
        $data['title'] = 'Data Doa Detail - Edit';
        $data['getDoaDetail'] = $model->getDoaDetail($id_doa,$id);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('doa/edit_detail', $data);
        echo view('layout/v_footer');
    }

    public function edit_status_detail($id, $no, $id_doa)
    {
        $model = new DoaDetailModel();
        $id_doa_detail = $id;
        $status = $no;
        
        $data = [
            'status_doa_detail' => $status
        ];

        $model->update($id_doa_detail, $data);

        echo '<script>
                    alert("Selamat! Berhasil Mengubah Status Doa Detail");
                    window.location="' . base_url('/doa/detail/'.$id_doa) . '"
                </script>';
    }

    public function update_detail(){
        $data['session'] = session();
        $rules = [
            'id_doa' => 'required',
            'konten_doa' => 'required',
            'konten_latin_doa' => 'required'
        ];
     
        if($this->validate($rules)){
            $model = new DoaDetailModel();
            $id_doa = $this->request->getVar('id_doa');
            $id_doa_detail = $this->request->getVar('id_doa_detail');

                $data = [
                    'id_doa' => $this->request->getVar('id_doa'),
                    'konten_doa' => $this->request->getVar('konten_doa'),
                    'konten_latin_doa' => $this->request->getVar('konten_latin_doa'),
                ];

                $model->update($id_doa_detail, $data);
         
                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Doa Detail");
                    window.location="' . base_url('/doa/detail/'.$id_doa) . '"
                </script>';
            }
        else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Doa Detail';

            echo view('layout/v_header', $data);
            echo view('layout/v_navbar');
            echo view('doa/edit_detail', $data);
            echo view('layout/v_footer');
        }
    }

    public function delete_detail($id, $id_doa){
        $model = new DoaDetailModel;
        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Doa Detail");
                window.location="' . base_url('/doa/detail/'.$id_doa) . '"
            </script>';
    }

}

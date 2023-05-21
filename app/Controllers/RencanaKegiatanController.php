<?php

namespace App\Controllers;

use App\Models\RencanaKegiatanModel;
use App\Models\AmalanYaumiModel;
use App\Controllers\BaseController;

class RencanaKegiatanController extends BaseController
{
    public function index()
    {
        $model = new RencanaKegiatanModel;
        $data['session'] = session();
        $data['title'] = 'Data Rencana Kegiatan';
        $data['getRencanaKegiatan'] = $model->getRencanaKegiatan();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('rencana_kegiatan/index', $data);
        echo view('layout/v_footer');
    }

    public function add()
    {
        $data['title'] = 'Data Rencana Kegiatan - Add';
        $data['session'] = session();

        $model = new AmalanYaumiModel;
        $data['getAmalanYaumi'] = $model->getAmalanYaumi();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('rencana_kegiatan/add', $data);
        echo view('layout/v_footer');
    }

    public function save()
    {
        $data['session'] = session();
        $rules = [
            'id_user' => 'required',
            'id_amalan_yaumi' => 'required',
        ];

        if ($this->validate($rules)) {
            $model = new RencanaKegiatanModel();

            $data = [
                'id_user' => $this->request->getVar('id_user'),
                'id_amalan_yaumi' => $this->request->getVar('id_amalan_yaumi'),
            ];

            $model->save($data);

            return redirect()->to('/rencana_kegiatan_master');
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Rencana Kegiatan';

            $model = new AmalanYaumiModel;
            $data['getAmalanYaumi'] = $model->getAmalanYaumi();

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('rencana_kegiatan/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function edit($id)
    {
        $model_rencana_kegiatan = new RencanaKegiatanModel();
        $data['session'] = session();
        $data['title'] = 'Data Rencana Kegiatan - Edit';
        $data['getRencanaKegiatan'] = $model_rencana_kegiatan->getRencanaKegiatan($id);

        $model_amalan_yaumi = new AmalanYaumiModel;
        $data['getAmalanYaumi'] = $model_amalan_yaumi->getAmalanYaumi();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('rencana_kegiatan/edit', $data);
        echo view('layout/v_footer');
    }

    public function edit_status($id, $no)
    {
        $model = new RencanaKegiatanModel();
        $id_rencana_kegiatan = $id;
        $status = $no;

        $data = [
            'status_rencana_kegiatan' => $status
        ];

        $model->update($id_rencana_kegiatan, $data);

        echo '<script>
                    alert("Selamat! Berhasil Mengubah Status Rencana Kegiatan");
                    window.location="' . base_url('rencana_kegiatan_master') . '"
                </script>';
    }

    public function update()
    {
        $data['session'] = session();
        $rules = [
            'id_rencana_kegiatan' => 'required',
            'id_user' => 'required',
            'id_amalan_yaumi' => 'required'
        ];

        if ($this->validate($rules)) {
            $model = new RencanaKegiatanModel();
            $id_rencana_kegiatan = $this->request->getVar('id_rencana_kegiatan');

            $data = [
                'id_rencana_kegiatan' => $this->request->getVar('id_rencana_kegiatan'),
                'id_user' => $this->request->getVar('id_user'),
                'id_amalan_yaumi' => $this->request->getVar('id_amalan_yaumi'),
            ];

            $model->update($id_rencana_kegiatan, $data);

            echo '<script>
                    alert("Selamat! Berhasil Mengubah Data Kutipan");
                    window.location="' . base_url('rencana_kegiatan_master') . '"
                </script>';
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Rencana Kegiatan';

            $model_amalan_yaumi = new AmalanYaumiModel;
            $data['getAmalanYaumi'] = $model_amalan_yaumi->getAmalanYaumi();

            echo view('layout/v_header', $data);
            echo view('layout/v_navbar');
            echo view('rencana_kegiatan/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function delete($id)
    {
        $model = new RencanaKegiatanModel;
        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Kutipan");
                window.location="' . base_url('/rencana_kegiatan_master') . '"
            </script>';
    }
}

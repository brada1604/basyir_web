<?php

namespace App\Controllers;

use App\Models\SaranModel;
use App\Controllers\BaseController;

class SaranController extends BaseController
{
    public function index()
    {
        $model = new SaranModel;
        $data['session'] = session();
        $data['title'] = 'Data Saran';
        $data['getSaran'] = $model->getSaran();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('saran/index', $data);
        echo view('layout/v_footer');
    }

    public function save(){
        $model = new SaranModel();

        $data = [
            'pesan_saran' => $this->request->getVar('pesan_saran')
        ];
         
        $model->save($data);
        
        session()->setFlashdata("success", "Terimakasih atas masukannya.");
        return redirect()->to('/');
     
    }

    public function delete($id){
        $model = new SaranModel;
        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Saran");
                window.location="' . base_url('saran_master') . '"
            </script>';
    }
}

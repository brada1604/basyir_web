<?php

namespace App\Controllers;

use App\Models\NotifikasiModel;
use App\Models\TargetNotifikasiModel;
use App\Models\UserModel;
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

    public function detail($id)
    {
        $model_notifikasi = new NotifikasiModel;
        $model_target_notifikasi = new TargetNotifikasiModel;
        $model = new NotifikasiModel;
        $data['session'] = session();
        $data['title'] = 'Data Notifikasi Detail';
        $data['getNotifikasi'] = $model_notifikasi->getNotifikasi($id);
        $data['getTargetNotifikasi'] = $model_target_notifikasi->getTargetNotifikasiByIdNotifikasi($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('notifikasi/index_detail', $data);
        echo view('layout/v_footer');
    }

    public function display()
    {
        $model_target_notifikasi = new TargetNotifikasiModel;
        $data['session'] = session();
        $data['title'] = 'Data Notifikasi Detail';
        $data['getNotifikasiByIdUserLogin'] = $model_target_notifikasi->getNotifikasiByIdUserLoginAll();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('notifikasi/display', $data);
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

    public function add_target($id_notifikasi){
        $model_user = new UserModel;
        $data['title'] = 'Data Target Notifikasi - Add';
        $data['session'] = session();
        $data['id_notifikasi'] = $id_notifikasi;
        $data['getUserAll'] = $model_user->getUserAll();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('notifikasi/add_target',$data);
        echo view('layout/v_footer');
    }

    public function save()
    {
        $model_user = new UserModel;
        $model_target_notifikasi = new TargetNotifikasiModel;
        $data['session'] = session();

        $rules = [
            'judul_notifikasi' => 'required',
            'pesan_notifikasi' => 'required',
            'link_tujuan_notifikasi' => 'required'
        ];

        $jadwal = $this->request->getVar('jadwal');
        $jadwal_notifikasi = $this->request->getVar('jadwal_notifikasi');

        if ($jadwal == 'jadwalkan') {    
            $arr = str_split($jadwal_notifikasi, 1);

            $tahun = $arr[0].$arr[1].$arr[2].$arr[3];
            $bulan = $arr[5].$arr[6];
            $tanggal =  $arr[8].$arr[9];
            $jam = $arr[11].$arr[12];
            $menit = $arr[14].$arr[15];
            $detik = '00';

            $waktu = $tahun.'-'.$bulan.'-'.$tanggal.' '.$jam.':'.$menit.':'.$detik;
        }
        else{
            $waktu = NULL;   
        }


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

            $id_notifikasi_last = $model->insertID();

            $target = $this->request->getVar('target');
            if (!empty($target[0])) {
                $getUser0 = $model_user->getUserByRole($target[0]);

                foreach ($getUser0 as $u) {
                    $data = [
                        'id_notifikasi' => $id_notifikasi_last,
                        'id_user' => $u->id,
                        'jadwal_notifikasi' => $waktu
                    ];
                    $model_target_notifikasi->save($data);
                }
            }
            if (!empty($target[1])) {
                $getUser1 = $model_user->getUserByRole($target[1]);
                foreach ($getUser1 as $v) {
                    $data = [
                        'id_notifikasi' => $id_notifikasi_last,
                        'id_user' => $v->id,
                        'jadwal_notifikasi' => $waktu
                    ];
                    $model_target_notifikasi->save($data);
                }
            }
            if (!empty($target[2])) {
                $getUser2 = $model_user->getUserByRole($target[2]);
                foreach ($getUser2 as $w) {
                    $data = [
                        'id_notifikasi' => $id_notifikasi_last,
                        'id_user' => $w->id,
                        'jadwal_notifikasi' => $waktu
                    ];
                    $model_target_notifikasi->save($data);
                }
            }
            if (!empty($target[3])) {
                $getUser3 = $model_user->getUserByRole($target[3]);
                foreach ($getUser3 as $x) {
                    $data = [
                        'id_notifikasi' => $id_notifikasi_last,
                        'id_user' => $x->id,
                        'jadwal_notifikasi' => $waktu
                    ];
                    $model_target_notifikasi->save($data);
                }
            }

            
            if ($jadwal == 'now') {
                return redirect()->to('/onesignal/push/'.$this->request->getVar('judul_notifikasi').'/'.$this->request->getVar('pesan_notifikasi').'/notifikasi_master');
            }

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

    public function save_target()
    {
        $model_user = new UserModel;
        $model_target_notifikasi = new TargetNotifikasiModel;
        $data['session'] = session();

        $jadwal = $this->request->getVar('jadwal');
        $jadwal_notifikasi = $this->request->getVar('jadwal_notifikasi');

        if ($jadwal == 'jadwalkan') {    
            $arr = str_split($jadwal_notifikasi, 1);

            $tahun = $arr[0].$arr[1].$arr[2].$arr[3];
            $bulan = $arr[5].$arr[6];
            $tanggal =  $arr[8].$arr[9];
            $jam = $arr[11].$arr[12];
            $menit = $arr[14].$arr[15];
            $detik = '00';

            $waktu = $tahun.'-'.$bulan.'-'.$tanggal.' '.$jam.':'.$menit.':'.$detik;
        }
        else{
            $waktu = NULL;   
        }


        $id_notifikasi = $this->request->getVar('id_notifikasi');

        $target = $this->request->getVar('target');
        if (!empty($target[0])) {
            $getUser0 = $model_user->getUserByRole($target[0]);

            foreach ($getUser0 as $u) {
                $data = [
                    'id_notifikasi' => $id_notifikasi,
                    'id_user' => $u->id,
                    'jadwal_notifikasi' => $waktu
                ];
                $model_target_notifikasi->save($data);
            }
        }
        if (!empty($target[1])) {
            $getUser1 = $model_user->getUserByRole($target[1]);
            foreach ($getUser1 as $v) {
                $data = [
                    'id_notifikasi' => $id_notifikasi,
                    'id_user' => $v->id,
                    'jadwal_notifikasi' => $waktu
                ];
                $model_target_notifikasi->save($data);
            }
        }
        if (!empty($target[2])) {
            $getUser2 = $model_user->getUserByRole($target[2]);
            foreach ($getUser2 as $w) {
                $data = [
                    'id_notifikasi' => $id_notifikasi,
                    'id_user' => $w->id,
                    'jadwal_notifikasi' => $waktu
                ];
                $model_target_notifikasi->save($data);
            }
        }
        if (!empty($target[3])) {
            $getUser3 = $model_user->getUserByRole($target[3]);
            foreach ($getUser3 as $x) {
                $data = [
                    'id_notifikasi' => $id_notifikasi,
                    'id_user' => $x->id,
                    'jadwal_notifikasi' => $waktu
                ];
                $model_target_notifikasi->save($data);
            }
        }
        if (!empty($this->request->getVar('id_user'))) {
            $data = [
                'id_notifikasi' => $id_notifikasi,
                'id_user' => $this->request->getVar('id_user'),
                'jadwal_notifikasi' => $waktu
            ];
            $model_target_notifikasi->save($data);
        }

        return redirect()->to('/notifikasi/detail/'.$id_notifikasi);

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
        $model = new TargetNotifikasiModel();
        $id_target_notifikasi = $id;
        $status = $no;

        $data = [
            'status_notifikasi' => $status
        ];

        $model->update($id_target_notifikasi, $data);

        echo '<script>
                    alert("Selamat! Berhasil Mengubah Status Notifikasi");
                    window.location="' . base_url($_SERVER['HTTP_REFERER']) . '"
                </script>';
    }

    public function read($id)
    {
        $model = new TargetNotifikasiModel();
        $id_target_notifikasi = $id;

        $data = [
            'jenis_notifikasi' => '2'
        ];

        $model->update($id_target_notifikasi, $data);

        return redirect()->to(base_url($_SERVER['HTTP_REFERER']));
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

    public function delete_target($id)
    {
        $model = new TargetNotifikasiModel;


        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Target Notifikasi");
                window.location="' . base_url($_SERVER['HTTP_REFERER']) . '"
            </script>';
    }
}

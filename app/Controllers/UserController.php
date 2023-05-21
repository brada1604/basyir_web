<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel;
        $data['session'] = session();
        $data['title'] = 'Data User';
        $data['getUser'] = $model->getUserAll();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('user/index', $data);
        echo view('layout/v_footer');
    }

    public function add(){
        $data['title'] = 'Data User - Add';
        $data['session'] = session();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('user/add');
        echo view('layout/v_footer');
    }

    public function save(){
        $data['session'] = session();
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|matches[password]'
        ];
     
        if($this->validate($rules)){
            $model = new UserModel();

            $data = [
                'role' => $this->request->getVar('role'),
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => md5($this->request->getVar('password')),
            ];
             
            $model->save($data);

            // UNTUK EMAIL AKTIVASI
            $name_user = $this->request->getVar('name');
            $email_user = $this->request->getVar('email');
            $this->kirim_email($name_user, $email_user);
     
            return redirect()->to('/user_master');
     
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data User';

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('user/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function edit($id){
        $model = new UserModel;
        $data['session'] = session();
        $data['title'] = 'Data User - Edit';
        $data['getUser'] = $model->getUser($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('user/edit', $data);
        echo view('layout/v_footer');
    }

    public function edit_status($id, $no)
    {
        $model = new UserModel();
        $id_user = $id;
        $status = $no;

        $data = [
            'status_user' => $status
        ];

        $model->update($id_user, $data);

        echo '<script>
                    alert("Selamat! Berhasil Mengubah Status User");
                    window.location="' . base_url('user_master') . '"
                </script>';
    }

    public function aktivasi_akun($email)
    {
        $model = new UserModel();

        date_default_timezone_set('Asia/Jakarta');

        $id = $model->getUser($email);

        $data = [
            'status' => 1,
            'email_activated' => date("Y-m-d H:i:s")
        ];

        $model->update($id[0]->id, $data);

        echo '<script>
                    alert("Selamat! Berhasil Mengaktivasi Akun");
                    window.location="' . base_url('/') . '"
                </script>';
    }

    public function update(){
        $data['session'] = session();
        $rules = [
            'judul_user' => 'required',
            'deskripsi_user' => 'required',
            'sumber_user' => 'required'
        ];
     
        if($this->validate($rules)){
            $model = new UserModel();
            $id_user = $this->request->getVar('id_user');

                $data = [
                    'judul_user' => $this->request->getVar('judul_user'),
                    'deskripsi_user' => $this->request->getVar('deskripsi_user'),
                    'sumber_user' => $this->request->getVar('sumber_user'),
                ];

                $model->update($id_user, $data);
         
                echo '<script>
                    alert("Selamat! Berhasil Mengubah Data User");
                    window.location="' . base_url('user_master') . '"
                </script>';
            }
        else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data User';

            echo view('layout/v_header', $data);
            echo view('layout/v_navbar');
            echo view('user/add', $data);
            echo view('layout/v_footer');
        }

    }

    public function delete($id){
        $model = new UserModel;
        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data User");
                window.location="' . base_url('user_master') . '"
            </script>';
    }

    public function kirim_email($name_user, $email_user)
    {
        // initialize email setting from emailConfig function.
        $this->email->initialize($this->emailConfig());

        // Set sender email and name from .env file
        $this->email->setFrom('b32c2204641c0d', 'Basyir Group');
        // target email or receiver
        $this->email->setTo($email_user);
        // Email subject
        $this->email->setSubject('Aktivasi user');
        // Email message
        $this->email->setMessage('Selamat Datang '.$name_user.' di Basyir System <a href="'.base_url("/aktivasi_akun").'">Link Aktivasi</a> atau '.base_url("/aktivasi_akun/$email_user"));
        // make sure email is send
        if($this->email->send()){
            echo 'Success!';

            echo '<script>
                alert("Selamat! Berhasil Mengirim Email");
                window.location="' . base_url('user_master') . '"
            </script>';

        }else {
            echo 'failed';
        }
        
        // return view('welcome_message');
    }

    public function index2()
    {
        // initialize email setting from emailConfig function.
        $this->email->initialize($this->emailConfig());

        // Set sender email and name from .env file
        $this->email->setFrom('b32c2204641c0d', 'Basyir Group');
        // target email or receiver
        $this->email->setTo('jaironlanda@gmail.com');
        // Email subject
        $this->email->setSubject('Reset Password');
        // Email message
        $this->email->setMessage('Testing the email class.');

        // make sure email is send
        if($this->email->send()){
            echo 'Success!';
        }else {
            echo 'failed';
        }
        
        // return view('welcome_message');
    }

    //--------------------------------------------------------------------

    /**
     * Set email configuration from .env file
     * getenv = get the the value of an environment variable (.env file)
     */
    private function emailConfig()
    {
        // Protocol
        $config['protocol'] = 'smtp';
        // Host
        $config['SMTPHost'] = 'smtp.mailtrap.io';
        // Port
        $config['SMTPPort'] = 2525;
        // User
        $config['SMTPUser'] = 'b32c2204641c0d';
        // Pass
        $config['SMTPPass'] = '1458624a24aa24';
        
        return $config;
    }
}

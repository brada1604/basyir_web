<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $data['title'] = 'Login Page';
        echo view('auth/v_login', $data);
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getVar('email'); // data input
        $password = $this->request->getVar('password'); // data input



        // $data = $model->where('email LIKE BINARY', $email)->first(); // digunakan like binary agar case sensitive
        $data = $model->getUser($email);

        if($data){

            if ($data[0]->status == 0) {
                $session->setFlashdata('msg', 'Akun Belum di aktifkan, Cek Email kamu !');
                return redirect()->to('/login');
            }
            else if ($data[0]->status == 2) {
                $session->setFlashdata('msg', 'Akun di banned, Silahkan hubungi admin !');
                return redirect()->to('/login');
            }
            else{
                $pass = $data[0]->password; // data dari database yang sudah di cocokan
                $verify_pass = password_verify($password, $pass);

                if($verify_pass){
                    
                    $sess_data = [
                        'id'        => $data[0]->id,
                        'email'  => $data[0]->email,
                        'name'      => $data[0]->name,
                        'role'      => $data[0]->role,
                        'logged_in' => TRUE
                    ]; // proses pembuatan data session

                    $session->set($sess_data); // proses input data session
                    return redirect()->to('/dashboard');
                }else{
                    $session->setFlashdata('msg', 'Password salah !');
                    return redirect()->to('/login');
                }
            }
        
        }else{
            $session->setFlashdata('msg', 'Email tidak ditemukan !');
            return redirect()->to('/login');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy(); // proses mendestroy
        return redirect()->to('/login');
    }
}
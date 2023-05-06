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

        $nip = $this->request->getVar('nip'); // data input
        $username = $this->request->getVar('username'); // data input
        $password = $this->request->getVar('password'); // data input

        // $data = $model->where('username LIKE BINARY', $username)->first(); // digunakan like binary agar case sensitive
        $data = $model->getUser($username);

        if($data){
            if ($nip == $data[0]->nip) {
                $pass = $data[0]->password; // data dari database yang sudah di cocokan
                $verify_pass = password_verify($password, $pass);

                if($verify_pass){
                    $sess_data = [
                        'id'        => $data[0]->id,
                        'nip'  => $data[0]->nip,
                        'username'  => $data[0]->username,
                        'name'      => $data[0]->name,
                        'logged_in' => TRUE
                    ]; // proses pembuatan data session

                    $session->set($sess_data); // proses input data session
                    return redirect()->to('/home');
                }else{
                    $session->setFlashdata('msg', 'Password salah !');
                    return redirect()->to('/login');
                }
            }
            else{
                $session->setFlashdata('msg', 'Nip salah !');
                return redirect()->to('/login');
            }
            
        }else{
            $session->setFlashdata('msg', 'Username tidak ditemukan !');
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
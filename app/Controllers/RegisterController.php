<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class RegisterController extends BaseController
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data['title'] = 'Register Page';
        echo view('auth/v_register', $data);
    }
 
    public function save()
    {
        //include helper form
        helper(['form']);

        $data['title'] = 'Register Page';

        //set rules validation form
        $rules = [
            'name'          => 'required',
            'username'      => 'required|min_length[3]|max_length[20]',
            'password'      => 'required|min_length[6]|max_length[20]',
            'confpassword'  => 'matches[password]'
        ];
         
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'name'     => $this->request->getVar('name'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('auth/v_register', $data);
        }    
    }
}
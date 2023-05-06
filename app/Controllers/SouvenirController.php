<?php

namespace App\Controllers;

use App\Models\SouvenirModel;
use App\Controllers\BaseController;

class SouvenirController extends BaseController
{
    public function index()
    {
        $model = new SouvenirModel;
        $data['title'] = 'Data Souvenir';
        $data['getSouvenir'] = $model->getSouvenir();

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('souvenir/index', $data);
        echo view('layout/v_footer');
    }

    public function display()
    {
        $model = new SouvenirModel;
        $data['title'] = 'Display Souvenir';
        $data['getSouvenir'] = $model->getSouvenir();

        //  GET SESSION CART
        $data['cart'] = session()->get('cart');

        // JIKA DATA ARRAY CART MASIH NULL / KOSONG ATAU TIDAK TERDETEKSI, MAKA DATA CART DI SET ARAY KOSONG
        if ($data['cart'] == NULL) {
            $data['cart'] = [];
        }


        echo view('layout/v_header', $data);
        // echo view('layout/v_navbar');
        echo view('souvenir/display', $data);
        echo view('layout/v_footer');
    }

    public function add(){
        $data['title'] = 'Data Souvenir';

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('souvenir/add');
        echo view('layout/v_footer');
    }

    public function save(){
        $rules = [
            'namabrg' => 'required',
            'harga' => 'required|numeric',
            'diskon' => 'required|numeric',
            'stok' => 'required|numeric',
            'image_file'     => 'uploaded[image_file]|is_image[image_file]'
        ];
     
        if($this->validate($rules)){
            $model = new SouvenirModel();
            $fileImage_name = "";
            if(isset($_FILES) && @$_FILES['image_file']['error'] != '4') {
                if($fileImage = $this->request->getFile('image_file')) {
                    if (! $fileImage->isValid()) {
                        throw new \RuntimeException($fileImage->getErrorString().'('.$fileImage->getError().')');
                    } else {            
     
                        $fileImage->move('assets/image/barang');
                        $fileImage_name = $fileImage->getName();
                    }
                }
            }
            $data = [
                'namabrg' => $this->request->getVar('namabrg'),
                'harga' => $this->request->getVar('harga'),
                'diskon' => $this->request->getVar('diskon')/100,
                'stok' => $this->request->getVar('stok'),
                'namafile' => 'assets/image/barang/'.$fileImage_name,
            ];
             
            $model->save($data);
     
            return redirect()->to('/souvenir_master');
     
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Souvenir';

            echo view('layout/v_header', $data);
            echo view('layout/v_navbar');
            echo view('souvenir/add', $data);
            echo view('layout/v_footer');
        }
    }
}

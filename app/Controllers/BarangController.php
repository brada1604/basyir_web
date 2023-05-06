<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Controllers\BaseController;

class BarangController extends BaseController
{
    public function display()
    {
        $model = new BarangModel;
        $data['title'] = 'Display Barang';
        $data['getBarang'] = $model->getBarang();

        //  GET SESSION CART
        $data['cart'] = session()->get('cart');

        // JIKA DATA ARRAY CART MASIH NULL / KOSONG ATAU TIDAK TERDETEKSI, MAKA DATA CART DI SET ARAY KOSONG
        if ($data['cart'] == NULL) {
            $data['cart'] = [];
        }


        echo view('layout/v_header', $data);
        // echo view('layout/v_navbar');
        echo view('barang/display', $data);
        echo view('layout/v_footer');
    }
}

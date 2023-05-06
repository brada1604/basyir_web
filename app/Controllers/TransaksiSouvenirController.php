<?php

namespace App\Controllers;

use App\Models\SouvenirModel;
use App\Models\TranspjlModel;
use App\Models\DetailjualModel;
use App\Controllers\BaseController;

class TransaksiSouvenirController extends BaseController
{
    public function index()
    {
        $model = new SouvenirModel;
        $data['title'] = 'Checkout';

        //  GET SESSION CART
        $data['cart'] = session()->get('cart');

        // JIKA DATA ARRAY CART MASIH NULL / KOSONG ATAU TIDAK TERDETEKSI, MAKA DATA CART DI SET ARAY KOSONG
        if ($data['cart'] == NULL) {
            $data['cart'] = [];
        }

        echo view('layout/v_header', $data);
        // echo view('layout/v_navbar');
        echo view('transaksi_souvenir/checkout', $data);
        echo view('layout/v_footer');
    }

    public function save(){
        // DEKLARASI MODEL
        $model_SouvenirModel = new SouvenirModel;
        $model_TranspjlModel = new TranspjlModel;
        $model_DetailjualModel = new DetailjualModel;

        //  GET SESSION CART
        $cart_session = session()->get('cart');

        // DEKLARASI TOTAL PEMBAYARAN
        $total_pembayaran = 0;

        // PROSES MENGHITUNG TOTAL PEMBAYARAN
        foreach ($cart_session as $cs) {
            $total_pembayaran += $cs['subtotal'];
        }

        // PROSES INSERT DATA KE TBL_TRANSAKSI
        $data_transaksi = array(
            'total' => $total_pembayaran,
            'nama' => $this->request->getPost('nama'),
            'hp' => $this->request->getPost('hp'),
            'alamat' => $this->request->getPost('alamat'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kota' => $this->request->getPost('kota')
        );

        $model_TranspjlModel->insert($data_transaksi);

        // UNTUK MENDAPATKAN ID TRANSAKSI TERAKHIR
        $lastInsertId = $model_TranspjlModel->insertID();

        // PROSES INSERT DATA DETAIL TRANSAKSI KE TBL DETAIL TRANSAKSI
        foreach ($cart_session as $css) {
            $data_detail_transaksi = array(
                'idtrans' => $lastInsertId,
                'idbrg' => $css['idbrg'],
                'hargajual' => $css['harga'],
                'jmljual' => $css['qty'],
                'subtotal' => $css['subtotal']
            );

            $model_DetailjualModel->insert($data_detail_transaksi);

            // PROSES MENGURANGI STOK
            $product = $model_SouvenirModel->find($css['idbrg']);
            $data_barang = [
                'stok' => $product['stok'] - $css['qty']
            ];

            $model_SouvenirModel->update($css['idbrg'], $data_barang);
        }

        // MELAKUKAN HAPUS DATA CART
        session()->destroy();

        echo '<script>
                    alert("Selamat! Berhasil Melakukan Transaksi");
                    window.location="' . base_url('/souvenir') . '"
                </script>';
    }
}

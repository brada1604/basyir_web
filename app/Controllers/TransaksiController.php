<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;
use App\Controllers\BaseController;

class TransaksiController extends BaseController
{
    public function index()
    {
        $model = new BarangModel;
        $data['title'] = 'Checkout';

        //  GET SESSION CART
        $data['cart'] = session()->get('cart');

        // JIKA DATA ARRAY CART MASIH NULL / KOSONG ATAU TIDAK TERDETEKSI, MAKA DATA CART DI SET ARAY KOSONG
        if ($data['cart'] == NULL) {
            $data['cart'] = [];
        }

        echo view('layout/v_header', $data);
        // echo view('layout/v_navbar');
        echo view('transaksi/checkout', $data);
        echo view('layout/v_footer');
    }

    public function save(){
        // DEKLARASI MODEL
        $model_BarangModel = new BarangModel;
        $model_TransaksiModel = new TransaksiModel;
        $model_DetailTransaksiModel = new DetailTransaksiModel;

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
            'status_pembayaran' => 1,
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
            'total_pembayaran' => $total_pembayaran,
            'nama_pembeli' => $this->request->getPost('nama_pembeli'),
            'email' => $this->request->getPost('email'),
            'telepon' => $this->request->getPost('telepon'),
            'alamat' => $this->request->getPost('alamat'),
            'kode_pos' => $this->request->getPost('kode_pos')
        );

        $model_TransaksiModel->insert($data_transaksi);

        // UNTUK MENDAPATKAN ID TRANSAKSI TERAKHIR
        $lastInsertId = $model_TransaksiModel->insertID();

        // PROSES INSERT DATA DETAIL TRANSAKSI KE TBL DETAIL TRANSAKSI
        foreach ($cart_session as $css) {
            $data_detail_transaksi = array(
                'id_transaksi' => $lastInsertId,
                'id_barang' => $css['id'],
                'harga_beli' => $css['harga_barang'],
                'qty' => $css['qty'],
                'subtotal' => $css['subtotal']
            );

            $model_DetailTransaksiModel->insert($data_detail_transaksi);

            // PROSES MENGURANGI STOK
            $product = $model_BarangModel->find($css['id']);
            $data_barang = [
                'stok_barang' => $product['stok_barang'] - $css['qty']
            ];

            $model_BarangModel->update($css['id'], $data_barang);
        }

        // MELAKUKAN HAPUS DATA CART
        session()->destroy();

        echo '<script>
                    alert("Selamat! Berhasil Melakukan Transaksi");
                    window.location="' . base_url('/barang') . '"
                </script>';
    }
}

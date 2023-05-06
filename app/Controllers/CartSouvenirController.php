<?php

namespace App\Controllers;

use App\Models\SouvenirModel;
use App\Controllers\BaseController;

class CartSouvenirController extends BaseController
{
    public function index()
    {
        $model = new SouvenirModel;
        $data['title'] = 'Display Cart Souvenir';
        $data['getSouvenir'] = $model->getSouvenir();

        //  GET SESSION CART
        $data['cart'] = session()->get('cart');

        // JIKA DATA ARRAY CART MASIH NULL / KOSONG ATAU TIDAK TERDETEKSI, MAKA DATA CART DI SET ARAY KOSONG
        if ($data['cart'] == NULL) {
            $data['cart'] = [];
        }


        echo view('layout/v_header', $data);
        // echo view('layout/v_navbar');
        echo view('cart_souvenir/display', $data);
        echo view('layout/v_footer');
    }

    public function add($idbrg, $qty)
    {
        // MENAMBAHKAN ITEM KE CART
        $model = new SouvenirModel;
        $product = $model->find($idbrg);

        // BAGIAN SESSION
        $cart = session()->get('cart');

        // JIKA SEBELUMNYA PRODUK SUDAH DIPESAN, MAKA HANYA DITAMBAH 1 QTY DAN UPDATE JUMLAH SUBTOTALNYA
        if (isset($cart[$idbrg])) {
            if ($product['stok'] < $cart[$idbrg]['qty'] + 1) {
                echo '<script>
                    alert("Error! Stok Kurang");
                    window.location="' . base_url('/souvenir') . '"
                </script>';
                exit();
            }
            else{
                $cart[$idbrg]['qty'] = $cart[$idbrg]['qty'] + 1;
                $cart[$idbrg]['subtotal'] = $cart[$idbrg]['qty'] * ($product['harga']-($product['harga']*$product['diskon']));
            }
        }
        // JIKA SEBELUMNYA PRODUK BELUM DIPESAN, MAKA AKAN DITAMBAH KE CART SEBAGAI PRODUK BARU DITAMBAH KE CART
        else {
            $cart[$idbrg] = [
                'idbrg' => $product['idbrg'],
                'namabrg' => $product['namabrg'],
                'harga' => $product['harga']-($product['harga']*$product['diskon']),
                'qty' => $qty,
                'subtotal' => ($product['harga']-($product['harga']*$product['diskon'])) * $qty,
            ];
        }        
        
        // SET SESSION SEMACAM SAVE DATA
        session()->set('cart', $cart);

        // REDIRECT LAGI KE BARANG
        return redirect()->to('/souvenir');
    }

    public function update()
    {
        $idbrg = $this->request->getPost('idbrg');
        $qty = $this->request->getPost('qty');

        $model = new SouvenirModel;
        $product = $model->find($idbrg);

        // Cek stok barang 
        if ($product['stok'] < $qty) {
            echo '<script>
                    alert("Error! Stok Kurang");
                    window.location="' . base_url('/souvenir') . '"
                </script>';
        }
        else{
            // MENGUPDATE JUMLAH ITEM DI CART

            // BAGIAN SESSION
            $cart = session()->get('cart');

            // UPDATE BAGIAN QTY CART SESUAI INPUTAN
            $cart[$idbrg]['qty'] = $qty;

            // UPDATE BAGIAN SUBTOTAL CART BERDASARKAN PERHITUNGAN ANTARA QTY TERBARU DENGAN HARGA BARANG DI DATABASE (KARENA SIFATNYA MASIH CART MAKA HARGA BARANG MASIH MENGAMBIL DI DATABASE.)
            $cart[$idbrg]['subtotal'] = $qty * ($product['harga']-($product['harga']*$product['diskon']));

            // SET SESSION SEMACAM SAVE DATA
            session()->set('cart', $cart);

            // REDIRECT LAGI KE BARANG
            return redirect()->to('/souvenir');
        }
    }

    public function remove($idbrg)
    {
        // MENGHAPUS ITEM DARI CART
        // BAGIAN SESSION
        $cart = session()->get('cart');

        // MELAKUKAN HAPUS DATA CART SESUAI ID
        unset($cart[$idbrg]);

        // SET SESSION SEMACAM SAVE DATA
        session()->set('cart', $cart);

        // REDIRECT LAGI KE BARANG
        return redirect()->to('/souvenir');
    }

    public function clear(){
        session()->destroy();

        echo '<script>
                    alert("Selamat! Berhasil Menghapus Keranjang");
                    window.location="' . base_url('/cart_souvenir') . '"
                </script>';
    }
}

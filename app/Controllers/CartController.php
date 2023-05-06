<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Controllers\BaseController;

class CartController extends BaseController
{
    public function index()
    {

    }

    public function add($id, $qty)
    {
        // MENAMBAHKAN ITEM KE CART
        $model = new BarangModel;
        $product = $model->find($id);

        // BAGIAN SESSION
        $cart = session()->get('cart');

        // JIKA SEBELUMNYA PRODUK SUDAH DIPESAN, MAKA HANYA DITAMBAH 1 QTY DAN UPDATE JUMLAH SUBTOTALNYA
        if (isset($cart[$id])) {
            if ($product['stok_barang'] < $cart[$id]['qty'] + 1) {
                echo '<script>
                    alert("Error! Stok Kurang");
                    window.location="' . base_url('/barang') . '"
                </script>';
                exit();
            }
            else{
                $cart[$id]['qty'] = $cart[$id]['qty'] + 1;
                $cart[$id]['subtotal'] = $cart[$id]['qty'] * $product['harga_barang'];
            }
        }
        // JIKA SEBELUMNYA PRODUK BELUM DIPESAN, MAKA AKAN DITAMBAH KE CART SEBAGAI PRODUK BARU DITAMBAH KE CART
        else {
            $cart[$id] = [
                'id' => $product['id'],
                'nama_barang' => $product['nama_barang'],
                'harga_barang' => $product['harga_barang'],
                'qty' => $qty,
                'subtotal' => $product['harga_barang'] * $qty,
            ];
        }        
        
        // SET SESSION SEMACAM SAVE DATA
        session()->set('cart', $cart);

        // REDIRECT LAGI KE BARANG
        return redirect()->to('/barang');
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $qty = $this->request->getPost('qty');

        $model = new BarangModel;
        $product = $model->find($id);

        // Cek stok barang 
        if ($product['stok_barang'] < $qty) {
            echo '<script>
                    alert("Error! Stok Kurang");
                    window.location="' . base_url('/barang') . '"
                </script>';
        }
        else{
            // MENGUPDATE JUMLAH ITEM DI CART

            // BAGIAN SESSION
            $cart = session()->get('cart');

            // UPDATE BAGIAN QTY CART SESUAI INPUTAN
            $cart[$id]['qty'] = $qty;

            // UPDATE BAGIAN SUBTOTAL CART BERDASARKAN PERHITUNGAN ANTARA QTY TERBARU DENGAN HARGA BARANG DI DATABASE (KARENA SIFATNYA MASIH CART MAKA HARGA BARANG MASIH MENGAMBIL DI DATABASE.)
            $cart[$id]['subtotal'] = $qty * $product['harga_barang'];

            // SET SESSION SEMACAM SAVE DATA
            session()->set('cart', $cart);

            // REDIRECT LAGI KE BARANG
            return redirect()->to('/barang');
        }
    }

    public function remove($id)
    {
        // MENGHAPUS ITEM DARI CART
        // BAGIAN SESSION
        $cart = session()->get('cart');

        // MELAKUKAN HAPUS DATA CART SESUAI ID
        unset($cart[$id]);

        // SET SESSION SEMACAM SAVE DATA
        session()->set('cart', $cart);

        // REDIRECT LAGI KE BARANG
        return redirect()->to('/barang');
    }


}
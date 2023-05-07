<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class JadwalSolatController extends BaseController
{
    public function index()
    {
        $url_2 = 'https://api.banghasan.com/sholat/format/json/kota'; // URL API eksternal yang ingin diambil datanya
        
        $ch_2 = curl_init(); // Inisialisasi CURL
        curl_setopt($ch_2, CURLOPT_URL, $url_2); // Set URL yang ingin diambil
        curl_setopt($ch_2, CURLOPT_RETURNTRANSFER, true); // Aktifkan opsi untuk mengembalikan hasil sebagai string
        
        $response_2 = curl_exec($ch_2); // Eksekusi permintaan HTTP
        curl_close($ch_2); // Tutup koneksi CURL
        
        $data_kota = json_decode($response_2); // proses decode JSON

        $data['kota'] = $data_kota;

        var_dump($data['kota']); // Kembalikan hasil yang diperoleh dari API eksternal
    }

    public function jadwal_solat()
    {
        $today = date('Y-m-d');
        $id_kota = 703;
        
        $url = 'https://api.banghasan.com/sholat/format/json/jadwal/kota/'.$id_kota.'/tanggal/'.$today; // URL API eksternal yang ingin diambil datanya
        
        $ch = curl_init(); // Inisialisasi CURL
        curl_setopt($ch, CURLOPT_URL, $url); // Set URL yang ingin diambil
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Aktifkan opsi untuk mengembalikan hasil sebagai string
        
        $response = curl_exec($ch); // Eksekusi permintaan HTTP
        curl_close($ch); // Tutup koneksi CURL
        
        $data_jadwal = json_decode($response); // proses decode JSON

        $data['pengingat_imsak'] = $data_jadwal->jadwal->data->imsak;
        $data['pengingat_subuh'] = $data_jadwal->jadwal->data->subuh;
        $data['pengingat_dzuhur'] = $data_jadwal->jadwal->data->dzuhur;
        $data['pengingat_ashar'] = $data_jadwal->jadwal->data->ashar;
        $data['pengingat_maghrib'] = $data_jadwal->jadwal->data->maghrib;
        $data['pengingat_isya'] = $data_jadwal->jadwal->data->isya;
        var_dump($data_jadwal); // Kembalikan hasil yang diperoleh dari API eksternal
    }
}

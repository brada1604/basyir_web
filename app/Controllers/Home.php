<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\WawasanIslamiModel;

class Home extends BaseController
{
    public function index()
    {   
        $model_berita = new BeritaModel;
        $model_wawasan_islami = new WawasanIslamiModel;

        $data['getBeritaLandingPage'] = $model_berita->getBeritaLandingPage();
        $data['getWawasanIslamiLandingPage'] = $model_wawasan_islami->getWawasanIslamiLandingPage();
        return view('welcome', $data);
    }
}

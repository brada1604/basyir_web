<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class InfoController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Page Info';
        // return view('info/v_info', $data);
        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('info/v_info'); // informasi
        echo view('layout/v_footer');
    }
}

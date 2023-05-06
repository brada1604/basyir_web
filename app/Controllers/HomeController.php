<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $data['session'] = session();
        // echo "Welcome back, ".$session->get('name');

        $data['title'] = 'Page Home';
        // return view('home/v_home', $data);
        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('home/v_home');
        echo view('layout/v_footer');
    }
}

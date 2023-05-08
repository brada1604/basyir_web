<?php

namespace App\Controllers;

use App\Models\SaranModel;
use App\Models\KutipanModel;
use App\Models\BeritaModel;
use App\Models\WawasanIslamiModel;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data['session'] = session();

        if (session()->get('role') == 1) { // Role : superadmin
            $model_saran = new SaranModel;
            $model_kutipan = new KutipanModel;
            $model_berita = new BeritaModel;
            $model_wawasan_islami = new WawasanIslamiModel;
            $data['title'] = 'Basyir - Dashboard Superadmin';
            $data['total_saran'] = $model_saran->countAll();
            $data['total_kutipan'] = $model_kutipan->countAll();
            $data['total_berita'] = $model_berita->countAll();
            $data['total_wawasan_islami'] = $model_wawasan_islami->countAll();

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('dashboard/dashboard_superadmin', $data);
            echo view('layout/v_footer');
        }
        elseif (session()->get('role') == 2) { // Role : kontributor
            $model_berita = new BeritaModel;
            $data['title'] = 'Basyir - Dashboard Kontributor';
            $data['berita_draft'] = $model_berita->countByStatus(1)[0]->total_berita;
            $data['berita_show'] = $model_berita->countByStatus(2)[0]->total_berita;
            $data['berita_archive'] = $model_berita->countByStatus(3)[0]->total_berita;
            $data['berita_reject'] = $model_berita->countByStatus(4)[0]->total_berita;

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('dashboard/dashboard_kontributor', $data);
            echo view('layout/v_footer');
        }
        elseif (session()->get('role') == 3) { // Role : kreator
            $model_wawasan_islami = new WawasanIslamiModel;
            $data['title'] = 'Basyir - Dashboard Creator';
            $data['wawasan_islami_draft'] = $model_wawasan_islami->countByStatus(1)[0]->total_wawasan_islami;
            $data['wawasan_islami_show'] = $model_wawasan_islami->countByStatus(2)[0]->total_wawasan_islami;
            $data['wawasan_islami_archive'] = $model_wawasan_islami->countByStatus(3)[0]->total_wawasan_islami;
            $data['wawasan_islami_reject'] = $model_wawasan_islami->countByStatus(4)[0]->total_wawasan_islami;

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('dashboard/dashboard_kreator', $data);
            echo view('layout/v_footer');
        }
        elseif (session()->get('role') == 4) { // Role : user
            $data['title'] = 'Basyir - Dashboard User';

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('dashboard/dashboard_user');
            echo view('layout/v_footer');
        }
        else{
            return redirect()->to('/login'); 
        }

        
    }
}

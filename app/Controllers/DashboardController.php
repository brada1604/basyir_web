<?php

namespace App\Controllers;

use App\Models\SaranModel;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data['session'] = session();

        if (session()->get('role') == 1) { // Role : superadmin
            $model_saran = new SaranModel;
            $data['title'] = 'Basyir - Dashboard Superadmin';
            $data['total_saran'] = $model_saran->countAll();

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('dashboard/dashboard_superadmin', $data);
            echo view('layout/v_footer');
        }
        elseif (session()->get('role') == 2) { // Role : kontributor
            $data['title'] = 'Basyir - Dashboard Kontributor';

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('dashboard/dashboard_kontributor');
            echo view('layout/v_footer');
        }
        elseif (session()->get('role') == 3) { // Role : kreator
            $data['title'] = 'Basyir - Dashboard Creator';

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('dashboard/dashboard_kreator');
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

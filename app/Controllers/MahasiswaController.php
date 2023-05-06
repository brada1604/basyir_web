<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class MahasiswaController extends BaseController
{
    public function index()
    {
        $model = new MahasiswaModel;
        $data['title'] = 'Data Mahasiswa';
        // $data['getMahasiswa'] = $model->getMahasiswa();
        $data['getMahasiswa'] = $model->paginate(3, 'mahasiswa');
        $data['pager'] = $model->pager;

        //  GET SESSION NILAI
        $data['nilai'] = session()->get('nilai');

        // JIKA DATA ARRAY NILAI MASIH NULL / KOSONG ATAU TIDAK TERDETEKSI, MAKA DATA NILAI DI SET ARAY KOSONG
        if ($data['nilai'] == NULL) {
            $data['nilai'] = [];
        }
 
        // return view('mahasiswa/index', $data);

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('mahasiswa/index', $data);
        echo view('layout/v_footer');
    }

    public function search()
    {
        $model = new MahasiswaModel;
        $data['title'] = 'Data Mahasiswa By Nama';
        $nama = $this->request->getPost('nama');
        $data['getMahasiswa'] = $model->getMahasiswaByNama($nama)->paginate(3, 'mahasiswa');
        $data['pager'] = $model->pager;

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('mahasiswa/index', $data);
        echo view('layout/v_footer');
    }

    public function detail($id){
        $model = new MahasiswaModel;
        $data['title'] = 'Data Detail Mahasiswa';
        $data['getMahasiswa'] = $model->getMahasiswa($id);
        
        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('mahasiswa/detail', $data);
        echo view('layout/v_footer');
    }

    public function add(){
        $data['title'] = 'Data Mahasiswa';
        return view('mahasiswa/add', $data);
    }

    public function save(){
        $model = new MahasiswaModel;
        $data = array(
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        );
        $model->saveMahasiswa($data);
        echo '<script>
                alert("Selamat! Berhasil Menambah Data Mahasiswa");
                window.location="' . base_url('mahasiswa') . '"
            </script>';
    }

    public function edit($id){
        $model = new MahasiswaModel;
        $data['title'] = 'Data Mahasiswa - Edit';
        $data['getMahasiswa'] = $model->getMahasiswa($id);

        echo view('layout/v_header', $data);
        echo view('layout/v_navbar');
        echo view('mahasiswa/edit', $data);
        echo view('layout/v_footer');
    }

    public function update(){
        $model = new MahasiswaModel;

        $data = array(
            'id' => $this->request->getPost('id'),
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur')
        );
        $model->updateMahasiswa($data);

        echo '<script>
                alert("Selamat! Berhasil Mengubah Data Mahasiswa");
                window.location="' . base_url('mahasiswa') . '"
            </script>';
    }


    public function delete($id){
        $model = new MahasiswaModel;
        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Mahasiswa");
                window.location="' . base_url('mahasiswa') . '"
            </script>';
    }

    public function import_excel()
    {
        // PROSES IDENTIFIKASI SESSION
        $nilai = session()->get('nilai');

        session()->remove('nilai');

        // Proses Import Data
        $file_excel = $this->request->getFile('fileexcel');

        $ext = $file_excel->getClientExtension();

        if($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } 
        else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();
        foreach($data as $x => $row) {
            if ($x == 0) {
                continue;
            }

            $data[$x] = array(
                'id' => $row[0],
                'nim' => $row[1],
                'nama' => $row[2],
                'uts' => $row[3],
                'uas' => $row[4],
                'final' => ((45/100)*$row[3])+((55/100)*$row[4])
            );

            // SET SESSION SEMACAM SAVE DATA
            $nilai[$x] = $data[$x];
            session()->set('nilai', $nilai);
        }
        
        // return redirect()->to('/mahasiswa');

        // Proses export data
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'id')
                    ->setCellValue('B1', 'nim')
                    ->setCellValue('C1', 'nama')
                    ->setCellValue('D1', 'uts')
                    ->setCellValue('E1', 'uas')
                    ->setCellValue('F1', 'final');
        
        $column = 2;
        // tulis data  ke cell

        foreach($data as $key => $value) {
            if ($key == 0) {
                continue;
            }
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $value['id'])
                        ->setCellValue('B' . $column, $value['nim'])
                        ->setCellValue('C' . $column, $value['nama'])
                        ->setCellValue('D' . $column, $value['uts'])
                        ->setCellValue('E' . $column, $value['uas'])
                        ->setCellValue('F' . $column, $value['final']);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data nilai akhir';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function export_pdf(){

        $filename = date('y-m-d-H-i-s'). 'Data Nilai';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $data = [
            'imageSrc'    => $this->imageToBase64(ROOTPATH . '/public/assets/image/logo/logo_polban.png'),
            'nilai'       => session()->get('nilai')
        ];

        //  GET SESSION NILAI
        // $data['nilai'] = session()->get('nilai');

        // JIKA DATA ARRAY NILAI MASIH NULL / KOSONG ATAU TIDAK TERDETEKSI, MAKA DATA NILAI DI SET ARAY KOSONG
        if ($data['nilai'] == NULL) {
            $data['nilai'] = [];
        }

        // load HTML content
        $dompdf->loadHtml(view('mahasiswa/nilai_pdf', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);

        echo '<script>
                alert("Selamat! Berhasil mengexport PDF");
                window.location="' . base_url('mahasiswa') . '"
            </script>';
    }

    // public function export_pdf()
    // {
    //     $dompdf = new Dompdf();
    //     $data = [
    //         'imageSrc'    => $this->imageToBase64(ROOTPATH . '/public/assets/image/logo/logo_polban.png'),
    //         'name'         => 'John Doe',
    //         'address'      => 'USA',
    //         'mobileNumber' => '000000000',
    //         'email'        => 'john.doe@email.com'
    //     ];
    //     $html = view('mahasiswa/nilai_pdf', $data);
    //     $dompdf->loadHtml($html);
    //     $dompdf->render();
    //     $dompdf->stream('resume.pdf', [ 'Attachment' => false ]);
    // }
 
    private function imageToBase64($path) {
        $path = $path;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }

    public function clear(){
        session()->remove('nilai');

        echo '<script>
                    alert("Selamat! Berhasil Menghapus Data Nilai Mahasiswa");
                    window.location="' . base_url('/mahasiswa') . '"
                </script>';
    }
}

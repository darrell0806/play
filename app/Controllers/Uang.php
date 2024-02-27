<?php

namespace App\Controllers;
use App\Models\M_model;
use App\Models\M_laporan;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Uang extends BaseController
{
	public function index()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2  ||  session()->get('level')==3 ||  session()->get('level')==4){
			$model=new M_model();
			$kui['kunci']='lmasuk';
			$data['title'] = 'Laporan Keuangan';
        echo view('partial/header_datatable',$data);
        echo view('partial/side_menu');
        echo view('partial/top_menu');
			echo view('filters',$kui);
            echo view('partial/footer_datatable');
		}else{
			return redirect()->to('/Home');
		}
	}
    public function cari_semua()
    {
        // Cek level pengguna
        if (session()->get('level') == 1 || session()->get('level') == 2) {
            $model = new M_laporan();
            $data['title'] = 'Laporan Keuangan';
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');
            
            // Ambil data laporan keuangan
            $laporan['laporan'] = $model->getLaporanKeuangan($awal, $akhir);
    
            // Tampilkan view laporan keuangan
            echo view('laporan_semua', $laporan);
        } else {
            return redirect()->to('/Home');
        }
    }
    public function pdf_semua()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2 ){
            $model = new M_laporan();
            $data['title'] = 'Laporan Keuangan';
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');
            
            // Ambil data laporan keuangan
            $kui['laporan'] = $model->getLaporanKeuangan($awal, $akhir);
		$dompdf = new\Dompdf\Dompdf();
		$dompdf->loadHtml(view('laporan_semua',$kui));
		$dompdf->setPaper('A4','potrait');
		$dompdf->render();
		$dompdf->stream('my.pdf', array('Attachment'=>0));
        exit();
	}else{
		return redirect()->to('/login');
	}
	}
}
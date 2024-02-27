<?php

namespace App\Controllers;
use App\Models\M_model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class laporan extends BaseController

{
    public function index()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
            $data['title']='Laporan Penjualan';
			$kui['kunci']='jual';
            echo view('partial/header_datatable',$data);
            echo view('partial/side_menu');
            echo view('partial/top_menu');
            echo view('filter',$kui);
            echo view('partial/footer_datatable');    
		}else{
			return redirect()->to('/Home');
		}
	}
    public function print_windows()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
            $model = new M_model();
            $kui['title'] = 'Laporan Penjualan';
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');
            $kui['duar'] = $model->filterbku('bill', 'tarif', 'user', 'jenis', 'bill.tarif = tarif.id_tarif', 'bill.user = user.id_user', 'tarif.jenis = jenis.id_jenis', $awal, $akhir);
            echo view('v_jual', $kui);
}else{
	return redirect()->to('login');
}
	}
    public function pdf()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2 ){
		$model = new M_model();
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');
        $kui['title'] = 'Laporan Penjualan';
        $kui['duar'] = $model->filterbku('bill', 'tarif', 'user', 'jenis', 'bill.tarif = tarif.id_tarif', 'bill.user = user.id_user', 'tarif.jenis = jenis.id_jenis', $awal, $akhir);
		$dompdf = new\Dompdf\Dompdf();
		$dompdf->loadHtml(view('v_jual',$kui));
		$dompdf->setPaper('A4','potrait');
		$dompdf->render();
		$dompdf->stream('my.pdf', array('Attachment'=>0));
        exit();
	}else{
		return redirect()->to('/login');
	}
	}
    public function excel()
    {
        if(session()->get('level')==1 ||  session()->get('level')==2){
            $model=new M_model();
            $awal = $this->request->getPost('awal');
            $akhir = $this->request->getPost('akhir');
            $data = $model->filterbku('bill', 'tarif', 'user', 'jenis', 'bill.tarif = tarif.id_tarif', 'bill.user = user.id_user', 'tarif.jenis = jenis.id_jenis', $awal, $akhir);
    
            $spreadsheet=new Spreadsheet();
    
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Nama')
                ->setCellValue('B1', 'Jenis Permainan')
                ->setCellValue('C1', 'Menit')
                ->setCellValue('D1', 'Status')
                ->setCellValue('E1', 'Jam Masuk')
                ->setCellValue('F1', 'Jam Keluar')
                ->setCellValue('G1', 'Harga');
    
            $column=2;
            $totalHarga = 0;
    
            foreach($data as $item){
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A'. $column, $item->nama)
                    ->setCellValue('B'. $column, $item->nama_jenis)
                    ->setCellValue('C'. $column, $item->menit)
                    ->setCellValue('D'. $column, $item->status)
                    ->setCellValue('E'. $column, $item->jam_m)
                    ->setCellValue('F'. $column, $item->jam_k)
                    ->setCellValue('G'. $column, $item->harga);
    
                $totalHarga += $item->harga;
                $column++;
            }
    
            // Menambahkan total harga ke baris terakhir
            $spreadsheet->getActiveSheet()->setCellValue('F'.$column, 'Total Harga');
            $spreadsheet->getActiveSheet()->setCellValue('G'.$column, $totalHarga);
    
            $writer = new Xlsx($spreadsheet);
            $fileName = 'Data Penjualan';
    
            header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="'.$fileName.'.xlsx"');
            header('Cache-Control: max-age=0');
    
            $writer->save('php://output');
        } else {
            return redirect()->to('/login');
        }
    }
    
}
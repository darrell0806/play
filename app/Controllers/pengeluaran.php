<?php

namespace App\Controllers;
use App\Models\M_model;

class Pengeluaran extends BaseController
{
    public function index()
    {
		if(session()->get('level')==1){
        $model=new M_model();
        $data['a'] = $model->tampil('pengeluaran');
        $data['title'] = 'Data Pengeluaran';
            echo view('partial/header_datatable',$data);
            echo view('partial/side_menu');
            echo view('partial/top_menu');
			echo view('pengeluaran/v_pengeluaran',$data);
            echo view('partial/footer_datatable');    
		}else{
			return redirect()->to('/Home');
		}
    }
	 public function tambah()
    {
		if(session()->get('level')==1 ||  session()->get('level')==2  ||  session()->get('level')==3){
      
            $data['title'] = 'Data Pengeluaran';
            echo view('partial/header_datatable',$data);
            echo view('partial/side_menu');
            echo view('partial/top_menu');
			echo  view('pengeluaran/tambah');
            echo view('partial/footer_datatable');    
		}else{
			return redirect()->to('/Home');
		}
    }
	 public function aksi_tambah()
	{
		
        $a=$this->request->getPost('keterangan');
		$b=$this->request->getPost('biaya');
      
        date_default_timezone_set('Asia/Jakarta');

		$simpan=array(
			'keterangan'=>$a,
			'biaya'=>$b,
			'created_at'=>date('Y-m-d H:i:s')
		);
		$model=new M_model();
		$model->simpan('pengeluaran',$simpan);
		return redirect()->to('/pengeluaran');
	
	}

public function delete($id)
	{
		$model=new m_model();
		$where=array('id_pengeluaran'=>$id);
		$model->hapus('pengeluaran',$where);
		return redirect()->to('/pengeluaran');
	}
}
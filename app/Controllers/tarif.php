<?php

namespace App\Controllers;
use App\Models\M_model;

class tarif extends BaseController
{
	public function index()
	{ 
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
            $on = 'tarif.jenis = jenis.id_jenis';
            $data['a'] = $model->join2('tarif', 'jenis', $on);
			$data['title']='Data Tarif Permainan';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('tarif/v_tarif',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	
	public function tambah_tarif()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
            $data['a'] = $model->tampil('jenis');
            $data['title']='Data Tarif Permainan';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('tarif/tambah_tarif');
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	
	public function aksi_tambah_tarif()
	{
		$a=$this->request->getPost('harga');
        $b=$this->request->getPost('jenis');
        $c=$this->request->getPost('menit');

		$simpan=array(
			'harga'=>$a,
            'jenis'=>$b,
            'menit'=>$c,
			'created_at'=>date('Y-m-d H:i:s')
		);
		$model=new M_model();
		$model->simpan('tarif',$simpan);
		return redirect()->to('/tarif');
	}
	

	
	public function edit_tarif($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$data['title']='Tarif Permainan';
			$data['e'] = $model->tampil('jenis');
			$where=array('id_tarif'=>$id);
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			$data['jojo']=$model->getWhere('tarif',$where);
			echo  view('tarif/edit_tarif',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}

	}
	public function aksi_edit_tarif()
	{
		$id=$this->request->getPost('id');
		$a=$this->request->getPost('harga');
		$b=$this->request->getPost('jenis');
		$c=$this->request->getPost('menit');


		$where=array('id_tarif'=>$id);
		$simpan=array(
			'harga'=>$a,
			'jenis'=>$b,
			'menit'=>$c
			
		);
		$model=new M_model();
		$model->qedit('tarif',$simpan, $where);
		return redirect()->to('/tarif');

	}
	public function delete_tarif($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new m_model();
			$where=array('id_tarif'=>$id);
			$model->hapus('tarif',$where);
			return redirect()->to('/tarif');
		}else{
			return redirect()->to('login');
		}
	}

}
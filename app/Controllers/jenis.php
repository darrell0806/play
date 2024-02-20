<?php

namespace App\Controllers;
use App\Models\M_model;

class jenis extends BaseController
{
	public function index()
	{ 
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$data['a'] = $model->tampil('jenis');
			$data['title']='Data Jenis Permainan';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('jenis/v_jenis',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	
	public function tambah_jenis()
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
            
            $data['title']='Data Jenis Permainan';
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			echo view('jenis/tambah_jenis');
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}
	}
	
	public function aksi_tambah_jenis()
	{
		$a=$this->request->getPost('nama_jenis');

		$simpan=array(
			'nama_jenis'=>$a,
			'created_at'=>date('Y-m-d H:i:s')
		);
		$model=new M_model();
		$model->simpan('jenis',$simpan);
		return redirect()->to('/jenis');
	}
	

	
	public function edit_jenis($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new M_model();
			$data['title']='Jenis Permainan';
			$where=array('id_jenis'=>$id);
			echo view('partial/header_datatable', $data);
			echo view('partial/side_menu');
			echo view('partial/top_menu');
			$data['jojo']=$model->getWhere('jenis',$where);
			echo  view('jenis/edit_jenis',$data);
			echo view('partial/footer_datatable');
		}else{
			return redirect()->to('login');
		}

	}
	public function aksi_edit_jenis()
	{
		$id=$this->request->getPost('id');
		$a=$this->request->getPost('nama_jenis');


		$where=array('id_jenis'=>$id);
		$simpan=array(
			'nama_jenis'=>$a
			
		);
		$model=new M_model();
		$model->qedit('jenis',$simpan, $where);
		return redirect()->to('/jenis');

	}
	public function delete_jenis($id)
	{
		if(session()->get('level')==1 ||  session()->get('level')==2){
			$model=new m_model();
			$where=array('id_jenis'=>$id);
			$model->hapus('jenis',$where);
			return redirect()->to('/jenis');
		}else{
			return redirect()->to('login');
		}
	}

}
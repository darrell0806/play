<?php

namespace App\Controllers;
use App\Models\M_model;

class add extends BaseController
{
    
public function index()
{
    $model=new M_model();
    date_default_timezone_set('Asia/Jakarta');
    $on1 = 'add.bill = bill.id_bill';
    $on2 = 'add.tarif = tarif.id_tarif';
    $on3 = 'tarif.jenis = jenis.id_jenis';
    $on4 = 'bill.user = user.id_user';
    $data['a'] = $model->joiadd('add', 'bill', 'tarif', 'jenis', 'user', $on1, $on2, $on3, $on4);
    $data['title']='Add On Bill';
    echo view('partial/header_datatable', $data);
    echo view('partial/side_menu');
    echo view('partial/top_menu');
    echo view('add/v_add',$data);
    echo view('partial/footer_datatable');

}
public function create()
{
    $model=new M_model();

    
    $rombelDetails = $model->getAllRombel();
    $data['c'] = $rombelDetails;
    $on1 = 'bill.tarif = tarif.id_tarif';
    $on2 = 'bill.user = user.id_user';
    $on3 = 'tarif.jenis = jenis.id_jenis';
    $data['a'] = $model->join4('bill', 'tarif', 'user', 'jenis', $on1, $on2, $on3);
    $data['title']='Add On Bill';
    echo view('partial/header_datatable', $data);
    echo view('partial/side_menu');
    echo view('partial/top_menu');
    echo view('add/tambah_add',$data);
    echo view('partial/footer_datatable');

}
public function aksi_tambah()
{ 
    date_default_timezone_set('Asia/Jakarta');
    $a = $this->request->getPost('bill');
    $b = $this->request->getPost('tarif');

    $data1 = array(
        'bill' => $a,
        'tarif' => $b,
        'creted_at' => date('Y-m-d H:i:s') // Pastikan kolom ini sesuai dengan yang ada di tabel
    );

    $model = new M_model();
    $model->simpan('add', $data1);

    $model->updateBill($a, $b);

    return redirect()->to('add');
}
public function delete($id)
{
    $model = new m_model();
    date_default_timezone_set('Asia/Jakarta');

    $add = $model->db->table('add')->getWhere(['id_add' => $id])->getRow();
    $tarif = $model->db->table('tarif')->getWhere(['id_tarif' => $add->tarif])->getRow();
    $bill = $model->db->table('bill')->getWhere(['id_bill' => $add->bill])->getRow();

    $tarifMenit = $this->timeToMinutes($tarif->menit); // Konversi waktu dari format TIME ke menit
    $tambahanDetik = $tarifMenit * 60;
 

    // Menghitung waktu baru jam_k
    $jamKBaru = date('Y-m-d H:i:s', strtotime($bill->jam_k) - $tambahanDetik);

    $model->hapus('add', ['id_add' => $id]);
    $model->db->table('bill')->update(['jam_k' => $jamKBaru], ['id_bill' => $add->bill]);

    return redirect()->to('/add');
}


private function timeToMinutes($time) {
    $parts = explode(":", $time);
    return ($parts[0] * 60) + $parts[1];
}
}
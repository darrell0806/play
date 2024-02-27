<?php

namespace App\Controllers;
use App\Models\M_model;

class bill2 extends BaseController
{
    
public function index()
{
    $model=new M_model();

    $on1 = 'bill.tarif = tarif.id_tarif';
    $on2 = 'bill.user = user.id_user';
    $on3 = 'tarif.jenis = jenis.id_jenis';
    $data['a'] = $model->joi('bill', 'tarif', 'user', 'jenis', $on1, $on2, $on3);
    $data['title']='Data Tarif Permainan';
    echo view('partial/header_datatable', $data);
    echo view('partial/side_menu');
    echo view('partial/top_menu');
    echo view('bill/v_bill2',$data);
    echo view('partial/footer_datatable');

}
public function tambah() {
        
    $model = new M_model();
    
    $rombelDetails = $model->getAllRombel();
    $data['a'] = $rombelDetails;
    $data['c'] = $model->tampil('user');
    $data['title'] = 'Tambah Bill Permainan';
    echo view('partial/header_datatable',$data);
    echo view('partial/side_menu');
    echo view('partial/top_menu');
    echo view('bill/tambah', $data);
    echo view('partial/footer_datatable');

}
public function aksi_tambah()
{
    $user = $this->request->getPost('user');
    $tarif = $this->request->getPost('tarif');
    date_default_timezone_set('Asia/Jakarta');
    // Mengambil waktu dari tarif dalam menit
    $model = new M_model();
    $tarifData = $model->getById('tarif', $tarif);
    $tarifMenit = $this->timeToMinutes($tarifData->menit); // Konversi waktu dari format TIME ke menit

    // Menambahkan waktu dari tarif ke waktu sekarang
    $jamM = date('Y-m-d H:i:s'); // Waktu sekarang
    $jamK = date('Y-m-d H:i:s', strtotime($jamM . ' +' . $tarifMenit . ' minutes')); // Menambahkan waktu dari tarif ke waktu sekarang

    // Menyimpan data ke database
    $data = array(
        'user' => $user,
        'tarif' => $tarif,
        'status' => 'In',
        'jam_m' => $jamM,
        'jam_k' => $jamK,
        'created_at' => date('Y-m-d H:i:s')
    );
    $model->simpan('bill', $data);

    return redirect()->to('bill2');
}

// Fungsi untuk mengonversi format TIME menjadi menit
private function timeToMinutes($time)
{
    $timeArr = explode(':', $time);
    $hours = (int)$timeArr[0];
    $minutes = (int)$timeArr[1];
    return ($hours * 60) + $minutes;
}

public function delete_bill($id)
	{
		$model=new m_model();
		$where=array('id_bill'=>$id);
		$model->hapus('bill',$where);
		return redirect()->to('/bill2');
	}
    public function cetak($id)
    {
        $model = new M_model();
    
        // Get bill details
        $bill = $model->db->table('bill')->getWhere(['id_bill' => $id])->getRow();
        $user = $model->db->table('user')->getWhere(['id_user' => $bill->user])->getRow();
    
        // Get tariff details with jenis
        $tarif = $model->db->table('tarif')
            ->join('jenis', 'jenis.id_jenis = tarif.jenis')
            ->getWhere(['tarif.id_tarif' => $bill->tarif])
            ->getRow();
    
        // Get additional items
        $adds = $model->db->table('add')
            ->join('bill', 'bill.id_bill = add.bill')
            ->join('tarif', 'tarif.id_tarif = add.tarif')
            ->join('jenis', 'jenis.id_jenis = tarif.jenis')
            ->getWhere(['add.bill' => $id])
            ->getResult();
    
        // Calculate total
        $total = $tarif->harga;
        foreach ($adds as $add) {
            $total += $add->harga;
        }
    
        // Calculate tax
        $tax = $total * 0.1;
    
        $data = [
            'user' => $user,
            'tarif' => $tarif,
            'adds' => $adds,
            'total' => $total,
            'tax' => $tax
        ];
    
        echo view('nota', $data);
    }

}
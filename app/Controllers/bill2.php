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
}
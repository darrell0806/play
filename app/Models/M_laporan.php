<?php

namespace App\Models;
use CodeIgniter\Model;

class M_laporan extends Model
{	
    protected $table_bill = 'bill'; // Ubah sesuai dengan nama tabel bill
    protected $table_pengeluaran = 'pengeluaran'; // Ubah sesuai dengan nama tabel pengeluaran

    public function getLaporanKeuangan($awal, $akhir)
    {
        $builder_bill = $this->db->table($this->table_bill);
        $builder_bill->select('bill.created_at, tarif.harga, null as biaya, "in" as jenis, tarif.harga as total');
        $builder_bill->join('tarif', 'bill.tarif = tarif.id_tarif');
        $builder_bill->where('bill.created_at >=', $awal);
        $builder_bill->where('bill.created_at <=', $akhir);
        $bill_data = $builder_bill->get()->getResult();

        $builder_pengeluaran = $this->db->table($this->table_pengeluaran);
        $builder_pengeluaran->select('pengeluaran.created_at, null as harga, pengeluaran.biaya, "out" as jenis, pengeluaran.biaya as total');
        $builder_pengeluaran->where('pengeluaran.created_at >=', $awal);
        $builder_pengeluaran->where('pengeluaran.created_at <=', $akhir);
        $pengeluaran_data = $builder_pengeluaran->get()->getResult();

        $result = array_merge($bill_data, $pengeluaran_data);

        usort($result, function ($a, $b) {
            return strtotime($a->created_at) - strtotime($b->created_at);
        });

        return $result;
    }
}
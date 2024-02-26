<?php

$db = \Config\Database::connect();
$builder = $db->table('website');
$namaweb = $builder->select('nama_website')
->where('deleted_at', null)
->get()
->getRow();

$builder = $db->table('website');
$logo = $builder->select('*')
->where('deleted_at', null)
->get()
->getRow();

?>

<!doctype html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=$title?></title>
  
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?=base_url('logo/favicon/'.$logo->favicon_website)?>">

<style>
  #datatable-buttons {
    width: 76%;
    margin: auto;
    border-collapse: collapse;
    border: 1px solid black; 
  }

  #datatable-buttons th,
  #datatable-buttons td {
    padding: 8px;
    border: 1px solid black; 
  }

  #datatable-buttons th {
    background-color: white;
    color: black;
    text-align: center;
  }

  #datatable-buttons tbody tr:nth-child(odd) {
    background-color: #f2f2f2;
  }

  #datatable-buttons tbody tr:hover {
    background-color: #ddd;
  }
</style>
<!-- View laporan pembayaran Excel -->
<!-- app/Views/laporan_keuangan.php -->
<div align="center">
  <h1>Laporan Keuangan</h1>
  <table border="1" width="80%" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Uang Masuk (In)</th>
        <th>Uang Keluar (Out)</th>
        <th>Sub Total</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      <?php $last_date = null; $total_in = 0; $total_out = 0; $total_all_in = 0; $total_all_out = 0; ?>
      <?php foreach ($laporan as $data) : ?>
        <?php
          $is_in = isset($data->harga); // Cek apakah data berasal dari tabel bill
          $is_out = isset($data->biaya); // Cek apakah data berasal dari tabel pengeluaran
          $current_date = date('Y-m-d', strtotime($data->created_at));

          // Jika tanggal saat ini berbeda dengan tanggal sebelumnya, tampilkan total untuk tanggal sebelumnya
          if ($current_date !== $last_date && $last_date !== null) {
            echo "<tr>";
            echo "<td></td>"; // Tambahkan kolom kosong untuk nomor urut
            echo "<td colspan='2' style='text-align: right;'>Total untuk tanggal $last_date</td>";
            echo "<td>$total_in</td>";
            echo "<td>$total_out</td>";
            echo "<td>" . ($total_in - $total_out) . "</td>";
            echo "</tr>";

            $total_all_in += $total_in;
            $total_all_out += $total_out;

            $total_in = 0;
            $total_out = 0;
          }

          // Tambahkan jumlah ke total sesuai dengan jenis transaksi
          if ($is_in) {
            $total_in += $data->harga;
          }
          if ($is_out) {
            $total_out += $data->biaya;
          }

          $last_date = $current_date;
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $data->created_at; ?></td>
          <td><?php echo ($is_in) ? $data->harga : ''; ?></td>
          <td><?php echo ($is_out) ? $data->biaya : ''; ?></td>
          <td><?php echo ($is_in || $is_out) ? $data->total : ''; ?></td>
        </tr>
      <?php endforeach; ?>

      <!-- Tampilkan total untuk tanggal terakhir -->
      <?php if ($last_date !== null) : ?>
        <tr>
          <td></td> <!-- Kolom kosong untuk nomor urut -->
          <td colspan='2' style='text-align: right;'>Total untuk tanggal <?php echo $last_date; ?></td>
          <td><?php echo $total_in; ?></td>
          <td><?php echo $total_out; ?></td>
          <td><?php echo ($total_in - $total_out); ?></td>
        </tr>

        <!-- Tampilkan total keseluruhan -->
        <tr>
          <td colspan="5" style="text-align: right;">Total Keseluruhan</td>
          <td><?php echo ($total_all_in - $total_all_out); ?></td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>


<script>
  window.print();
</script>
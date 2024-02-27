<?php
date_default_timezone_set('Asia/Jakarta');

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

$alamat = "Komplek: $logo->komplek, Jalan: $logo->jalan, Kelurahan: $logo->kelurahan, Kecamatan: $logo->kecamatan, Kota: $logo->kota, Kode Pos: $logo->kode_pos, Nomor: $logo->nomor, Email: $logo->email_p";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
        }

        .header img {
            width: 100px;
            height: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        h3 {
            margin-top: 10px;
            text-align: center;
        }

        .total {
            margin-top: 20px;
        }

        .total h3 {
            margin-bottom: 5px;
        }

        .separator {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyNS40LjEsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAxMTUuNCAxMjAuNSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMTE1LjQgMTIwLjU7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQoJLnN0MHtmaWxsLXJ1bGU6ZXZlbm9kZDtjbGlwLXJ1bGU6ZXZlbm9kZDtmaWxsOiNGNEExMEM7fQ0KCS5zdDF7ZmlsbC1ydWxlOmV2ZW5vZGQ7Y2xpcC1ydWxlOmV2ZW5vZGQ7ZmlsbDojNDM1RUJFO30NCgkuc3Qye2ZpbGw6I0Y0QTEwQzt9DQoJLnN0M3tmaWxsOiM0MzVFQkU7fQ0KPC9zdHlsZT4NCjxnPg0KCTxnPg0KCQk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNNjEuMiw4Ni41SDkzdjEwLjJIODIuMnYyMy44SDcxLjlWOTYuN0g2MS4yVjg2LjV6Ii8+DQoJPC9nPg0KCTxnPg0KCQk8cGF0aCBjbGFzcz0ic3QxIiBkPSJNNTQuMiw4Ni42djEwLjJIMzguOGMwLDAtNS41LDAuNy01LjUsNi43YzAsNiw1LjMsNi45LDUuMyw2LjloNi41di02LjZoOC45YzAsNS42LDAsMTEuMiwwLDE2LjhIMzcuOA0KCQkJYzAsMC03LjQtMC43LTExLjQtNS44cy00LTEwLjktNC0xMC45cy0wLjUtNy43LDUuMi0xM2MzLjItMyw2LjktNCw5LjYtNC4yaDMuNUw1NC4yLDg2LjZMNTQuMiw4Ni42eiIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KCTxwb2x5Z29uIGNsYXNzPSJzdDIiIHBvaW50cz0iMzAuNCwzNS4yIDM4LjYsMzUuMiAzOC42LDY1LjUgNDkuNiw1NC40IDQ5LjYsMjQuMiAxOS40LDI0LjIgMTkuNCw4NC42IDMwLjQsNzMuNiAJIi8+DQoJPHBvbHlnb24gY2xhc3M9InN0MyIgcG9pbnRzPSI3OS45LDU0LjQgNDkuNiw1NC40IDQ5LjYsNTQuNCAzOC42LDY1LjUgMzguNiw2NS41IDY4LjgsNjUuNSA2OC44LDczLjYgMzAuNCw3My42IDMwLjQsNzMuNiANCgkJMTkuNCw4NC42IDE5LjQsODQuNyA3OS45LDg0LjcgCSIvPg0KCTxwb2x5Z29uIGNsYXNzPSJzdDMiIHBvaW50cz0iODQuOSwxMS4xIDg0LjksMTEuMSA4NC45LDMyLjMgNjMuNywzMi4zIDYzLjcsMzIuMiA1Mi43LDQzLjMgNTIuNyw0My4zIDk2LDQzLjMgOTYsMCA5NiwwIAkiLz4NCgk8cG9seWdvbiBjbGFzcz0ic3QyIiBwb2ludHM9IjYzLjcsMTEuMSA4NC45LDExLjEgOTYsMCA1Mi43LDAgNTIuNyw0My4zIDYzLjcsMzIuMiAJIi8+DQo8L2c+DQo8L3N2Zz4NCg=="><!-- Ini merupakan logo, ganti dengan logo sesuai kebutuhan -->
            <h3 class="subjudul"><?= $namaweb->nama_website ?></h3>
            <h1>Nota Pembelian</h1>
            <p>Waktu Transaksi: <?= date('Y-m-d H:i:s') ?></p>
            <p>Alamat: <?= $alamat ?></p>
        </div>

        <table>
            <thead>
            <p>Nama Pelanggan: <?= $user->nama ?></p>
                <tr>
                    <th>Item</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $tarif->nama_jenis ?></td>
                    <td>Rp <?= number_format($tarif->harga, 0, ',', '.') ?></td>
                </tr>
                <?php foreach ($adds as $add) : ?>
                    <tr>
                        <td><?= $add->nama_jenis ?></td>
                        <td>Rp <?= number_format($add->harga, 0, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total">
            <h3>Total Belanja</h3>
            <p>Rp <?= number_format($total, 0, ',', '.') ?></p>
            <h3>Pajak 10%</h3>
            <p>Rp <?= number_format($tax, 0, ',', '.') ?></p>
            <h3>Total Akhir</h3>
            <p>Rp <?= number_format($total + $tax, 0, ',', '.') ?></p>
        </div>
    </div>
</body>

</html>
<script>
  window.print();
</script>
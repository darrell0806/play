<?php
if(session()->get('level')== 1){
	?>
<div id="main-content">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3><?=$title?></h3>
          <p class="text-subtitle text-muted">Anda dapat melihat <?=$title?> di bawah</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
      <div class="card">
        <div class="card-header">
          <a href="<?=base_url('/bill2/tambah/')?>">
            <button class="btn btn-primary"><i class="fa-solid fa-plus"></i>
            Tambah</button>
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Jenis</th>
                  <th>Menit</th>
                  <th>Status</th>
                  <th>Jam Masuk</th>
                  <th>Jam Keluar</th>
                  <th>Countdown</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
$no=1;
foreach ($a as $b) {
    $startTime = strtotime($b->jam_m); // Waktu mulai
    $endTime = strtotime($b->jam_k); // Waktu selesai
    $difference = abs($endTime - $startTime); // Selisih waktu dalam detik

    $minutes = floor($difference / 60);
    $hours = floor($minutes / 60);
    $minutes = $minutes % 60; 
    ?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $b->nama?> </td>
        <td><?php echo $b->harga?> </td>
        <td><?php echo $b->nama_jenis?> </td>
        <td><?php echo $b->menit?> </td>
        <td><?php echo $b->status?> </td>
        <td><?php echo $b->jam_m?> </td>
        <td><?php echo $b->jam_k?> </td>
        <td id="countdown_<?php echo $b->id_bill; ?>" data-time="<?php echo $difference; ?>"><?php echo $hours . " jam " . $minutes . " menit"; ?></td>

        <td>
        <a href="<?=base_url('/bill2/cetak/'.$b->id_bill)?>"><button class="btn btn-warning">Cetak Nota</button></a> 
            <a href="<?=base_url('/bill2/delete_bill/'.$b->id_bill)?>"><button class="btn btn-danger">Delete</button></a>    
        </td>
    </tr>
<?php
}
?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- Basic Tables end -->
  </div>
 
  <script>
// Fungsi untuk mengurangi waktu setiap detik
// Fungsi untuk mengurangi waktu setiap detik
function countdown(id, time) {
    var countdownElement = document.getElementById(id);

    var countdown = setInterval(function() {
        var hours = Math.floor(time / 3600);
        var minutes = Math.floor((time % 3600) / 60);
        var seconds = time % 60;

        countdownElement.innerHTML = hours + " jam " + minutes + " menit " + seconds + " detik";
        
        if (time <= 0) {
            clearInterval(countdown);
            countdownElement.innerHTML = "Waktu habis";
        } else {
            time--;
            localStorage.setItem(id, time); // Menyimpan waktu countdown ke localStorage
        }
    }, 1000); // Mengurangi waktu setiap detik
}


// Memulai countdown untuk setiap elemen dengan id countdown_*
document.addEventListener("DOMContentLoaded", function() {
    <?php foreach ($a as $b) { ?>
        var id = "countdown_<?php echo $b->id_bill; ?>";
        var time = parseInt(document.getElementById(id).getAttribute("data-time"));
        var savedTime = localStorage.getItem(id);

        if (savedTime !== null && !isNaN(savedTime)) {
            time = parseInt(savedTime);
        }

        countdown(id, time);
    <?php } ?>
});
</script>

   
	<?php
								}else if(session()->get('level')== 2){
									?>
<div id="main-content">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3><?=$title?></h3>
          <p class="text-subtitle text-muted">Anda dapat melihat <?=$title?> di bawah</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
      <div class="card">
        <div class="card-header">
          <a href="<?=base_url('/bill2/tambah/')?>">
            <button class="btn btn-primary"><i class="fa-solid fa-plus"></i>
            Tambah</button>
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="table1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Jenis</th>
                  <th>Menit</th>
                  <th>Status</th>
                  <th>Jam Masuk</th>
                  <th>Jam Keluar</th>
                
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=1;
                foreach ($a as $b) {
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $b->nama?> </td>
                    <td><?php echo $b->harga?> </td>
                    <td><?php echo $b->nama_jenis?> </td>
                    <td><?php echo $b->menit?> </td>
                    <td><?php echo $b->status?> </td>
                    <td><?php echo $b->jam_m?> </td>
                    <td><?php echo $b->jam_k?> </td>
                  

                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- Basic Tables end -->
  </div>
	<?php } ?>
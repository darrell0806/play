

<style>
  .dual-table {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
  }
  .dual-table .card {
    flex: 1;
    margin: 0 10px;
  }
</style>

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
  <section class="section">
    <div class="dual-table">
      <div class="card">
        <div class="card-header">
          <h4>Data Status In</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table" id="table_in">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Jenis</th>
              <th>Menit</th>
              <th>Jam Masuk</th>
              <th>Jam Keluar</th>
       
            </tr>
          </thead>
          <tbody>
            <?php 
            $no=1;
            foreach ($a as $b) {
              if ($b->status == 'In') {
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $b->nama?> </td>
                  <td><?php echo $b->harga?> </td>
                  <td><?php echo $b->nama_jenis?> </td>
                  <td><?php echo $b->menit?> </td>
                  <td><?php echo $b->jam_m?> </td>
                  <td><?php echo $b->jam_k?> </td>
                 
                </tr>
                <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="card">
        <div class="card-header">
          <h4>Data Status Out</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
           <table class="table" id="table_out">
          <!-- Table header -->
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Jenis</th>
              <th>Menit</th>
              <th>Jam Masuk</th>
              <th>Jam Keluar</th>
             
            </tr>
          </thead>
          <tbody>
            <?php 
            $no=1;
            foreach ($a as $b) {
              if ($b->status == 'Out') {
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $b->nama?> </td>
                  <td><?php echo $b->harga?> </td>
                  <td><?php echo $b->nama_jenis?> </td>
                  <td><?php echo $b->menit?> </td>
                  <td><?php echo $b->jam_m?> </td>
                  <td><?php echo $b->jam_k?> </td>
                 
                </tr>
                <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>


    <!-- Basic Tables end -->

    <script>
    $(document).ready(function() {
    $('#table_in').DataTable();
    $('#table_out').DataTable();
});
</script>
<div id="main-content">
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3><?=$title?></h3>
          <p class="text-subtitle text-muted">Anda dapat melihat <?= $title ?> di bawah</p>

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
                foreach ($jojo as $b) {
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
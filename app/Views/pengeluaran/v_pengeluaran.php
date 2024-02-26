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
			<div class="card">
				<div class="card-header">
					<a href="<?php echo base_url('pengeluaran/tambah/')?>"><button class="btn btn-primary mt-2"><i class="fa-solid fa-plus"></i>
					Tambah</button></a>
				</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="table1">
							<thead>
								<tr>
									<th>No</th>
									<th>Keterangan</th>
                                    <th>Biaya</th>
                                    <th>Tanggal</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php
							$no=1;
							foreach ($a as $riz) {
								?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?php echo $riz->keterangan ?></td> 
                                    <td><?php echo $riz->biaya ?></td>  
                                    <td><?php echo $riz->created_at ?></td>        
									<td>
										
										<a href="<?php echo base_url('pengeluaran/delete/'. $riz->id_pengeluaran)?>" class="btn btn-danger my-1"><i class="fa-solid fa-trash"></i></a>
									<?php } ?>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

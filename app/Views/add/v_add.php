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
					<a href="<?php echo base_url('add/create/')?>"><button class="btn btn-primary mt-2"><i class="fa-solid fa-plus"></i>
					Tambah</button></a>
				</div>

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped" id="table1">
							<thead>
								<tr>
									<th>No</th>
									<th>Bill</th>
                                    <th>Tarif</th>
                                    <th>Created At</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php
							$no=1;
							foreach ($a as $riz) {
								?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?php echo $riz->kode . ' - ' . $riz->nama?></td>   
                                    <td><?php echo $riz->nama_jenis. ' - ' . $riz->harga. ' - ' . $riz->menit?> </td> 
                                    <td><?php echo $riz->creted_at?></td>   
                                       
									<td>
										<a href="<?php echo base_url('add/delete/'. $riz->id_add)?>" class="btn btn-danger my-1"><i class="fa-solid fa-trash"></i></a>
								
								</td>
                                <?php } ?>
							</tr>
						</table>
					</div>
				</div>
			</div>



<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3><?=$title?></h3>
                    <p class="text-subtitle text-muted">Anda dapat menambah data <?=$title?> di bawah</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url('login/dashboard')?>">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <form class="form-horizontal form-label-left" novalidate action="<?= base_url('add/aksi_tambah')?>" method="post" enctype="multipart/form-data">
<div class="col-md-6 col-12">
                <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Tambah Add On</h4>
                    <a href="<?= site_url('/add') ?>" class="btn btn-light-secondary me-1 mb-1">Back</a>
                </div>
                    
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                  
                                      
                                        <div class="col-md-4">
                                            <label>Bill</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                <fieldset class="form-group">
                                                <select class="choices form-select" name="bill">
                                      
                                        <?php
                                        foreach ($a as $b) {
                                            ?>
                                            <option value ="<?= $b->id_bill?>"><?php echo $b->kode . ' - ' . $b->nama?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    </fieldset>
                                        </div>
                                            </div>
                                            </div>
                                        <div class="col-md-4">
                                            <label>Tarif</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                <fieldset class="form-group">
                                                <select class="choices form-select" name="tarif">
                                       
                                        <?php
                                        foreach ($c as $b) {
                                            ?>
                                            <option value ="<?= $b->id_tarif?>"><?php echo $b->nama_jenis. ' - ' . $b->harga. ' - ' . $b->menit?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    </fieldset>
                                        </div>
                                            </div>
                                            </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


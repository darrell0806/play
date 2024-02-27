<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3><?=$title?></h3>
                    <p class="text-subtitle text-muted">Anda dapat melihat data <?=$title?> di bawah</p>
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
          <section id="basic-horizontal-layouts">
            <div class="row match-height">
              <div class="col-md-6 col-12">
              <div class="card">
    <div class="card-header">
        <h4 class="card-title">Windows Print</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form-horizontal form-label-left" novalidate action="<?= base_url('L_ini/print_windows'); ?>" method="post">
                <button type="submit" class="btn btn-warning d-block mx-auto mb-2">
                    
                    Print Windows
                </button>
            </form>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">PDF</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form-horizontal form-label-left" novalidate action="<?= base_url('L_ini/pdf'); ?>" method="post">
                <button type="submit" class="btn btn-danger d-block mx-auto mb-2">
               
                   Export to PDF
                </button>
            </form>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Excel</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form-horizontal form-label-left" novalidate action="<?= base_url('L_ini/excel'); ?>" method="post">
                <button type="submit" class="btn btn-success d-block mx-auto">
                  
                   Export to Excel
                </button>
            </form>
        </div>
    </div>
</div>

      
      
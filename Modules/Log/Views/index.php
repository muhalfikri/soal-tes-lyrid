<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><?= $title ?></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15 add"><i class="fa fa-plus-circle"></i> Tambah</button>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card radius shadow">
            <div class="card-header bg-info"></div>
            <div class="card-body">
                <h5 class="card-title"><i class="fa fa-list"></i> <?= $title; ?></h5>
                <h6 class="card-subtitle"><?= $title; ?> pada Aplikasi</h6>
                <div class="table-responsive">
                    <table class="display nowrap table table-hover table-striped table-bordered datatables" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Lengkap</th>
                                <th class="text-center">Dekripsi</th>
                                <th class="text-center">Created At</th>
                                <!-- <th class="text-center"></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- looping JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>/assets/js/log.js?v=<?= time(); ?>"></script>
<?= $this->endSection() ?>

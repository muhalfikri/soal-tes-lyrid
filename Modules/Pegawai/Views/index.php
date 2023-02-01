<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-6 col-6">
        <h4 class="text-themecolor"><?= $title ?></h4>
    </div>
    <div class="col-md-6 col-6 text-right">
        <button type="button" class="btn btn-info add"><i class="fa fa-plus-circle"></i> Tambah</button>
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
                <h5 class="card-title"><i class="fa fa-list"></i> List <?= $title; ?></h5>
                <h6 class="card-subtitle">List <?= $title; ?> pada Aplikasi</h6>
                <table class="display nowrap table table-hover table-striped table-bordered datatables" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Lengkap</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Whatsapp</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Image</th>
                            <th class="text-center"></th>
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

<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Form Tambah Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url(); ?>/pegawai/save" method="POST" class="form-horizontal form-bordered" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3 mt-2"><strong>Nama Lengkap <span class="text-danger">*</span> :</strong></label>
                                <div class="col-md-9">
                                    <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3 mt-2"><strong>Email <span class="text-danger">*</span> :</strong></label>
                                <div class="col-md-9">
                                    <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3 mt-2"><strong>Whatsapp <span class="text-danger">*</span> :</strong></label>
                                <div class="col-md-9">
                                    <input type="number" min="0" name="whatsapp" id="whatsapp" placeholder="Whatsapp" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3 mt-2"><strong>Alamat <span class="text-danger">*</span> :</strong></label>
                                <div class="col-md-9">
                                    <textarea name="alamat" id="" class="form-control" placeholder="Alamat" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3 mt-2"><strong>Foto <span class="text-danger">*</span> :</strong></label>
                                <div class="col-md-9">
                                    <input type="file" name="image" id="image" class="form-control" required>
                                    <small class="text-danger">Format File jpg, jpeg. Max File 300KB</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit" tabindex="" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Form Edit Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url(); ?>/pegawai/update" method="POST" class="form-horizontal form-bordered" enctype="multipart/form-data">
                <!-- hidden value -->
                <input type="hidden" name="id" id="id_pegawai">
                <input type="hidden" name="image_old" id="image_old">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3 mt-2"><strong>Nama Lengkap <span class="text-danger">*</span> :</strong></label>
                                <div class="col-md-9">
                                    <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3 mt-2"><strong>Email <span class="text-danger">*</span> :</strong></label>
                                <div class="col-md-9">
                                    <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3 mt-2"><strong>Whatsapp <span class="text-danger">*</span> :</strong></label>
                                <div class="col-md-9">
                                    <input type="number" min="0" name="whatsapp" id="whatsapp" placeholder="Whatsapp" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3 mt-2"><strong>Alamat <span class="text-danger">*</span> :</strong></label>
                                <div class="col-md-9">
                                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3 mt-2"><strong>Foto <span class="text-danger">*</span> :</strong></label>
                                <div class="col-md-9">
                                    <input type="file" name="image" id="image" class="form-control">
                                    <small class="text-danger">Format File jpg, jpeg. Max File 300KB</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url(); ?>/assets/js/pegawai.js?v=<?= time(); ?>"></script>
<?= $this->endSection() ?>

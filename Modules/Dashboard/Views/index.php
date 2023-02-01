<?= $this->extend('layout/page_layout') ?>
<?= $this->section('content') ?>
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h4 class="text-themecolor"><?= $title ?></h4>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success radius shadow" role="alert">
					<h4 class="alert-heading">Hai, <?= session()->get('nama_lengkap') ?></h4>
					<hr>
					<p class="mb-0">Klik Menu Di sidebar untuk memulai aktifitas!</p>
				</div>
			</div>
		</div>
	</div>

<?= $this->endSection() ?>

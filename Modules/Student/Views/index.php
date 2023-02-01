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
				<!-- <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= base_url('/dashboard'); ?>"><?= $title ?></a></li>
					<li class="breadcrumb-item active">Dashboard 1</li>
				</ol> -->
				<button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="container">
		<div class="row">
			<div class="col-md-12 my-2 card">
				<div class="card-body">
					<h5 class="h5">Codeigniter 4 Sudah Rilis!</h5>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam perferendis commodi tenetur quos ducimus repellat nulla, nam magni. Commodi iusto ad harum voluptas exercitationem facere eos earum laboriosam excepturi quas?</p>
				</div>
			</div>
			<div class="col-md-12 my-2 card">
				<div class="card-body">
					<h5 class="h5">Pengembangan Codeiginter 4 Tertunda</h5>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam perferendis commodi tenetur quos ducimus repellat nulla, nam magni. Commodi iusto ad harum voluptas exercitationem facere eos earum laboriosam excepturi quas?</p>
				</div>
			</div>
			<div class="col-md-12 my-2 card">
				<div class="card-body">
					<h5 class="h5">Wow, Ini 5 Startup yang Menggunakan Codeigniter</h5>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam perferendis commodi tenetur quos ducimus repellat nulla, nam magni. Commodi iusto ad harum voluptas exercitationem facere eos earum laboriosam excepturi quas?</p>
				</div>
			</div>
			<div class="col-md-12 my-2 card">
				<div class="card-body">
					<h5 class="h5">Codeigniter Ternyata Framework Terpopuler di Inodnesia</h5>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam perferendis commodi tenetur quos ducimus repellat nulla, nam magni. Commodi iusto ad harum voluptas exercitationem facere eos earum laboriosam excepturi quas?</p>
				</div>
			</div>
		</div>
	</div>

<?= $this->endSection() ?>

<?= $this->include('layout/header') ?>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <!-- <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div> -->

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->

    <div id="main-wrapper">
        
		<?= $this->include('layout/navbar') ?>

        <?php 
            if (session()->get('id_group') == 1) {
                echo $this->include('layout/sidebar/super_admin');
            } else if(session()->get('id_group') == 2) {
                echo $this->include('layout/sidebar/admin');
            } else if(session()->get('id_group') == 3) {
                echo $this->include('layout/sidebar/finance');
            } else if(session()->get('id_group') == 4) {
                echo $this->include('layout/sidebar/gudang');
            } else if(session()->get('id_group') == 5) {
                echo $this->include('layout/sidebar/customer_service');
            }
        ?>

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
				<!-- ============================================================== -->
                <!-- CONTENT -->
                <!-- ============================================================== -->
                <!-- <div class="row">
                    <div class="col-md-12">
						<p>
							Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora velit, cupiditate, vero eos quisquam et adipisci nobis quibusdam quam ea sint consequuntur soluta similique corporis culpa rem harum, quae minima!
						</p>
					</div>
                </div> -->
                <?= $this->renderSection('content') ?>
				<!-- ============================================================== -->
                <!-- END CONTENT -->
                <!-- ============================================================== -->
				<?= $this->include('layout/footer') ?>
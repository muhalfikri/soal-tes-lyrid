<!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-pro"> 
                            <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <img src="<?= base_url(); ?>/<?= session()->get('foto'); ?>" alt="user-img" class="img-circle">
                                <span class="hide-menu">
                                    Hi, <?= session()->get('nama_lengkap'); ?>
                                </span>
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="<?= base_url('dashboard'); ?>" aria-expanded="false">
                                <i class="icon-speedometer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="<?= base_url('pegawai'); ?>" aria-expanded="false">
                                <i class="fa fa-users"></i>
                                <span class="hide-menu">Pegawai</span>
                            </a>
                        </li>
                        <li> 
                            <a class="waves-effect waves-dark" href="<?= base_url('users'); ?>" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                <span class="hide-menu">Manajemen User</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->